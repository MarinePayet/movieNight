<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Migrations\Exception\DependencyException;
use Doctrine\Persistence\ObjectManager;

class MoviesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $movie = new Movie();
        $movie->setTitle('Le Destin d\'Amélie Poulain');
        $movie->setDescription('Amélie, une jeune serveuse dans un bar de Montmartre, passe son temps à observer les gens et à laisser son imagination divaguer. Elle s\'est fixé un but : faire le bien de ceux qui l\'entourent. Elle invente alors des stratagèmes pour intervenir incognito dans leur existence.
        Le chemin d\'Amélie est jalonné de rencontres : Georgette, la buraliste hypocondriaque ; Lucien, le commis d\'épicerie ; Madeleine Wallace, la concierge portée sur le porto et les chiens empaillés ; Raymond Dufayel alias "l\'homme de verre", son voisin qui ne vit qu\'à travers une reproduction d\'un tableau de Renoir.
        Cette quête du bonheur amène Amélie à faire la connaissance de Nino Quincampoix, un étrange prince charmant. Celui-ci partage son temps entre un train fantôme et un sex-shop, et cherche à identifier un inconnu dont la photo réapparaît sans cesse dans plusieurs cabines de Photomaton.');
        $movie->setType($this->getReference(TypeFixtures::TYPE_COMEDY));
        $movie->setImage('https://fr.web.img2.acsta.net/c_310_420/medias/nmedia/00/02/24/66/69198162_af.jpg');
        $manager->persist($movie);

        $movie = new Movie();
        $movie->setTitle('Intouchable');
        $movie->setDescription('A la suite d’un accident de parapente, Philippe, riche aristocrate, engage comme aide à domicile Driss, un jeune de banlieue tout juste sorti de prison. Bref la personne la moins adaptée pour le job. Ensemble ils vont faire cohabiter Vivaldi et Earth Wind and Fire, le verbe et la vanne, les costumes et les bas de survêtement... Deux univers vont se télescoper, s’apprivoiser, pour donner naissance à une amitié aussi dingue, drôle et forte qu’inattendue, une relation unique qui fera des étincelles et qui les rendra... Intouchables.');
        $movie->setType($this->getReference(TypeFixtures::TYPE_COMEDY));
        $movie->setImage('https://fr.web.img2.acsta.net/c_310_420/o_club-allocine-310x420.png_0_se/medias/nmedia/18/82/69/17/19806656.jpg');
        $manager->persist($movie);
        
        $movie = new Movie();
        $movie->setTitle('La Haine');
        $movie->setDescription('Abdel Ichah, seize ans est entre la vie et la mort, passé à tabac par un inspecteur de police lors d\'un interrogatoire. 
        Une émeute oppose les jeunes d\'une cité HLM aux forces de l\'ordre. Pour trois d\'entre eux, ces heures vont marquer un tournant dans leur vie...');
        $movie->setType($this->getReference(TypeFixtures::TYPE_TRAGEDY));
        $manager->persist($movie);

        $movie = new Movie();
        $movie->setTitle('Forest Gump');
        $movie->setDescription('Quelques décennies d\'histoire américaine, des années 1940 à la fin du XXème siècle, à travers le regard et l\'étrange odyssée d\'un homme simple et pur, Forrest Gump.');
        $movie->setType($this->getReference(TypeFixtures::TYPE_TRAGEDY));
        $manager->persist($movie);

        $movie = new Movie();
        $movie->setTitle('La Ligne Verte');
        $movie->setDescription('Paul Edgecomb, pensionnaire centenaire d\'une maison de retraite, est hanté par ses souvenirs. Gardien-chef du pénitencier de Cold Mountain en 1935, il était chargé de veiller au bon déroulement des exécutions capitales en s’efforçant d\'adoucir les derniers moments des condamnés. Parmi eux se trouvait un colosse du nom de John Coffey, accusé du viol et du meurtre de deux fillettes. Intrigué par cet homme candide et timide aux dons magiques, Edgecomb va tisser avec lui des liens très forts.');
        $movie->setType($this->getReference(TypeFixtures::TYPE_SF));
        $manager->persist($movie);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            TypeFixtures::class,
        ];  
    }
}
