-- Information about the agricolture activities

CREATE TABLE llx_dolifarm_cropplans(
	rowid INTEGER AUTO_INCREMENT PRIMARY KEY,
		ref VARCHAR(255),
		label VARCHAR(128),
        fk_plot INTEGER,
        fk_croptype INTEGER,
		fk_farm INTEGER,
		fk_project INTEGER,
		startdate DATE,
        finishdate DATE,
        note_private TEXT,
		note_public TEXT,
        estimatedyield FLOAT,
        def_estimatedyieldunit VARCHAR(30),
        def_yieldtodateunit VARCHAR(30),
        estimatedqty FLOAT,
        def_estimatedqty VARCHAR(30),
        yieldtodate FLOAT,
        actualcost FLOAT,
		costmaterial FLOAT,
        costmanpower FLOAT,
        costenergy FLOAT,
        status INTEGER(11),
		tms TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
		author VARCHAR(30),
		model_pdf VARCHAR(30),	
		last_model_pdf    VARCHAR(256)
)ENGINE=InnoDB;
