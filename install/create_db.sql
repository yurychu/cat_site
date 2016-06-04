CREATE DATABASE catalog_site;

USE catalog_site;

CREATE TABLE category (
  id INT AUTO_INCREMENT,
  name VARCHAR(50),
  short_name TEXT,
  full_name TEXT,
  active INT,

  PRIMARY KEY (id)

) ENGINE=INNODB;

CREATE TABLE goods (
  id INT AUTO_INCREMENT,
  name VARCHAR(50),
  short_name TEXT,
  full_name TEXT,
  active INT,
  in_stock INT,
  can_be_ordered INT,

  PRIMARY KEY (id)

) ENGINE = INNODB;

CREATE TABLE category_goods (
  id INT AUTO_INCREMENT,
  category_id INT NOT NULL,
  goods_id INT NOT NULL,

  PRIMARY KEY (id),

  FOREIGN KEY (category_id)
    REFERENCES category(id)
    ON DELETE CASCADE,

  FOREIGN KEY (goods_id)
    REFERENCES goods(id)
    ON DELETE CASCADE

) ENGINE=INNODB;
