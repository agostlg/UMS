<?php

namespace UMS\Interactor;

use Exception;
use UMS\Entity\RoleUser as RoleUserEntity;
use UMS\Entity\User as UserEntity;
use UMS\Persistence\Persistence;

class RoleUser
{
    const NOT_ADMIN_MESSAGE = "Admins only can perform this task";
    const CANT_ADD_USER_ALREADY_IN_COLLECTION = "Can't add user to this role, already there.";

    /**
     * @var \UMS\Persistence\Persistence
     */
    protected $persistence;

    public function __construct()
    {
        $this->persistence = new Persistence();
    }

    public function add(UserEntity $userTryingToAdd, RoleUserEntity $roleUserToAdd)
    {
        $this->onlyAdminCanPerformThis($userTryingToAdd);

        if ($this->checkRoleUserExist($roleUserToAdd)) {
            throw new \Exception(static::CANT_ADD_USER_ALREADY_IN_COLLECTION);
        }

        $result = $this->persistence->persist($roleUserToAdd);

        return $result;
    }

    protected function checkRoleUserExist(RoleUserEntity $roleUser)
    {
        $entity = $this->persistence->retrieve($roleUser);
        $id     = $entity->getId();

        if (isset($id)) {
            return true;
        }
        return false;
    }

    public function delete(UserEntity $userTryingToAdd, RoleUserEntity $roleUserToDelete)
    {
        $this->onlyAdminCanPerformThis($userTryingToAdd);

        $this->persistence->delete($roleUserToDelete);
    }

    protected function onlyAdminCanPerformThis(UserEntity $user)
    {
        if ($user->getIsAdmin() === false) {
            throw new Exception(static::NOT_ADMIN_MESSAGE);
        }
    }
}
