-- ============================================
-- FLIGHT INDEXES
-- ============================================

CREATE INDEX idx_flight_number
ON Flight(flight_number);

CREATE INDEX idx_departure_airport
ON Flight(departure_airport);

CREATE INDEX idx_arrival_airport
ON Flight(arrival_airport);

CREATE INDEX idx_flight_status
ON Flight(flight_status);



-- ============================================
-- CUSTOMER INDEXES
-- ============================================

CREATE INDEX idx_customer_passport
ON Customer(passport_number);

CREATE INDEX idx_customer_email
ON Customer(email);

CREATE INDEX idx_customer_nationality
ON Customer(nationality);



-- ============================================
-- EMPLOYEE INDEXES
-- ============================================

CREATE INDEX idx_employee_department
ON Employee(department);

CREATE INDEX idx_employee_position
ON Employee(position);

CREATE INDEX idx_employee_status
ON Employee(employee_status);



-- ============================================
-- AIRPLANE INDEXES
-- ============================================

CREATE INDEX idx_registration_number
ON Airplane(registration_number);

CREATE INDEX idx_airplane_status
ON Airplane(airplane_status);

CREATE INDEX idx_current_airport
ON Airplane(current_airport);



-- ============================================
-- TICKET INDEXES
-- ============================================

CREATE INDEX idx_ticket_payment
ON Ticket(payment_status);

CREATE INDEX idx_ticket_class
ON Ticket(ticket_class);

CREATE INDEX idx_ticket_seat
ON Ticket(seat_number);