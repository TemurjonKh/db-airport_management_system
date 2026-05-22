DELIMITER //

-- ============================================
-- BOOK TICKET
-- ============================================

CREATE PROCEDURE BookTicket(
    customer_id_input INT,
    flight_id_input INT,
    ticket_class_input VARCHAR(20),
    seat_number_input VARCHAR(10)
)

BEGIN

    INSERT INTO Ticket (
        customer_id,
        flight_id,
        ticket_class,
        seat_number
    )
    VALUES (
        customer_id_input,
        flight_id_input,
        ticket_class_input,
        seat_number_input
    );

    UPDATE Flight
    SET available_seats = available_seats - 1
    WHERE flight_id = flight_id_input;

END //

-- ============================================
-- ADD LOYALTY POINTS
-- ============================================

CREATE PROCEDURE AddLoyaltyPoints(
    customer_id_input INT,
    loyalty_points_input INT
)

BEGIN

    UPDATE Customer
    SET loyalty_points = loyalty_points + loyalty_points_input
    WHERE customer_id = customer_id_input;

END //

-- ============================================
-- COMPLETE FLIGHT
-- ============================================

CREATE PROCEDURE CompleteFlight(
    flight_id_input INT
)

BEGIN

    UPDATE Flight
    SET flight_status = 'Completed'
    WHERE flight_id = flight_id_input;

END //

-- ============================================
-- UPDATE AIRPLANE STATUS
-- ============================================

CREATE PROCEDURE UpdateAirplaneStatus(
    airplane_id_input INT,
    airplane_status_input VARCHAR(20)
)

BEGIN

    UPDATE Airplane
    SET airplane_status = airplane_status_input
    WHERE airplane_id = airplane_id_input;

END //

DELIMITER ;