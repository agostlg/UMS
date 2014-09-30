<?php

namespace UMS\Persistence\Mysql\Gateway;

use UMS\Entity\Role as RoleEntity;
use UMS\Persistence\Mysql\Mysql;

class Role
{
    /**
     * @var \UMS\Persistence\Mysql\Mysql
     */
    protected $adapter;

    public function __construct()
    {
        $this->adapter = new Mysql();
    }

    public function persist(RoleEntity $entity)
    {
        $row = (object)array();
        $row->id = $entity->getId();
        $row->name = $entity->getName();

        $this->adapter->getMapper()->role->persist($row);
        $this->adapter->getMapper()->flush();

        $entity->setId($row->id);

        return $entity;
    }

    public function delete(RoleEntity $entity)
    {
        $row = (object)array();
        $row->id = $entity->getId();
        $row->name = $entity->getName();

        $this->adapter->getMapper()->role->remove($row);
        $this->adapter->getMapper()->flush();

        return $entity;
    }

    public function retrieve(RoleEntity $entity)
    {
        $id = $entity->getId();

        $row = $this->adapter->getMapper()->role[$id]->fetch();

        $entity->setId($row->id_role);
        $entity->setName($row->name);

        return $entity;
    }
}
