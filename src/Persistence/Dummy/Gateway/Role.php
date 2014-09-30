<?php

namespace UMS\Persistence\Dummy\Gateway;

use UMS\Entity\Role as RoleEntity;

class Role
{
    public function persist(RoleEntity $entity)
    {
        $entity->setId(1);
        return $entity;
    }

    public function delete(RoleEntity $entity)
    {
        return $entity;
    }

    public function retrieve(RoleEntity $entity)
    {
        $entity->setId(1);
        return $entity;
    }
}
