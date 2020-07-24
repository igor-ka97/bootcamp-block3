CREATE DATABASE Companysmoke;
USE Companysmoke;

CREATE TABLE Category (
    category_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(40) NOT NULL,
	category_img VARCHAR(255),
    CONSTRAINT category__pk PRIMARY KEY (category_id)
);

CREATE TABLE Product (
	product_id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(40) NOT NULL,
	price FLOAT NOT NULL,
	category_id INT NOT NULL,
	description TEXT,
	product_img VARCHAR(255),
	CONSTRAINT product__pk PRIMARY KEY (product_id),
	CONSTRAINT product__to__category FOREIGN KEY (category_id) REFERENCES Category (category_id) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT product__name__uk UNIQUE (category_id, name)
);

CREATE TABLE ProductCategory (
	product_id INT NOT NULL,
	category_id INT NOT NULL,
	CONSTRAINT productcategory__pk PRIMARY KEY (product_id, category_id),
	CONSTRAINT productcategory__to__category FOREIGN KEY (category_id) REFERENCES Category (category_id) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT productcategory__to__product FOREIGN KEY (product_id) REFERENCES Product (product_id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE News (
	news_id INT NOT NULL AUTO_INCREMENT,
	title VARCHAR(255) NOT NULL,
	date DATE NOT NULL,
	preview TEXT,
	description TEXT,
	CONSTRAINT news__pk PRIMARY KEY (news_id)
);

CREATE TABLE Feedback (
	feedback_id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(40) NOT NULL,
	email VARCHAR(40) NOT NULL,
	phone VARCHAR(20),
	massage TEXT NOT NULL,
	CONSTRAINT feedback__pk PRIMARY KEY (feedback_id)
);

-----------------------------Category---------------------------
INSERT INTO Category VALUES(default, 'Электронные сигареты', 'source/img/category-1.jpg');
INSERT INTO Category VALUES(default, 'Трубки', 'source/img/category-2.jpg');
INSERT INTO Category VALUES(default, 'Жидкости и заправки', 'source/img/category-3.jpg');
INSERT INTO Category VALUES(default, 'Аккумуляторы и атомайзеры', 'source/img/category-4.jpg');
INSERT INTO Category VALUES(default, 'Картриджи', 'source/img/category-5.jpg');
INSERT INTO Category VALUES(default, 'Зарядные устройства', 'source/img/category-6.jpg');
INSERT INTO Category VALUES(default, 'Аксессуары', 'source/img/category-7.jpg');
INSERT INTO Category VALUES(default, 'Подарочные наборы', 'source/img/category-8.jpg');
INSERT INTO Category VALUES(default, 'Другое', NULL);

-----------------------------Product---------------------------
INSERT INTO Product VALUES(default, 'Продукт 1', 1470, 1, '', 'source/img/product-image-1.jpg');
INSERT INTO Product VALUES(default, 'Продукт 2', 4520.50, 5, '', 'source/img/product-image-1.jpg');
INSERT INTO Product VALUES(default, 'Продукт 3', 128, 7, '', 'source/img/product-image-1.jpg');
INSERT INTO Product VALUES(default, 'Продукт 4', 3900, 3, '', 'source/img/product-image-1.jpg');
INSERT INTO Product VALUES(default, 'Продукт 5', 199.99, 2, '', 'source/img/product-image-1.jpg');
INSERT INTO Product VALUES(default, 'Продукт 6', 450, 4, '', 'source/img/product-image-1.jpg');
INSERT INTO Product VALUES(default, 'Продукт 7', 139.90, 6, '', 'source/img/product-image-1.jpg');
INSERT INTO Product VALUES(default, 'Продукт 8', 550, 8, '', 'source/img/product-image-1.jpg');
INSERT INTO Product VALUES(default, 'Продукт 9', 989.90, 1, '', 'source/img/product-image-1.jpg');
INSERT INTO Product VALUES(default, 'Продукт 10', 123, 5, '', 'source/img/product-image-1.jpg');
INSERT INTO Product VALUES(default, 'Продукт 11', 845, 3, '', 'source/img/product-image-1.jpg');

UPDATE Product SET description = 'Мы вынуждены отталкиваться от того, что современная методология разработки предоставляет широкие возможности для укрепления моральных ценностей. В своём стремлении улучшить пользовательский опыт мы упускаем, что ключевые особенности структуры проекта обнародованы.

Стремящиеся вытеснить традиционное производство, нанотехнологии неоднозначны и будут объективно рассмотрены соответствующими инстанциями. Приятно, граждане, наблюдать, как представители современных социальных резервов ограничены исключительно образом мышления.

Принимая во внимание показатели успешности, высококачественный прототип будущего проекта в значительной степени обусловливает важность модели развития. Внезапно, некоторые особенности внутренней политики призваны к ответу. Вот вам яркий пример современных тенденций - высококачественный прототип будущего проекта предоставляет широкие возможности для переосмысления внешнеэкономических политик. А ещё элементы политического процесса неоднозначны и будут преданы социально-демократической анафеме.';

-----------------------------ProductCategory---------------------------
INSERT INTO ProductCategory VALUES (1, 4);
INSERT INTO ProductCategory VALUES (1, 5);
INSERT INTO ProductCategory VALUES (1, 8);
INSERT INTO ProductCategory VALUES (1, 9);
INSERT INTO ProductCategory VALUES (2, 1);
INSERT INTO ProductCategory VALUES (2, 8);
INSERT INTO ProductCategory VALUES (3, 5);
INSERT INTO ProductCategory VALUES (3, 9);
INSERT INTO ProductCategory VALUES (4, 4);
INSERT INTO ProductCategory VALUES (5, 5);
INSERT INTO ProductCategory VALUES (5, 8);
INSERT INTO ProductCategory VALUES (6, 9);
INSERT INTO ProductCategory VALUES (7, 4);
INSERT INTO ProductCategory VALUES (8, 5);
INSERT INTO ProductCategory VALUES (8, 1);
INSERT INTO ProductCategory VALUES (8, 9);
INSERT INTO ProductCategory VALUES (9, 4);
INSERT INTO ProductCategory VALUES (11, 8);
INSERT INTO ProductCategory VALUES (11, 9);

-----------------------------News---------------------------
INSERT INTO News VALUES (default, 'Собрание правления киевского филиала', '2010-03-03', NULL, NULL);
INSERT INTO News VALUES (default, 'Петропавловскому офису международной корпорации Хуа Шен исполнился 1 год', '2010-02-23', NULL, NULL);
INSERT INTO News VALUES (default, 'Проведение церемонии награждения в бишкекском филиале', '2010-02-22', NULL, NULL);
INSERT INTO News VALUES (default, 'Сотрудники иркутского филиала отметили китайский новый', '2010-02-15', NULL, NULL);
INSERT INTO News VALUES (default, 'Празднование китайского нового года в одесском филиале', '2010-02-14', NULL, NULL);
INSERT INTO News VALUES (default, 'ЦБ РФ снизил ключевую ставку до рекордного минимума в 4,25%', '2010-03-08', NULL, NULL);
INSERT INTO News VALUES (default, 'В Минздраве назвали срок снятия всех ограничений по коронавирусу', '2010-03-18', NULL, NULL);
INSERT INTO News VALUES (default, 'РФС утвердил календарь РПЛ на новый сезон', '2010-02-12', NULL, NULL);

UPDATE News SET preview = 'Имеется спорная точка зрения, гласящая примерно следующее: ключевые особенности структуры проекта и по сей день остаются уделом либералов, которые жаждут быть призваны к ответу.';
UPDATE News SET description = 'Приятно, граждане, наблюдать, как ключевые особенности структуры проекта, которые представляют собой яркий пример континентально-европейского типа политической культуры, будут указаны как претенденты на роль ключевых факторов. Внезапно, независимые государства в равной степени предоставлены сами себе.

Современные технологии достигли такого уровня, что современная методология разработки способствует повышению качества своевременного выполнения сверхзадачи. Но экономическая повестка сегодняшнего дня влечет за собой процесс внедрения и модернизации прогресса профессионального сообщества. Повседневная практика показывает, что разбавленное изрядной долей эмпатии, рациональное мышление представляет собой интересный эксперимент проверки системы массового участия. С учётом сложившейся международной обстановки, укрепление и развитие внутренней структуры требует определения и уточнения укрепления моральных ценностей.';

-----------------------------Feedback---------------------------