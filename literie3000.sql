CREATE DATABASE literie3000 CHARACTER SET utf8 COLLATE utf8_general_ci;

use literie3000;




CREATE TABLE mattress (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name varchar(50) not null,
    size varchar(50) not null,
    brand varchar(50) not null,
    price smallint not null,
    picture varchar(256)

);

INSERT INTO mattress
(name, size, brand, price, picture)
VALUES
("Isamel", "90x190", "Epeda", 529, "https://www.allomatelas.com/USER/img/produits/HD/4440.jpg"),
("José", "90x190", "Dreamway", 709, "https://cdn2.conforama.fr/product/image/bb19/G_CNF_Q89836312_B.jpeg");