<?php
/**
 * Created by PhpStorm.
 * User: xupanjiang
 * Date: 19/07/18
 * Time: 11:41 AM
 */

namespace App\DataFixtures;


use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixture extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('admin');
        $user->setName('Administrator');
        $user->setEmail('admin@example.com');
        $user->setRoles(array('ROLE_SUPER_ADMIN'));
        $encodedPassword = $this->encoder->encodePassword($user, 'abcd');
        $user->setPassword($encodedPassword);
        $manager->persist($user);

        $user1 = new User();
        $user1->setUsername('customer');
        $user1->setName('Customer');
        $user1->setEmail('customer@example.com');
        $user1->setRoles(array('ROLE_USER'));
        $encodedPassword1 = $this->encoder->encodePassword($user1, 'abcd');
        $user1->setPassword($encodedPassword1);
        $manager->persist($user1);

        $manager->flush();
    }
}