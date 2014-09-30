<?php

namespace test\unit\Interactor;


use UMS\Entity\RoleUser as RoleUserEntity;
use UMS\Entity\User as UserEntity;
use UMS\Entity\Role as RoleEntity;

class RoleUserTest extends \PHPUnit_Framework_TestCase
{
    public function testRoleUser()
    {
        $userTryingToAdd = new UserEntity();
        $userTryingToAdd->setIsAdmin(true);

        $role     = new RoleEntity();
        $user     = new UserEntity();
        $roleUser = new RoleUserEntity();

        $role->setName('Jedi');
        $user->setName('Luke');

        $roleInteractor = new \UMS\Interactor\Role();
        $userInteractor = new \UMS\Interactor\User();
        $roleUserInteractor = new \UMS\Interactor\RoleUser();

        $role = $roleInteractor->add($userTryingToAdd, $role);
        $user = $userInteractor->add($userTryingToAdd, $user);

        $roleUser->setRoleId($role->getId());
        $roleUser->setUserId($user->getId());

        $roleUserInteractor->add($userTryingToAdd, $roleUser);
    }
}
