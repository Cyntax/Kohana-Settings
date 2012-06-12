-- schema for settings table
-- feel free to add additional fields as per your requirements

CREATE TABLE `settings` (
  `name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `value` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`name`)
) CHARSET=utf8;
