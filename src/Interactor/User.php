<?php

namespace UMS\Interactor;

use UMS\Entity\User as UserEntity;
use UMS\Persistence\Persistence;

class User
{
    const NOT_ADMIN_MESSAGE = "Admins only can perform this task";

    /**
     * @var \UMS\Persistence\Persistence
     */
    protected $persistence;

    public function __construct()
    {
        $this->persistence = new Persistence();
    }

    public function add(UserEntity $userTryingToAdd, UserEntity $userToBeAdd)
    {
        $this->onlyAdminCanPerformThis($userTryingToAdd);

        $entity = $this->persistence->persist($userToBeAdd);

        return $entity;
    }

    public function delete(UserEntity $userTryingToAdd, UserEntity $userToBeDeleted)
    {
        $this->onlyAdminCanPerformThis($userTryingToAdd);
        $entity = $this->persistence->delete($userToBeDeleted);

        return $entity;
    }

    protected function onlyAdminCanPerformThis(UserEntity $user)
    {
        if ($user->getIsAdmin() === false) {
            throw new \Exception(static::NOT_ADMIN_MESSAGE);
        }
    }
}
