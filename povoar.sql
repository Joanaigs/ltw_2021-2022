
INSERT INTO User (username, email, password, address, city, country, postcode, phoneNumber) VALUES ('Joana Santos', 'dweferg@hotmail.com', '88888888', 'rua da joana', 'Porto', 'Portugal', '5050-444', '987876435');
INSERT INTO User (username, email, password, address, city, country, postcode, phoneNumber) VALUES ('Mariana Carvalho', 'ajsdf@hotmail.com', '123456767', 'rua da mariana',  'Porto', 'Portugal', '5050-443', '923456435');
INSERT INTO User (username, email, password, address, city, country, postcode, phoneNumber) VALUES ('Matilde Sequeira', 'jutyjeyt@hotmail.com', '9876543', 'rua da matilde',  'Porto', 'Portugal', '5050-442', '926796345');
INSERT INTO User (username, email, password, address, city, country, postcode, phoneNumber) VALUES ('Judy Maria', 'top@hotmail.com', '123567543', 'rua da alegria',  'Porto', 'Portugal', '5050-452', '34523488');


--Lareira
INSERT INTO Images(title) VALUES ('Tábua de presunto');
INSERT INTO Images(title) VALUES ('Tábua de enchidos');
INSERT INTO Images(title) VALUES ('Tábua de queijos');
INSERT INTO Images(title) VALUES ('Pernil com queijo da serra');
INSERT INTO Images(title) VALUES ('Prego c/ ovo');
INSERT INTO Images(title) VALUES ('Alheira');
INSERT INTO Images(title) VALUES ('Rissóis');
INSERT INTO Images(title) VALUES ('Presunto c/ queijo da serra');
INSERT INTO Images(title) VALUES ('Tripas doces c/ chocolate');
INSERT INTO Images(title) VALUES ('Bolacha c/ ovos moles');
INSERT INTO Images(title) VALUES ('Água');
INSERT INTO Images(title) VALUES ('Água c/ gás');
INSERT INTO Images(title) VALUES ('Fino');

--Buri
INSERT INTO Images(title) VALUES ('Ceviche Branco');
INSERT INTO Images(title) VALUES ('Tempura de camarão com amêndoa (5uni)');
INSERT INTO Images(title) VALUES ('Crudo Atum');
INSERT INTO Images(title) VALUES ('Crepe de Legumes (2 uni)');
INSERT INTO Images(title) VALUES ('Gyoza de Frango (4 uni)');
INSERT INTO Images(title) VALUES ('Buri 16');
INSERT INTO Images(title) VALUES ('Buri 30');
INSERT INTO Images(title) VALUES ('Buri 50');
INSERT INTO Images(title) VALUES ('Osaka 26 tradicional');
INSERT INTO Images(title) VALUES ('Trilogia de mousses');
INSERT INTO Images(title) VALUES ('Sake - Sho Chiku Bai');
INSERT INTO Images(title) VALUES ('Água');
INSERT INTO Images(title) VALUES ('Refrigerante');

--Pizzaria Luzzo
INSERT INTO Images(title) VALUES ('Burrata criolla');
INSERT INTO Images(title) VALUES ('Peixinhos da horta italianos');
INSERT INTO Images(title) VALUES ('Focaccia');
INSERT INTO Images(title) VALUES ('Margarita');
INSERT INTO Images(title) VALUES ('Luzzo');
INSERT INTO Images(title) VALUES ('Formaggio');
INSERT INTO Images(title) VALUES ('Siffredi');
INSERT INTO Images(title) VALUES ('Capone');
INSERT INTO Images(title) VALUES ('Tiramisu');
INSERT INTO Images(title) VALUES ('Cheesecake de morango');
INSERT INTO Images(title) VALUES ('Cerveja');
INSERT INTO Images(title) VALUES ('Água');
INSERT INTO Images(title) VALUES ('Refrigerante');

--Capa Negra II
INSERT INTO Images(title) VALUES ('Rissol de carne');
INSERT INTO Images(title) VALUES ('Rissol de camarão');
INSERT INTO Images(title) VALUES ('Prego no pão lombo');
INSERT INTO Images(title) VALUES ('Bacalhau na brasa');
INSERT INTO Images(title) VALUES ('Mini francesinha');
INSERT INTO Images(title) VALUES ('Francesinha capa negra');
INSERT INTO Images(title) VALUES ('Francesinha tradicional');
INSERT INTO Images(title) VALUES ('Francesinha c/ batata e ovo');
INSERT INTO Images(title) VALUES ('Cachorro especial');
INSERT INTO Images(title) VALUES ('Bife c/ cogumelos');
INSERT INTO Images(title) VALUES ('Cerveja');
INSERT INTO Images(title) VALUES ('Água');
INSERT INTO Images(title) VALUES ('Refrigerante');

INSERT INTO Images(title) Values ('Lareira-Serralves');
INSERT INTO Images(title) Values ('Buri');
INSERT INTO Images(title) Values ('Pizzaria Luzzo');
INSERT INTO Images(title) Values ('Capa Negra II');


INSERT INTO Images(title) Values ('Default'); --57
INSERT INTO Images(title) Values ('Default'); --58 Profile


--DeGema
INSERT INTO Images(title) Values ('DeGema'); --64
INSERT INTO Images(title) Values ('De Génio'); --65
INSERT INTO Images(title) Values ('Andor Bioleta'); --66
INSERT INTO Images(title) Values ('É só Bitaites'); --67
INSERT INTO Images(title) Values ('Botar Corpo'); --68
INSERT INTO Images(title) Values ('Lauriar A Pevide'); --69
INSERT INTO Images(title) Values ('Tripeiro'); --70
INSERT INTO Images(title) Values ('Traz àgua no bico'); --71
INSERT INTO Images(title) Values ('Fino como o Alho'); --72
INSERT INTO Images(title) Values ('Come e Cala'); --73
INSERT INTO Images(title) Values ('Que Larica'); --74
INSERT INTO Images(title) Values ('Copo com Bola de Gelado'); --75
INSERT INTO Images(title) Values ('Crepe com Nutella'); --76
INSERT INTO Images(title) Values ('Letra A (Cerveja Artesanal)'); --77
INSERT INTO Images(title) Values ('Letra B (Cerveja Artesanal)'); --78
INSERT INTO Images(title) Values ('Letra C (Cerveja Artesanal)'); --79
INSERT INTO Images(title) Values ('Letra D (Cerveja Artesanal)'); --80
INSERT INTO Images(title) Values ('Caipirinha'); --81
INSERT INTO Images(title) Values ('Pastel de Enchidos'); --82
INSERT INTO Images(title) Values ('Bolinhas de queijo'); --83



INSERT INTO Restaurant(idUser, name, address, image) VALUES (1, 'Lareira-Serralves', 'R. Jorge Reinel 7, 4150-436 Porto', 53);
INSERT INTO Restaurant(idUser, name, address, image) VALUES (2, 'Buri', 'R. Caldas Xavier 145, Porto', 54);
INSERT INTO Restaurant(idUser, name, address, image) VALUES (3, 'Pizzaria Luzzo', 'Av. da Boavista 831, 4100-128 Porto', 55);
INSERT INTO Restaurant(idUser, name, address, image) VALUES (4, 'Capa Negra II', 'Rua do Campo Alegre 191, 4150-177 Porto', 56);
INSERT INTO Restaurant(idUser, name, address, image) VALUES (5, 'DeGema', 'Rua do Almada, n.º249, 4050-038 Porto', 64);

INSERT INTO Category(name) VALUES ('Burger');
INSERT INTO Category(name) VALUES ('Pizza');
INSERT INTO Category(name) VALUES ('Sushi');
INSERT INTO Category(name) VALUES ('Indiana');
INSERT INTO Category(name) VALUES ('Portuguesa');
INSERT INTO Category(name) VALUES ('Sandes');
INSERT INTO Category(name) VALUES ('Marisco');

INSERT INTO TypeOfDish(type) VALUES ('Carne');
INSERT INTO TypeOfDish(type) VALUES ('Peixe');
INSERT INTO TypeOfDish(type) VALUES ('Vegetariano');
INSERT INTO TypeOfDish(type) VALUES ('Vegan');
INSERT INTO TypeOfDish(type) VALUES ('Outros');

INSERT INTO Meal(name) VALUES ('Entrada');
INSERT INTO Meal(name) VALUES ('Prato principal');
INSERT INTO Meal(name) VALUES ('Sobremesa');
INSERT INTO Meal(name) VALUES ('Bebida');

INSERT INTO CategoryRestaurant(idRestaurant, idCategory) VALUES (1, 6);
INSERT INTO CategoryRestaurant(idRestaurant, idCategory) VALUES (2, 3);
INSERT INTO CategoryRestaurant(idRestaurant, idCategory) VALUES (3, 2);
INSERT INTO CategoryRestaurant(idRestaurant, idCategory) VALUES (4, 5);
INSERT INTO CategoryRestaurant(idRestaurant, idCategory) VALUES (5, 1);

--Lareira
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (1,1, 'Tábua de presunto', 3.90, 1, 1);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (2,1, 'Tábua de enchidos', 4.90, 1, 1);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (3, 1, 'Tábua de queijos', 4.90, 3, 1);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (4, 1, 'Pernil com queijo da serra', 3.90, 1, 2);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (5, 1, 'Prego c/ ovo', 4.40, 1, 2);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (6, 1, 'Alheira', 3.40, 1, 2);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (7, 1, 'Rissóis', 2.40, 1, 2);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (8, 1, 'Presunto c/ queijo da serra', 2.90, 1, 2);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (9, 1, 'Tripas doces c/ chocolate', 1.90, 3, 3);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (10, 1, 'Bolacha c/ ovos moles', 1.90, 3, 3);
INSERT INTO Dish(image, idRestaurant, name, price, idMeal) VALUES (11, 1, 'Água', 1.00, 4);
INSERT INTO Dish(image, idRestaurant, name, price, idMeal) VALUES (12, 1, 'Água c/ gás', 1.10, 4);
INSERT INTO Dish(image, idRestaurant, name, price, idMeal) VALUES (13, 1, 'Fino', 1.20, 4);

--Buri
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (14, 2, 'Ceviche Branco', 9.00, 2, 1);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (15, 2, 'Tempura de camarão com amêndoa (5uni)', 12.00, 2, 1);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (16,2, 'Crudo Atum', 12.00, 2, 1);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (17, 2, 'Crepe de Legumes (2 uni)', 4.00, 4, 1);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (18, 2, 'Gyoza de Frango (4 uni)', 5.50, 1, 1);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (19, 2, 'Buri 16', 18.50, 2, 2);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (20, 2, 'Buri 30', 34.00, 2, 2);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (21, 2, 'Buri 50', 49.00, 2, 2);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (22, 2, 'Osaka 26 tradicional', 30.00, 2, 2);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (23, 2, 'Trilogia de mousses', 1.90, 3, 3);
INSERT INTO Dish(image, idRestaurant, name, price, idMeal) VALUES (24, 2, 'Sake - Sho Chiku Bai', 2.50, 4);
INSERT INTO Dish(image, idRestaurant, name, price, idMeal) VALUES (25, 2, 'Água', 1.50, 4);
INSERT INTO Dish(image, idRestaurant, name, price, idMeal) VALUES (26, 2, 'Refrigerante', 2.00, 4);

--Pizzaria Luzzo
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (27, 3, 'Burrata criolla', 6.75, 3, 1);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (28, 3, 'Peixinhos da horta italianos', 4.95, 1, 1);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (29, 3, 'Focaccia', 2.75, 3, 1);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (30, 3, 'Margarita', 6.90, 3, 2);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (31, 3, 'Luzzo', 12.85, 1, 2);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (32, 3, 'Formaggio', 11.50, 3, 2);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (33, 3, 'Siffredi', 11.30, 1, 2);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (34, 3, 'Capone', 12.85, 1, 2);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (35, 3, 'Tiramisu', 3.95, 3, 3);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (36, 3, 'Cheesecake de morango', 4.95, 3, 3);
INSERT INTO Dish(image, idRestaurant, name, price, idMeal) VALUES (37, 3, 'Cerveja', 2.50, 4);
INSERT INTO Dish(image, idRestaurant, name, price, idMeal) VALUES (38, 3, 'Água', 1.20, 4);
INSERT INTO Dish(image, idRestaurant, name, price, idMeal) VALUES (39, 3, 'Refrigerante', 2.00, 4);

--Capa Negra II
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (40, 4, 'Rissol de carne', 1.00, 1, 1);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (41, 4, 'Rissol de camarão', 1.00, 2, 1);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (42, 4, 'Prego no pão lombo', 6.60, 1, 2);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (43, 4, 'Bacalhau na brasa', 17.50, 2, 2);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (44, 4, 'Mini francesinha', 6.80, 1, 2);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (45, 4, 'Francesinha capa negra', 10.00, 1, 2);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (46, 4, 'Francesinha tradicional', 8.60, 1, 2);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (47, 4, 'Francesinha c/ batata e ovo', 11.50, 1, 2);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (48, 4, 'Cachorro especial', 6.80, 1, 2);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (49, 4, 'Bife c/ cogumelos', 13.50, 1, 2);
INSERT INTO Dish(image, idRestaurant, name, price, idMeal) VALUES (50, 4, 'Cerveja', 2.40, 4);
INSERT INTO Dish(image, idRestaurant, name, price, idMeal) VALUES (51, 4, 'Água', 1.25, 4);
INSERT INTO Dish(image, idRestaurant, name, price, idMeal) VALUES (52, 4, 'Refrigerante', 2.00, 4);


--DeGema
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (82, 5, 'Pastel de Enchidos', 7.90, 1, 1);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (83, 5, 'Bolinhas de queijo', 7.90, 1, 1);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (65, 5, 'De Génio', 7.90, 1, 2);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (66, 5, 'Andor Bioleta', 8.25, 1, 2);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (67, 5, 'É só Bitaites', 8.25, 1, 2);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (68, 5, 'Botar Corpo', 8.25, 1, 2);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (69, 5, 'Lauriar A Pevide', 5.45, 1, 2);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (70, 5, 'Tripeiro', 8.90, 1, 2);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (71, 5, 'Traz àgua no bico', 7.90, 2, 2);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (72, 5, 'Fino como o Alho', 7.65, 3, 2);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (73, 5, 'Come e Cala', 7.90, 4, 2);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (74, 5, 'Que Larica', 7.65, 4, 2);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (75, 5, 'Copo com Bola de Gelado', 2.15, 3, 3);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (76, 5, 'Crepe com Nutella', 3.30, 3, 3);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (77, 5, 'Letra A (Cerveja Artesanal)', 6.10, 3, 4);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (78, 5, 'Letra B (Cerveja Artesanal)', 6.10, 3, 4);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (79, 5, 'Letra C (Cerveja Artesanal)', 6.10, 3, 4);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (80, 5, 'Letra D (Cerveja Artesanal)', 6.10, 3, 4);
INSERT INTO Dish(image, idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (81, 5, 'Caipirinha', 3.90, 3, 4);




INSERT INTO Orders(idUser, address, state, date) VALUES (1, 'rua da alegria', 'Preparar', '12-04-2020');
INSERT INTO Orders(idUser, address, state, date) VALUES (1, 'rua do clérigo', 'Pronto', '12-04-2020');

INSERT INTO FavoriteDish(idUser, idDish) VALUES (1,3);
INSERT INTO FavoriteDish(idUser, idDish) VALUES (3,3);
INSERT INTO FavoriteDish(idUser, idDish) VALUES (2,3);
INSERT INTO FavoriteDish(idUser, idDish) VALUES (1,3);

INSERT INTO FavoriteRestaurant(idUser, idRestaurant) VALUES (1,1);
INSERT INTO FavoriteRestaurant(idUser, idRestaurant) VALUES (1,2);
INSERT INTO FavoriteRestaurant(idUser, idRestaurant) VALUES (1,3);


INSERT INTO DishOrder(idDish , idOrder, number) VALUES (1,1, 1);
INSERT INTO DishOrder(idDish, idOrder, number) VALUES (2,1, 2);
INSERT INTO DishOrder(idDish , idOrder, number) VALUES (4,2, 1);
INSERT INTO DishOrder(idDish, idOrder, number) VALUES (5,2, 2);


INSERT INTO Cart(idDish, idUser, number) VALUES (1, 1, 2);
INSERT INTO Cart(idDish,  idUser, number) VALUES (3, 2, 3);
INSERT INTO Cart(idDish,  idUser, number) VALUES (5, 2, 4);
INSERT INTO Cart(idDish, idUser, number) VALUES (7, 1, 5);
INSERT INTO Cart(idDish, idUser, number) VALUES (11, 1, 1);

