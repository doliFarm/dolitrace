-- INformations 
ALTER TABLE  llx_dolifarm_cropsfarms ADD FOREIGN KEY (fk_crop) references llx_dolifarm_crops(rowid) on UPDATE cascade on DELETE restrict		;
ALTER TABLE  llx_dolifarm_cropsfarms ADD FOREIGN KEY (fk_farm) references llx_societe(rowid) on UPDATE cascade on DELETE restrict		;
