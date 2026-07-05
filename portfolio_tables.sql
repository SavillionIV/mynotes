-- =========================================
-- DATABASE TABLE: contact_messages
-- Stores messages submitted from the Contact Me form
-- =========================================
CREATE TABLE contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =========================================
-- DATABASE TABLE: qa_comments
-- Stores questions/comments submitted from the Q&A section
-- =========================================
CREATE TABLE qa_comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    question TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ========================================
--NOTES

--contact_messages stores contact form submissions

--qa_comments stores visitor questions/comments

--created_at automatically saves the submission time
-- ========================================