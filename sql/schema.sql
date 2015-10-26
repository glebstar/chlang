CREATE TABLE `teacher` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(30) NOT NULL,
    `gender` VARCHAR(1) NOT NULL,
    `phone` VARCHAR(15) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `teacher_of_name` (`name`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `levellang` (
    `id` INT(1) UNSIGNED NOT NULL,
    `value` VARCHAR(2),
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `levellang` VALUES(1, 'A1');
INSERT INTO `levellang` VALUES(2, 'A2');
INSERT INTO `levellang` VALUES(3, 'B1');
INSERT INTO `levellang` VALUES(4, 'B2');
INSERT INTO `levellang` VALUES(5, 'C1');
INSERT INTO `levellang` VALUES(6, 'C2');

CREATE TABLE `learner` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(30) NOT NULL,
    `email` VARCHAR(30) NOT NULL,
    `birthday` Date NOT NULL,
    `levellang_id` INT(1) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `learner_of_name` (`name`),
    KEY `learner_of_birthday` (`birthday`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tlrel` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `teacher_id` INT(11) NOT NULL,
    `learner_id` INT(11) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `tlrel_of_teacher_id` (`teacher_id`),
    KEY `tlrel_of_learner_id` (`learner_id`),
    KEY `trel_of_combined` (`teacher_id`,`learner_id`)
  ) ENGINE=InnoDB;