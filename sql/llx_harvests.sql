-- Information about the agricolture activities

CREATE TABLE llx_dolifarm_harvests(
	rowid INTEGER AUTO_INCREMENT PRIMARY KEY,
        date DATE,
		ref VARCHAR(128),
		label VARCHAR(255),
        yield FLOAT,
        def_yieldunit VARCHAR(30), 
        quantity FLOAT,
        def_quantityunit VARCHAR(30),
        tracecode VARCHAR(30),
		fk_cropplan INTEGER (11),
		fk_farm INTEGER (11),
		fk_product INTEGER (11),
	    fk_ordersupplier INTEGER (11),
		note_private TEXT,
		note_public TEXT,
        costmaterial FLOAT,
        costmanpower FLOAT,
        costenergy FLOAT,
        status INTEGER (11),
		tms TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
		author VARCHAR(30)
) Engine=InnoDB;