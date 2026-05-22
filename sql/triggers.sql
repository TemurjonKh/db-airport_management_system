DELIMITER //

-- ============================================
-- PREVENT NEGATIVE SEATS
-- ============================================

CREATE TRIGGER prevent_negative_seats

BEFORE UPDATE ON Flight

FOR EACH ROW

BEGIN

    IF NEW.available_seats < 0 THEN

        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'No available seats remaining';

    END IF;

END //

-- ============================================
-- INCREASE AIRLINE AIRPLANE COUNT
-- ============================================

CREATE TRIGGER increase_airplane_count

AFTER INSERT ON Airplane

FOR EACH ROW

BEGIN

    UPDATE Airline
    SET total_airplanes = total_airplanes + 1
    WHERE airline_id = NEW.airline_id;

END //

-- ============================================
-- DECREASE AIRLINE AIRPLANE COUNT
-- ============================================

CREATE TRIGGER decrease_airplane_count

AFTER DELETE ON Airplane

FOR EACH ROW

BEGIN

    UPDATE Airline
    SET total_airplanes = total_airplanes - 1
    WHERE airline_id = OLD.airline_id;

END //

-- ============================================
-- PREVENT DUPLICATE SEAT BOOKING
-- ============================================

CREATE TRIGGER prevent_duplicate_seat

BEFORE INSERT ON Ticket

FOR EACH ROW

BEGIN

    DECLARE seat_count INT;

    SELECT COUNT(*)
    INTO seat_count
    FROM Ticket
    WHERE flight_id = NEW.flight_id
    AND seat_number = NEW.seat_number;

    IF seat_count > 0 THEN

        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Seat already booked';

    END IF;

END //

-- ============================================
-- DEFAULT ISSUE STATUS
-- ============================================

CREATE TRIGGER default_issue_status

BEFORE INSERT ON AirplaneIssues

FOR EACH ROW

BEGIN

    IF NEW.issue_status IS NULL THEN
        SET NEW.issue_status = 'Open';
    END IF;

END //

DELIMITER ;