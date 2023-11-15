INSERT INTO ETUDIANT 
 VALUES (10000, 'SMITH', 'Chandler'), (10001, 'SMITH', 'Joey'), (10002, 'SMITH', 'Rachel'), (10003, 'SMITH', 'Monica'), (10004, 'SMITH', 'Ross'), (10005, 'SNOW', 'Chandler'), (10006, 'SNOW', 'Joey'), (10007, 'SNOW', 'Rachel'), (10008, 'SNOW', 'Monica'), (10009, 'SNOW', 'Ross'), (10010, 'TRIBIANI', 'Chandler'), (10011, 'TRIBIANI', 'Joey'), (10012, 'TRIBIANI', 'Rachel'), (10013, 'TRIBIANI', 'Monica'), (10014, 'TRIBIANI', 'Ross'), (10015, 'GELLER', 'Chandler'), (10016, 'GELLER', 'Joey'), (10017, 'GELLER', 'Rachel'), (10018, 'GELLER', 'Monica'), (10019, 'GELLER', 'Ross'), (10020, 'GREEN', 'Chandler'), (10021, 'GREEN', 'Joey'), (10022, 'GREEN', 'Rachel'), (10023, 'GREEN', 'Monica'), (10024, 'GREEN', 'Ross');

INSERT INTO CONDUCTEUR 
 VALUES (10010), (10012), (10006), (10004), (10022);

INSERT INTO PASSAGER 
 VALUES (10000), (10001), (10002), (10003), (10005), (10007), (10008), (10009), (10011), (10013), (10014), (10015), (10016), (10017), (10018), (10019), (10020), (10021), (10023), (10024);

INSERT INTO VOITURE 
 VALUES ('200200', 10010, 'MERCEDES', 'BLACK', 'MAUVAIS', '4'), ('200201', 10012, 'PEUGEOT', 'BLUE', 'BON', '5'), ('200202', 10006, 'CITROEIN', 'YELLOW', 'MAUVAIS', '4'), ('200203', 10004, 'PEUGEOT', 'WHITE', 'MAUVAIS', '4');

INSERT INTO TRAJET 
 VALUES (1, '200200', '2023-04-21 10:57:46', '2023-08-20 15:07:01', 'Ville_Depart_1', 'Adresse_Arrivee_1', 76041, 2, 69, 157, 347), (2, '200201', '2023-07-28 05:38:30', '2023-10-19 22:20:22', 'Ville_Depart_2', 'Adresse_Arrivee_2', 37860, 1, 60, 184, 189), (3, '200202', '2023-06-26 22:19:48', '2023-11-10 15:06:44', 'Ville_Depart_3', 'Adresse_Arrivee_3', 56602, 0, 95, 313, 125), (4, '200200', '2023-05-02 21:47:10', '2023-09-19 15:57:54', 'Ville_Depart_4', 'Adresse_Arrivee_4', 54972, 4, 61, 464, 116), (5, '200200', '2023-05-25 17:02:23', '2023-08-30 04:42:00', 'Ville_Depart_5', 'Adresse_Arrivee_5', 13297, 3, 57, 234, 198);

INSERT INTO ESCALE 
 VALUES (1, 3, 'Adresse_Escale_1', 38439, '2023-07-16 07:27:26', True), (2, 2, 'Adresse_Escale_2', 45475, '2023-05-12 20:50:01', True), (3, 2, 'Adresse_Escale_3', 42883, '2023-07-31 14:07:58', True), (4, 5, 'Adresse_Escale_4', 22551, '2023-05-11 05:36:02', False), (5, 4, 'Adresse_Escale_5', 45007, '2023-07-14 00:41:29', False);

INSERT INTO PROPOSITION 
 VALUES (5, 10018), (2, 10002), (5, 10016), (2, 10008), (4, 10017);

INSERT INTO RESERVATION 
 VALUES (3, 10005, 'FALSE'), (4, 10017, 'FALSE'), (1, 10007, 'FALSE'), (5, 10011, 'FALSE'), (1, 10002, 'FALSE');

INSERT INTO EVALUATION 
 VALUES (10023, 4, 10014, 2), (10011, 3, 10009, 5), (10013, 5, 10007, 3), (10002, 3, 10011, 4), (10023, 5, 10019, 5);

