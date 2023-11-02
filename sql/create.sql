-- ============================================================================================
--      |   |   |   |   Nom de la base :    COVOITURAGE_COMPUS
-- ============================================================================================

create DATABASE COVOITURAGE_COMPUS;

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

CREATE TABLE COVOITURAGE_COMPUS.ETUDIANT(
    NUM_ETUDIANT INT NOT NULL,
    PRENOM VARCHAR(100) NOT NULL,
    NOM VARCHAR(100) NOT NULL,
    PRIMARY KEY (NUM_ETUDIANT)
);

-- ============================================================================================
--  
--  |   |   |   |   |   |           TABLE VOITURE
--  
-- ============================================================================================

CREATE TABLE COVOITURAGE_COMPUS.VOITURE(
    NUM_IMMATRICULE INT,
    NUM_ETUDIANT INT NOT NULL,
    TYPE VARCHAR(100) NOT NULL,
    COULEUR VARCHAR(100) NOT NULL,
    ETAT VARCHAR(100) NOT NULL,
    NBR_PASSAGER INT,
    PRIMARY KEY (NUM_IMMATRICULE),
    FOREIGN KEY (NUM_ETUDIANT) REFERENCES ETUDIANT(NUM_ETUDIANT) ON DELETE CASCADE
);

-- ============================================================================================
--  
--  |   |   |   |   |   |           TABLE TRAJET
--  
-- ============================================================================================


CREATE TABLE COVOITURAGE_COMPUS.TRAJET(
    NUM_TRAJET INT NOT NULL,
    NUM_IMMATRICULE INT NOT NULL,
    DATE_DEPART DATETIME NOT NULL,
    DATE_ARRIVEE DATETIME NOT NULL,
    VILLE_DEPART VARCHAR(100) NOT NULL,
    VILLE_ARRIVEE VARCHAR(100) NOT NULL,
    NBR_ESCALES INT NOT NULL
    PRIMARY KEY (NUM_TRAJET),
    FOREIGN KEY (NUM_IMMATRICULE) REFERENCES VOITURE(NUM_IMMATRICULE) ON DELETE CASCADE
);

-- ============================================================================================
--  
--  |   |   |   |   |   |           TABLE ESCALE
--  
-- ============================================================================================


CREATE TABLE COVOITURAGE_COMPUS.ESCALE(
    NUM_ESCALE INT NOT NULL,
    NUM_TRAJET INT NOT NULL,
    ADRESSE VARCHAR(100) NOT NULL,
    CODE_POSTALE INT NOT NULL,
    HEURE_ARRIVEE DATETIME NOT NULL,
    VALIDATION_ESCALE VARCHAR(100) NOT NULL,
    PRIMARY KEY (NUM_TRAJET),
    FOREIGN KEY (NUM_TRAJET) REFERENCES TRAJET(NUM_TRAJET) ON DELETE CASCADE
);


-- ============================================================================================
--  
--  |   |   |   |   |   |           TABLE USERS
--  
-- ============================================================================================



CREATE TABLE COVOITURAGE_COMPUS.USERS (
    ID INT AUTO_INCREMENT,
    USER_NAME VARCHAR(100),
    PASSWORD VARCHAR(100),
    PRIMARY KEY(ID)
);
