CREATE TABLE products(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    image VARCHAR(255),
    description LONGTEXT,
    price DECIMAL(13, 2),
    stock INT(11),
    discount INT(11),
    user_id INT(11)
)

-- ADD FOREIGN KEY CONSTRAINT
CONSTRAINT user_id INT(11) FOREIGN KEY (id) REFERENCES users(id)
ALTER TABLE products ADD FOREIGN KEY (user_id) REFERENCES users(id)