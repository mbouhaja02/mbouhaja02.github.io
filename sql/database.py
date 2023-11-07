import random


TYPE_VOITURE=['BMW','DACIA','MERCEDES','PEUGEOT','CITROEIN','ALPHA-ROMEO','FIAT',"RENAULT","FORD"]
COULEUR= ['YELLOW', 'BLACK', 'WHITE', 'BLUE']
NBR_PASSAGER = ['4', '5', '3']
ETAT=['BON','MOYEN','MAUVAIS']

commune=[33000,33100,33200,33300,33400,33500,33600,33700,33800]

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



data_etudiant= data_etudiant()

def voiture():
    k=0
    L=[]
    for i in range(20):
        for j in range(20):
            L.append((str(200200+k), TYPE_VOITURE[random.randint(0, 8)],ETAT[random.randint(0, 2)], COULEUR[random.randint(0, 3)], NBR_PASSAGER[random.randint(0, 2)]))
            k+=1

    return L

print(voiture())




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
