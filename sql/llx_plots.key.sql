-- Information about the agricolture activities

ALTER TABLE  llx_dolifarm_plots ADD FOREIGN KEY (fk_farm)  references llx_societe (rowid) on UPDATE cascade on DELETE restrict	;
