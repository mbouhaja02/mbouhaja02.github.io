INSERT INTO ETUDIANT 
 VALUES (10000, 'SMITH', 'Chandler'), (10001, 'SMITH', 'Joey'), (10002, 'SMITH', 'Rachel'), (10003, 'SMITH', 'Monica'), (10004, 'SMITH', 'Ross'), (10005, 'SNOW', 'Chandler'), (10006, 'SNOW', 'Joey'), (10007, 'SNOW', 'Rachel'), (10008, 'SNOW', 'Monica'), (10009, 'SNOW', 'Ross'), (10010, 'TRIBIANI', 'Chandler'), (10011, 'TRIBIANI', 'Joey'), (10012, 'TRIBIANI', 'Rachel'), (10013, 'TRIBIANI', 'Monica'), (10014, 'TRIBIANI', 'Ross'), (10015, 'GELLER', 'Chandler'), (10016, 'GELLER', 'Joey'), (10017, 'GELLER', 'Rachel'), (10018, 'GELLER', 'Monica'), (10019, 'GELLER', 'Ross'), (10020, 'GREEN', 'Chandler'), (10021, 'GREEN', 'Joey'), (10022, 'GREEN', 'Rachel'), (10023, 'GREEN', 'Monica'), (10024, 'GREEN', 'Ross');

INSERT INTO CONDUCTEUR 
 VALUES (10010), (10018), (10015), (10000), (10001);

INSERT INTO PASSAGER 
 VALUES (10002), (10003), (10004), (10005), (10006), (10007), (10008), (10009), (10011), (10012), (10013), (10014), (10016), (10017), (10019), (10020), (10021), (10022), (10023), (10024);

INSERT INTO VOITURE 
 VALUES ('200200', 10010, 'FORD', 'BLACK', 'MAUVAIS', '5'), ('200201', 10018, 'ALPHA-ROMEO', 'WHITE', 'MAUVAIS', '4'), ('200202', 10015, 'BMW', 'YELLOW', 'MOYEN', '3'), ('200203', 10000, 'BMW', 'YELLOW', 'MAUVAIS', '4');

INSERT INTO TRAJET 
 VALUES (1, '200202', '2023-06-20 23:33:43', '2023-11-18 13:28:35', 'Ville_Depart_1', 'Adresse_Arrivee_1', 26640, 2, 87, 134, 58), (2, '200200', '2023-08-04 17:48:32', '2023-09-24 14:52:55', 'Ville_Depart_2', 'Adresse_Arrivee_2', 47451, 2, 32, 89, 198), (3, '200201', '2023-05-07 02:18:58', '2023-06-23 18:00:31', 'Ville_Depart_3', 'Adresse_Arrivee_3', 70316, 4, 58, 178, 188), (4, '200203', '2023-02-09 18:12:57', '2023-10-05 18:05:53', 'Ville_Depart_4', 'Adresse_Arrivee_4', 96120, 0, 48, 275, 313), (5, '200200', '2023-11-07 14:16:05', '2023-11-11 02:31:12', 'Ville_Depart_5', 'Adresse_Arrivee_5', 74916, 0, 33, 153, 74);

INSERT INTO ESCALE 
 VALUES (1, 3, 'Adresse_Escale_1', 19534, '2023-11-07 04:04:43', False), (2, 3, 'Adresse_Escale_2', 72919, '2023-07-28 01:35:08', False), (3, 4, 'Adresse_Escale_3', 11016, '2023-05-07 09:55:43', True), (4, 5, 'Adresse_Escale_4', 27687, '2023-04-30 14:32:12', True), (5, 4, 'Adresse_Escale_5', 52132, '2023-10-27 13:13:57', False);

INSERT INTO PROPOSITION 
 VALUES (4, 10007), (4, 10020), (2, 10024), (5, 10019), (1, 10013);

INSERT INTO RESERVATION 
 VALUES (2, 10007, 'FALSE'), (4, 10011, 'TRUE'), (4, 10011, 'TRUE'), (5, 10021, 'FALSE'), (3, 10021, 'TRUE');

INSERT INTO EVALUATION 
 VALUES (10000, 4, 10020, 1), (10001, 5, 10005, 3), (10014, 4, 10019, 2), (10023, 1, 10009, 4), (10008, 5, 10001, 1);

