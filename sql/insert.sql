INSERT INTO ETUDIANT 
 VALUES (10000, 'SMITH', 'Chandler'), (10001, 'SMITH', 'Joey'), (10002, 'SMITH', 'Rachel'), (10003, 'SMITH', 'Monica'), (10004, 'SMITH', 'Ross'), (10005, 'SNOW', 'Chandler'), (10006, 'SNOW', 'Joey'), (10007, 'SNOW', 'Rachel'), (10008, 'SNOW', 'Monica'), (10009, 'SNOW', 'Ross'), (10010, 'TRIBIANI', 'Chandler'), (10011, 'TRIBIANI', 'Joey'), (10012, 'TRIBIANI', 'Rachel'), (10013, 'TRIBIANI', 'Monica'), (10014, 'TRIBIANI', 'Ross'), (10015, 'GELLER', 'Chandler'), (10016, 'GELLER', 'Joey'), (10017, 'GELLER', 'Rachel'), (10018, 'GELLER', 'Monica'), (10019, 'GELLER', 'Ross'), (10020, 'GREEN', 'Chandler'), (10021, 'GREEN', 'Joey'), (10022, 'GREEN', 'Rachel'), (10023, 'GREEN', 'Monica'), (10024, 'GREEN', 'Ross');

INSERT INTO CONDUCTEUR 
 VALUES (10012), (10019), (10023), (10008), (10018);

INSERT INTO PASSAGER 
 VALUES (10000), (10001), (10002), (10003), (10004), (10005), (10007), (10008), (10009), (10010), (10011), (10012), (10015), (10016), (10017), (10018), (10019), (10022), (10023), (10024);

INSERT INTO VOITURE 
 VALUES ('200200', 10000, 'CITROEIN', 'YELLOW', 'BON', '4'), ('200201', 10017, 'FORD', 'YELLOW', 'MOYEN', '4'), ('200202', 10014, 'PEUGEOT', 'WHITE', 'MAUVAIS', '5'), ('200203', 10012, 'PEUGEOT', 'BLUE', 'BON', '3');

INSERT INTO TRAJET 
 VALUES (1, '200201', '2023-11-15 05:03:33', '2023-11-21 01:17:16', 'Ville_Depart_1', 'Adresse_Arrivee_1', 42176, 5, 29, 434, 177), (2, '200201', '2023-04-23 07:42:59', '2023-09-20 10:11:54', 'Ville_Depart_2', 'Adresse_Arrivee_2', 87100, 2, 79, 127, 71), (3, '200200', '2023-11-04 19:28:16', '2023-11-20 06:26:59', 'Ville_Depart_3', 'Adresse_Arrivee_3', 28108, 0, 13, 395, 70), (4, '200202', '2023-05-05 17:10:58', '2023-05-06 03:00:43', 'Ville_Depart_4', 'Adresse_Arrivee_4', 72309, 4, 69, 476, 144), (5, '200202', '2023-04-01 05:30:49', '2023-09-13 13:32:55', 'Ville_Depart_5', 'Adresse_Arrivee_5', 30746, 1, 88, 454, 236);

INSERT INTO ESCALE 
 VALUES (1, 4, 'Adresse_Escale_1', 10538, '2023-01-13 11:30:34', True), (2, 5, 'Adresse_Escale_2', 40936, '2023-04-16 07:37:42', False), (3, 4, 'Adresse_Escale_3', 82137, '2023-01-15 19:58:57', True), (4, 1, 'Adresse_Escale_4', 34160, '2023-09-12 05:59:27', False), (5, 1, 'Adresse_Escale_5', 45745, '2023-02-23 13:46:23', False);

INSERT INTO PROPOSITION 
 VALUES (2, 10017), (2, 10021), (2, 10010), (1, 10000), (1, 10006);

INSERT INTO RESERVATION 
 VALUES (2, 10000, 'FALSE'), (1, 10003, 'TRUE'), (3, 10011, 'FALSE'), (3, 10021, 'TRUE'), (2, 10013, 'FALSE');

INSERT INTO EVALUATION 
 VALUES (10007, 2, 10019, 1), (10022, 5, 10018, 5), (10021, 2, 10008, 1), (10015, 4, 10015, 1), (10019, 2, 10008, 4);

