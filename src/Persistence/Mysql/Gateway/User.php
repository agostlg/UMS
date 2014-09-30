<?php

namespace UMS\Persistence\Mysql\Gateway;

use UMS\Entity\User as UserEntity;
use UMS\Persistence\Mysql\Mysql;

class User
{
    /**
     * @var \UMS\Persistence\Mysql\Mysql
     */
    protected $adapter;

    public function __construct()
    {
        $this->adapter = new Mysql();
    }

    public function persist(UserEntity $entity)
    {
        $row = (object)array();
        if (!is_null($entity->getId())) {
            $row->id = $entity->getId();
        }
        $row->name = $entity->getName();

        $this->adapter->getMapper()->user->persist($row);
        $this->adapter->getMapper()->flush();

        $entity->setId($row->id);

        return $entity;
    }

    public function delete(UserEntity $entity)
    {
        $row = (object)array();
        $row->id = $entity->getId();

        $this->adapter->getMapper()->user->remove($row);
        $this->adapter->getMapper()->flush();

        return $entity;
    }

    public function retrieve(UserEntity $entity)
    {
        $id = $entity->getId();

        $row = $this->adapter->getMapper()->role[$id]->fetch();

        $entity->setId($row->id_role);
        $entity->setName($row->name);

        return $entity;
    }
}
