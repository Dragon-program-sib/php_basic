-- DROP DATABASE IF EXISTS php1;
-- CREATE DATABASE php1;
USE php1;

DROP TABLE IF EXISTS images;
CREATE TABLE images (
	id SERIAL PRIMARY KEY,
    filename VARCHAR(255) UNIQUE,
    `type` VARCHAR(5) NULL,
    size INT UNSIGNED NULL,
    size_type VARCHAR(3) NULL,
    address VARCHAR(255) NULL COMMENT 'Адрес файла на сервере.',
    likes INT DEFAULT '0'
) COMMENT 'Хранилище изображений.';

INSERT INTO images (filename, `type`, size, size_type, address) VALUES
	('01.jpg', 'jpg', '108', 'KB', '/public/gallery_img/big/'),
    ('02.jpg', 'jpg', '68', 'KB', '/public/gallery_img/big/'),
    ('03.jpg', 'jpg', '68', 'KB', '/public/gallery_img/big/'),
    ('04.jpg', 'jpg', '60', 'KB', '/public/gallery_img/big/'),
    ('05.jpg', 'jpg', '156', 'KB', '/public/gallery_img/big/'),
    ('06.jpg', 'jpg', '87', 'KB', '/public/gallery_img/big/'),
    ('07.jpg', 'jpg', '97', 'KB', '/public/gallery_img/big/'),
    ('08.jpg', 'jpg', '101', 'KB', '/public/gallery_img/big/'),
    ('09.jpg', 'jpg', '79', 'KB', '/public/gallery_img/big/'),
    ('10.jpg', 'jpg', '94', 'KB', '/public/gallery_img/big/'),
    ('11.jpg', 'jpg', '96', 'KB', '/public/gallery_img/big/'),
    ('12.jpg', 'jpg', '136', 'KB', '/public/gallery_img/big/'),
    ('13.jpg', 'jpg', '110', 'KB', '/public/gallery_img/big/'),
    ('14.jpg', 'jpg', '148', 'KB', '/public/gallery_img/big/'),
    ('15.jpg', 'jpg', '109', 'KB', '/public/gallery_img/big/');

DROP TABLE IF EXISTS category;
CREATE TABLE category (
  id INT NOT NULL PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL
) COMMENT 'Категории новостей.';

INSERT INTO category (id, `name`) VALUES
	(3, 'Политика'),
	(4, 'Спорт'),
	(5, 'Игры');

DROP TABLE IF EXISTS news;
CREATE TABLE news (
	id SERIAL PRIMARY KEY,
	title VARCHAR(255) NOT NULL,
	`text` TEXT NOT NULL,
	category_id INT NOT NULL,
	views INT DEFAULT '0',
    
    FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE RESTRICT ON UPDATE RESTRICT
);

INSERT INTO news (title, `text`, category_id) VALUES
	('ВОЗ спрогнозировала появление нового смертоносного вируса', '\r\nМОСКВА, 24 мая — РИА Новости. Рано или поздно человечество столкнется с новой пандемией, 
	которая окажется опаснее нынешней, заявил генеральный директор Всемирной организации здравоохранения (ВОЗ) Тедрос Адханом Гебрейесус.\r\n\"Появится другой вирус, 
	который будет более заразным и смертоносным, чем этот\", — сказал он, выступая на открытии 74-й сессии ВОЗ.\r\nПрохожие на одной из улиц Уханя - РИА Новости, 1920, 
	24.05.2021\r\n10:45\r\nВ МИД Китая прокомментировали сообщения о болезни трех вирусологов до пандемии\r\nПо мнению главы организации, именно борьба с вирусами показывает, 
	что государствам следует сотрудничать друг с другом, а не соревноваться.\r\n\"По факту мы стоим перед выбором: действовать сообща или быть незащищенными\", 
	— заключил Гебрейесус.\r\nВсемирная ассамблея здравоохранения проходит с 24 мая по 1 июня в виртуальном формате. Ее основная тема — борьба с пандемией COVID-19 
	и предотвращение новых глобальных чрезвычайных ситуаций в области здравоохранения. В работе ассамблеи принимают участие делегации со всего мира.', 3),
	('Глава немецкой делегации рассказал о впечатлениях от поездки в Крым', 'СИМФЕРОПОЛЬ, 24 мая — РИА Новости. Жители Германии очень хотят попасть в Крым, чтобы увидеть
	прогресс в развитии полуострова, заявил глава немецкой делегации Виктор Триппель.\r\nДвадцать второго мая 25 граждан ФРГ приехали в российский регион в рамках проекта 
	народной дипломатии \"Мирный Крым — своими глазами. Крымские реалии без европейских домыслов\".\r\n\"Наша дружба будет продолжаться. Мы от всего сердца ездим к вам в гости. 
	Я никого (из участников поездки. — Прим. ред.) не уговаривал, никому деньги не давал. Люди сами приехали — и еще приедут. Все очень хотят попасть в Крым, посмотреть 
	своими глазами, как у вас все здесь замечательно\", — сказал Триппель на встрече в крымском парламенте.\r\n\r\nОн уточнил, что уже не в первый раз привозит немецких 
	туристов на полуостров, подчеркнув, что это безопасный регион.', 3);
    