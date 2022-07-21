<?php
namespace DesignPattern\Factory;
class Animal {
    public function eat() {
        echo 'Eating...';
    }
}

class Sheep extends Animal {
    public function eat() {
        echo 'Sheep eating grass...';
    }
}

class Chicken extends Animal {
    public function eat() {
        echo 'Chicken eating meat...';
    }
}

class AnimalFactory {
    public function create()
    {
        return new Animal();
    }
}

class SheepFactory extends AnimalFactory {
    public function create()
    {
        return new Sheep();
    }
}

class ChickenFactory extends AnimalFactory {
    public function create()
    {
        // initialize chicken
        return new Chicken();
    }
}


class Factory {
    public function run()
    {
        $animalFactory = new SheepFactory();
        $animal = $animalFactory->create();
        $animal->eat();

        $animalFactory = new ChickenFactory();
        $animal = $animalFactory->create();
        $animal->eat();
    }
}
