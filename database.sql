CREATE TABLE customers (
	cusId INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	username VARCHAR(10) NOT NULL,
	name VARCHAR(30),
	password VARCHAR(20) NOT NULL,
	email VARCHAR(50),
	buildingNumber VARCHAR(5),
	streetName VARCHAR(30),
	city VARCHAR(30),
	phone CHAR(8) NOT NULL,
	methodOfcontact VARCHAR(30)	
);
	
CREATE TABLE products (
	modelNumber INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	itemImage VARCHAR(100) NOT NULL,
	itemName VARCHAR(100) NOT NULL,
	itemDescription VARCHAR(200),
	price DOUBLE,
	colorsAvailable VARCHAR(100),
	availability VARCHAR(30)
);

INSERT INTO products (modelNumber, itemImage, itemName, itemDescription, price, colorsAvailable, availability) VALUES
(1, '../images/Chandeliers/c1.jpg', 'Crystal Ball Wedding Cake Lantern', 'From the powder room to dressing room, this crystal powerhouse is a light
you''ll love. This lantern is the perfect size for lower ceilings or smaller spaces. Assembly required.', 1800, 'Chrome, Gold, Bronze', 10);

INSERT INTO products (modelNumber, itemImage, itemName, itemDescription, price, colorsAvailable, availability) VALUES
(2, '../images/Chandeliers/c2.jpg', 'Cascading Crystal Orbs Mini Chandelier', 'This mini chandelier is an elegant lighting fixture made with a series
of cascading crystal orbs, each faceted to reflect the light of a single 40-watt bulb.', 1500.75, 'Aged Polished Brass', 8);

INSERT INTO products (modelNumber, itemImage, itemName, itemDescription, price, colorsAvailable, availability) VALUES
(3, '../images/Chandeliers/c3.jpg', 'Contempo Arabesque Chandelier', 'Moroccan architectural details inspire the styling of the Contempo Arabesque 
Collection. Clean and simple in trending metallic finishes, adds soft sophistication to a foyer, dining room, or bedroom.', 1410.5, 'Antique Silver, 
Aged Gold', 7);

INSERT INTO products (modelNumber, itemImage, itemName, itemDescription, price, colorsAvailable, availability) VALUES
(4, '../images/Chandeliers/c4.jpg', 'Crystal Dandelion Chandelier', 'This sparkling chandelier merges glamour and whimsy with crystal bedazzled stems 
branching into a glittering globe.', 4500.5, 'Aged Brass, Polished Nickel', 15);

INSERT INTO products (modelNumber, itemImage, itemName, itemDescription, price, colorsAvailable, availability) VALUES
(5, '../images/Chandeliers/c5.jpg', 'Elegance Crystal Swag Chandelier', 'Imagine the passion that this sparkling oxidized gold leaf frame inspires 
with its dazzling cut crystal pendalogues and swags in 3 graceful tiers. Crystal assembly by customer.', 2000, 'Oxidized Gold', 9);

INSERT INTO products (modelNumber, itemImage, itemName, itemDescription, price, colorsAvailable, availability) VALUES
(6, '../images/Chandeliers/c6.jpg', 'Luna 3 Light Circlet Chandelier', 'The Luna 3 Light Circlet Chandelier asserts a gravitational pull that is 
undeniably classic - featuring soft curves that surround a 3 light candelabra.', 1250.5, 'Gold', 18);

INSERT INTO products (modelNumber, itemImage, itemName, itemDescription, price, colorsAvailable, availability) VALUES
(7, '../images/Chandeliers/c7.jpg', 'Modern Diamond Prism Lantern', 'This light pendant has an edgy modern design that will not go unnoticed!', 
1560.5, 'Matte White Satin Brass,  Matte Black Satin Brass', 6);

INSERT INTO products (modelNumber, itemImage, itemName, itemDescription, price, colorsAvailable, availability) VALUES
(8, '../images/Chandeliers/c8.jpg', 'Modern Faceted Glass Layered Chandelier', 'This modern take on the classic empire style crystal chandelier 
is a blend of sleek banding adorned with five sided clear glass crystals.', 3200.5, 'Chrome, Bronze', 11);

INSERT INTO products (modelNumber, itemImage, itemName, itemDescription, price, colorsAvailable, availability) VALUES
(9, '../images/Chandeliers/c9.jpg', 'Prism Faceted Glass Layered Chandelier', 'Contemporary and elegant, the three layers of faceted rectangular 
crystals cascade down a Bronze or Chrome circular frame giving this chandelier a sophisticated air.', 5300.75, 'Chrome, Bronze', 5);
INSERT INTO products (modelNumber, itemImage, itemName, itemDescription, price, colorsAvailable, availability) VALUES
(10, '../images/Chandeliers/c10.jpg', 'Rotating Frame Linear Chandelier', 'This simple design creates a unique display. Our Rotating Frame 
Chandelier is built in such a way that you can open the arms into a square formation, or close them into a rectangular formation.', 1600, 
'Chrome, Oil Rubbed Bronze', 14);

INSERT INTO products (modelNumber, itemImage, itemName, itemDescription, price, colorsAvailable, availability) VALUES
(11, '../images/Chandeliers/c11.jpg', 'Modern Glam Shaded Crystal Chandelier', 'A sleek modern chandelier is adorned with dazzling crystals under a 
sheer drum shade for the ultimate in style and sophistication.', 2000.5, 'Chrome, Aged Brass', 7);

INSERT INTO products (modelNumber, itemImage, itemName, itemDescription, price, colorsAvailable, availability) VALUES
(12, '../images/Chandeliers/c12.jpg', 'Shell And Crystal Drum Shade Chandelier', 'Dress up your coastal cottage dining room with clean modern style!
This 6 light drum shade chandelier has a gold frame that suspends a curtain of mother of pearl shell shapes and crystals. ', 
2750.75, 'Aged Gold / White', 10);

INSERT INTO products (modelNumber, itemImage, itemName, itemDescription, price, colorsAvailable, availability) VALUES
(13, '../images/Chandeliers/c13.jpg', 'Sophisticated Sophie Chandelier', 'Multiple rows of graduated beads grace the metal frame of this elegant and
contemporary basket chandelier.', 2900, 'Antique Gold Frosted Glass, Matte Black Frosted Glass, Antique Gold Clear Crystal', 8);
 
INSERT INTO products (modelNumber, itemImage, itemName, itemDescription, price, colorsAvailable, availability) VALUES 
(14, '../images/Chandeliers/c14.jpg', 'Young House Love Metal Strap Convertible Chandelier', 'The whimsical range of colours makes this one of 
our most versatile lights, suitable for industrial to modern spaces. Find the YHL colour that makes you smile!', 1000, 
'Polished Nickel Snow Day White, Polished Nickel Midnight Black, Black Metallic Gold', 5);

INSERT INTO products (modelNumber, itemImage, itemName, itemDescription, price, colorsAvailable, availability) VALUES
(15, '../images/Chandeliers/c15.jpg', 'Young House Love Cascade Capiz Chandelier', 'What makes this capiz shell chandelier delightfully 
different from all the rest are the almost 3 inches diameter capiz discs making them a unique stand-out.', 1999.75, 'Gold Leaf White Capiz 
Shells, Polished Nickel White Capiz Shells', 10);

CREATE TABLE orders (
	modelNumber INT,
	cusId INT,
	price INT,
	quantity INT,
	totalAmount DOUBLE,
	orderDate DATE,
	deliveryMethod VARCHAR(30),
	CONSTRAINT PK_orders_model_customer PRIMARY KEY (modelNumber, cusId)
);

GRANT ALL PRIVILEGES ON db60099580.* TO '60099580'@'localhost' IDENTIFIED BY '3013560';
FLUSH PRIVILEGES;