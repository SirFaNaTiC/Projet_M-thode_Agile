CREATE DATABASE GestionStockDB;
USE GestionStockDB;

DROP TABLE IF EXISTS Product;
DROP TABLE IF EXISTS User;

-- Table User
CREATE TABLE User (
    id INT PRIMARY KEY AUTO_INCREMENT,
    lastname VARCHAR(50),
    firstname VARCHAR(50)
);

-- Table Product
CREATE TABLE Product (
    id INT PRIMARY KEY AUTO_INCREMENT,
    uuid VARCHAR(50),
    name VARCHAR(50),
    quantity INT,
    audit VARCHAR(50),
    dateCreation DATE,
    dateUpdate DATE,
    categorie ENUM('Téléphone', 'PC', 'Imprimante', 'Accessoire Mobile'), user_id INT,
    FOREIGN KEY (user_id) REFERENCES User(id)
);


-- Ajout User
INSERT INTO User (lastname, firstname) VALUES ('GOETINCK', 'Alexandre'), ('BARTHELEMY', 'Nathan'), ('LITOU', 'Alice'), ('BENLAMOUI', 'Ismael'), ('ZOHOUNGBOGBO', 'Anlyou'), ('BAGA', 'Assami');
