-- Recipe.sql

-- Drop the database if it already exists (optional, for development purposes)
DROP DATABASE IF EXISTS recipes;

-- Create a new database called recipes
CREATE DATABASE recipes;

-- Switch to the recipes database
USE recipes;

-- Create a table to store recipes
CREATE TABLE IF NOT EXISTS recipes (
	id INT AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(255) NOT NULL,
	description TEXT,
	ingredients TEXT,
	instructions TEXT,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create a table to store user information (if needed)
CREATE TABLE IF NOT EXISTS users (
	id INT AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(50) UNIQUE NOT NULL,
	password VARCHAR(255) NOT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (username, password) VALUES ('root', 'Nintendo64!');

SHOW databases;

SELECT * FROM recipes.recipes;