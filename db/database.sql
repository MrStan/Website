CREATE DATABASE index;
CREATE TABLE website (
    ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    FirstName varchar(255),
    LastName varchar(255),
    Adress varchar(255),
    PhoneNumber varchar(50),
    Password varchar(255),
    FileName varchar(100)
);
