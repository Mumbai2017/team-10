create table 'ceque'.'units'

(	'unit_name' varchar(40), 
	'unit_id' INT NOT NULL AUTO_INCREMENT  PRIMARY KEY,
	'subj_id' int,'std_id' int, 
	'user_id' varchar(35),
	'no_of_lesson' int ,
	theme_unit varchar(50) ;
	
	foreign key('subj_id') references subjects('subj_id'),
	foreign key('std_id') references standards('std_id')
	foreign key('user_id') references users('user_id')
);