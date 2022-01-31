CREATE TABLE users
(
    id         INT NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(20) NOT NULL,
    last_name  VARCHAR(20) NOT NULL,
    email      VARCHAR(30) NOT NULL,
    phone      VARCHAR(12) NOT NULL,
    password   VARCHAR(80) NOT NULL,
    PRIMARY KEY (id),
    UNIQUE (email)
) ENGINE=InnoDB CHARACTER SET utf8mb4