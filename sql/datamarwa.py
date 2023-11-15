import random
import datetime

Tables = ['ETUDIANT', 'CONDUCTEUR', 'PASSAGER','VOITURE', 'TRAJET', 'ESCALE', 'PROPOSITION', 'RESERVATION', 'EVALUATION']


####################################      DATA VOITURE    ####################################

TYPE_VOITURE=['BMW','DACIA','MERCEDES','PEUGEOT','CITROEIN','ALPHA-ROMEO','FIAT',"RENAULT","FORD"]
COULEUR= ['YELLOW', 'BLACK', 'WHITE', 'BLUE']
NBR_PASSAGER = ['4', '5', '3']
ETAT=['BON','MOYEN','MAUVAIS']

NOM = ['SMITH', 'SNOW', 'TRIBIANI', 'GELLER', 'GREEN']
PRENOM = ['Chandler', 'Joey', 'Rachel', 'Monica', 'Ross']

####################################      DATA ETUDIANT   ####################################

def data_etudiant():
    L=[]
    num=10000
    for nom in NOM:
        for prenom in PRENOM:
            L.append((num, nom, prenom))
            num += 1
    return L

####################################      DATA CONDUCTEUR   ####################################

def data_conducteur():
    return [ele[0] for ele in random.sample(data_etudiant(), int(0.2 * len(data_etudiant())))]



####################################      DATA PASSAGER   ####################################

def data_passager():
    P = []
    C = data_conducteur() 
    E = data_etudiant()    

    for etudiant in E:
        if etudiant[0] not in C:
            P.append(etudiant[0])

    return list(set(P))



####################################      DATA VOITURE    ####################################

def data_voiture():
    k=0
    L=[]
    conducteur = [num[0] for num in data_etudiant()]
    for i in range(2):
        for j in range(2):
            L.append((str(200200+k), conducteur[k], TYPE_VOITURE[random.randint(0, 8)], COULEUR[random.randint(0, 3)],ETAT[random.randint(0, 2)], NBR_PASSAGER[random.randint(0, 2)]))
            k+=1

    return L

####################################      DATA TRAJET    ####################################


def generate_random_datetime(start_date, end_date):
    if isinstance(start_date, str):
        start_date = datetime.datetime.strptime(start_date, '%Y-%m-%d %H:%M:%S')
    if isinstance(end_date, str):
        end_date = datetime.datetime.strptime(end_date, '%Y-%m-%d %H:%M:%S')

    time_diff = end_date - start_date
    random_days = random.randint(0, time_diff.days)
    random_time = random.randint(0, 24 * 60 * 60)  # Seconds in a day
    random_datetime = start_date + datetime.timedelta(days=random_days, seconds=random_time)

    # Formater la date en format SQL
    formatted_datetime = random_datetime.strftime('%Y-%m-%d %H:%M:%S')
    return formatted_datetime

def data_trajet(num_trajets, vehicle_ids):
    trajet_data = []
    for i in range(num_trajets):
        trajet_id = i + 1
        vehicle_id = random.choice([MATRICULE[0] for MATRICULE in vehicle_ids])
        start_date = datetime.datetime(2023, 1, 1)
        end_date = datetime.datetime(2023, 12, 31)
        date_depart = generate_random_datetime(start_date, end_date)
        
        # Utiliser la fonction generate_random_datetime pour calculer date_arrivee
        date_arrivee = generate_random_datetime(date_depart, end_date)

        ville_depart = f"Ville_Depart_{trajet_id}"
        adresse_arrivee = f"Adresse_Arrivee_{trajet_id}"
        code_postal = random.randint(10000, 99999)
        nbr_escales = random.randint(0, 5)
        prix_kilometrage = random.randint(10, 100)
        distance_total = random.randint(50, 500)
        duree_estime = random.randint(30, 360)
        
        trajet_data.append((
            trajet_id, vehicle_id, date_depart, date_arrivee,
            ville_depart, adresse_arrivee, code_postal,
            nbr_escales, prix_kilometrage, distance_total, duree_estime
        ))
    
    return trajet_data


####################################      DATA ESCALE    ####################################

def data_escale(num_escales, trajet_ids):
    escale_data = []
    num_escale=1
    for i in range(num_escales):
        num_trajet = random.choice([l[0] for l in trajet_ids])
        adresse = f"Adresse_Escale_{i + 1}"
        code_postal = random.randint(10000, 99999)
        heure_arrivee = generate_random_datetime(datetime.datetime(2023, 1, 1), datetime.datetime(2023, 12, 31))
        validation_escale = random.choice([True, False])
        escale_data.append((num_escale, num_trajet, adresse, code_postal, heure_arrivee, validation_escale))
        num_escale+=1
    return escale_data


####################################      DATA PROPOSITION    ####################################

def data_proposition(num_propositions, escale_ids, passager_ids):
    proposition_data = []
    for i in range(num_propositions):
        num_escale = random.choice([l[0] for l in escale_ids])
        num_passager = random.choice([l[0] for l in passager_ids])
        proposition_data.append((num_escale, num_passager))
    return proposition_data


####################################      DATA EVALUATION    ####################################

def data_evaluation(num_evaluations, student_ids, trajet_ids):
    evaluation_data = []
    for i in range(num_evaluations):
        student_evaluator_id = random.choice([l[0] for l in student_ids])
        student_evaluated_id = random.choice([l[0] for l in student_ids])
        trajet_id = random.choice([l[0] for l in trajet_ids])
        note = random.randint(1, 5)
        evaluation_data.append((student_evaluated_id, trajet_id, student_evaluator_id, note))
    return evaluation_data


####################################      DATA RESERVATION    ####################################

def data_reservation(num_reservations, trajet_ids, student_ids):
    reservation_data = []
    for i in range(num_reservations):
        trajet_id = random.choice([l[0] for l in trajet_ids])
        student_id = random.choice([l[0] for l in student_ids])
        validation_reservation = random.choice(['TRUE', 'FALSE'])
        reservation_data.append((trajet_id, student_id, validation_reservation))
    return reservation_data




##################################################################################################
#                                                                                                #
#                                  INSERTION DE DONNEES                                          #
#                                                                                                #
##################################################################################################


####################################     CHOIX DE LA TABLE    ####################################


def which_table(table):
    if table=="ETUDIANT":
        return ", ". join(f"{element}" for element in data_etudiant())
    elif table=="PASSAGER":
        return ", ". join(f"{element}" for element in data_passager())
    elif table=="CONDUCTEUR":
        return ", ". join(f"{element}" for element in data_conducteur())
    elif table=="VOITURE":
        return ", ". join(f"{element}" for element in data_voiture())
    elif table=="TRAJET":
        return ", ". join(f"{element}" for element in data_trajet(5, data_voiture()))
    elif table=="ESCALE":
        return ", ". join(f"{element}" for element in data_escale(5, data_trajet(5, data_voiture())))
    elif table=="PROPOSITION":
        return ", ". join(f"{element}" for element in data_proposition(5, data_escale(5, data_trajet(5, data_voiture())), data_etudiant()))
    elif table=="RESERVATION":
        return ", ". join(f"{element}" for element in data_reservation(5, data_trajet(5, data_voiture()), data_etudiant()))
    elif table=="EVALUATION":
        return ", ". join(f"{element}" for element in data_evaluation(5, data_etudiant(), data_trajet(5, data_voiture())))
    
# def which_table(table):
#     data_functions = {
#         "ETUDIANT": data_etudiant,
#         "VOITURE": data_voiture,
#         "TRAJET": data_trajet,
#         "ESCALE": data_escale,
#         "PROPOSITION": data_proposition,
#         "EVALUATION": data_evaluation,
#         "PASSAGER": data_passager,
#         "CONDUCTEUR": data_conducteur,
#         "RESERVATION": data_reservation,
#     }
#     return ", ".join(f"{element}" for element in data_functions.get(table, lambda: [])())


##################    INSERTION DE DONNES DANS LE FICHIER INSERT.SQL    ##########################
    

with open('insert.sql', 'w') as file:
    for table in Tables:
        file.write("INSERT INTO " + table +" \n VALUES ")
        file.write(which_table(table))
        file.write(";\n\n") 