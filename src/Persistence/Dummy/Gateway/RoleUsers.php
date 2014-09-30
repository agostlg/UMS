<?php

namespace UMS\Persistence\Dummy\Gateway;

use UMS\Entity\RoleUser as RoleUserEntity;

class Role
{
    public function persist(RoleUserEntity $entity)
    {
        $entity->setId(1);
        return $entity;
    }

    public function delete(RoleUserEntity $entity)
    {
        return $entity;
    }

    public function retrieve(RoleUserEntity $entity)
    {
        $entity->setId(1);
        return $entity;
    }
}
