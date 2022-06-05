
INSERT INTO User (username, email, password, address, city, country, postcode, phoneNumber) VALUES ('Joana Santos', 'dweferg@hotmail.com', '88888888', 'rua da joana', 'Porto', 'Portugal', '5050-444', '987876435');
INSERT INTO User (username, email, password, address, city, country, postcode, phoneNumber) VALUES ('Mariana Carvalho', 'ajsdf@hotmail.com', '123456767', 'rua da mariana',  'Porto', 'Portugal', '5050-443', '923456435');
INSERT INTO User (username, email, password, address, city, country, postcode, phoneNumber) VALUES ('Matilde Sequeira', 'jutyjeyt@hotmail.com', '9876543', 'rua da matilde',  'Porto', 'Portugal', '5050-442', '926796345');
INSERT INTO User (username, email, password, address, city, country, postcode, phoneNumber) VALUES ('Judy Maria', 'top@hotmail.com', '123567543', 'rua da alegria',  'Porto', 'Portugal', '5050-452', '34523488');

INSERT INTO Restaurant(idUser, name, address) VALUES (1, 'Lareira-Serralves', 'R. Jorge Reinel 7, 4150-436 Porto');
INSERT INTO Restaurant(idUser, name, address) VALUES (2, 'Buri', 'R. Caldas Xavier 145, Porto');
INSERT INTO Restaurant(idUser, name, address) VALUES (3, 'Pizzaria Luzzo', 'Av. da Boavista 831, 4100-128 Porto');
INSERT INTO Restaurant(idUser, name, address) VALUES (4, 'Capa Negra II', 'Rua do Campo Alegre 191, 4150-177 Porto');

INSERT INTO Category(name) VALUES ('Burger');
INSERT INTO Category(name) VALUES ('Pizza');
INSERT INTO Category(name) VALUES ('Sushi');
INSERT INTO Category(name) VALUES ('Indiana');
INSERT INTO Category(name) VALUES ('Japonesa');
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

INSERT INTO CategoryRestaurant(idRestaurant, idCategory) VALUES (1, 7);
INSERT INTO CategoryRestaurant(idRestaurant, idCategory) VALUES (2, 3);
INSERT INTO CategoryRestaurant(idRestaurant, idCategory) VALUES (3, 2);
INSERT INTO CategoryRestaurant(idRestaurant, idCategory) VALUES (4, 6);

--Lareira
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (1, 'Tábua de presunto', 3.90, 1, 1);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (1, 'Tábua de enchidos', 4.90, 1, 1);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (1, 'Tábua de queijos', 4.90, 3, 1);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (1, 'Pernil com queijo da serra', 3.90, 1, 2);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (1, 'Prego c/ ovo', 4.40, 1, 2);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (1, 'Alheira', 3.40, 1, 2);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (1, 'Rissóis', 2.40, 1, 2);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (1, 'Presunto c/ queijo da serra', 2.90, 1, 2);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (1, 'Tripas doces c/ chocolate', 1.90, 3, 3);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (1, 'Bolacha c/ ovos moles', 1.90, 3, 3);
INSERT INTO Dish(idRestaurant, name, price, idMeal) VALUES (1, 'Água', 1.00, 4);
INSERT INTO Dish(idRestaurant, name, price, idMeal) VALUES (1, 'Água c/ gás', 1.10, 4);
INSERT INTO Dish(idRestaurant, name, price, idMeal) VALUES (1, 'Fino', 1.20, 4);

--Buri
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (2, 'Ceviche Branco', 9.00, 2, 1);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (2, 'Tempura de camarão com amêndoa (5uni)', 12.00, 2, 1);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (2, 'Crudo Atum', 12.00, 2, 1);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (2, 'Crepe de Legumes (2 uni)', 4.00, 4, 1);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (2, 'Gyoza de Frango (4 uni)', 5.50, 1, 1);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (2, 'Buri 16', 18.50, 2, 2);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (2, 'Buri 30', 34.00, 2, 2);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (2, 'Buri 50', 49.00, 2, 2);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (2, 'Osaka 26 tradicional', 30.00, 2, 2);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (2, 'Trilogia de mousses', 1.90, 3, 3);
INSERT INTO Dish(idRestaurant, name, price, idMeal) VALUES (2, 'Sake - Sho Chiku Bai', 2.50, 4);
INSERT INTO Dish(idRestaurant, name, price, idMeal) VALUES (2, 'Água', 1.50, 4);
INSERT INTO Dish(idRestaurant, name, price, idMeal) VALUES (2, 'Refrigerante', 2.00, 4);

--Pizzaria Luzzo
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (3, 'Burrata criolla', 6.75, 3, 1);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (3, 'Peixinhos da horta italianos', 4.95, 1, 1);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (3, 'Focaccia', 2.75, 3, 1);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (3, 'Margarita', 6.90, 3, 2);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (3, 'Luzzo', 12.85, 1, 2);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (3, 'Formaggio', 11.50, 3, 2);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (3, 'Siffredi', 11.30, 1, 2);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (3, 'Capone', 12.85, 1, 2);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (3, 'Tiramisu', 3.95, 3, 3);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (3, 'Cheesecake de morango', 4.95, 3, 3);
INSERT INTO Dish(idRestaurant, name, price, idMeal) VALUES (3, 'Cerveja', 2.50, 4);
INSERT INTO Dish(idRestaurant, name, price, idMeal) VALUES (3, 'Água', 1.20, 4);
INSERT INTO Dish(idRestaurant, name, price, idMeal) VALUES (3, 'Refrigerante', 2.00, 4);

--Capa Negra II
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (4, 'Rissol de carne', 1.00, 1, 1);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (4, 'Rissol de camarão', 1.00, 2, 1);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (4, 'Prego no pão lombo', 6.60, 1, 2);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (4, 'Bacalhau na brasa', 17.50, 2, 2);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (4, 'Mini francesinha', 6.80, 1, 2);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (4, 'Francesinha capa negra', 10.00, 1, 2);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (4, 'Francesinha tradicional', 8.60, 1, 2);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (4, 'Francesinha c/ batata e ovo', 11.50, 1, 2);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (4, 'Cachorro especial', 6.80, 1, 2);
INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (4, 'Bife c/ cogumelos', 13.50, 1, 2);
INSERT INTO Dish(idRestaurant, name, price, idMeal) VALUES (4, 'Cerveja', 2.40, 4);
INSERT INTO Dish(idRestaurant, name, price, idMeal) VALUES (4, 'Água', 1.25, 4);
INSERT INTO Dish(idRestaurant, name, price, idMeal) VALUES (4, 'Refrigerante', 2.00, 4);

INSERT INTO Orders(idUser, address, state) VALUES (1, 'rua da alegria', 'Preparar');
INSERT INTO Orders(idUser, address, state) VALUES (1, 'rua do clérigo', 'Pronto');

INSERT INTO FavoriteDish(idUser, idDish) VALUES (1,3);
INSERT INTO FavoriteDish(idUser, idDish) VALUES (3,3);
INSERT INTO FavoriteDish(idUser, idDish) VALUES (2,3);
INSERT INTO FavoriteDish(idUser, idDish) VALUES (1,3);

INSERT INTO FavoriteRestaurant(idUser, idRestaurant) VALUES (1,1);
INSERT INTO FavoriteRestaurant(idUser, idRestaurant) VALUES (1,2);
INSERT INTO FavoriteRestaurant(idUser, idRestaurant) VALUES (1,3);

INSERT INTO DishOrder(idDish , idOrder) VALUES (1,1);
INSERT INTO DishOrder(idDish, idOrder) VALUES (2,1);
INSERT INTO DishOrder(idDish , idOrder) VALUES (4,2);
INSERT INTO DishOrder(idDish, idOrder) VALUES (5,2);

INSERT INTO Cart(idDish, idUser) VALUES (1, 1);
INSERT INTO Cart(idDish,  idUser) VALUES (3, 2);
INSERT INTO Cart(idDish,  idUser) VALUES (5, 3);
INSERT INTO Cart(idDish, idUser) VALUES (7, 4);
INSERT INTO Cart(idDish, idUser) VALUES (11, 2);

