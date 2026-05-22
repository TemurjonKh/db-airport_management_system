-- ============================================
-- PILOT SUMMARY
-- ============================================

CREATE VIEW PilotSummary AS

SELECT
    e.employee_id,
    e.first_name,
    e.last_name,
    a.airline_name,
    p.PPL,
    p.CPL,
    p.IR,
    p.MER

FROM Employee e

JOIN Pilot p
ON e.employee_id = p.employee_id

JOIN Airline a
ON p.airline_id = a.airline_id;



-- ============================================
-- FLIGHT SUMMARY
-- ============================================

CREATE VIEW FlightSummary AS

SELECT
    f.flight_number,
    a.airline_name,
    f.departure_airport,
    f.arrival_airport,
    f.departure_datetime,
    f.arrival_datetime,
    f.flight_status,
    f.available_seats

FROM Flight f

JOIN Airline a
ON f.airline_id = a.airline_id;



-- ============================================
-- CUSTOMER BOOKINGS
-- ============================================

CREATE VIEW CustomerBookings AS

SELECT
    c.customer_id,
    c.first_name,
    c.last_name,
    f.flight_number,
    t.ticket_class,
    t.seat_number,
    t.payment_status

FROM Customer c

JOIN Ticket t
ON c.customer_id = t.customer_id

JOIN Flight f
ON t.flight_id = f.flight_id;



-- ============================================
-- AIRPLANE MAINTENANCE
-- ============================================

CREATE VIEW AirplaneMaintenance AS

SELECT
    a.registration_number,
    ai.issue_type,
    ai.issue_status,
    ai.issue_date,
    ai.resolved_date

FROM Airplane a

JOIN AirplaneIssues ai
ON a.airplane_id = ai.airplane_id;



-- ============================================
-- EMPLOYEE CONTACT VIEW
-- ============================================

CREATE VIEW EmployeeContactsView AS

SELECT
    e.employee_id,
    e.first_name,
    e.last_name,
    ec.phone_number

FROM Employee e

JOIN EmployeeContact ec
ON e.employee_id = ec.employee_id;



-- ============================================
-- FLIGHT LOAD VIEW
-- ============================================

CREATE VIEW FlightLoad AS

SELECT
    f.flight_number,
    COUNT(t.ticket_id) AS total_bookings,
    f.available_seats

FROM Flight f

LEFT JOIN Ticket t
ON f.flight_id = t.flight_id

GROUP BY f.flight_id;