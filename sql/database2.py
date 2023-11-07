import random

# Function to generate random student data
def generate_student_data(num_students):
    student_data = []
    for i in range(num_students):
        student_id = i + 1
        first_name = f"First_Name_{student_id}"
        last_name = f"Last_Name_{student_id}"
        student_data.append((student_id, first_name, last_name))
    return student_data

# Function to generate random conductor data
def generate_conductor_data(num_conductors):
    conductor_data = []
    for i in range(num_conductors):
        conductor_id = i + 1
        conductor_data.append((conductor_id,))
    return conductor_data

# Function to generate random passenger data
def generate_passenger_data(num_passengers):
    passenger_data = []
    for i in range(num_passengers):
        passenger_id = i + 1
        passenger_data.append((passenger_id,))
    return passenger_data

# Function to generate random vehicle data
def generate_vehicle_data(num_vehicles):
    vehicle_data = []
    for i in range(num_vehicles):
        vehicle_id = i + 1
        conductor_id = random.randint(1, num_conductors)
        vehicle_type = f"Type_{vehicle_id}"
        color = f"Color_{vehicle_id}"
        state = f"State_{vehicle_id}"
        passenger_count = random.randint(1, 5)
        vehicle_data.append((vehicle_id, conductor_id, vehicle_type, color, state, passenger_count))
    return vehicle_data

import random
import datetime

# Function to generate random date and time
def generate_random_datetime(start_date, end_date):
    time_diff = end_date - start_date
    random_days = random.randint(0, time_diff.days)
    random_time = random.randint(0, 24 * 60 * 60)  # Seconds in a day
    return start_date + datetime.timedelta(days=random_days, seconds=random_time)

# Function to generate random TRAJET data
def generate_trajet_data(num_trajets, vehicle_ids):
    trajet_data = []
    for i in range(num_trajets):
        trajet_id = i + 1
        vehicle_id = random.choice(vehicle_ids)
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
        trajet_data.append((trajet_id, vehicle_id, date_depart, date_arrivee, ville_depart, adresse_arrivee, code_postal, nbr_escales, prix_kilometrage, distance_total, duree_estime))
    return trajet_data

# Function to generate random USERS data
def generate_users_data(num_users):
    users_data = []
    for i in range(num_users):
        user_id = i + 1
        user_name = f"User_{user_id}"
        password = f"Password_{user_id}"
        users_data.append((user_id, user_name, password))
    return users_data

# Function to generate random RESERVATION data
def generate_reservation_data(num_reservations, trajet_ids, student_ids):
    reservation_data = []
    for i in range(num_reservations):
        trajet_id = random.choice(trajet_ids)
        student_id = random.choice(student_ids)
        validation_reservation = random.choice(["Validated", "Pending"])
        reservation_data.append((trajet_id, student_id, validation_reservation))
    return reservation_data

# Function to generate random EVALUATION data
def generate_evaluation_data(num_evaluations, student_ids, trajet_ids):
    evaluation_data = []
    for i in range(num_evaluations):
        student_evaluator_id = random.choice(student_ids)
        student_evaluated_id = random.choice(student_ids)
        trajet_id = random.choice(trajet_ids)
        note = random.randint(1, 5)
        evaluation_data.append((student_evaluated_id, trajet_id, student_evaluator_id, note))
    return evaluation_data

num_students = 10
student_data = generate_student_data(num_students)

num_conductors = 5
conductor_data = generate_conductor_data(num_conductors)

num_passengers = 10
passenger_data = generate_passenger_data(num_passengers)

num_vehicles = 10
vehicle_data = generate_vehicle_data(num_vehicles)

# Example usage:
num_trajets = 10
vehicle_ids = [vehicle[0] for vehicle in vehicle_data]
trajet_data = generate_trajet_data(num_trajets, vehicle_ids)

num_users = 10
users_data = generate_users_data(num_users)

num_reservations = 10
reservation_data = generate_reservation_data(num_reservations, trajet_ids, student_ids)

num_evaluations = 10
evaluation_data = generate_evaluation_data(num_evaluations, student_ids, trajet_ids)




