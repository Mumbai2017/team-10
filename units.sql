create table 'ceque'.'units'

(	'unit_name' varchar(40), 
	'unit_id' INT NOT NULL AUTO_INCREMENT  PRIMARY KEY,
	'subj_id' int,'std_id' int, 
	foreign key('subj_id') references subjects('subj_id'),
	foreign key('std_id') references standards('std_id')
);