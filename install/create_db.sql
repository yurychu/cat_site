CREATE DATABASE catalog_site;

USE catalog_site;

CREATE TABLE category (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50),
  short_name TEXT,
  full_name TEXT,
  active INT
);

CREATE TABLE goods (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50),
  short_name TEXT,
  full_name TEXT,
  active INT,
  in_stock INT,
  can_be_ordered INT
);
