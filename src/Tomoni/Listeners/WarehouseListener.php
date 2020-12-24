<?php
namespace Nuwber\Events\Tomoni\Listeners;

class WarehouseListener extends Listener
{
    protected function getServiceEvent()
    {
        return "Warehouse";
    }
}
