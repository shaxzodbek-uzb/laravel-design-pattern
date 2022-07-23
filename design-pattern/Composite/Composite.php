<?php
namespace DesignPattern\Composite;

class Composite {
    public static function run()
    {
            $soldier1 = new Soldier(10);
            $soldier2 = new Soldier(11);
            echo $soldier1->getPower() . '\n';

            $group = new Group();
            $group->addForce($soldier1);
            $group->addForce($soldier2);
            echo $group->getPower() . '\n';

            $soldier3 = new Soldier(12);
            $soldier4 = new Soldier(15);
            $group2 = new Group();
            $group2->addForce($soldier3);
            $group2->addForce($soldier4);

            $vzvod = new Vzvod;
            $vzvod->addForce($group);
            $vzvod->addForce($group2);
            $vzvod->addForce(new Soldier(25));
            echo $vzvod->getPower() . '\n';
    }
}

interface Force {
    public function getPower();
}

class Soldier implements Force {
    private $power;
    public function __construct($power) {
        $this->power = $power;
    }
    public function getPower()
    {
        return $this->power;
    }
}

class Group implements Force {
    private $forces = [];
    public function addForce(Force $force) {
        $this->forces[] = $force;
    }
    public function getPower()
    {
        $power = 0;
        foreach ($this->forces as $force) {
            $power += $force->getPower();
        }
        return $power;
    }
}

class Vzvod implements Force {
    private $forces = [];
    public function addForce(Force $force) {
        $this->forces[] = $force;
    }
    public function getPower()
    {
        $power = 0;
        foreach ($this->forces as $force) {
            $power += $force->getPower();
        }
        return $power;
    }
}