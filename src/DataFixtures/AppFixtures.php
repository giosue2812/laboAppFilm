<?php

namespace App\DataFixtures;

use App\Entity\Role;
use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

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

    }
}
