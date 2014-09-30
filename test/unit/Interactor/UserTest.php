<?php

namespace test\unit\Interactor;

use UMS\Entity\User;
use \UMS\Interactor\User as UserInteractor;

class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testUserWhenAdmin()
    {
        $userTryingToAdd = new User();
        $userTryingToAdd->setIsAdmin(true);

        $user = new User();
        $user->setName('Darth Vader');

        $userInteractor = new UserInteractor();
        $user = $userInteractor->add($userTryingToAdd, $user);

        $userInteractor->delete($userTryingToAdd, $user);
    }

    public function testUserDeleteWhenNotAdmin()
    {
        $this->setExpectedException('Exception');

        $userTryingToAdd = new User();
        $userTryingToAdd->setIsAdmin(false);

        $userToAdd = new User();
        $userToAdd->setName('Darth Vader');

        $userInteractor = new UserInteractor();
        $userInteractor->delete($userTryingToAdd, $userToAdd);
    }

    public function testUserAddWhenNotAdmin()
    {
        $this->setExpectedException('Exception');

        $userTryingToAdd = new User();
        $userTryingToAdd->setIsAdmin(false);

        $userToAdd = new User();
        $userToAdd->setName('Darth Vader');

        $userInteractor = new UserInteractor();
        $userInteractor->add($userTryingToAdd, $userToAdd);
    }
}
