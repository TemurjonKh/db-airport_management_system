USE airport_management_system;

-- =========================
-- AIRLINE
-- =========================
DROP TABLE IF EXISTS Airline;
CREATE TABLE Airline (
    airline_id INT AUTO_INCREMENT PRIMARY KEY,

    airline_name VARCHAR(100) NOT NULL UNIQUE,

    airline_code VARCHAR(10) UNIQUE NOT NULL,

    country VARCHAR(50) NOT NULL,

    headquarters VARCHAR(100),

    founded_year YEAR,

    contact_number VARCHAR(20),

    email VARCHAR(100),

    website VARCHAR(100),

    total_airplanes INT DEFAULT 0,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- =========================
-- MODEL
-- =========================

CREATE TABLE Model (
    model_id INT AUTO_INCREMENT PRIMARY KEY,

    model_name VARCHAR(100) NOT NULL,

    manufacturer VARCHAR(100) NOT NULL,

    capacity INT NOT NULL,

    max_weight DECIMAL(12,2),

    fuel_capacity INT,

    engine_type VARCHAR(50),

    manufacture_country VARCHAR(50),

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =========================
-- AIRPLANE
-- =========================

CREATE TABLE Airplane (
    airplane_id INT AUTO_INCREMENT PRIMARY KEY,

    registration_number VARCHAR(20) UNIQUE NOT NULL,

    model_id INT NOT NULL,

    airline_id INT NOT NULL,

    manufacture_year YEAR,

    airplane_status ENUM(
        'Active',
        'Maintenance',
        'Grounded'
    ) DEFAULT 'Active',

    current_airport VARCHAR(100),

    last_maintenance_date DATE,

    total_flight_hours INT DEFAULT 0,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (model_id)
    REFERENCES Model(model_id),

    FOREIGN KEY (airline_id)
    REFERENCES Airline(airline_id)
);

-- =========================
-- EMPLOYEE
-- =========================

CREATE TABLE Employee (
    employee_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    position VARCHAR(100),
    department VARCHAR(100),
    salary DECIMAL(10,2),
    hire_date DATE,
    phone_number VARCHAR(20),
    email VARCHAR(100),
    employee_status VARCHAR(20)
);

-- =========================
-- EMPLOYEE CONTACT
-- =========================

CREATE TABLE EmployeeContact (
    employee_id VARCHAR(20),
    phone_number VARCHAR(20),

    PRIMARY KEY (employee_id, phone_number),

    FOREIGN KEY (employee_id)
    REFERENCES Employee(employee_id)
    ON DELETE CASCADE
);

-- =========================
-- TECHNICIAN
-- =========================

CREATE TABLE Technician (
    employee_id VARCHAR(20) PRIMARY KEY,
    AME_License VARCHAR(50),

    FOREIGN KEY (employee_id)
    REFERENCES Employee(employee_id)
    ON DELETE CASCADE
);

-- =========================
-- FLIGHT CREW
-- =========================

CREATE TABLE FlightCrew (
    employee_id VARCHAR(20) PRIMARY KEY,
    medical_examination_date DATE,
    type VARCHAR(50),

    FOREIGN KEY (employee_idSN)
    REFERENCES Employee(employee_id)
    ON DELETE CASCADE
);

-- =========================
-- FLIGHT ATTENDANT
-- =========================

CREATE TABLE FlightAttendant (
    employee_id VARCHAR(20) PRIMARY KEY,
    FA_License VARCHAR(50),
    Height DECIMAL(5,2),
    Weight DECIMAL(5,2),
    airline_id INT,

    FOREIGN KEY (employee_id)
    REFERENCES FlightCrew(employee_id)
    ON DELETE CASCADE,

    FOREIGN KEY (airline_id)
    REFERENCES Airline(airline_id)
);
-- =========================
-- USERS
-- =========================

CREATE TABLE Users (

    user_id INT AUTO_INCREMENT PRIMARY KEY,

    full_name VARCHAR(100) NOT NULL,

    email VARCHAR(100) UNIQUE NOT NULL,

    phone_number VARCHAR(30),

    password VARCHAR(255) NOT NULL,

    role ENUM(
        'Admin',
        'Manager',
        'Employee',
        'Customer'
    ) DEFAULT 'Customer',

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- =========================
-- PILOT
-- =========================

CREATE TABLE Pilot (
    SSN VARCHAR(20) PRIMARY KEY,
    PPL BOOLEAN,
    CPL BOOLEAN,
    IR BOOLEAN,
    MER BOOLEAN,
    airline_id INT,

    FOREIGN KEY (SSN)
    REFERENCES FlightCrew(SSN)
    ON DELETE CASCADE,

    FOREIGN KEY (airline_id)
    REFERENCES Airline(airline_id)
);

-- =========================
-- CUSTOMER
-- =========================

CREATE TABLE Customer (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,

    passport_number VARCHAR(30) UNIQUE NOT NULL,

    first_name VARCHAR(50) NOT NULL,

    last_name VARCHAR(50) NOT NULL,

    gender ENUM(
        'Male',
        'Female',
        'Other'
    ),

    nationality VARCHAR(50),

    date_of_birth DATE,

    phone_number VARCHAR(20),

    email VARCHAR(100),

    address TEXT,

    emergency_contact VARCHAR(100),

    loyalty_points INT DEFAULT 0,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- =========================
-- FLIGHT
-- =========================

CREATE TABLE Flight (
    flight_id INT AUTO_INCREMENT PRIMARY KEY,

    flight_number VARCHAR(20) UNIQUE NOT NULL,

    airline_id INT NOT NULL,

    airplane_id INT NOT NULL,

    departure_airport VARCHAR(100) NOT NULL,

    arrival_airport VARCHAR(100) NOT NULL,

    departure_datetime DATETIME NOT NULL,

    arrival_datetime DATETIME NOT NULL,

    terminal VARCHAR(10),

    gate VARCHAR(10),

    flight_status ENUM(
        'Scheduled',
        'Delayed',
        'Cancelled',
        'Completed'
    ) DEFAULT 'Scheduled',

    ticket_price DECIMAL(10,2),

    available_seats INT,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (airline_id)
    REFERENCES Airline(airline_id),

    FOREIGN KEY (airplane_id)
    REFERENCES Airplane(airplane_id)
);
-- =========================
-- TICKET
-- =========================

CREATE TABLE Ticket (
    ticket_id INT AUTO_INCREMENT PRIMARY KEY,

    customer_id INT NOT NULL,

    flight_id INT NOT NULL,

    ticket_class ENUM(
        'Economy',
        'Business',
        'First'
    ) DEFAULT 'Economy',

    seat_number VARCHAR(10),

    boarding_gate VARCHAR(10),

    boarding_time DATETIME,

    baggage_allowance INT DEFAULT 20,

    payment_status ENUM(
        'Pending',
        'Paid',
        'Refunded'
    ) DEFAULT 'Pending',

    booking_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (customer_id)
    REFERENCES Customer(customer_id),

    FOREIGN KEY (flight_id)
    REFERENCES Flight(flight_id)
);

-- =========================
-- FLY
-- =========================


