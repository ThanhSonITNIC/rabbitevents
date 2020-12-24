<?php
namespace Nuwber\Events\Tomoni\Listeners;

class AuthListener extends Listener
{
    protected function getServiceEvent()
    {
        return "Auth";
    }
}
