<?php

namespace App\DataFixtures;

use App\Entity\Civilite;
use App\Entity\Artiste;
use App\Entity\Contrat;
use App\Entity\Domaine;
use App\Entity\Metier;
use App\Entity\OffreDeCasting;
use App\Entity\Organisation;
use App\Entity\TypeContrat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Faker;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;
    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher  = $hasher;
    }
    public function load(ObjectManager $manager): void
    {
        $civ1 = new Civilite();
        $civ1->setciviliteLongue("Monsieur");
        $civ1->setcivilitecourt("M.");

        $civ2 = new Civilite();
        $civ2->setciviliteLongue("Madame");
        $civ2->setcivilitecourt("Mme");

        $civ3 = new Civilite();
        $civ3->setciviliteLongue("Mademoiselle");
        $civ3->setcivilitecourt("Mlle");

        $manager->persist($civ1);
        $manager->persist($civ2);
        $manager->persist($civ3);

//        Domaine //////////////

        $domaine1 = new Domaine();
        $domaine1->setNom("Sience-fiction");

        $domaine2 = new Domaine();
        $domaine2->setNom("Comdedie");

        $domaine3 = new Domaine();
        $domaine3->setNom("Action");


        $manager->persist($domaine1);
        $manager->persist($domaine2);
        $manager->persist($domaine3);

//        Metier /////////
        $metier1 = new Metier();
        $metier1->setNom('Acteur');

        $metier2 = new Metier();
        $metier2->setNom('figurant');

        $manager->persist($metier1);
        $manager->persist($metier2);

//        Organisation ///////////////

        $orga1 = new Organisation();
        $orga1->setNomOrganisation("Marvel");
        $orga1->setAdresseEmail("marvel@hotmail.com");
        $orga1->setAdresseOrganisation("8 rue d'holywood");
        $orga1->setCodePostal('30292');
        $orga1->setNumeroTelephone('0129490239');

        $orga2 = new Organisation();
        $orga2->setNomOrganisation("Canal");
        $orga2->setAdresseEmail("canal@hotmail.com");
        $orga2->setAdresseOrganisation("20 rue Paris");
        $orga2->setCodePostal('93000');
        $orga2->setNumeroTelephone('0128390239');

        $orga3 = new Organisation();
        $orga3->setNomOrganisation("Studio Bagel");
        $orga3->setAdresseEmail("studiobagel@hotmail.com");
        $orga3->setAdresseOrganisation("avenue de Marseille");
        $orga3->setCodePostal('93000');
        $orga3->setNumeroTelephone('2039203949');

        $manager->persist($orga1);
        $manager->persist($orga2);
        $manager->persist($orga3);

//        Type contrat ///////////////////
        $contrat1 = new TypeContrat();
        $contrat1->setNomcontrat("CDI");

        $contrat2 = new TypeContrat();
        $contrat2->setNomcontrat("CDD");

        $manager->persist($contrat1);
        $manager->persist($contrat2);

//        Offre de Casting //////////////
        $offre1 = new OffreDeCasting();
        $offre1->setDateDebut(new \DateTime('2023-01-12'));
        $offre1->setDateFin(new \DateTime('2023-02-02'));
        $offre1->setIntituleOffre("Avenger 22");
        $offre1->setReferenceOffre(01);
        $offre1->setVille("New York");
        $offre1->setIdentifiantDomaine($domaine1);
        $offre1->setIdentifiantMetier($metier1);
        $offre1->setIdentifiantOrganisation($orga1);
        $offre1->setIdentifiantTypeContrat($contrat1);

        $offre2 = new OffreDeCasting();
        $offre2->setDateDebut(new \DateTime('2023-02-12'));
        $offre2->setDateFin(new \DateTime('2023-03-02'));
        $offre2->setIntituleOffre("Dede : Les 25 nains");
        $offre2->setReferenceOffre(02);
        $offre2->setVille("Gesnes");
        $offre2->setIdentifiantDomaine($domaine2);
        $offre2->setIdentifiantMetier($metier1);
        $offre2->setIdentifiantOrganisation($orga2);
        $offre2->setIdentifiantTypeContrat($contrat1);


        $offre3 = new OffreDeCasting();
        $offre3->setDateDebut(new \DateTime('2023-03-12'));
        $offre3->setDateFin(new \DateTime('2023-04-02'));
        $offre3->setIntituleOffre("BabySiting : 8");
        $offre3->setReferenceOffre(03);
        $offre3->setVille("Paris");
        $offre3->setIdentifiantDomaine($domaine2);
        $offre3->setIdentifiantMetier($metier1);
        $offre3->setIdentifiantOrganisation($orga3);
        $offre3->setIdentifiantTypeContrat($contrat1);


        $offre4 = new OffreDeCasting();
        $offre4->setDateDebut(new \DateTime('2023-04-12'));
        $offre4->setDateFin(new \DateTime('2023-05-02'));
        $offre4->setIntituleOffre("Very Bad Trip : Tokyo");
        $offre4->setReferenceOffre(04);
        $offre4->setVille("Tokyo");
        $offre4->setIdentifiantDomaine($domaine3);
        $offre4->setIdentifiantMetier($metier1);
        $offre4->setIdentifiantOrganisation($orga1);
        $offre4->setIdentifiantTypeContrat($contrat1);


        $manager->persist($offre1);
        $manager->persist($offre2);
        $manager->persist($offre3);
        $manager->persist($offre4);

        $domaineArray = array($domaine1,$domaine2,$domaine3);
        $metierArray = array($metier1,$metier2);
        $contratArray = array($contrat1,$contrat2);
        $orgaArray = array($orga1,$orga2,$orga3);

        $c = 0;

        for($c; $c < 100 ; $c++) {
            $rand_domaine = array_rand($domaineArray, 1);
            $rand_metier = array_rand($metierArray, 1);
            $rand_contrat = array_rand($contratArray, 1);
            $rand_orga = array_rand($orgaArray, 1);
            $faker = Faker\Factory::create('fr_FR');
            $offre = new OffreDeCasting();
            $offre->setDateDebut($faker->dateTime());
            $offre->setDateFin($faker->dateTime());
            $offre->setIntituleOffre($faker->name() . "\n");
            $offre->setReferenceOffre(5+$c);
            $offre->setVille($faker->city());
            $offre->setIdentifiantDomaine($domaineArray[$rand_domaine]);
            $offre->setIdentifiantMetier($metierArray[$rand_metier]);
            $offre->setIdentifiantOrganisation($orgaArray[$rand_orga]);
            $offre->setIdentifiantTypeContrat($contratArray[$rand_contrat]);
            $manager->persist($offre);
        }

        $i = 0;

        $prenoms = array('alexis','william',"victor","julien", "maxime", "kevin", "bilal", "adrien", "landry", "swan", "stylian", "clement", "Tawfiq", "Maeva", "Marine", "totof", "Didier","Adam","Alex","Alexandre","Alexis","Anthony","Antoine","Benjamin","Cédric","Dylan","Édouard","Elliot","Émile","Étienne","Félix","Gabriel","Guillaume","Hugo","Isaac","Jacob","Alexia","Alice","Alicia","Amélie","Anaïs","Annabelle","Arianne","Audrey","Aurélie","Camille","Catherine","Charlotte","Chloé","Clara","Coralie","Daphnée");
        $noms = array("Beucher","Godin","Girault","Morin","Orell","Grandin","Quiercelin","Cadi Tazi","Guilmin","santos","Blanchais","Pichero");

        for ($i; $i < 30 ; $i++) {
            $rand_noms = array_rand($noms, 1);
            $rand_prenoms = array_rand($prenoms, 1);
            $artiste = new Artiste();
            $artiste->setIdcivilite($civ1);
            $password= $this->hasher->hashPassword($artiste, 'Test9*');
            $artiste->setPassword($password);
            $artiste->setNom($noms[$rand_noms]);
            $artiste->setDateNaissance(new \DateTime('2001-11-29'));
            $artiste->SetPrenom(strtolower($prenoms[$rand_prenoms]));
            $artiste->Setlogin(strtolower($prenoms[$rand_prenoms]."@test.com"));
            $artiste->setModifieddate(new \DateTime());
            $manager->persist($artiste);
        }
        $manager->flush();
    }
}
