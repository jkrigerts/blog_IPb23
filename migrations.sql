-- 1. Izveidot datubāzi
CREATE DATABASE blog_ipb23;

-- 2. Izmantot datu bāzi
USE blog_ipb23;

-- 3. Izveidot tabulu
CREATE TABLE posts (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	content VARCHAR(5200)
);

-- 4. Ielikt saturu posts tabulā
INSERT INTO posts
(content)
VALUES
("Ziemassvētki nāk 🎄"),
("Otrs bloga ieraksts"),
("Kā pagatavot siermaizi?");

SELECT * FROM posts;

