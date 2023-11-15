INSERT INTO ETUDIANT 
 VALUES (10000, 'SMITH', 'Chandler'), (10001, 'SMITH', 'Joey'), (10002, 'SMITH', 'Rachel'), (10003, 'SMITH', 'Monica'), (10004, 'SMITH', 'Ross'), (10005, 'SNOW', 'Chandler'), (10006, 'SNOW', 'Joey'), (10007, 'SNOW', 'Rachel'), (10008, 'SNOW', 'Monica'), (10009, 'SNOW', 'Ross'), (10010, 'TRIBIANI', 'Chandler'), (10011, 'TRIBIANI', 'Joey'), (10012, 'TRIBIANI', 'Rachel'), (10013, 'TRIBIANI', 'Monica'), (10014, 'TRIBIANI', 'Ross'), (10015, 'GELLER', 'Chandler'), (10016, 'GELLER', 'Joey'), (10017, 'GELLER', 'Rachel'), (10018, 'GELLER', 'Monica'), (10019, 'GELLER', 'Ross'), (10020, 'GREEN', 'Chandler'), (10021, 'GREEN', 'Joey'), (10022, 'GREEN', 'Rachel'), (10023, 'GREEN', 'Monica'), (10024, 'GREEN', 'Ross');

INSERT INTO CONDUCTEUR 
 VALUES (10001), (10007), (10011), (10022), (10023);

INSERT INTO PASSAGER 
 VALUES (10000), (10001), (10002), (10003), (10004), (10007), (10008), (10010), (10011), (10012), (10013), (10015), (10016), (10017), (10018), (10019), (10021), (10022), (10023), (10024);

INSERT INTO VOITURE 
 VALUES ('200200', 10000, 'CITROEIN', 'BLACK', 'MOYEN', '4'), ('200201', 10001, 'FIAT', 'YELLOW', 'MOYEN', '3'), ('200202', 10002, 'FORD', 'BLUE', 'MOYEN', '5'), ('200203', 10003, 'PEUGEOT', 'YELLOW', 'BON', '3');

INSERT INTO TRAJET 
 VALUES (1, '200200', '2023-03-16 10:08:43', '2023-10-16 02:26:33', 'Ville_Depart_1', 'Adresse_Arrivee_1', 95219, 4, 62, 74, 106), (2, '200202', '2023-07-17 20:01:36', '2023-11-14 07:23:28', 'Ville_Depart_2', 'Adresse_Arrivee_2', 20034, 3, 99, 70, 32), (3, '200201', '2023-12-11 18:38:06', '2023-12-15 11:00:32', 'Ville_Depart_3', 'Adresse_Arrivee_3', 74175, 1, 53, 207, 226), (4, '200201', '2023-09-23 12:31:37', '2023-10-30 10:40:07', 'Ville_Depart_4', 'Adresse_Arrivee_4', 27212, 3, 73, 330, 131), (5, '200200', '2023-12-04 05:22:36', '2023-12-29 03:55:02', 'Ville_Depart_5', 'Adresse_Arrivee_5', 97670, 1, 97, 131, 121);

INSERT INTO ESCALE 
 VALUES (1, 3, 'Adresse_Escale_1', 22410, '2023-09-29 15:12:59', True), (2, 2, 'Adresse_Escale_2', 32982, '2023-03-09 15:41:40', False), (3, 1, 'Adresse_Escale_3', 16935, '2023-12-11 21:19:11', True), (4, 5, 'Adresse_Escale_4', 52252, '2023-09-06 16:31:08', False), (5, 5, 'Adresse_Escale_5', 31708, '2023-07-19 14:12:09', True);

INSERT INTO PROPOSITION 
 VALUES (3, 10014), (3, 10024), (2, 10021), (2, 10003), (4, 10024);

INSERT INTO RESERVATION 
 VALUES (3, 10022, 'TRUE'), (2, 10003, 'TRUE'), (1, 10005, 'FALSE'), (5, 10017, 'FALSE'), (2, 10019, 'TRUE');

INSERT INTO EVALUATION 
 VALUES (10021, 5, 10001, 1), (10002, 3, 10021, 2), (10004, 1, 10002, 5), (10016, 4, 10010, 2), (10018, 4, 10017, 3);

