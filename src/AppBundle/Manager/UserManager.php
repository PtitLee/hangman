<?php

namespace AppBundle\Manager;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use AppBundle\Entity\User;

class UserManager
{
    /**
     * @var UserPasswordEncoder
     */
    private $encoder;

    /**
     * @param UserPasswordEncoder $encoder
     */
    public function __construct(UserPasswordEncoder $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * @param User $user
     *
     * @return User
     */
    public function manageCredentials(User $user)
    {
        $encodedPassword = $this->encoder->encodePassword($user, $user->getPassword());
        $user->setPassword($encodedPassword);

        return $user;
    }
}
