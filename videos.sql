Create table 'ceque'.'videos'
('video_id' INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
name varchar(100));

ALTER TABLE 'videos'
ADD user_id varchar(35);

ALTER TABLE videos
ADD FOREIGN KEY (user_id) REFERENCES users(user_id);