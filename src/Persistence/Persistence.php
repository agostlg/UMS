<?php

namespace UMS\Persistence;

use UMS\Entity\Entity;
use UMS\Persistence\Dummy\Dummy;
use UMS\Persistence\Mysql\Mysql;

class Persistence
{
    /**
     * @var File;
     */
    protected $defaultAdapter;

    /**
     * The right way would be to have a configuration file,
     * but for the sake of time I'm doing like this.
     *
     * @note It's nice to have this method instead of calling the *Whatever*
     * class every time one needs to use persistence
     * because if we decide to change the adapter it's easier.
     *
     * @return Dummy
     */
    public function getDefaultAdapter()
    {
        if (!isset($this->defaultAdapter)) {
            $this->defaultAdapter = new Mysql();
        }
        return $this->defaultAdapter;
    }

    public function persist(Entity $entity)
    {
        return $this->getGateway($entity)->persist($entity);
    }

    public function delete(Entity $entity)
    {
        return $this->getGateway($entity)->delete($entity);
    }

    public function retrieve(Entity $entity)
    {
        return $this->getGateway($entity)->retrieve($entity);
    }

    protected function getGateway(Entity $entity)
    {
        $gatewayName = $entity->getGatewayName();
        return $this->getDefaultAdapter()->getGateway($gatewayName);
    }
}
