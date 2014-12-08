CREATE TABLE `item_claim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_item_claim_item_idx` (`item_id`),
  CONSTRAINT `fk_item_claim_item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

 CREATE TABLE `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `found_user` varchar(45) NOT NULL,
  `found_date` date NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT '1',
  `type_id` int(11) NOT NULL,
  `create_user` varchar(45) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_user` varchar(45) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_item_status_idx` (`status_id`),
  KEY `FK_item_type_idx` (`type_id`),
  CONSTRAINT `FK_item_item_status` FOREIGN KEY (`status_id`) REFERENCES `item_st     atus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_item_item_type` FOREIGN KEY (`type_id`) REFERENCES `item_type`      (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `item_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_user` varchar(30) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `update_user` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `item_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;