USE airport_management_system;

-- AIRLINES

INSERT INTO Airline (
    airline_name,
    airline_code,
    country,
    headquarters,
    founded_year,
    contact_number,
    email,
    website,
    total_airplanes
)
VALUES

(
    'Korean Air',
    'KAL',
    'South Korea',
    'Seoul',
    1969,
    '010111111',
    'contact@koreanair.com',
    'www.koreanair.com',
    120
),

(
    'Asiana Airlines',
    'AAR',
    'South Korea',
    'Seoul',
    1988,
    '010222222',
    'support@asiana.com',
    'www.asiana.com',
    80
),

(
    'Emirates',
    'UAE',
    'United Arab Emirates',
    'Dubai',
    1985,
    '050333333',
    'info@emirates.com',
    'www.emirates.com',
    250
),

(
    'Qatar Airways',
    'QTR',
    'Qatar',
    'Doha',
    1993,
    '060444444',
    'contact@qatarairways.com',
    'www.qatarairways.com',
    180
);
INSERT INTO Users (

    full_name,
    email,
    phone_number,
    password,
    role

)

VALUES

(
    'System Admin',
    'admin@airport.com',
    '010999999',
    'admin123',
    'Admin'
),

(
    'Airport Manager',
    'manager@airport.com',
    '010888888',
    'manager123',
    'Manager'
),

(
    'Test Customer',
    'customer@airport.com',
    '010777777',
    'customer123',
    'Customer'
);
-- Employees
INSERT INTO Employee (
    first_name,
    last_name,
    position,
    department,
    salary,
    hire_date,
    phone_number,
    email,
    employee_status
)
VALUES
('John', 'Smith', 'Airport Manager', 'Administration', 85000, '2022-03-15', '01012345678', 'john.smith@airport.com', 'Active'),

('Sarah', 'Kim', 'Flight Dispatcher', 'Operations', 62000, '2021-07-10', '01023456789', 'sarah.kim@airport.com', 'Active'),

('David', 'Lee', 'Aircraft Technician', 'Maintenance', 58000, '2020-11-22', '01034567890', 'david.lee@airport.com', 'Active'),

('Emily', 'Park', 'Customer Service Officer', 'Customer Support', 45000, '2023-01-05', '01045678901', 'emily.park@airport.com', 'Active'),

('Michael', 'Brown', 'Security Officer', 'Security', 40000, '2022-09-18', '01056789012', 'michael.brown@airport.com', 'Active'),

('Jessica', 'Wang', 'HR Specialist', 'Human Resources', 52000, '2021-05-30', '01067890123', 'jessica.wang@airport.com', 'Active'),

('Daniel', 'Choi', 'Ground Staff', 'Operations', 38000, '2023-06-12', '01078901234', 'daniel.choi@airport.com', 'Active'),

('Sophia', 'Kim', 'Ticketing Agent', 'Customer Support', 42000, '2022-12-01', '01089012345', 'sophia.kim@airport.com', 'Active');

-- MODELS

INSERT INTO Model (
    model_name,
    manufacturer,
    capacity,
    max_weight,
    fuel_capacity,
    engine_type,
    manufacture_country
)
VALUES

(
    'Boeing 747',
    'Boeing',
    416,
    183500,
    183380,
    'Turbofan',
    'USA'
),

(
    'Airbus A380',
    'Airbus',
    853,
    575000,
    320000,
    'Turbofan',
    'France'
),

(
    'Boeing 777',
    'Boeing',
    396,
    299000,
    181000,
    'Twin Engine',
    'USA'
),

(
    'Airbus A350',
    'Airbus',
    350,
    280000,
    141000,
    'Twin Engine',
    'France'
);
-- Airplane
INSERT INTO Airplane (
    registration_number,
    model_id,
    airline_id,
    manufacture_year,
    airplane_status,
    current_airport,
    last_maintenance_date,
    total_flight_hours
)
VALUES

(
    'HL1234',
    1,
    1,
    2015,
    'Active',
    'Incheon International Airport',
    '2026-04-10',
    18500
),

(
    'A6-EOS',
    2,
    3,
    2018,
    'Maintenance',
    'Dubai International Airport',
    '2026-05-01',
    22000
),

(
    'QA7788',
    3,
    4,
    2020,
    'Active',
    'Hamad International Airport',
    '2026-03-20',
    11000
),

(
    'HL5678',
    4,
    2,
    2021,
    'Grounded',
    'Incheon International Airport',
    '2026-05-10',
    7000
);
-- CUSTOMERS

INSERT INTO Customer (
    passport_number,
    first_name,
    last_name,
    gender,
    nationality,
    date_of_birth,
    phone_number,
    email,
    address,
    emergency_contact,
    loyalty_points
)
VALUES

(
    'P10001',
    'John',
    'Smith',
    'Male',
    'American',
    '1995-04-10',
    '010123456',
    'johnsmith@email.com',
    'New York, USA',
    'Jane Smith',
    1500
),

(
    'P10002',
    'Emma',
    'Brown',
    'Female',
    'British',
    '1998-08-22',
    '020987654',
    'emma@email.com',
    'London, UK',
    'Michael Brown',
    2200
),

(
    'P10003',
    'Minho',
    'Kim',
    'Male',
    'South Korean',
    '2000-03-15',
    '010777888',
    'minho@email.com',
    'Seoul, South Korea',
    'Jisoo Kim',
    980
);

-- FLIGHTS

INSERT INTO Flight (
    flight_number,
    airline_id,
    airplane_id,
    departure_airport,
    arrival_airport,
    departure_datetime,
    arrival_datetime,
    terminal,
    gate,
    flight_status,
    ticket_price,
    available_seats
)
VALUES

(
    'KE101',
    1,
    1,
    'Seoul Incheon',
    'Dubai International',
    '2026-06-01 09:00:00',
    '2026-06-01 17:00:00',
    'T1',
    'A12',
    'Scheduled',
    850.00,
    120
),

(
    'EK202',
    3,
    2,
    'Dubai International',
    'London Heathrow',
    '2026-06-03 14:00:00',
    '2026-06-03 20:00:00',
    'T3',
    'C5',
    'Delayed',
    1200.00,
    80
),

(
    'QR303',
    4,
    3,
    'Doha',
    'New York JFK',
    '2026-06-05 11:00:00',
    '2026-06-05 22:00:00',
    'T2',
    'B8',
    'Scheduled',
    1450.00,
    95
);

-- TICKETS

INSERT INTO Ticket (
    customer_id,
    flight_id,
    ticket_class,
    seat_number,
    boarding_gate,
    boarding_time,
    baggage_allowance,
    payment_status
)
VALUES

(
    1,
    1,
    'Business',
    '12B',
    'A12',
    '2026-06-01 08:15:00',
    35,
    'Paid'
),

(
    2,
    2,
    'Economy',
    '45A',
    'C5',
    '2026-06-03 13:15:00',
    20,
    'Paid'
),

(
    3,
    3,
    'First',
    '2A',
    'B8',
    '2026-06-05 10:15:00',
    50,
    'Pending'
);