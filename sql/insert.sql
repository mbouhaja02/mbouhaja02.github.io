INSERT INTO ETUDIANT 
 VALUES (10000, 'SMITH', 'Chandler'), (10001, 'SMITH', 'Joey'), (10002, 'SMITH', 'Rachel'), (10003, 'SMITH', 'Monica'), (10004, 'SMITH', 'Ross'), (10005, 'SNOW', 'Chandler'), (10006, 'SNOW', 'Joey'), (10007, 'SNOW', 'Rachel'), (10008, 'SNOW', 'Monica'), (10009, 'SNOW', 'Ross'), (10010, 'TRIBIANI', 'Chandler'), (10011, 'TRIBIANI', 'Joey'), (10012, 'TRIBIANI', 'Rachel'), (10013, 'TRIBIANI', 'Monica'), (10014, 'TRIBIANI', 'Ross'), (10015, 'GELLER', 'Chandler'), (10016, 'GELLER', 'Joey'), (10017, 'GELLER', 'Rachel'), (10018, 'GELLER', 'Monica'), (10019, 'GELLER', 'Ross'), (10020, 'GREEN', 'Chandler'), (10021, 'GREEN', 'Joey'), (10022, 'GREEN', 'Rachel'), (10023, 'GREEN', 'Monica'), (10024, 'GREEN', 'Ross');

INSERT INTO CONDUCTEUR 
 VALUES (10013), (10016), (10005), (10021), (10023);

INSERT INTO PASSAGER 
 VALUES (10000), (10001), (10002), (10003), (10004), (10006), (10007), (10008), (10009), (10010), (10011), (10012), (10014), (10015), (10017), (10018), (10019), (10020), (10022), (10024);

INSERT INTO VOITURE 
 VALUES ('200200', 10013, 'DACIA', 'WHITE', 'MAUVAIS', '5'), ('200201', 10016, 'DACIA', 'WHITE', 'BON', '5'), ('200202', 10005, 'ALPHA-ROMEO', 'YELLOW', 'BON', '4'), ('200203', 10021, 'RENAULT', 'BLUE', 'MOYEN', '3');

INSERT INTO TRAJET 
 VALUES (1, '200203', '2023-03-10 06:06:29', '2023-04-08 20:06:28', 'Ville_Depart_1', 'Adresse_Arrivee_1', 69225, 2, 100, 193, 347), (2, '200202', '2023-04-11 21:32:33', '2023-09-01 09:59:24', 'Ville_Depart_2', 'Adresse_Arrivee_2', 35795, 2, 39, 473, 60), (3, '200201', '2023-03-24 23:57:54', '2023-10-18 09:49:49', 'Ville_Depart_3', 'Adresse_Arrivee_3', 84494, 3, 43, 57, 243), (4, '200203', '2023-09-01 00:30:12', '2023-11-07 22:05:21', 'Ville_Depart_4', 'Adresse_Arrivee_4', 84951, 0, 85, 203, 334), (5, '200200', '2023-12-21 21:09:19', '2023-12-26 03:37:10', 'Ville_Depart_5', 'Adresse_Arrivee_5', 59872, 5, 28, 497, 268);

INSERT INTO ESCALE 
 VALUES (1, 1, 'Adresse_Escale_1', 77970, '2023-12-18 01:58:53', False), (2, 4, 'Adresse_Escale_2', 90071, '2023-11-19 05:05:41', False), (3, 3, 'Adresse_Escale_3', 54936, '2023-07-23 22:27:31', True), (4, 1, 'Adresse_Escale_4', 28035, '2023-11-26 06:37:06', False), (5, 3, 'Adresse_Escale_5', 73815, '2023-12-18 11:02:32', False);

INSERT INTO PROPOSITION 
 VALUES (1, 10002), (4, 10021), (3, 10004), (5, 10009), (2, 10006);

INSERT INTO RESERVATION 
 VALUES (5, 10012, 'FALSE'), (3, 10017, 'FALSE'), (4, 10015, 'FALSE'), (4, 10022, 'FALSE'), (3, 10006, 'TRUE');

INSERT INTO EVALUATION 
 VALUES (10020, 1, 10019, 5), (10016, 4, 10020, 1), (10009, 2, 10018, 4), (10011, 3, 10023, 4), (10012, 5, 10016, 5);

