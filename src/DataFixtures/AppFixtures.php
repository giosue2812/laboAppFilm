<?php

namespace App\DataFixtures;

use App\Entity\Commentaires;
use App\Entity\Film;
use App\Entity\Personne;
use App\Entity\Role;
use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Persistence\ObjectManager;
use Metadata\Tests\Driver\Fixture\A\A;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\RememberMe\PersistentTokenBasedRememberMeServices;

class AppFixtures extends Fixture
{

    private $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $user = new Utilisateur();
        $role = new Role();
        $film = new Film();
        $personneReal = new Personne();
        $personneAct = new Personne();
        $personneAct2 = new Personne();
        $commentaire = new Commentaires();

        $date = new \DateTime();

        $role->setLabel('ROLE_ADMIN');
        $manager->persist($role);
        $manager->flush();

        $user->setNom('Liuzzo');
        $user->setPrenom('Giosue');
        $user->setAdRue('Residence Julles Trullemans 11');
        $user->setAdCodePostal(1480);
        $user->setAdVille('Saintes');
        $user->setPseudo('angelus2812');
        $user->setRolesId($role);
        $user->setRoles([$role->getLabel()]);
        $user->setPassword($this->encoder->encodePassword($user,'Elisa2812'));
        $manager->persist($user);
        $manager->flush();

        $personneReal->setNom('Kane');
        $personneReal->setPrenom('Bob');
        $personneReal->setAdRue('Rue des martir 11');
        $personneReal->setAdCodePostal(50045);
        $personneReal->setAdVille('Paris');
        $manager->persist($personneReal);
        $manager->flush();

        $personneAct->setNom('Bale');
        $personneAct->setPrenom('Christian');
        $personneAct->setAdRue('Rue des centre 20');
        $personneAct->setAdCodePostal(52251);
        $personneAct->setAdVille('Floride');
        $manager->persist($personneAct);
        $manager->flush();

        $personneAct2->setNom('Evans');
        $personneAct2->setPrenom('Chris');
        $personneAct2->setAdRue('Rue des Anges 20');
        $personneAct2->setAdCodePostal(30051);
        $personneAct2->setAdVille('Loas Angels');
        $manager->persist($personneAct2);
        $manager->flush();

        $film->setTitre('Batman');
        $film->setDescription('Film avec Christian Bale');
        $film->setDateSortie($date->setDate('2020', '10','20'));
        $film->setPersonnes(new ArrayCollection([$personneReal]));
        $film->setPersonnes(new ArrayCollection([$personneAct]));
        $film->setRealisateurs($personneReal);
        $film->setBandeAnnoce('https://www.youtube.com/watch?v=neY2xVmOfUM');
        $film->setImage('http://localhost:8080/LaboAppFilm/BackEnd/public/images/Batman_Begins.jpg');
        $manager->persist($film);
        $manager->flush();

        $commentaire->setFilm($film->getTitre());
        $commentaire->setUtilisateurs($user);
        $commentaire->setContent('Super Film');
        $commentaire->setFilms($film);
        $manager->persist($commentaire);
        $manager->flush();
    }
}
