-- ============================================
-- ALL PILOTS
-- ============================================

SELECT
    e.employee_id,
    e.first_name,
    e.last_name,
    a.airline_name

FROM Employee e

JOIN Pilot p
ON e.employee_id = p.employee_id

JOIN Airline a
ON p.airline_id = a.airline_id;



-- ============================================
-- ALL FLIGHT ATTENDANTS
-- ============================================

SELECT
    e.employee_id,
    e.first_name,
    e.last_name,
    fa.FA_License

FROM Employee e

JOIN FlightAttendant fa
ON e.employee_id = fa.employee_id;



-- ============================================
-- ALL TECHNICIANS
-- ============================================

SELECT
    e.employee_id,
    e.first_name,
    e.last_name,
    t.AME_License

FROM Employee e

JOIN Technician t
ON e.employee_id = t.employee_id;



-- ============================================
-- TOTAL TICKETS SOLD PER FLIGHT
-- ============================================

SELECT
    f.flight_number,
    COUNT(t.ticket_id) AS tickets_sold

FROM Flight f

LEFT JOIN Ticket t
ON f.flight_id = t.flight_id

GROUP BY f.flight_id;



-- ============================================
-- AIRLINE WITH MOST FLIGHTS
-- ============================================

SELECT
    a.airline_name,
    COUNT(f.flight_id) AS total_flights

FROM Airline a

JOIN Flight f
ON a.airline_id = f.airline_id

GROUP BY a.airline_id

ORDER BY total_flights DESC;



-- ============================================
-- CUSTOMERS WITH BUSINESS CLASS TICKETS
-- ============================================

SELECT
    c.first_name,
    c.last_name,
    f.flight_number,
    t.ticket_class

FROM Customer c

JOIN Ticket t
ON c.customer_id = t.customer_id

JOIN Flight f
ON t.flight_id = f.flight_id

WHERE t.ticket_class = 'Business';



-- ============================================
-- AIRPLANES UNDER MAINTENANCE
-- ============================================

SELECT
    registration_number,
    airplane_status

FROM Airplane

WHERE airplane_status = 'Maintenance';



-- ============================================
-- EMPLOYEE ISA HIERARCHY
-- ============================================

SELECT
    e.employee_id,
    e.first_name,
    e.last_name,

    CASE
        WHEN p.employee_id IS NOT NULL THEN 'Pilot'
        WHEN fa.employee_id IS NOT NULL THEN 'Flight Attendant'
        WHEN t.employee_id IS NOT NULL THEN 'Technician'
        ELSE 'General Employee'
    END AS employee_subtype

FROM Employee e

LEFT JOIN Technician t
ON e.employee_id = t.employee_id

LEFT JOIN FlightCrew fc
ON e.employee_id = fc.employee_id

LEFT JOIN Pilot p
ON fc.employee_id = p.employee_id

LEFT JOIN FlightAttendant fa
ON fc.employee_id = fa.employee_id;



-- ============================================
-- CUSTOMERS WITH HIGH LOYALTY POINTS
-- ============================================

SELECT
    first_name,
    last_name,
    loyalty_points

FROM Customer

WHERE loyalty_points > 1000;



-- ============================================
-- TOTAL EMPLOYEES PER DEPARTMENT
-- ============================================

SELECT
    department,
    COUNT(employee_id) AS total_employees

FROM Employee

GROUP BY department;



-- ============================================
-- FLIGHTS COSTING MORE THAN 1000
-- ============================================

SELECT
    flight_number,
    ticket_price

FROM Flight

WHERE ticket_price > 1000;



-- ============================================
-- AIRLINE AIRPLANE COUNTS
-- ============================================

SELECT
    airline_name,
    total_airplanes

FROM Airline;



-- ============================================
-- CUSTOMER BOOKING DETAILS
-- ============================================

SELECT
    c.first_name,
    c.last_name,
    f.flight_number,
    f.departure_airport,
    f.arrival_airport,
    t.seat_number

FROM Customer c

JOIN Ticket t
ON c.customer_id = t.customer_id

JOIN Flight f
ON t.flight_id = f.flight_id;