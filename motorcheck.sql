

CREATE DATABASE motorcheck;

use motorcheck;


CREATE TABLE `sales_team` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `hiring_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `sales_records` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `salesman_id` int(11) NOT NULL,
  `product` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitary_value` decimal(10,2) NOT NULL,
   CONSTRAINT FK_salesman_id FOREIGN KEY (salesman_id)
    REFERENCES sales_team(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;