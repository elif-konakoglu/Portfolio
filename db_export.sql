-- ============================================
-- Portfolio Database Schema
-- ============================================

CREATE DATABASE IF NOT EXISTS portfolio_db
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE portfolio_db;

-- Projects table
CREATE TABLE IF NOT EXISTS projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    image_url VARCHAR(500) DEFAULT NULL,
    link VARCHAR(500) DEFAULT NULL,
    tags VARCHAR(500) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Contact messages table
CREATE TABLE IF NOT EXISTS messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Admin users table
CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL
) ENGINE=InnoDB;

-- Seed default admin (password: admin123 — change immediately in production)
-- Default admin credentials: admin / admin123
-- Generate a new hash with: php -r "echo password_hash('your_password', PASSWORD_BCRYPT);"
INSERT INTO admin (username, password_hash)
VALUES ('admin', '$2y$10$h7C3sXm.RNIUtwcQZBhikOw2Iig5WI4HbceoNRsFcjQAEPijEVkXq')
ON DUPLICATE KEY UPDATE username = username;

-- Seed sample projects
INSERT INTO projects (title, description, image_url, link, tags) VALUES
('AI E-Commerce Platform', 'AI-powered product intelligence platform featuring automated visual tagging and similarity search. Built as a graduation capstone project.', NULL, '#', 'Python, TensorFlow, Computer Vision, AI'),
('Satellite Urban Analytics', 'Deep learning pipeline using YOLOv11 to detect buildings and vehicles from xView satellite imagery for urban development assessment.', NULL, '#', 'Python, YOLOv11, Computer Vision, Deep Learning'),
('SAP ABAP Solutions', 'End-to-end SAP ABAP solutions including ALV reports, SmartForms, and custom interfaces (BAPIs/RFCs) for enterprise workflow automation.', NULL, '#', 'ABAP, SAP, Enterprise Software');
