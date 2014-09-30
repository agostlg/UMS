<?php

namespace UMS\Persistence\Mysql;

use Respect\Relational\Mapper;
use UMS\Persistence\Mysql\Gateway\Role;
use UMS\Persistence\Mysql\Gateway\RoleUser;
use UMS\Persistence\Mysql\Gateway\User;

class Mysql
{
    /**
     * @var Mapper
     */
    protected $mapper;

    /**
     * @var \UMS\Persistence\Mysql\Gateway\User
     */
    public $user;

    /**
     * @var \UMS\Persistence\Mysql\Gateway\Role
     */
    public $role;

    public function getMapper()
    {
        if (!isset($this->mapper)) {
            $this->mapper = new Mapper(new \PDO('mysql:host=127.0.0.1;port=3306;dbname=ums', 'root', 'root'));
        }

        return $this->mapper;
    }

    /**
     * @TODO refactor
     * @param $gatewayName
     * @return Role|User
     */
    public function getGateway($gatewayName)
    {
        //I know this sucks.
        if ($gatewayName == 'user') {
            return new User();
        }

        if ($gatewayName == 'role') {
            return new Role();
        }

        if ($gatewayName == 'role_user') {
            return new RoleUser();
        }
    }
}
