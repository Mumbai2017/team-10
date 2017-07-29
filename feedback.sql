CREATE TABLE `ceque`.`feedback` 
(`dt_time` datetime,`lp_id` int ,`feedback` varchar(250),
 `feedback_id` int primary key AUTO_INCREMENT NOT NULL,foreign key(`lp_id`) references learning_plan(`lp_id`));