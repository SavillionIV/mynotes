CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE,
    password_hash VARCHAR(255)
);

CREATE TABLE pages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) UNIQUE,
    slug VARCHAR(255) UNIQUE,
    content TEXT NOT NULL,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    author_id INT,
    FOREIGN KEY (author_id) REFERENCES users(id)
);

CREATE TABLE revisions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    page_id INT,
    content TEXT,
    edited_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    editor_id INT,
    FOREIGN KEY (page_id) REFERENCES pages(id),
    FOREIGN KEY (editor_id) REFERENCES users(id)
);