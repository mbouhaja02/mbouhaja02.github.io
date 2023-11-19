--CONSULTATION ET STATISTIQUE

-- ============================================================================================
--  
--  |   |   |   |   |   |   REQUETES DE CONSULTATION
--  
-- ============================================================================================


-- ============================================================================================
--  |  INFORMATIONS SUR LES CONDUCTEURS ET PASSAGERS 
-- ============================================================================================

-- Toutes les infos sur Les conducteurs
SELECT * FROM ETUDIANT
WHERE NUM_ETUDIANT IN (SELECT NUM_ETUDIANT FROM ETUDIANT
                        INTERSECT
                        SELECT NUM_CONDUCTEUR FROM CONDUCTEUR);

-- Toutes les infos sur Les passagers
SELECT * FROM ETUDIANT
WHERE NUM_ETUDIANT IN (SELECT NUM_ETUDIANT FROM ETUDIANT
                        INTERSECT
                        SELECT NUM_PASSAGER FROM PASSAGER);


-- ============================================================================================
--  |  La liste des véhicules disponibles pour un jour donné pour une ville donnée
-- ============================================================================================
SELECT VOITURE.*
FROM VOITURE v 
JOIN TRAJET t ON v.NUM_IMMATRICULE = t.NUM_IMMATRICULE
JOIN ESCALE e ON e.NUM_TRAJET = t.NUM_TRAJET
WHERE t.DATE_DEPART /*date*/ AND ville IN (t.ADRESSE_ARRIVEE, e.ADRESSE);

-- ============================================================================================
--  |  Les trajets proposés dans un intervalle de jours donné, la liste des villes renseignées entre le campus et une ville donnée
-- ============================================================================================
SELECT TRAJET.*
FROM  TRAJET t 
WHERE DATE_DEPART BETWEEN date1 AND date2;


-- la liste des villes renseignées entre le campus et une ville donnée ?

-- ============================================================================================
--  |  Les trajets pouvant desservir une ville donnée dans un intervalle de temps
-- ============================================================================================
SELECT TRAJET.*
FROM TRAJET t
JOIN ESCALE e ON t.TRAJET = e.ESCALE
/* Ajouter duree estimée à escale ? */
WHERE ville IN (t.ADRESSE_ARRIVEE, e.ADRESSE) AND e.DUREE_ESTIME = duree;




-- ============================================================================================
--  
--  |   |   |   |   |   |   REQUETES DE STATISTIQUES
--  
-- ============================================================================================


-- ============================================================================================
--  |  Moyenne des passagers sur l’ensemble des trajets effectués
-- ============================================================================================
SELECT AVG(NUM_PASSAGER) AS Moyenne_Passagers
FROM PASSAGER p
JOIN RESERVATION r ON r.NUM_PASSAGER = p.NUM_PASSAGER
-- Inclure les escales ?
WHERE VALIDATION_RESERVATION = 'TRUE';


-- ============================================================================================
--  |  Moyenne des distances parcourues en covoiturage par jour
-- ============================================================================================
SELECT AVG(Distances_Jour) AS Moyenne_Distance_Jour
FROM (SELECT t.DATE_DEPART SUM(TRAJET.DISTANCE_TOTAL) AS Distances_Jour
      FROM TRAJET t
      GROUP BY t.DATE_DEPART);


-- ============================================================================================
--  |  Classement des meilleurs conducteurs d’aprés les avis
-- ============================================================================================
SELECT c.NOM, c.PRENOM, eval.NOTE AS avis
FROM CONDUCTEUR c
JOIN ETUDIANT e ON c.NUM_CONDUCTEUR = e.NUM_ETUDIANT
JOIN EVALUATION eval ON eval.NUM_ETUDIANT_EVALUE = c.NUM_CONDUCTEUR
ORDER BY eval.note;


-- ============================================================================================
--  |  Classement des villes selon le nombre de trajets qui les dessert
-- ============================================================================================
