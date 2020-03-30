CREATE TABLE `klickbar`.`tasks_1` (
  `task_id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `task_description` VARCHAR(45) NOT NULL,
  `task_status` VARCHAR(45) NULL DEFAULT 'tbd',
  PRIMARY KEY (`task_id`));
