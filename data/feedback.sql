USE php1;

DROP TABLE IF EXISTS feedback;
CREATE TABLE feedback (
	id SERIAL PRIMARY KEY,
    `name` VARCHAR(50) NOT NULL,
    feedback TEXT NOT NULL
);

INSERT INTO feedback(`name`, feedback) VALUES
	('Григорий', 'Ваш ресурс оказался мне полезен! Спасибо!'),
    ('Марина', 'Купила здесь товар, который давно искала. Я счастлива.)'),
    ('Mark', 'Thank You!');
