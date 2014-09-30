<?php

namespace UMS\Interactor;

use Exception;
use UMS\Entity\Role as RoleEntity;
use UMS\Entity\User as UserEntity;
use UMS\Persistence\Persistence;

class Role
{
    const NOT_ADMIN_MESSAGE       = "Admins only can perform this task";
    const CANT_DELETE_HAVE_USERS  = "Can't delete this role, users assigned to it.";

    /**
     * @var \UMS\Persistence\Persistence
     */
    protected $persistence;

    public function __construct()
    {
        $this->persistence = new Persistence();
    }

    public function add(UserEntity $userTryingToAdd, RoleEntity $roleToBeAdd)
    {
        $this->onlyAdminCanPerformThis($userTryingToAdd);

        $result = $this->persistence->persist($roleToBeAdd);

        return $result;
    }

    public function delete(UserEntity $userTryingToAdd, RoleEntity $roleToBeDeleted)
    {
        $this->onlyAdminCanPerformThis($userTryingToAdd);

        $users = $roleToBeDeleted->getUserCollection();

        if (!empty($users)) {
            throw new Exception(static::CANT_DELETE_HAVE_USERS);
        }

        $this->persistence->delete($roleToBeDeleted);
    }

    protected function onlyAdminCanPerformThis(UserEntity $user)
    {
        if ($user->getIsAdmin() === false) {
            throw new Exception(static::NOT_ADMIN_MESSAGE);
        }
    }
}
