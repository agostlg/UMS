<?php

namespace UMS\Persistence\Dummy\Gateway;

use UMS\Entity\User as UserEntity;

class User
{
    public function persist(UserEntity $entity)
    {
        $entity->setId(1);
        return $entity;
    }

    public function delete(UserEntity $entity)
    {
        return $entity;
    }

    public function retrieve(UserEntity $entity)
    {
        $entity->setId(1);
        return $entity;
    }
}
