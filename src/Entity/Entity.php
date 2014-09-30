<?php

namespace UMS\Entity;


interface Entity
{
    public function getId();
    public function setId($id);
    public function getGatewayName();
}
