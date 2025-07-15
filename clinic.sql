CREATE DATABASE clinic;

USE clinic;

CREATE TABLE medicines (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    price DECIMAL(10,2),
    quantity INT
);

CREATE TABLE suppliers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    contact VARCHAR(100)
);

CREATE TABLE branches (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    location VARCHAR(255)
);

CREATE TABLE patients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    age INT,
    contact VARCHAR(100)
);

CREATE TABLE appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT,
    date DATE,
    time TIME,
    status VARCHAR(50)
);
CREATE TABLE checkups (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT,
    details TEXT,
    medicine VARCHAR(255),
    bill DECIMAL(10,2)
);

CREATE TABLE pharmacy (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT,
    medicine VARCHAR(255),
    amount DECIMAL(10,2)
);

CREATE TABLE inventory (
    id INT AUTO_INCREMENT PRIMARY KEY,
    medicine VARCHAR(255),
    batch VARCHAR(50),
    expiry DATE,
    qty INT
);
