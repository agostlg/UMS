<?php

namespace UMS\Persistence\Dummy;

use UMS\Persistence\Dummy\Gateway\Role;
use UMS\Persistence\Dummy\Gateway\User;

class Dummy
{
    /**
     * @var \UMS\Persistence\Dummy\Gateway\User
     */
    public $user;

    /**
     * @var \UMS\Persistence\Dummy\Gateway\Role
     */
    public $role;

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

        if ($gatewayName == 'role_users') {
            return new Role();
        }
    }
}
