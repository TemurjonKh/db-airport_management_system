USE airport_management_system;

-- =========================
-- AIRLINE
-- =========================

CREATE TABLE Airline (
    airline_id INT AUTO_INCREMENT PRIMARY KEY,
    airline_name VARCHAR(100) NOT NULL
);

-- =========================
-- MODEL
-- =========================

CREATE TABLE Model (
    model_no INT AUTO_INCREMENT PRIMARY KEY,
    model_name VARCHAR(100) NOT NULL,
    capacity INT NOT NULL,
    weight DECIMAL(10,2) NOT NULL
);

-- =========================
-- AIRPLANE
-- =========================

CREATE TABLE Airplane (
    reg_no VARCHAR(20) PRIMARY KEY,
    model_no INT,
    airline_id INT,

    FOREIGN KEY (model_no)
    REFERENCES Model(model_no),

    FOREIGN KEY (airline_id)
    REFERENCES Airline(airline_id)
);

-- =========================
-- EMPLOYEE
-- =========================

CREATE TABLE Employee (
    SSN VARCHAR(20) PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    salary DECIMAL(10,2),
    date_of_birth DATE,
    street VARCHAR(100),
    city VARCHAR(50),
    province VARCHAR(50),
    country VARCHAR(50),
    type VARCHAR(50)
);

-- =========================
-- EMPLOYEE CONTACT
-- =========================

CREATE TABLE EmployeeContact (
    SSN VARCHAR(20),
    phone_number VARCHAR(20),

    PRIMARY KEY (SSN, phone_number),

    FOREIGN KEY (SSN)
    REFERENCES Employee(SSN)
    ON DELETE CASCADE
);

-- =========================
-- TECHNICIAN
-- =========================

CREATE TABLE Technician (
    SSN VARCHAR(20) PRIMARY KEY,
    AME_License VARCHAR(50),

    FOREIGN KEY (SSN)
    REFERENCES Employee(SSN)
    ON DELETE CASCADE
);

-- =========================
-- FLIGHT CREW
-- =========================

CREATE TABLE FlightCrew (
    SSN VARCHAR(20) PRIMARY KEY,
    medical_examination_date DATE,
    type VARCHAR(50),

    FOREIGN KEY (SSN)
    REFERENCES Employee(SSN)
    ON DELETE CASCADE
);

-- =========================
-- FLIGHT ATTENDANT
-- =========================

CREATE TABLE FlightAttendant (
    SSN VARCHAR(20) PRIMARY KEY,
    FA_License VARCHAR(50),
    Height DECIMAL(5,2),
    Weight DECIMAL(5,2),
    airline_id INT,

    FOREIGN KEY (SSN)
    REFERENCES FlightCrew(SSN)
    ON DELETE CASCADE,

    FOREIGN KEY (airline_id)
    REFERENCES Airline(airline_id)
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
    id_card_number VARCHAR(30) PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    date_of_birth DATE,
    street VARCHAR(100),
    city VARCHAR(50),
    province VARCHAR(50),
    country VARCHAR(50),
    phone_number VARCHAR(20)
);

-- =========================
-- FLIGHT
-- =========================

CREATE TABLE Flight (
    flight_id INT AUTO_INCREMENT PRIMARY KEY,
    departure VARCHAR(100),
    arrival VARCHAR(100),
    departure_datetime DATETIME,
    arrival_datetime DATETIME
);

-- =========================
-- TICKET
-- =========================

CREATE TABLE Ticket (
    ticket_id INT AUTO_INCREMENT PRIMARY KEY,
    class VARCHAR(20),
    gate VARCHAR(10),
    seat VARCHAR(10),
    boarding_time DATETIME,

    id_card_number VARCHAR(30),
    flight_id INT,

    FOREIGN KEY (id_card_number)
    REFERENCES Customer(id_card_number),

    FOREIGN KEY (flight_id)
    REFERENCES Flight(flight_id)
);

-- =========================
-- FLY
-- =========================

CREATE TABLE Fly (
    flight_id INT,
    id_card_number VARCHAR(30),
    reg_no VARCHAR(20),

    PRIMARY KEY (flight_id, id_card_number, reg_no),

    FOREIGN KEY (flight_id)
    REFERENCES Flight(flight_id),

    FOREIGN KEY (id_card_number)
    REFERENCES Customer(id_card_number),

    FOREIGN KEY (reg_no)
    REFERENCES Airplane(reg_no)
);

-- =========================
-- AIRPLANE ISSUES
-- =========================

CREATE TABLE AirplaneIssues (
    reg_no VARCHAR(20),
    date DATE,
    type VARCHAR(50),
    description TEXT,
    resolved_date DATE,

    PRIMARY KEY (reg_no, date, type),

    FOREIGN KEY (reg_no)
    REFERENCES Airplane(reg_no)
);

-- =========================
-- FIX
-- =========================

CREATE TABLE Fix (
    reg_no VARCHAR(20),
    date DATE,
    type VARCHAR(50),
    SSN VARCHAR(20),

    PRIMARY KEY (reg_no, date, type, SSN),

    FOREIGN KEY (reg_no, date, type)
    REFERENCES AirplaneIssues(reg_no, date, type),

    FOREIGN KEY (SSN)
    REFERENCES Technician(SSN)
);