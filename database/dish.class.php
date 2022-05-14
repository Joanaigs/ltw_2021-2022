<?php

    declare(strict_types=1);

    class dish
    {
        public int $id;
        public int $idRestaurant;
        public string $name;
        public float $price;
        public string $photo;
        public int $idTypeOfDish;
        public int $idMeal;

        public function __construct(int $id, int $idRestaurant, string $name, float $price, string $photo, int $idTypeOfDish, int $idMeal){
            $this->id = $id;
            $this->idRestaurant = $idRestaurant;
            $this->name = $name;
            $this->price = $price;
            $this->photo = $photo;
            $this->idTypeOfDish = $idTypeOfDish;
            $this->idMeal = $idMeal;
        }
    }