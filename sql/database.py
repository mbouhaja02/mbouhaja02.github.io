
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




# Define your sample data for each table
sample_data = {
    'ETUDIANT': data_etudiant
}

# Read the create.sql file to extract table names and column names
with open('create.sql', 'r') as create_sql_file:
    create_sql = create_sql_file.read()

# Split the SQL script into individual statements
sql_statements = create_sql.split(';')

# Create the insert.sql file to write the INSERT statements
with open('insert.sql', 'w') as insert_sql_file:
    for statement in sql_statements:
        statement = statement.strip()
        print(statement)
        print("####################################################################")
        if statement.startswith('CREATE TABLE'):
            table_name = statement.split(' ')[2].strip(')')
            print(table_name)
            if table_name in sample_data:
                print(table_name)
                columns = [column[0] for column in sample_data[table_name]]
                insert_sql_file.write(f"INSERT INTO {table_name} ({', '.join(columns)}) VALUES\n")
                values = [', '.join(map(str, row)) for row in sample_data[table_name]]
                insert_sql_file.write("    {};\n\n".format(',\n    '.join(['(' + value + ')' for value in values])))


print('Data insertion script generated in insert.sql.')
