-- ============================================================================================
--      |   |   |   |   Nom de la base :    COVOITURAGE_COMPUS
-- ============================================================================================
-- DROP TABLE IF EXISTS CONDUCTEUR CASCADE;
-- DROP TABLE IF EXISTS ETUDIANT CASCADE;
-- DROP TABLE IF EXISTS PASSAGER CASCADE;
-- DROP TABLE IF EXISTS VOITURE CASCADE;
-- DROP TABLE IF EXISTS ESCALE CASCADE;
-- DROP TABLE IF EXISTS PROPOSITION CASCADE;
-- DROP TABLE IF EXISTS RESERVATION CASCADE;
-- DROP TABLE IF EXISTS EVALUATION CASCADE;
-- DROP TABLE IF EXISTS USERS CASCADE;
-- DROP TABLE IF EXISTS TRAJET CASCADE;

CREATE DATABASE IF NOT EXISTS covoiturage_db;

USE covoiturage_db;


-- ============================================================================================
--  
--  |   |   |   |   |   |   CREATION DES TABLES DANS LA BASE DE DONNEES
--  
-- ============================================================================================



-- ============================================================================================
--  
--  |   |   |   |   |   |           STUDENT TABLE
--  
-- ============================================================================================

CREATE TABLE IF NOT EXISTS ETUDIANT(
    NUM_ETUDIANT INT NOT NULL,
    PRENOM VARCHAR(100) NOT NULL,
    NOM VARCHAR(100) NOT NULL,
    PRIMARY KEY (NUM_ETUDIANT)
);

-- ============================================================================================
--  
--  |   |   |   |   |   |           CONDUCTEUR TABLE
--  
-- ============================================================================================

CREATE TABLE IF NOT EXISTS CONDUCTEUR(
    NUM_CONDUCTEUR INT NOT NULL,
    PRIMARY KEY (NUM_CONDUCTEUR),
    FOREIGN KEY (NUM_CONDUCTEUR) REFERENCES ETUDIANT(NUM_ETUDIANT) ON DELETE CASCADE ON UPDATE CASCADE
);


-- ============================================================================================
--  
--  |   |   |   |   |   |           PASSAGER TABLE
--  
-- ============================================================================================

CREATE TABLE IF NOT EXISTS PASSAGER(
    NUM_PASSAGER INT NOT NULL,
    PRIMARY KEY (NUM_PASSAGER),
    FOREIGN KEY (NUM_PASSAGER) REFERENCES ETUDIANT(NUM_ETUDIANT) ON DELETE CASCADE ON UPDATE CASCADE
);


-- ============================================================================================
--  
--  |   |   |   |   |   |           TABLE VOITURE
--  
-- ============================================================================================

CREATE TABLE IF NOT EXISTS VOITURE(
    NUM_IMMATRICULE INT,
    NUM_CONDUCTEUR INT NOT NULL,
    TYPE_VOITURE VARCHAR(100),
    COULEUR VARCHAR(100) NOT,
    ETAT VARCHAR(100),
    NBR_PASSAGER INT,
    PRIMARY KEY (NUM_IMMATRICULE),
    FOREIGN KEY (NUM_CONDUCTEUR) REFERENCES CONDUCTEUR(NUM_CONDUCTEUR) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT VOITURE_UNIQUE UNIQUE (NUM_IMMATRICULE, NUM_CONDUCTEUR)   ---- Un conducteur ne peut avoir qu'une seule voiture
);

-- ============================================================================================
--  
--  |   |   |   |   |   |           TABLE TRAJET
--  
-- ============================================================================================


CREATE TABLE IF NOT EXISTS TRAJET(
    NUM_TRAJET SERIAL NOT NULL,
    NUM_IMMATRICULE INT NOT NULL,
    DATE_DEPART TIMESTAMP NOT NULL,
    DATE_ARRIVEE TIMESTAMP NOT NULL,
    VILLE_DEPART VARCHAR(100) NOT NULL,
    ADRESSE_ARRIVEE VARCHAR(100) NOT NULL,
    CODE_POSTAL INT NOT NULL,
    NBR_ESCALES INT NOT NULL DEFAULT 0,
    PRIX_KILOMETRAGE INT NOT NULL,
    DISTANCE_TOTAL INT NOT NULL,
    DUREE_ESTIME INT NOT NULL,

    PRIMARY KEY (NUM_TRAJET),
    FOREIGN KEY (NUM_IMMATRICULE) REFERENCES VOITURE(NUM_IMMATRICULE) ON DELETE CASCADE ON UPDATE CASCADE
);

-- ============================================================================================
--  
--  |   |   |   |   |   |           TABLE ESCALE
--  
-- ============================================================================================


CREATE TABLE IF NOT EXISTS ESCALE(
    NUM_ESCALE SERIAL NOT NULL,
    NUM_TRAJET INT NOT NULL,
    ADRESSE VARCHAR(100) NOT NULL,
    CODE_POSTAL INT NOT NULL,
    HEURE_ARRIVEE TIMESTAMP NOT NULL,
    VALIDATION_ESCALE BOOLEAN NOT NULL DEFAULT FALSE,  
    PRIMARY KEY (NUM_ESCALE),
    FOREIGN KEY (NUM_TRAJET) REFERENCES TRAJET(NUM_TRAJET) ON DELETE CASCADE ON UPDATE CASCADE
);

-- ============================================================================================
--  
--  |   |   |   |   |   |           TABLE PROPOSITION
--  
-- ============================================================================================


CREATE TABLE IF NOT EXISTS PROPOSITION(
    NUM_ESCALE INT NOT NULL,
    NUM_PASSAGER INT NOT NULL,
    PRIMARY KEY  (NUM_ESCALE, NUM_PASSAGER),
    FOREIGN KEY (NUM_ESCALE) REFERENCES ESCALE(NUM_ESCALE) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (NUM_PASSAGER) REFERENCES PASSAGER(NUM_PASSAGER) ON DELETE CASCADE ON UPDATE CASCADE
);

-- ============================================================================================
--  
--  |   |   |   |   |   |           TABLE RESERVATION
--  
-- ============================================================================================


CREATE TABLE IF NOT EXISTS RESERVATION(
    NUM_TRAJET INT NOT NULL,
    NUM_PASSAGER INT NOT NULL,
    VALIDATION_RESERVATION BOOLEAN NOT NULL DEFAULT FALSE,
    CONSTRAINT PK_RESERVATION PRIMARY KEY (NUM_TRAJET, NUM_PASSAGER),
    FOREIGN KEY (NUM_TRAJET) REFERENCES TRAJET(NUM_TRAJET) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (PASSAGER) REFERENCES PASSAGER(NUM_PASSAGER) ON DELETE CASCADE ON UPDATE CASCADE
);

-- ============================================================================================
--  
--  |   |   |   |   |   |           TABLE EVALUATION
--  
-- ============================================================================================


CREATE TABLE IF NOT EXISTS EVALUATION(
    NUM_ETUDIANT_EVALUE INT NOT NULL,
    NUM_TRAJET INT NOT NULL,
    NUM_ETUDIANT_EVALUATEUR INT NOT NULL,
    NOTE INT NOT NULL,
    CHECK (NOTE >=1 AND NOTE <=5),
    PRIMARY KEY  (NUM_ETUDIANT_EVALUE, NUM_ETUDIANT_EVALUATEUR, NUM_TRAJET),
    FOREIGN KEY (NUM_TRAJET) REFERENCES TRAJET(NUM_TRAJET) ON DELETE CASCADE,
    FOREIGN KEY (NUM_ETUDIANT_EVALUATEUR) REFERENCES ETUDIANT(NUM_ETUDIANT) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (NUM_ETUDIANT_EVALUE) REFERENCES ETUDIANT(NUM_ETUDIANT) ON DELETE CASCADE ON UPDATE CASCADE
);



-- ============================================================================================
--  
--  |   |   |   |   |   |           TABLE USERS
--  
-- ============================================================================================



CREATE TABLE IF NOT EXISTS USERS (
    ID SERIAL,
    USER_NAME VARCHAR(100),
    PASSWORD VARCHAR(100),
    PRIMARY KEY(ID)
);





-- ============================================================================================
--  
--  |   |   |   |   |   |   TRIGGERS
--  
-- ============================================================================================
@DELIMITER %%%;

-- Assumption : student is logged in




------------------------------------ Ajout ----------------------------------------------------

-- ============================================================================================
--  
--  |   |   |   |   |   |    Ajout d'une voiture  
--  
-- ============================================================================================
CREATE TRIGGER ajout_voiture
AFTER INSERT ON VOITURE
FOR EACH ROW
BEGIN
    INSERT IGNORE INTO CONDUCTEUR(NUM_CONDUCTEUR)
    SELECT NEW.NUM_CONDUCTEUR
    WHERE NOT EXISTS (
        SELECT 1
        FROM CONDUCTEUR
        WHERE NUM_CONDUCTEUR = NEW.NUM_CONDUCTEUR
    );
END;
%%%

-- ============================================================================================
--  
--  |   |   |   |   |   |    Ajout d'un trajet 
--  
-- ============================================================================================
----- Ajoute la voiture associé au trajet si elle n'existe pas
CREATE TRIGGER ajout_trajet_matricule
AFTER INSERT ON TRAJET
FOR EACH ROW
BEGIN
    INSERT IGNORE INTO VOITURE(NUM_IMMATRICULE)
    SELECT NEW.NUM_IMMATRICULE
    WHERE NOT EXISTS (
        SELECT 1
        FROM TRAJET
        WHERE NUM_IMMATRICULE = NEW.NUM_IMMATRICULE
    );
END;
%%%

----- Vérifie que la date de départ < date d'arrivée
CREATE TRIGGER ajout_trajet_dates
BEFORE INSERT ON TRAJET
FOR EACH ROW
BEGIN
    IF NEW.DATE_ARRIVEE <= NEW.DATE_DEPART THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error: DATE_ARRIVEE should be after DATE_DEPART';
    END IF;
END; 
%%%

-- ============================================================================================
--  
--  |   |   |   |   |   |    Ajout d'une escale  
--  
-- ============================================================================================
----- Insère une proposition de la part du passager
CREATE TRIGGER ajout_escale
AFTER INSERT ON ESCALE
FOR EACH ROW
BEGIN
    INSERT IGNORE INTO PROPOSITION(NUM_ESCALE, NUM_PASSAGER)
    SELECT NEW.NUM_ESCALE, NUM_PASSAGER ----How to get num passager ?
    WHERE NOT EXISTS (
        SELECT 1, 2
        FROM PROPOSITION
        WHERE NUM_ESCALE = NEW.NUM_ESCALE AND NUM_PASSAGER = NEW.NUM_PASSAGER ------ Num passager ?
    );
END;
%%%


-- ============================================================================================
--  
--  |   |   |   |   |   |    Ajout d'une proposition
--  
-- ============================================================================================
------ No add trigger here, send notification to conducteur ----- wait for reply within defined time limit ----- update Validation_escale accordingly

-- ============================================================================================
--  
--  |   |   |   |   |   |    Ajout d'une évaluation 
--  
-- ============================================================================================
------ No add trigger here






------------------------------------ Suppression -----------------------------------------------
------ "ON DELETE CASCADE"





----------------------------------- Modification ------------------------------------------------
------ "ON UPDATE CASCADE"

-- ============================================================================================
--  
--  |   |   |   |   |   |    Modification des validations 
--  
-- ============================================================================================