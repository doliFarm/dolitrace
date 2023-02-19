-- Information about the agricolture activities

CREATE TABLE llx_dolifarm_plots(
	rowid INTEGER(11) AUTO_INCREMENT PRIMARY KEY,
	ref VARCHAR(128),
	label VARCHAR(255),
	mapreference VARCHAR(128),
	size FLOAT,
	def_sizeunit INTEGER(11),
	def_organicstatus VARCHAR(30),
	conversionstart DATE,
	conversionfinish DATE,
	note_private TEXT,
	note_public TEXT,	
	fk_farm INTEGER(11),
	tms TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	status INTEGER(11),
	model_pdf VARCHAR(30),
	author VARCHAR(30)
)ENGINE=InnoDB;
