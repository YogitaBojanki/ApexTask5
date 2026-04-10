CREATE DATABASE job_portal;
USE job_portal;

-- Users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    role ENUM('user','admin') DEFAULT 'user'
);

-- Jobs
CREATE TABLE jobs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    company VARCHAR(100),
    location VARCHAR(100),
    description TEXT
);

-- Applications
CREATE TABLE applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    job_id INT,
    applied_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);