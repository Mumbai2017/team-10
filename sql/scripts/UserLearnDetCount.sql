create table user_learnDet_count
(
	user_id varchar(35),
	lessonNo int,
	FOREIGN KEY (user_id) REFERENCES users(user_id)
);