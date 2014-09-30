<?php

namespace test\unit\Interactor;

use UMS\Entity\Role;
use UMS\Entity\User;
use \UMS\Interactor\Role as RoleInteractor;
use \UMS\Entity\Collection\User as UserCollection;

class RoleTest extends \PHPUnit_Framework_TestCase
{

    public function testAddRoleWhenNotAdmin()
    {
        $this->setExpectedException('Exception');

        $userTryingToAdd = new User();
        $userTryingToAdd->setIsAdmin(false);

        $roleToAdd = new Role();
        $roleToAdd->setName('Lord Sith');

        $roleInteractor = new RoleInteractor();
        $roleInteractor->add($userTryingToAdd, $roleToAdd);
    }

    public function testAddRoleWhenAdmin()
    {
        $userTryingToAdd = new User();
        $userTryingToAdd->setIsAdmin(true);

        $role = new Role();
        $role->setName('Lord Sith');

        $roleInteractor = new RoleInteractor();

        $role = $roleInteractor->add($userTryingToAdd, $role);

        $roleInteractor->delete($userTryingToAdd, $role);
    }

    public function testDeleteRoleWhenNotAdmin()
    {
        $this->setExpectedException('Exception');

        $userTryingToAdd = new User();
        $userTryingToAdd->setIsAdmin(false);

        $roleToAdd = new Role();
        $roleToAdd->setName('Lord Sith');

        $roleInteractor = new RoleInteractor();
        $roleInteractor->delete($userTryingToAdd, $roleToAdd);
    }

    public function testDeleteRoleWhenAdminAndAStillUsersInRole()
    {
        $this->setExpectedException('Exception');

        $userTryingToAdd = new User();
        $userTryingToAdd->setIsAdmin(true);

        $user1 = new User();
        $user1->setName('Darth Vader');

        $role = new Role();

        $userCollection = new UserCollection();
        $userCollection->add($user1);

        $role->setUserCollection($userCollection);
        $role->setName('Lord Sith');

        $roleInteractor = new RoleInteractor();
        $roleInteractor->delete($userTryingToAdd, $role);
    }
}
