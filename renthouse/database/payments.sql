CREATE TABLE IF NOT EXISTS payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    property_id VARCHAR(255) NOT NULL,
    user_email VARCHAR(255) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    payment_intent_id VARCHAR(255) NOT NULL,
    status VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (property_id) REFERENCES add_property(property_id),
    FOREIGN KEY (user_email) REFERENCES tenant(email)
); 