CREATE DATABASE GestionStockDB;
USE GestionStockDB;

-- Table User
CREATE TABLE User (
    id INT PRIMARY KEY AUTO_INCREMENT,
    lastname VARCHAR(50),
    firstname VARCHAR(50),
    role ENUM('admin', 'customer', 'vendor'),
    age INT,
    password VARCHAR(50)
);

-- Table Categorie
CREATE TABLE Categorie (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    description VARCHAR(255)
);

-- Table Product
CREATE TABLE Product (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    statut ENUM('available', 'unavailable'),
    price DOUBLE,
    dateExpiration DATE,
    categorie_id INT,
    FOREIGN KEY (categorie_id) REFERENCES Categorie(id)
);


