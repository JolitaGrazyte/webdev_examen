<?php

namespace App;

interface AuthenticateUserListener
{
    public function userHasBeenRegistered($user);
}