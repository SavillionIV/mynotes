CREATE TABLE users (
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(80) NOT NULL UNIQUE,
email VARCHAR(255) NOT NULL UNIQUE,
password_hash VARCHAR(255) NOT NULL,
role ENUM('reader','editor','admin') NOT NULL DEFAULT 'reader',
created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE pages (
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
slug VARCHAR(255) NOT NULL UNIQUE,
namespace VARCHAR(32) DEFAULT 'main',
content MEDIUMTEXT NOT NULL,
summary VARCHAR(255) DEFAULT NULL,
author_id INT,
created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
is_deleted TINYINT(1) DEFAULT 0,
FOREIGN KEY (author_id) REFERENCES users(id)
);


CREATE TABLE revisions (
id BIGINT AUTO_INCREMENT PRIMARY KEY,
page_id INT NOT NULL,
content MEDIUMTEXT NOT NULL,
editor_id INT,
summary VARCHAR(255),
created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (page_id) REFERENCES pages(id),
FOREIGN KEY (editor_id) REFERENCES users(id)
);


CREATE TABLE categories (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) UNIQUE
);


CREATE TABLE page_categories (
page_id INT,
category_id INT,
PRIMARY KEY (page_id, category_id),
FOREIGN KEY (page_id) REFERENCES pages(id),
FOREIGN KEY (category_id) REFERENCES categories(id)
);


CREATE TABLE uploads (
id INT AUTO_INCREMENT PRIMARY KEY,
page_id INT,
filename VARCHAR(255),
filepath VARCHAR(255),
mime VARCHAR(100),
size INT,
uploaded_by INT,
uploaded_at DATETIME DEFAULT CURRENT_TIMESTAMP
);


-- Fulltext index for search (MySQL InnoDB supports fulltext in modern versions)
ALTER TABLE pages ADD FULLTEXT(title, content);