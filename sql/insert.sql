INSERT INTO ETUDIANT 
 VALUES (10000, 'SMITH', 'Chandler'), (10001, 'SMITH', 'Joey'), (10002, 'SMITH', 'Rachel'), (10003, 'SMITH', 'Monica'), (10004, 'SMITH', 'Ross'), (10005, 'SNOW', 'Chandler'), (10006, 'SNOW', 'Joey'), (10007, 'SNOW', 'Rachel'), (10008, 'SNOW', 'Monica'), (10009, 'SNOW', 'Ross'), (10010, 'TRIBIANI', 'Chandler'), (10011, 'TRIBIANI', 'Joey'), (10012, 'TRIBIANI', 'Rachel'), (10013, 'TRIBIANI', 'Monica'), (10014, 'TRIBIANI', 'Ross'), (10015, 'GELLER', 'Chandler'), (10016, 'GELLER', 'Joey'), (10017, 'GELLER', 'Rachel'), (10018, 'GELLER', 'Monica'), (10019, 'GELLER', 'Ross'), (10020, 'GREEN', 'Chandler'), (10021, 'GREEN', 'Joey'), (10022, 'GREEN', 'Rachel'), (10023, 'GREEN', 'Monica'), (10024, 'GREEN', 'Ross');

INSERT INTO CONDUCTEUR 
 VALUES (10022), (10003), (10004), (10008), (10001);

INSERT INTO PASSAGER 
 VALUES (10000), (10001), (10002), (10003), (10005), (10007), (10008), (10009), (10010), (10011), (10012), (10013), (10015), (10017), (10019), (10020), (10021), (10022), (10023), (10024);

INSERT INTO VOITURE 
 VALUES ('200200', 10001, 'PEUGEOT', 'YELLOW', 'BON', '3'), ('200201', 10021, 'DACIA', 'BLUE', 'MAUVAIS', '3'), ('200202', 10024, 'MERCEDES', 'WHITE', 'MOYEN', '3'), ('200203', 10002, 'FORD', 'BLACK', 'MAUVAIS', '3');

INSERT INTO TRAJET 
 VALUES (1, '200201', '2023-08-04 13:25:01', '2023-12-11 06:44:29', 'Ville_Depart_1', 'Adresse_Arrivee_1', 11660, 4, 94, 158, 66), (2, '200202', '2023-09-14 22:58:55', '2023-09-18 14:02:53', 'Ville_Depart_2', 'Adresse_Arrivee_2', 32573, 1, 60, 271, 125), (3, '200202', '2023-12-01 11:43:44', '2023-12-17 15:21:46', 'Ville_Depart_3', 'Adresse_Arrivee_3', 32281, 2, 79, 52, 44), (4, '200203', '2023-02-27 18:03:57', '2023-05-27 15:12:51', 'Ville_Depart_4', 'Adresse_Arrivee_4', 82564, 0, 32, 80, 150), (5, '200203', '2023-12-12 02:26:44', '2023-12-28 03:30:23', 'Ville_Depart_5', 'Adresse_Arrivee_5', 68431, 4, 58, 259, 203);

INSERT INTO ESCALE 
 VALUES (1, 1, 'Adresse_Escale_1', 93851, '2023-04-06 13:44:50', True), (2, 2, 'Adresse_Escale_2', 12928, '2023-11-03 01:33:03', True), (3, 2, 'Adresse_Escale_3', 50339, '2023-11-26 23:18:04', True), (4, 5, 'Adresse_Escale_4', 18080, '2023-05-01 18:08:43', False), (5, 4, 'Adresse_Escale_5', 32444, '2023-08-04 22:05:21', False);

INSERT INTO PROPOSITION 
 VALUES (2, 10023), (5, 10010), (2, 10023), (2, 10012), (1, 10008);

INSERT INTO RESERVATION 
 VALUES (5, 10021, 'TRUE'), (4, 10020, 'TRUE'), (2, 10001, 'TRUE'), (2, 10013, 'TRUE'), (1, 10006, 'TRUE');

INSERT INTO EVALUATION 
 VALUES (10003, 3, 10018, 1), (10008, 4, 10011, 2), (10008, 2, 10013, 5), (10007, 1, 10004, 5), (10023, 5, 10005, 1);

