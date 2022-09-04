ALTER TABLE llx_dolifarm_harvests ADD FOREIGN KEY (fk_cropplan) references llx_dolifarm_cropplans(rowid) on UPDATE cascade on DELETE restrict;
ALTER TABLE llx_dolifarm_harvests ADD FOREIGN KEY (fk_farm) references llx_societe(rowid) on UPDATE cascade on DELETE restrict;
ALTER TABLE llx_dolifarm_harvests ADD FOREIGN KEY (fk_product) references llx_product(rowid) on UPDATE cascade on DELETE restrict;
ALTER TABLE llx_dolifarm_harvests ADD FOREIGN KEY (fk_ordersupplier) references llx_commande_fournisseur(rowid) on UPDATE cascade on DELETE restrict;

