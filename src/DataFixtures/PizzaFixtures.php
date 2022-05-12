<?php

namespace App\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Category;
use App\Entity\Pizza;
use App\Entity\Size;

class PizzaFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $category_names = ['meat', 'fish', 'vegan'];
        $sizes = ['medium', 'large', 'calzone'];
        $categories = [];
        for ($j=0; $j < 3; $j++) { 
            $category = new Category();
            $category->setName($category_names[$j]);
            $category->setDescription('lorem ipsum dolor sit amet');
            $category->setImage('image'.$j);
            array_push($categories, $category);
            $manager->persist($category);
            for ($i=0; $i < 6; $i++) {
                
                $pizza = new Pizza();
                $pizza->setName('pizza'.$i);
                $pizza->setImage('placeholder.jpg');
                foreach ($categories as $category) {
                    $pizza->setCategory($category);
                }
                $manager->persist($pizza);
    
            }
        }
        for ($i=0; $i < 3; $i++) { 
            $size = new Size();
            $size->setName($sizes[$i]);
            $manager->persist($size);
        }
        $manager->flush();
    }
}
