CREATE DATABASE NOT EXISTS hoapital;

CREATE TABLE Hospital (
    hosp_no INT PRIMARY KEY,
    hname VARCHAR(100),
    hcity VARCHAR(100)
);

CREATE TABLE Doctor (
    doc_no INT PRIMARY KEY,
    dname VARCHAR(100),
    address VARCHAR(255),
    city VARCHAR(100),
    area VARCHAR(100),
    hosp_no INT,
    FOREIGN KEY (hosp_no) REFERENCES Hospital(hosp_no)
);

INSERT INTO Hospital (hosp_no, hname, hcity) VALUES
(1, 'City Hospital', 'New York'),
(2, 'Central Hospital', 'Los Angeles');

INSERT INTO Doctor (doc_no, dname, address, city, area, hosp_no) VALUES
(1, 'Dr. Smith', '123 Main St', 'New York', 'Downtown', 1),
(2, 'Dr. Jones', '456 Elm St', 'Los Angeles', 'Uptown', 2),
(3, 'Dr. Taylor', '789 Maple Ave', 'New York', 'East Side', 1);

insert into doctor dr smith new yark Downtown 1
insert into




