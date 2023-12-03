-- ============================================================================================
--  
--  |   |   |   |   |   |    Ajout d'une voiture  
--  
-- ============================================================================================
CREATE TRIGGER ajout_voiture
AFTER INSERT ON VOITURE
FOR EACH ROW
BEGIN
    INSERT IGNORE INTO CONDUCTEUR(NUM_CONDUCTEUR)
    SELECT NEW.NUM_CONDUCTEUR
    WHERE NOT EXISTS (
        SELECT 1
        FROM CONDUCTEUR
        WHERE NUM_CONDUCTEUR = NEW.NUM_CONDUCTEUR
    );
END;
%%%