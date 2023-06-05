<?php

namespace App\DataFixtures;

use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypeFixtures extends Fixture
{

    public const TYPE_COMEDY = 'TYPE_COMEDY';
    public const TYPE_SF = 'TYPE_SF';
    public const TYPE_TRAGEDY = 'TYPE_TRAGEDY';

    public function load(ObjectManager $manager): void
    {
        $type = new Type();
        $type->setType('Comédie');
        $manager->persist($type);
        $this->addReference(self::TYPE_COMEDY, $type);

        $type = new Type();
        $type->setType('SF');
        $manager->persist($type);
        $this->addReference(self::TYPE_SF, $type);
        
        $type = new Type();
        $type->setType('Tragédie');
        $manager->persist($type);
        $this->addReference(self::TYPE_TRAGEDY, $type);

        $manager->flush();
    }
}
