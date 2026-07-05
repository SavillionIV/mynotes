CREATE DATABASE IF NOT EXISTS saville_dashboard;
USE saville_dashboard;

-- =========================
-- USERS
-- =========================
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    profile_image VARCHAR(255) DEFAULT 'default-profile.png',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =========================
-- HIGHLIGHTS
-- =========================
CREATE TABLE highlights (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    content VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- =========================
-- PROJECTS
-- status = ongoing / finished
-- =========================
CREATE TABLE projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(150) NOT NULL,
    description TEXT,
    status ENUM('ongoing', 'finished') DEFAULT 'ongoing',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- =========================
-- REMINDERS
-- =========================
CREATE TABLE reminders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    reminder_text VARCHAR(255) NOT NULL,
    due_date DATE NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- =========================
-- NOTES
-- =========================
CREATE TABLE notes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    note_title VARCHAR(150),
    note_content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- =========================
-- SIDEBAR SECTIONS
-- =========================
CREATE TABLE sidebar_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    section_name VARCHAR(100) NOT NULL,
    item_title VARCHAR(150) NOT NULL,
    item_description TEXT,
    image_path VARCHAR(255) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- =========================
-- SAMPLE USER
-- password = password123
-- =========================
INSERT INTO users (full_name, email, password)
VALUES (
    'Saville Young IV',
    'saville@example.com',
    '$2y$10$wH8EwYQ4vY7gX2m3l6vQ1eM4rM5Bz5AVW0e/7T0L7qT4A1H3WzH2K'
);

-- sample highlights
INSERT INTO highlights (user_id, content) VALUES
(1, 'Someone liked a photo'),
(1, 'You completed your dashboard sketch'),
(1, 'New message received');

-- sample projects
INSERT INTO projects (user_id, title, description, status) VALUES
(1, 'Portfolio Dashboard', 'Build the main dashboard page', 'ongoing'),
(1, 'Login System', 'Create secure user login', 'ongoing'),
(1, 'Wireframe Sketch', 'Finished the first hand-drawn layout', 'finished');

-- sample reminders
INSERT INTO reminders (user_id, reminder_text, due_date) VALUES
(1, 'Add profile image upload', '2026-04-20'),
(1, 'Connect notes section to database', '2026-04-22');

-- sample notes
INSERT INTO notes (user_id, note_title, note_content) VALUES
(1, 'First Idea', 'This dashboard should track my personal growth, studies, and projects.');

-- sample sidebar items
INSERT INTO sidebar_items (user_id, section_name, item_title, item_description) VALUES
(1, 'Household Essentials', 'Cleaning Supplies', 'Soap, bleach, gloves'),
(1, 'My Autobiography', 'Chapter 1', 'Growing up and moving through the west'),
(1, 'My Current Studies', 'PHP and MySQL', 'Learning backend development'),
(1, 'Activities & More', 'Camping', 'Outdoor skills and survival'),
(1, 'Projects & Growth Plan', 'Website Build', 'Developing my personal portfolio');