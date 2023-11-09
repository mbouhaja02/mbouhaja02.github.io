INSERT INTO ETUDIANT 
 VALUES (10000, 'SMITH', 'Chandler'), (10001, 'SMITH', 'Joey'), (10002, 'SMITH', 'Rachel'), (10003, 'SMITH', 'Monica'), (10004, 'SMITH', 'Ross'), (10005, 'SNOW', 'Chandler'), (10006, 'SNOW', 'Joey'), (10007, 'SNOW', 'Rachel'), (10008, 'SNOW', 'Monica'), (10009, 'SNOW', 'Ross'), (10010, 'TRIBIANI', 'Chandler'), (10011, 'TRIBIANI', 'Joey'), (10012, 'TRIBIANI', 'Rachel'), (10013, 'TRIBIANI', 'Monica'), (10014, 'TRIBIANI', 'Ross'), (10015, 'GELLER', 'Chandler'), (10016, 'GELLER', 'Joey'), (10017, 'GELLER', 'Rachel'), (10018, 'GELLER', 'Monica'), (10019, 'GELLER', 'Ross'), (10020, 'GREEN', 'Chandler'), (10021, 'GREEN', 'Joey'), (10022, 'GREEN', 'Rachel'), (10023, 'GREEN', 'Monica'), (10024, 'GREEN', 'Ross');

INSERT INTO VOITURE 
 VALUES ('200200', 10000, 'FIAT', 'YELLOW', 'MOYEN', '3'), ('200201', 10001, 'MERCEDES', 'WHITE', 'MOYEN', '4'), ('200202', 10002, 'RENAULT', 'BLUE', 'MOYEN', '3'), ('200203', 10003, 'FORD', 'WHITE', 'MOYEN', '4');

INSERT INTO RESERVATION 
 VALUES (4, 10012, 'FALSE'), (4, 10015, 'FALSE'), (4, 10010, 'TRUE'), (2, 10003, 'TRUE'), (1, 10014, 'TRUE');

INSERT INTO EVALUATION 
 VALUES (10003, 3, 10014, 4), (10013, 2, 10012, 4), (10013, 3, 10002, 2), (10018, 4, 10019, 1), (10020, 4, 10008, 1);

INSERT INTO TRAJET 
 VALUES (1, '200202', '2023-05-19 02:49:18', '2023-12-13 10:35:56', 'Ville_Depart_1', 'Adresse_Arrivee_1', 46941, 5, 83, 220, 68), (2, '200201', '2023-04-14 11:42:30', '2023-12-26 12:08:48', 'Ville_Depart_2', 'Adresse_Arrivee_2', 89821, 2, 80, 163, 349), (3, '200203', '2023-02-11 06:15:04', '2023-05-08 19:37:19', 'Ville_Depart_3', 'Adresse_Arrivee_3', 23938, 2, 90, 451, 332), (4, '200202', '2023-05-16 11:03:05', '2023-06-12 16:48:21', 'Ville_Depart_4', 'Adresse_Arrivee_4', 79241, 3, 41, 473, 271), (5, '200201', '2023-06-12 21:33:13', '2023-11-18 10:01:24', 'Ville_Depart_5', 'Adresse_Arrivee_5', 49033, 1, 34, 402, 64);

INSERT INTO ESCALE 
 VALUES (1, 2, 'Adresse_Escale_1', 78233, '2023-05-12 12:05:40', True), (2, 2, 'Adresse_Escale_2', 57778, '2023-07-10 23:30:00', True), (3, 4, 'Adresse_Escale_3', 38909, '2023-05-14 18:49:04', False), (4, 1, 'Adresse_Escale_4', 44089, '2023-05-24 23:38:05', False), (5, 5, 'Adresse_Escale_5', 61637, '2023-05-02 14:25:05', True);

INSERT INTO PROPOSITION 
 VALUES (3, 10015), (1, 10021), (3, 10007), (5, 10014), (2, 10016);

