-- ============================================================================================
--      |   |   |   |   Nom de la base :    COVOITURAGE_COMPUS
-- ============================================================================================
DROP TABLE IF EXISTS CONDUCTEUR;
DROP TABLE IF EXISTS ETUDIANT;
DROP TABLE IF EXISTS PASSAGER;
DROP TABLE IF EXISTS VOITURE;
DROP TABLE IF EXISTS ESCALE;
DROP TABLE IF EXISTS PROPOSITION;
DROP TABLE IF EXISTS RESERVATION;
DROP TABLE IF EXISTS EVALUATION;
DROP TABLE IF EXISTS USERS;
DROP TABLE IF EXISTS TRAJET;




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

CREATE TABLE ETUDIANT(
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

CREATE TABLE CONDUCTEUR(
    NUM_CONDUCTEUR INT NOT NULL,
    PRIMARY KEY (NUM_CONDUCTEUR),
    FOREIGN KEY (NUM_CONDUCTEUR) REFERENCES ETUDIANT(NUM_ETUDIANT) ON DELETE CASCADE
);


-- ============================================================================================
--  
--  |   |   |   |   |   |           PASSAGER TABLE
--  
-- ============================================================================================

CREATE TABLE PASSAGER(
    NUM_PASSAGER INT NOT NULL,
    PRIMARY KEY (NUM_PASSAGER),
    FOREIGN KEY (NUM_PASSAGER) REFERENCES ETUDIANT(NUM_ETUDIANT) ON DELETE CASCADE
);


-- ============================================================================================
--  
--  |   |   |   |   |   |           TABLE VOITURE
--  
-- ============================================================================================

CREATE TABLE VOITURE(
    NUM_IMMATRICULE INT,
    NUM_CONDUCTEUR INT NOT NULL,
    TYPE_VOITURE VARCHAR(100) NOT NULL,
    COULEUR VARCHAR(100) NOT NULL,
    ETAT VARCHAR(100) NOT NULL,
    NBR_PASSAGER INT,
    PRIMARY KEY (NUM_IMMATRICULE),
    FOREIGN KEY (NUM_CONDUCTEUR) REFERENCES CONDUCTEUR(NUM_CONDUCTEUR) ON DELETE CASCADE
);

-- ============================================================================================
--  
--  |   |   |   |   |   |           TABLE TRAJET
--  
-- ============================================================================================


CREATE TABLE TRAJET(
    NUM_TRAJET SERIAL NOT NULL,
    NUM_IMMATRICULE INT NOT NULL,
    DATE_DEPART DATETIME NOT NULL,
    DATE_ARRIVEE DATETIME NOT NULL,
    VILLE_DEPART VARCHAR(100) NOT NULL,
    ADRESSE_ARRIVEE VARCHAR(100) NOT NULL,
    CODE_POSTAL INT NOT NULL,
    NBR_ESCALES INT NOT NULL,
    PRIX_KILOMETRAGE INT NOT NULL,
    DISTANCE_TOTAL INT NOT NULL,
    DUREE_ESTIME INT NOT NULL,

    PRIMARY KEY (NUM_TRAJET),
    FOREIGN KEY (NUM_IMMATRICULE) REFERENCES VOITURE(NUM_IMMATRICULE) ON DELETE CASCADE
);

-- ============================================================================================
--  
--  |   |   |   |   |   |           TABLE ESCALE
--  
-- ============================================================================================


CREATE TABLE ESCALE(
    NUM_ESCALE SERIAL NOT NULL,
    NUM_TRAJET INT NOT NULL,
    ADRESSE VARCHAR(100) NOT NULL,
    CODE_POSTAL INT NOT NULL,
    HEURE_ARRIVEE DATETIME NOT NULL,
    VALIDATION_ESCALE VARCHAR(100) NOT NULL,
    PRIMARY KEY (NUM_TRAJET),
    FOREIGN KEY (NUM_TRAJET) REFERENCES TRAJET(NUM_TRAJET) ON DELETE CASCADE
);

-- ============================================================================================
--  
--  |   |   |   |   |   |           TABLE PROPOSITION
--  
-- ============================================================================================


CREATE TABLE PROPOSITION(
    NUM_ESCALE INT NOT NULL,
    NUM_PASSAGER INT NOT NULL,
    PRIMARY KEY (NUM_ESCALE, NUM_PASSAGER)
    FOREIGN KEY (NUM_ESCALE) REFERENCES ESCALE(NUM_ESCALE) ON DELETE CASCADE,
    FOREIGN KEY (NUM_PASSAGER) REFERENCES PASSAGER(NUM_PASSAGER) ON DELETE CASCADE
);

-- ============================================================================================
--  
--  |   |   |   |   |   |           TABLE RESERVATION
--  
-- ============================================================================================


CREATE TABLE RESERVATION(
    NUM_TRAJET INT NOT NULL,
    NUM_ETUDIANT INT NOT NULL,
    VALIDATION_RESERVATION VARCHAR(100) NOT NULL,
    PRIMARY KEY (NUM_TRAJET, NUM_ETUDIANT),
    FOREIGN KEY (NUM_TRAJET) REFERENCES TRAJET(NUM_TRAJET) ON DELETE CASCADE,
    FOREIGN KEY (NUM_ETUDIANT) REFERENCES ETUDIANT(NUM_ETUDIANT) ON DELETE CASCADE
);

-- ============================================================================================
--  
--  |   |   |   |   |   |           TABLE EVALUATION
--  
-- ============================================================================================


CREATE TABLE EVALUATION(
    NUM_ETUDIANT_EVALUE INT NOT NULL,
    NUM_TRAJET INT NOT NULL,
    NUM_ETUDIANT_EVALUATEUR INT NOT NULL,
    NOTE INT NOT NULL,
    CHECK (NOTE >=1 AND NOTE <=5),
    PRIMARY KEY (NUM_ETUDIANT_EVALUE, NUM_ETUDIANT_EVALUATEUR, NUM_TRAJET),
    FOREIGN KEY (NUM_TRAJET) REFERENCES TRAJET(NUM_TRAJET) ON DELETE CASCADE,
    FOREIGN KEY (NUM_ETUDIANT_EVALUATEUR) REFERENCES ETUDIANT(NUM_ETUDIANT) ON DELETE CASCADE,
    FOREIGN KEY (NUM_ETUDIANT_EVALUE) REFERENCES ETUDIANT(NUM_ETUDIANT) ON DELETE CASCADE
);



-- ============================================================================================
--  
--  |   |   |   |   |   |           TABLE USERS
--  
-- ============================================================================================



CREATE TABLE USERS (
    ID INT AUTO_INCREMENT,
    USER_NAME VARCHAR(100),
    PASSWORD VARCHAR(100),
    PRIMARY KEY(ID)
);
