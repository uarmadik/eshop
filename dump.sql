-- Create table 'menu'

CREATE TABLE `category` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	`url` VARCHAR(255) NULL DEFAULT NULL,
	`parent_id` INT(11) NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=8
;

-- Dump data to 'menu' table

INSERT INTO `category` VALUES
(1, 'category-1', 'category1', null),
(2, 'category-2', 'category2', null),
(3, 'category-3', 'category3', null),
(4, 'category-1.1', 'category1_1', 1),
(5, 'category-1.2', 'category1_2', 1),
(6, 'category-1.1.1', 'category1_1_1', 4),
(7, 'category-2.2', 'category2_2', 3);

-- Create table 'products'

CREATE TABLE `products` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	`url` VARCHAR(255) DEFAULT NULL,
	`image` VARCHAR(255) DEFAULT NULL,
	`description` TEXT DEFAULT NULL,
	`price` INT(5) DEFAULT NULL,
	`category_id` INT(11) DEFAULT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=8
;

INSERT INTO `products` VALUES
  (null, 'product-1', 'product1', null, null, 10, 1),
  (null, 'product-2', 'product2', null, null, 11, 1),
  (null, 'product-3', 'product3', null, null, 10, 2),
  (null, 'product-4', 'product4', null, null, 10, 3);