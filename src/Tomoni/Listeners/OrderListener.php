<?php
namespace Nuwber\Events\Tomoni\Listeners;

class OrderListener extends Listener
{
    protected function getServiceEvent()
    {
        return "Order";
    }
}
