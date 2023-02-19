-- INformations 
CREATE TABLE llx_dolifarm_cropsfarms(
	rowid INTEGER (11)  AUTO_INCREMENT PRIMARY KEY,
        fk_crop INTEGER(11),
        fk_farm INTEGER(11),
		note_private TEXT,
		note_public TEXT,
		status INTEGER (11),
		model_pdf VARCHAR(30),
		tms TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
		author VARCHAR(30)
)ENGINE=InnoDB;
