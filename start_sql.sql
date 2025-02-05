CREATE TABLE Products (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    PRODUCT_ID VARCHAR(50) NOT NULL,
    PRODUCT_NAME VARCHAR(255) NOT NULL,
    PRODUCT_PRICE DECIMAL(10, 2) NOT NULL,
    PRODUCT_ARTICLE VARCHAR(100) NOT NULL,
    PRODUCT_QUANTITY INT NOT NULL,
    DATE_CREATE DATETIME DEFAULT CURRENT_TIMESTAMP,
    HIDDEN_PRODUCT BOOLEAN DEFAULT 0 
);
INSERT INTO Products (PRODUCT_ID, PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_ARTICLE, PRODUCT_QUANTITY, DATE_CREATE, HIDDEN_PRODUCT)
VALUES
    ('P001', 'Product 1', 10.50, 'ART001', 15, '2024-06-17 12:00:00', 0),
    ('P002', 'Product 2', 25.99, 'ART002', 30, '2024-06-16 14:15:00', 0),
    ('P003', 'Product 3', 7.75, 'ART003', 50, '2024-06-15 10:30:00', 0),
    ('P004', 'Product 4', 15.20, 'ART004', 20, '2024-06-17 09:45:00', 0),
    ('P005', 'Product 5', 99.99, 'ART005', 5, '2024-06-14 08:00:00', 0),
    ('P006', 'Product 6', 45.00, 'ART006', 8, '2024-06-13 13:25:00', 0),
    ('P007', 'Product 7', 12.30, 'ART007', 25, '2024-06-12 15:10:00', 0),
    ('P008', 'Product 8', 60.40, 'ART008', 12, '2024-06-11 18:20:00', 0),
    ('P009', 'Product 9', 30.00, 'ART009', 40, '2024-06-10 11:05:00', 0),
    ('P010', 'Product 10', 5.50, 'ART010', 100, '2024-06-09 07:00:00', 0);
