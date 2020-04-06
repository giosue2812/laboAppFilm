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
        $personne = new Personne();
        $personneAct = new Personne();
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
        $user->setIdRole($role->getId());
        $user->setRoles([$role->getLabel()]);
        $user->setPassword($this->encoder->encodePassword($user,'Elisa2812'));
        $manager->persist($user);
        $manager->flush();

        $personne->setNom('Kane');
        $personne->setPrenom('Bob');
        $personne->setAdRue('Rue des martir 11');
        $personne->setAdCodePostal(50045);
        $personne->setAdVille('Paris');
        $manager->persist($personne);
        $manager->flush();

        $personneAct->setNom('Bale');
        $personneAct->setPrenom('Christian');
        $personneAct->setAdRue('Rue des centre 20');
        $personneAct->setAdCodePostal(52251);
        $personneAct->setAdVille('Floride');
        $manager->persist($personneAct);
        $manager->flush();

        $film->setTitre('Batman');
        $film->setDescription('Film avec Christian Bale');
        $film->setDateSortie($date->setDate('2020', '10','20'));
        $film->setIdReal($personne->getId());
        $film->setPersonnes(new ArrayCollection([$personneAct]));
        $manager->persist($film);
        $manager->flush();

        $commentaire->setFilm($film->getTitre());
        $commentaire->setIdUtilisateur($user->getId());
        $commentaire->setContent('Super Film');
        $commentaire->setIdFilm($film->getId());
        $manager->persist($commentaire);
        $manager->flush();
    }
}
