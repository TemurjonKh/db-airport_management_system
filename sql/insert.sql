USE airport_management_system;

-- AIRLINES

INSERT INTO Airline (airline_name)
VALUES
('Korean Air'),
('Asiana Airlines'),
('Emirates'),
('Qatar Airways');

-- MODELS

INSERT INTO Model (model_name, capacity, weight)
VALUES
('Boeing 747', 416, 183500),
('Airbus A380', 853, 575000),
('Boeing 777', 396, 299000);

-- AIRPLANES

INSERT INTO Airplane (reg_no, model_no, airline_id)
VALUES
('HL1234', 1, 1),
('A6-EOS', 2, 3),
('QA7788', 3, 4);

-- CUSTOMERS

INSERT INTO Customer (
    id_card_number,
    first_name,
    last_name,
    date_of_birth,
    street,
    city,
    province,
    country,
    phone_number
)
VALUES
('P1001', 'John', 'Smith', '1995-04-10',
 'Main Street', 'Seoul', 'Seoul', 'South Korea', '010123456'),

('P1002', 'Emma', 'Brown', '1998-08-22',
 'King Road', 'Dubai', 'Dubai', 'UAE', '050987654');

-- FLIGHTS

INSERT INTO Flight (
    departure,
    arrival,
    departure_datetime,
    arrival_datetime
)
VALUES
(
 'Seoul',
 'Dubai',
 '2026-06-01 09:00:00',
 '2026-06-01 17:00:00'
),

(
 'Doha',
 'London',
 '2026-06-03 14:00:00',
 '2026-06-03 20:00:00'
);

-- TICKETS

INSERT INTO Ticket (
    class,
    gate,
    seat,
    boarding_time,
    id_card_number,
    flight_id
)
VALUES
(
 'Business',
 'A1',
 '12B',
 '2026-06-01 08:15:00',
 'P1001',
 1
),

(
 'Economy',
 'C3',
 '45A',
 '2026-06-03 13:15:00',
 'P1002',
 2
);