drop table PersonalProfile;
drop table PersonalAva;
drop table CompanyProfile;
drop table Project;
drop table Positions;
drop table Applications;
drop table Users;

CREATE TABLE Users(
user_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
username VARCHAR(20) NOT NULL,
password VARCHAR(20) NOT NULL,
usertype CHAR(1) NOT NULL
);
##usertype(0:personal 1:company)

CREATE TABLE PersonalProfile(
pp_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
F_name VARCHAR(20) NOT NULL,
L_name VARCHAR(20) NOT NULL,
photo VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL,
phone VARCHAR(50) NOT NULL,
provence VARCHAR(50) NOT NULL,
city VARCHAR(50) NOT NULL,
address VARCHAR(100) NOT NULL,
short_desc VARCHAR(255),
user_id INT NOT NULL,
CONSTRAINT user_pp_fk FOREIGN KEY(user_id) REFERENCES Users(user_id)
);

CREATE TABLE PersonalAva(
pa_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
pp_id INT NOT NULL,
period_start TIMESTAMP NOT NULL,
period_end TIMESTAMP NOT NULL,
per_hours DOUBLE,
CONSTRAINT pa_pp_fk FOREIGN KEY(pp_id) REFERENCES PersonalProfile(pp_id)
);

CREATE TABLE CompanyProfile(
cp_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
company_name VARCHAR(100) NOT NULL,
reg_no  VARCHAR(50) NOT NULL,
office_address VARCHAR(100) NOT NULL,
telephone VARCHAR(50) NOT NULL,
phone VARCHAR(50) NOT NULL,
contact_person VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL,
short_desc VARCHAR(255),
user_id INT NOT NULL,
CONSTRAINT user_cp_fk FOREIGN KEY(user_id) REFERENCES Users(user_id)
);

CREATE TABLE Project(
pro_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
cp_id INT NOT NULL,
pro_name VARCHAR(100) NOT NULL,
start_time TIMESTAMP NOT NULL,
project_desc VARCHAR(255) NOT NULL,
project_hours DOUBLE NOT NULL,
CONSTRAINT ca_pr_fk FOREIGN KEY(cp_id) REFERENCES CompanyProfile(cp_id)
);

CREATE TABLE Positions(
pos_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
pro_id INT NOT NULL,
pos_type CHAR(1) NOT NULL,
pos_name VARCHAR(100) NOT NULL,
work_hours DOUBLE NOT NULL,
hours_rate DOUBLE NOT NULL,
position_desc VARCHAR(255) NOT NULL,
requirements VARCHAR(255) NOT NULL,
CONSTRAINT pr_po_fk FOREIGN KEY(pro_id) REFERENCES Project(pro_id)
);
##pos_type(0:personal 1:company)

CREATE TABLE Applications(
app_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
pro_id INT,
pp_id INT,
letter VARCHAR(255) NOT NULL,
CONSTRAINT pr_app_fk FOREIGN KEY(pro_id) REFERENCES Project(pro_id),
CONSTRAINT pa_app_fk FOREIGN KEY(pp_id) REFERENCES PersonalProfile(pp_id)
);