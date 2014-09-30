<?php

namespace UMS\Persistence\Mysql\Gateway;

use UMS\Persistence\Mysql\Mysql;

class RoleUser
{
    /**
     * @var \UMS\Persistence\Mysql\Mysql
     */
    protected $adapter;

    public function __construct()
    {
        $this->adapter = new Mysql();
    }

    public function persist(\UMS\Entity\RoleUser $entity)
    {
        $row = (object)array();

        $row->role_id = $entity->getRoleId();
        $row->user_id = $entity->getUserId();

        $this->adapter->getMapper()->role_user->persist($row);
        $this->adapter->getMapper()->flush();

        $entity->setId($row->id);

        return $entity;
    }

    public function delete(\UMS\Entity\RoleUser $entity)
    {
        $row = (object)array();

        $row->id = $entity->getId();

        $this->adapter->getMapper()->role_user->remove($row);
        $this->adapter->getMapper()->flush();

        return $entity;
    }

    public function retrieve(\UMS\Entity\RoleUser $entity)
    {
        $row = $this->adapter->getMapper()->role_user(
            array(
                "role_id =" => $entity->getRoleId(),
                'user_id' => $entity->getUserId()
            )
        )->fetch();

        if (isset($row->id)) {
            $entity->setId($row->id);
        }

        return $entity;
    }
}
