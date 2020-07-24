CREATE DATABASE Companysmoke;
USE Companysmoke;

CREATE TABLE Category (
    category_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(40) NOT NULL,
	category_img VARCHAR(255),
    CONSTRAINT category__pk PRIMARY KEY (category_id),
    CONSTRAINT category__name__uk UNIQUE (name)
);

CREATE TABLE Product (
	product_id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(40) NOT NULL,
	price FLOAT NOT NULL,
	category_id INT NOT NULL,
	description TEXT,
	product_img VARCHAR(255),
	CONSTRAINT product__pk PRIMARY KEY (product_id),
	CONSTRAINT product__to__category FOREIGN KEY (category_id) REFERENCES Category (category_id),
	CONSTRAINT product__name__uk UNIQUE (category_id, name)
);

CREATE TABLE ProductCategory (
	product_id INT NOT NULL,
	category_id INT NOT NULL,
	CONSTRAINT productcategory__pk PRIMARY KEY (product_id, category_id),
	CONSTRAINT productcategory__to__category FOREIGN KEY (category_id) REFERENCES Category (category_id),
	CONSTRAINT productcategory__to__product FOREIGN KEY (product_id) REFERENCES Product (product_id)
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

UPDATE Product SET description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae felis mollis odio porttitor porttitor ac eu lorem. Praesent tristique ac ex eget sollicitudin. Etiam et ligula quis elit commodo viverra. Suspendisse potenti. Vestibulum fringilla est at mauris convallis semper. Sed fringilla elit eget hendrerit dapibus. Phasellus molestie augue non commodo dictum. Nam varius fringilla libero, sit amet mattis velit. Quisque ut ullamcorper metus. Curabitur bibendum orci nibh, a viverra leo vehicula eget.

Cras fringilla pharetra lobortis. Nullam a tristique nibh. Nam ac viverra risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nulla luctus eros nisl, vitae malesuada tellus fringilla scelerisque. Sed nec ornare nibh, at efficitur lectus. Sed vel pulvinar nulla. Maecenas vel convallis tortor. Aenean ut mollis ligula. Integer quis mattis orci, non bibendum massa. Nam fringilla risus ac convallis aliquam. Nullam at cursus nulla. Quisque tempus sem magna, a rhoncus arcu vestibulum sed. Integer a felis arcu. Mauris porttitor quis erat eget porta. In hac habitasse platea dictumst.';

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

UPDATE News SET preview = 'Cras fringilla pharetra lobortis. Nullam a tristique nibh. Nam ac viverra risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nulla luctus eros nisl, vitae malesuada tellus fringilla scelerisque. Sed nec ornare nibh, at efficitur lectus. Sed vel pulvinar nulla. Maecenas vel convallis tortor.';
UPDATE News SET description = 'Morbi eleifend nibh eu egestas sodales. In fringilla nunc lorem, sed lacinia ex viverra ut. Morbi aliquet nulla convallis libero pretium, ac tempor eros consectetur. Aliquam sit amet egestas dolor, id volutpat turpis. Etiam tempus ligula nec urna venenatis accumsan. In odio justo, interdum a odio ac, feugiat accumsan turpis. Cras ac ipsum ac nisl fermentum vulputate ac non dolor. Sed congue, sapien et aliquam commodo, ipsum quam placerat nibh, vel lobortis arcu nibh et tortor. Donec tempus risus nulla, ut varius orci dapibus et. Curabitur et ex quis dui finibus sodales. Mauris neque justo, tristique sit amet dui sit amet, posuere pellentesque nunc. Vestibulum blandit, est sed faucibus dictum, ex nisl auctor justo, id viverra tellus arcu eu justo. Cras ac ipsum sapien. Proin in magna ipsum. Cras cursus orci mi, ac porta risus scelerisque sit amet. Nam luctus eleifend elementum.';

-----------------------------Feedback---------------------------