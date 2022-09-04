-- Information about the agricolture activities

ALTER TABLE  llx_dolifarm_cropplans ADD FOREIGN KEY (fk_farm) references llx_societe(rowid) on UPDATE cascade on DELETE restrict ;
ALTER TABLE  llx_dolifarm_cropplans ADD FOREIGN KEY (fk_croptype) references llx_dolifarm_crops (rowid) on UPDATE cascade on DELETE restrict	 ;
ALTER TABLE  llx_dolifarm_cropplans ADD FOREIGN KEY (fk_project) references llx_projet (rowid) on UPDATE cascade on DELETE restrict	 ;
ALTER TABLE  llx_dolifarm_cropplans ADD FOREIGN KEY (fk_plot) references llx_dolifarm_plots (rowid) on UPDATE cascade on DELETE restrict	 ;
