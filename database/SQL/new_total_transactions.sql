CREATE TABLE `klickbar`.`total_amounts_1` (
  `ta_id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `month` VARCHAR(45) NOT NULL,
  `year` VARCHAR(45) NOT NULL,
  `total_income` VARCHAR(45) NULL DEFAULT 0,
  `total_exp` VARCHAR(45) NULL DEFAULT 0,
  PRIMARY KEY (`ta_id`));
