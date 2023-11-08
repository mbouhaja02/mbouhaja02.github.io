import random
import datetime

####################################      DATA VOITURE    ####################################

TYPE_VOITURE=['BMW','DACIA','MERCEDES','PEUGEOT','CITROEIN','ALPHA-ROMEO','FIAT',"RENAULT","FORD"]
COULEUR= ['YELLOW', 'BLACK', 'WHITE', 'BLUE']
NBR_PASSAGER = ['4', '5', '3']
ETAT=['BON','MOYEN','MAUVAIS']

def voiture():
    k=0
    L=[]
    for i in range(2):
        for j in range(2):
            L.append((str(200200+k), TYPE_VOITURE[random.randint(0, 8)],ETAT[random.randint(0, 2)], COULEUR[random.randint(0, 3)], NBR_PASSAGER[random.randint(0, 2)]))
            k+=1

    return L

DATA_VOITURE = voiture()


####################################      DATA ETUDIANT    ####################################

NOM = ['SMITH', 'SNOW', 'TRIBIANI', 'GELLER', 'GREEN']
PRENOM = ['Chandler', 'Joey', 'Rachel', 'Monica', 'Ross']


def data_etudiant():
    L=[]
    num=10000
    for nom in NOM:
        for prenom in PRENOM:
            L.append((num, nom, prenom))
            num += 1
    return L

####################################      DATA TRAJET    ####################################

def generate_random_datetime(start_date, end_date):
    time_diff = end_date - start_date
    random_days = random.randint(0, time_diff.days)
    random_time = random.randint(0, 24 * 60 * 60)  # Seconds in a day
    return start_date + datetime.timedelta(days=random_days, seconds=random_time)

def generate_trajet_data(num_trajets, vehicle_ids):
    trajet_data = []
    for i in range(num_trajets):
        trajet_id = i + 1
        vehicle_id_u = random.choice([MATRICULE[0] for MATRICULE in vehicle_ids])
        start_date = datetime.datetime(2023, 1, 1)
        end_date = datetime.datetime(2023, 12, 31)
        date_depart = generate_random_datetime(start_date, end_date)
        date_arrivee = generate_random_datetime(date_depart, end_date)
        ville_depart = f"Ville_Depart_{trajet_id}"
        adresse_arrivee = f"Adresse_Arrivee_{trajet_id}"
        code_postal = random.randint(10000, 99999)
        nbr_escales = random.randint(0, 5)
        prix_kilometrage = random.randint(10, 100)
        distance_total = random.randint(50, 500)
        duree_estime = random.randint(30, 360)
        trajet_data.append((trajet_id, vehicle_id_u, date_depart, date_arrivee, ville_depart, adresse_arrivee, code_postal, nbr_escales, prix_kilometrage, distance_total, duree_estime))
    return trajet_data

DATA_TRAJET = generate_trajet_data(5, DATA_VOITURE)
print(DATA_TRAJET)

####################################      DATA ESCALE    ####################################



####################################      DATA PROPOSITION    ####################################



####################################      DATA EVALUATION    ####################################

def generate_evaluation_data(num_evaluations, student_ids, trajet_ids):
    evaluation_data = []
    for i in range(num_evaluations):
        student_evaluator_id = random.choice(student_ids)
        student_evaluated_id = random.choice(student_ids)
        trajet_id = random.choice(trajet_ids)
        note = random.randint(1, 5)
        evaluation_data.append((student_evaluated_id, trajet_id, student_evaluator_id, note))
    return evaluation_data



####################################      DATA RESERVATION    ####################################

def generate_reservation_data(num_reservations, trajet_ids, student_ids):
    reservation_data = []
    for i in range(num_reservations):
        trajet_id = random.choice(trajet_ids)
        student_id = random.choice(student_ids)
        validation_reservation = random.choice([True, False])
        reservation_data.append((trajet_id, student_id, validation_reservation))
    return reservation_data





##################################################################################################
#                                                                                                #
#                                  INSERTION DE DONNEES                                          #
#                                                                                                #
##################################################################################################



# Define your sample data for each table
sample_data = {
    'ETUDIANT': data_etudiant
}

# # Read the create.sql file to extract table names and column names
# with open('create.sql', 'r') as create_sql_file:
#     create_sql = create_sql_file.read()

# # Split the SQL script into individual statements
# sql_statements = create_sql.split(';')

# # Create the insert.sql file to write the INSERT statements
# with open('insert.sql', 'w') as insert_sql_file:
#     for statement in sql_statements:
#         statement = statement.strip()
#         if statement.startswith('CREATE TABLE'):
#             table_name = statement.split(' ')[2].strip(')')
#             if table_name in sample_data:
#                 print(table_name)
#                 columns = [column[0] for column in sample_data[table_name]]
#                 insert_sql_file.write(f"INSERT INTO {table_name} ({', '.join(columns)}) VALUES\n")
#                 values = [', '.join(map(str, row)) for row in sample_data[table_name]]
#                 insert_sql_file.write("    {};\n\n".format(',\n    '.join(['(' + value + ')' for value in values])))


# print('Data insertion script generated in insert.sql.')
