
DROP TABLE IF EXISTS User;
CREATE TABLE User (
                      id INTEGER PRIMARY KEY,
                      image INTEGER REFERENCES Images(id) DEFAULT 58,
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
                            image INTEGER REFERENCES Images(id) default 57
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
                      image INTEGER REFERENCES Images(id) DEFAULT 57,
                      idTypeOfDish INTEGER REFERENCES TypeOfDish(id) DEFAULT 5,
                      idMeal INTEGER REFERENCES Meal(id)
);

DROP TABLE IF EXISTS Review;
CREATE TABLE Review (
    id INTEGER PRIMARY KEY,
    idRestaurant INTEGER REFERENCES Restaurant(id),
    idUser  INTEGER REFERENCES User(id),
    review TEXT,
    date TEXT,
    rating INTEGER
);

DROP TABLE IF EXISTS Comment;
CREATE TABLE Comment (
    id INTEGER PRIMARY KEY,
    idReview INTEGER REFERENCES Review(id),
    fromRestaurant INTEGER default 0,
    date TEXT,
    comment TEXT
);


DROP TABLE IF EXISTS Orders;
CREATE TABLE Orders (
                        id INTEGER PRIMARY KEY,
                        address TEXT,
                        idUser  INTEGER REFERENCES User(id),
                        state TEXT,
                        date TEXT
);

DROP TABLE IF EXISTS DishOrder;
CREATE TABLE DishOrder (
                           idDish INTEGER REFERENCES Dish(id),
                           idOrder INTEGER REFERENCES Orders(id),
                           number INTEGER
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
                     idUser INTEGER REFERENCES User(id),
                     number INTEGER
);


DROP TABLE IF EXISTS Images;
CREATE TABLE Images (
                        id INTEGER PRIMARY KEY,
                        title VARCHAR NOT NULL
);