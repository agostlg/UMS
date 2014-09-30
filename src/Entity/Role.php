<?php

namespace UMS\Entity;

class Role implements Entity
{
    protected $id;
    protected $name;

    public function getGatewayName()
    {
        return 'role';
    }

    /**
     * @var \UMS\Entity\Collection\User;
     */
    protected $userCollection;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return \UMS\Entity\Collection\User
     */
    public function getUserCollection()
    {
        return $this->userCollection;
    }

    /**
     * @param \UMS\Entity\Collection\User $userCollection
     */
    public function setUserCollection($userCollection)
    {
        $this->userCollection = $userCollection;
    }
}
