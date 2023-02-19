-- INformations 

CREATE TABLE llx_dolifarm_crops(
	rowid INTEGER  AUTO_INCREMENT PRIMARY KEY,
        code VARCHAR(15),
        crop VARCHAR(50),
        latingenus VARCHAR(50),
        localname VARCHAR(50),
        family VARCHAR(50),
        species VARCHAR(50),
        photo VARCHAR(130),
        plantingrate FLOAT DEFAULT '0',  -- per ettaro
        def_plantingunit VARCHAR(30),   
        estimatedyield FLOAT,   -- per ettaro
		def_estimatedyield VARCHAR(30),
		note_private TEXT,
		note_public TEXT,
        active BOOLEAN,
		lang VARCHAR(6),
		model_pdf VARCHAR(30),
		status INTEGER(11),
		tms TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
		author VARCHAR(30)
)ENGINE=InnoDB;
