INSERT INTO categories(Category_ID, name_Category) 
        VALUES(1000, 'Produce');
INSERT INTO categories(Category_ID, name_Category) 
		VALUES(2000, 'Dairy');
INSERT INTO categories(Category_ID, name_Category) 
		VALUES(3000, 'Grain');
INSERT INTO categories(Category_ID, name_Category) 
		VALUES(4000, 'Junk Food');
INSERT INTO categories(Category_ID, name_Category) 
		VALUES(5000, 'Baked Goods');
INSERT INTO categories(Category_ID, name_Category) 
		VALUES(6000, 'Frozen Food');
INSERT INTO categories(Category_ID, name_Category) 
		VALUES(7000, 'Meat');
INSERT INTO categories(Category_ID, name_Category) 
		VALUES(8000, 'Seafood');
INSERT INTO categories(Category_ID, name_Category) 
		VALUES(9000, 'Kitchen Supplies');



                


INSERT INTO product(PRODUCT_ID, Information_product, Name_Product, Price_Product, Image_Product, Categories) 
        VALUES(NEXT VALUE FOR product_id_sequence, 'Is broccoli, green vegetable', 'Broccoli', 3.50, './media/sample/Broccoli.jpg', 'Produce');
INSERT INTO product(PRODUCT_ID, Information_product, Name_Product, Price_Product, Image_Product, Categories) 
        VALUES(NEXT VALUE FOR product_id_sequence, 'Is cauliflower, cloud vegetable', 'Cauliflower', 4.00, './media/sample/Cauliflower.png', 'Produce');
INSERT INTO product(PRODUCT_ID, Information_product, Name_Product, Price_Product, Image_Product, Categories) 
        VALUES(NEXT VALUE FOR product_id_sequence, 'Is lettuce, leafy green vegetable', 'Lettuce', 2.25, './media/sample/Lettuce.jpg', 'Produce');
INSERT INTO product(PRODUCT_ID, Information_product, Name_Product, Price_Product, Image_Product, Categories) 
        VALUES(NEXT VALUE FOR product_id_sequence, 'It is milk from a cow', 'Milk', 7.25, './media/sample/milk.jpg', 'Dairy');
INSERT INTO product(PRODUCT_ID, Information_product, Name_Product, Price_Product, Image_Product, Categories) 
        VALUES(NEXT VALUE FOR product_id_sequence, 'oats, for porridge or baking', 'Oats', 2.75, './media/sample/oats.jpg', 'Grain');
INSERT INTO product(PRODUCT_ID, Information_product, Name_Product, Price_Product, Image_Product, Categories) 
        VALUES(NEXT VALUE FOR product_id_sequence, 'Ice cream, tasty cold treat', 'Ice cream', 7.50, './MEDIA/sample/icecream.jpg', 'Junk Food');
INSERT INTO product(PRODUCT_ID, Information_product, Name_Product, Price_Product, Image_Product, Categories) 
        VALUES(NEXT VALUE FOR product_id_sequence, 'Bagels, round baked traditional meal', 'bagels', 4.70, './media/sample/bagels.jpeg', 'Baked Goods');
INSERT INTO product(PRODUCT_ID, Information_product, Name_Product, Price_Product, Image_Product, Categories) 
        VALUES(NEXT VALUE FOR product_id_sequence, 'Cookies, a delicious baked treat', 'cookies', 3.50, './media/sample/cookies.jpg', 'Baked Goods');
INSERT INTO product(PRODUCT_ID, Information_product, Name_Product, Price_Product, Image_Product, Categories) 
        VALUES(NEXT VALUE FOR product_id_sequence, 'Pizza, like a pie but with cheese', 'pizza', 5.99, './media/sample/pizza.jpg', 'Frozen Food');
INSERT INTO product(PRODUCT_ID, Information_product, Name_Product, Price_Product, Image_Product, Categories) 
        VALUES(NEXT VALUE FOR product_id_sequence, 'Makes a faint moo sound until you cook it', 'Roast Beef', 35, './media/sample/beefroast.jpeg', 'Meat');
INSERT INTO product(PRODUCT_ID, Information_product, Name_Product, Price_Product, Image_Product, Categories) 
        VALUES(NEXT VALUE FOR product_id_sequence, 'A Gyarados plucked before its time', 'Fish', 17.99, './media/sample/fish.jpg', 'Seafood');
INSERT INTO product(PRODUCT_ID, Information_product, Name_Product, Price_Product, Image_Product, Categories) 
        VALUES(NEXT VALUE FOR product_id_sequence, 'It is not that kind of pot, made of steel', 'Pot', 210, './media/sample/pot.jpg', 'Kitchen Supplies');





	
INSERT INTO users(USER_ID, administrator, user_name, encrypted_password, Firstname, Lastname, Email_address, Home_address, Phone_number, Postal_code, City, legalagreement) 
        VALUES(10001, 1, 'ggadmin', '$2y$10$EBj3iKTlMZN1NKxSCR7nyu3/lchzj37ugXy51jmr/10UFRrzpx9Fq', 'Doug', 'Greening', 'Doug@camosun.ca', '123 Fort st', '250-123-1234', 'v1a 2j3', 'Victoria', '1');
INSERT INTO users(USER_ID, administrator, user_name, encrypted_password, Firstname, Lastname, Email_address, Home_address, Phone_number, Postal_code, City, legalagreement) 
        VALUES(10002, 0, 'user', 'password1', 'Jimmy', 'Bob', 'Jimbob@aol.com', '123 fake st', '250-124-1235', 'v1a 2j4', 'Victoria', '1');







        

        


