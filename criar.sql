
DROP TABLE IF EXISTS User;
CREATE TABLE User (
    id INTEGER PRIMARY KEY,
    username TEXT,
    email TEXT UNIQUE,
    password TEXT,
    address TEXT,
    city TEXT,
    country TEXT,
    postcode TEXT,
    phoneNumber TEXT
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

DROP TABLE IF EXISTS TypeOfDish;
CREATE TABLE TypeOfDish (
    id INTEGER PRIMARY KEY,
    type   TEXT
);

DROP TABLE IF EXISTS Meal;
CREATE TABLE Meal (
    id INTEGER PRIMARY KEY,
    name   TEXT
);

DROP TABLE IF EXISTS Dish;
CREATE TABLE Dish (
    id INTEGER PRIMARY KEY,
    idRestaurant INTEGER REFERENCES Restaurant(id) ON DELETE CASCADE,
    name TEXT,
    price DOUBLE,
    photo TEXT DEFAULT "https://picsum.photos/600/300",
    idTypeOfDish INTEGER REFERENCES TypeOfDish(id) DEFAULT 5,
    idMeal INTEGER REFERENCES Meal(id)
);

DROP TABLE IF EXISTS Review;
CREATE TABLE Review (
    id INTEGER PRIMARY KEY,
    idRestaurant INTEGER REFERENCES Restaurant(id),
    idUser  INTEGER REFERENCES User(id),
    review TEXT,
    rating INTEGER
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
    idUser  INTEGER REFERENCES User(id),
    state TEXT
);

DROP TABLE IF EXISTS DishOrder;
CREATE TABLE DishOrder (
    idDish INTEGER REFERENCES Dish(id),
    idOrder INTEGER REFERENCES Orders(id)
);

DROP TABLE IF EXISTS FavoriteDish;
CREATE TABLE FavoriteDish(
    idUser INTEGER REFERENCES User(id),
    idDish INTEGER REFERENCES Dish(id)
);

DROP TABLE IF EXISTS FavoriteRestaurant;
CREATE TABLE FavoriteRestaurant(
    idUser INTEGER REFERENCES User(id),
    idRestaurant INTEGER REFERENCES Restaurant(id)
);

DROP TABLE IF EXISTS CategoryRestaurant;
CREATE TABLE CategoryRestaurant(
    idRestaurant INTEGER REFERENCES Restaurant(id),
    idCategory INTEGER REFERENCES Category(id)
);

DROP TABLE IF EXISTS Cart;
CREATE TABLE Cart(
    id INTEGER PRIMARY KEY,
    idDish INTEGER REFERENCES Dish(id),
    idUser INTEGER REFERENCES User(id)
);


