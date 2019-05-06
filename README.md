# MotorCheck

This project was created using PHP version 7.2.6 and mysqlnd 5.0.12.
Task

You need to generate a report to display what each seller will receive for that month,
the input for this is attached. In order to generate commissions you must respect the
rules:

1. All salesman never receive less than 7% of commissions
2. Any salesman working in the company for less than one year will not receive
more than 11%
3. All salesman with more than 2 years working to the company will receive at
least 15%.
4. If the total amount of sales reach 200k, the commission will be 8%
5. If the total amount reach more than one million the commission must be 11%
6. Any total amount over 2 millions the commissions is 17%
The expected output is a CSV with the following fields:
* Name
* Date
* Total amount
* Percent
* Commission

## Creating dababase and tables.

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

After that import in sequence sales_team.csv and sales-records.csv.
## To run
save the folder in php server and navigate to http://localhost/motorcheck/bootstrap.php to download the csv file or run in cmd php bootstrap.php 

##approach

To solve the problem of multiple commissions I used Chain of Responsability pattern
I used the pattern 
