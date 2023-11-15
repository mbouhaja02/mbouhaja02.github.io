INSERT INTO ETUDIANT 
 VALUES (10000, 'SMITH', 'Chandler'), (10001, 'SMITH', 'Joey'), (10002, 'SMITH', 'Rachel'), (10003, 'SMITH', 'Monica'), (10004, 'SMITH', 'Ross'), (10005, 'SNOW', 'Chandler'), (10006, 'SNOW', 'Joey'), (10007, 'SNOW', 'Rachel'), (10008, 'SNOW', 'Monica'), (10009, 'SNOW', 'Ross'), (10010, 'TRIBIANI', 'Chandler'), (10011, 'TRIBIANI', 'Joey'), (10012, 'TRIBIANI', 'Rachel'), (10013, 'TRIBIANI', 'Monica'), (10014, 'TRIBIANI', 'Ross'), (10015, 'GELLER', 'Chandler'), (10016, 'GELLER', 'Joey'), (10017, 'GELLER', 'Rachel'), (10018, 'GELLER', 'Monica'), (10019, 'GELLER', 'Ross'), (10020, 'GREEN', 'Chandler'), (10021, 'GREEN', 'Joey'), (10022, 'GREEN', 'Rachel'), (10023, 'GREEN', 'Monica'), (10024, 'GREEN', 'Ross');

INSERT INTO CONDUCTEUR 
 VALUES 10023, 10019, 10004, 10007, 10012;

INSERT INTO PASSAGER 
 VALUES 10000, 10002, 10003, 10004, 10005, 10006, 10007, 10008, 10009, 10010, 10011, 10012, 10014, 10015, 10017, 10019, 10020, 10021, 10022, 10024;

INSERT INTO VOITURE 
 VALUES ('200200', 10000, 'PEUGEOT', 'BLACK', 'BON', '4'), ('200201', 10001, 'PEUGEOT', 'YELLOW', 'MAUVAIS', '4'), ('200202', 10002, 'DACIA', 'WHITE', 'BON', '4'), ('200203', 10003, 'PEUGEOT', 'BLUE', 'BON', '4');

INSERT INTO TRAJET 
 VALUES (1, '200203', '2023-04-10 23:34:26', '2023-12-27 18:47:54', 'Ville_Depart_1', 'Adresse_Arrivee_1', 39136, 1, 82, 386, 359), (2, '200200', '2023-01-18 01:39:11', '2023-12-21 11:34:06', 'Ville_Depart_2', 'Adresse_Arrivee_2', 38311, 2, 28, 250, 349), (3, '200202', '2023-11-11 01:43:55', '2023-12-24 13:48:31', 'Ville_Depart_3', 'Adresse_Arrivee_3', 74795, 1, 13, 436, 229), (4, '200202', '2023-08-13 01:00:41', '2023-09-10 17:51:28', 'Ville_Depart_4', 'Adresse_Arrivee_4', 52322, 1, 61, 121, 159), (5, '200200', '2023-05-26 23:28:51', '2023-07-23 18:08:16', 'Ville_Depart_5', 'Adresse_Arrivee_5', 27907, 1, 11, 113, 297);

INSERT INTO ESCALE 
 VALUES (1, 4, 'Adresse_Escale_1', 97225, '2023-11-15 23:38:55', True), (2, 3, 'Adresse_Escale_2', 12697, '2023-11-29 23:12:38', False), (3, 5, 'Adresse_Escale_3', 78684, '2023-10-23 17:13:36', False), (4, 5, 'Adresse_Escale_4', 70463, '2023-01-17 18:55:25', False), (5, 4, 'Adresse_Escale_5', 48856, '2023-04-22 20:49:23', False);

INSERT INTO PROPOSITION 
 VALUES (2, 10013), (4, 10018), (5, 10006), (2, 10014), (1, 10024);

INSERT INTO RESERVATION 
 VALUES (2, 10022, 'TRUE'), (2, 10024, 'FALSE'), (4, 10013, 'TRUE'), (4, 10003, 'TRUE'), (3, 10010, 'FALSE');

INSERT INTO EVALUATION 
 VALUES (10014, 1, 10003, 2), (10001, 2, 10021, 4), (10003, 2, 10021, 3), (10007, 4, 10007, 2), (10022, 5, 10010, 5);

