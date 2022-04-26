
DROP TABLE IF EXISTS User;

CREATE TABLE User (
    id INTEGER PRIMARY KEY,
    username TEXT,
    mail TEXT UNIQUE,
    password TEXT,
    address TEXT
);



DROP TABLE IF EXISTS Restaurant;
CREATE TABLE Restaurant (
    id INTEGER PRIMARY KEY,
    idUser  INTEGER REFERENCES User(id),
    name   TEXT,
    address TEXT UNIQUE,
    image TEXT DEFAULT "https://picsum.photos/600/300"
);

DROP TABLE IF EXISTS Category;
CREATE TABLE Category (
    id INTEGER PRIMARY KEY,
    name   TEXT
);

DROP TABLE IF EXISTS Dish;

CREATE TABLE Dish (
    id INTEGER PRIMARY KEY,
    idRestaurant    INTEGER REFERENCES Restaurant(id),
    name   TEXT,
    price TEXT,
    photo TEXT,
    category TEXT
);

DROP TABLE IF EXISTS Review;

CREATE TABLE Review (
    id INTEGER PRIMARY KEY,
    idRestaurant INTEGER REFERENCES Restaurant(id),
    idUser  INTEGER REFERENCES User(id),
    review TEXT,
    raiting INTEGER
);

DROP TABLE IF EXISTS Comment;

CREATE TABLE Comment (
    idReview INTEGER REFERENCES Review(id),
    idUser  INTEGER REFERENCES User(id),
    comment TEXT
);

DROP TABLE IF EXISTS Orders;

CREATE TABLE Orders (
    id INTEGER PRIMARY KEY,
    idRestaurant INTEGER REFERENCES Restaurant(id),
    idUser  INTEGER REFERENCES User(id),
    state TEXT
);



DROP TABLE IF EXISTS FavoriteDish;

CREATE TABLE FavoriteDish(
    idUser INTEGER REFERENCES User(id),
    idDish INTEGER REFERENCES Dish(id)
);

DROP TABLE IF EXISTS FavoriteRestaurant;

CREATE TABLE FavoriteRestaurant(
    idUser INTEGER REFERENCES User(id),
    idDish INTEGER REFERENCES Restaurant(id)
);

DROP TABLE IF EXISTS CategoryRestaurant;

CREATE TABLE CategoryRestaurant(
    idUser INTEGER REFERENCES User(id),
    idCategory INTEGER REFERENCES Category(id)
);


INSERT INTO User (username, mail, password, address) VALUES ('Joana Santos', 'dweferg@hotmail.com', '88888888', 'rua da joana');
INSERT INTO User (username, mail, password, address) VALUES ('Mariana Carvalho', 'ajsdf@hotmail.com', '123456767', 'rua da mariana');
INSERT INTO User (username, mail, password, address) VALUES ('Matilde Sequeira', 'jutyjeyt@hotmail.com', '9876543', 'rua da matilde');

INSERT INTO Restaurant(idUser, name, address) VALUES (1, 'McDonalds', 'rua da alegria');
INSERT INTO Restaurant(idUser, name, address) VALUES (2, 'Dominos', 'rua da feira');
INSERT INTO Restaurant(idUser, name, address) VALUES (3, 'burger king', 'rua da teixeira');

INSERT INTO Category(name) VALUES ('Fast Food');
INSERT INTO Category(name) VALUES ('Burger');
INSERT INTO Category(name) VALUES ('Pizza');
INSERT INTO Category(name) VALUES ('Sushi');
INSERT INTO Category(name) VALUES ('Indiana');
INSERT INTO Category(name) VALUES ('Japonesa');
INSERT INTO Category(name) VALUES ('Marisco');

