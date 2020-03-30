CREATE TABLE `klickbar`.`transactions_id` (
  `user_id` INT NOT NULL,
  `month` VARCHAR(45) NOT NULL,
  `date` DATETIME NOT NULL,
  `typ` VARCHAR(45) NOT NULL,
  `amout` FLOAT NOT NULL,
  PRIMARY KEY (`user_id`));
