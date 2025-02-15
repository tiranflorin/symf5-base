<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('test1@mail.com')
            ->setFirstName('Gica')
            ->setLastName('Hagi');

        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'pass'
        ));

        $manager->persist($user);
        $manager->flush();
    }
}
