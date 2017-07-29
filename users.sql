Create table `ceque`.`users`
(`user_id` varchar(35) primary key,
`password` varchar(40), 
`role_id` int,
foreign key(`role_id`) references roles(`role_id`));