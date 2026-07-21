CREATE TABLE triark_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(64),
    lid VARCHAR(64),
    lpw VARCHAR(255),
    kanri_flg INT DEFAULT 0,
    life_flg INT DEFAULT 0
);