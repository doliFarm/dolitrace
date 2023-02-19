-- Information about the agricolture activities

CREATE TABLE llx_dolifarm_cropplans(
	rowid INTEGER AUTO_INCREMENT PRIMARY KEY,
		label VARCHAR(128),
		ref VARCHAR(255),
        startdate DATE,
        finishdate DATE,
        fk_plot INTEGER,
        fk_croptype INTEGER,
		fk_farm INTEGER,
		fk_project INTEGER,
        estimatedyield FLOAT,
        def_estimatedyieldunit VARCHAR(30),
        yieldtodate FLOAT,
        def_yieldtodateunit VARCHAR(30),
        estimatedqty FLOAT,
        def_estimatedqty VARCHAR(30),
        actualcost FLOAT,
		costmaterial FLOAT,
        costmanpower FLOAT,
        costenergy FLOAT,
		note_private TEXT,
		note_public TEXT,
        status INTEGER(11),
        model_pdf VARCHAR(30),
		tms TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
		author VARCHAR(30)		   
)ENGINE=InnoDB;
