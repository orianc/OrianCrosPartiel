<?php

namespace App\DataFixtures;

use App\Entity\Album;
use App\Entity\Artiste;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $tabObjArtiste = [];

        $artiste1 = new Artiste();
        $artiste1
        ->setNom('Hendrix')
        ->setPrenom('Jimi');
        $tabObjArtiste[]=$artiste1;
        
        $manager->persist($artiste1);

        $artiste2 = new Artiste();
        $artiste2
        ->setNom('Pop')
        ->setPrenom('Iggy');
        $tabObjArtiste[]=$artiste2;
        $manager->persist($artiste2);
        
        $manager->persist($artiste2);

        $album1 = new Album();
        $album1
        ->setNom('Live at Woodstock')
        ->setPochette('liveatwoodstock')
        ->setAnnee(\DateTime::createFromFormat('Y','1999'))
        ->setGenre('Rock')
        ->setPresentation("Live at Woodstock est l'album du live de Jimi Hendrix au festival de Woodstock, le 18 août 1969.")
        ->setArtiste($tabObjArtiste[0]);
        $manager->persist($album1);

        $album2 = new Album();
        $album2
        ->setNom('Instinct')
        ->setPochette('instinct')
        ->setAnnee(\DateTime::createFromFormat('Y','1988'))
        ->setGenre('Rock')
        ->setPresentation("Instinct est le neuvième album d'Iggy Pop. Il est sorti en juin 1988 sur le label A&M records et a été produit par Bill Laswell.")
        ->setArtiste($tabObjArtiste[1]);
        $manager->persist($album2);


        $manager->flush();
    }
}
