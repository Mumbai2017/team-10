CREATE TABLE `ceque`.`learning_plan` ( 

`lp_id` int primary key AUTO_INCREMENT NOT NULL , 
`unit_id` int, `user_id` VARCHAR(35) NOT NULL , 
`name` VARCHAR(35) , 
`purpose` VARCHAR(35) ,`material` varchar(60),  
`objective` VARCHAR(35),`feedback` varchar(35), 
foreign key(`user_id`) REFERENCES users(`user_id`),
foreign key(`unit_id`) references units(`unit_id`) ) ENGINE = InnoDB;