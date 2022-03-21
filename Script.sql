CREATE TABLE IF NOT EXISTS `products` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `p_sku` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_price` double NOT NULL,
  `p_type` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `dvd` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `size` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  foreign key (p_ID) references products (ID) on delete cascade
) ENGINE=INNODB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS book (
  ID int(11) NOT NULL AUTO_INCREMENT,
  weight varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  p_ID int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  foreign key (p_ID) references products (ID) on delete cascade
) ENGINE=INNODB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `furniture` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `height` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `width` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `length` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  FOREIGN KEY (p_ID) REFERENCES products(ID) on delete cascade
) ENGINE=INNODB DEFAULT CHARSET=latin1;