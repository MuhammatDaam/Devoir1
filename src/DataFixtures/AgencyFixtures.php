<?php

namespace App\DataFixtures;

use App\Entity\Agency;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AgencyFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $agenciesData = [
            ['AG_01', 'Point Central', '33 800 10 01'],
            ['AG_02', 'Avenue de la République', '33 800 10 02'],
            ['AG_03', 'Place du Marché', '33 800 10 03'],
            ['AG_04', 'Rue du Commerce', '33 800 10 04'],
            ['AG_05', 'Boulevard Maritime', '33 800 10 05'],
            ['AG_06', 'Place de la Mairie', '33 800 10 06'],
            ['AG_07', 'Avenue des Champs', '33 800 10 07'],
            ['AG_08', 'Rue de la Gare', '33 800 10 08'],
            ['AG_09', 'Boulevard Principal', '33 800 10 09'],
            ['AG_10', 'Place de l\'Église', '33 800 10 10'],
            ['AG_11', 'Avenue du Parc', '33 800 10 11'],
            ['AG_12', 'Rue des Écoles', '33 800 10 12'],
            ['AG_13', 'Place du Village', '33 800 10 13'],
            ['AG_14', 'Boulevard des Arts', '33 800 10 14'],
            ['AG_15', 'Avenue des Sports', '33 800 10 15'],
            ['AG_16', 'Rue du Stade', '33 800 10 16'],
            ['AG_17', 'Place de la Fontaine', '33 800 10 17'],
            ['AG_18', 'Boulevard des Roses', '33 800 10 18'],
            ['AG_19', 'Avenue de la Plage', '33 800 10 19'],
            ['AG_20', 'Rue du Port', '33 800 10 20']
        ];

        foreach ($agenciesData as [$numero, $adresse, $telephone]) {
            try {
                $agency = new Agency();
                $agency->setNumero($numero);
                $agency->setAdresse($adresse);
                $agency->setTelephone($telephone);
                
                $manager->persist($agency);
            } catch (\Exception $e) {
                // Log l'erreur ou affiche un message
                echo "Erreur lors de la création de l'agence $numero : " . $e->getMessage() . "\n";
            }
        }

        $manager->flush();
    }
}