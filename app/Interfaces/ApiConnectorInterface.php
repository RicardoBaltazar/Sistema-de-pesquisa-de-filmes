<?php

namespace App\Interfaces;

interface ApiConnectorInterface
{
    public function call($url);
}
