CREATE TABLE users (
    id INT IDENTITY(1,1) PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);
INSERT INTO users (username, password, email)
VALUES
    ('admin', 'adminpassword', 'admin@example.com'),
    ('22521608', 'student123', '22521608@gm.uit.edu.vn'),
    ('guest', 'guestpass', 'guest@example.com'),
    ('user1', 'password1', 'user1@email.com'),
    ('user2', 'password2', 'user2@email.com'),
    ('user3', 'password3', 'user3@email.com'),
    ('user4', 'password4', 'user4@email.com'),
    ('user5', 'password5', 'user5@email.com'),
    ('user6', 'password6', 'user6@email.com'),
    ('user7', 'password7', 'user7@email.com');
	select* from users