<?php
namespace Nuwber\Events\Tomoni\Listeners;

class ProductListener extends Listener
{
    protected function getServiceEvent()
    {
        return "Product";
    }
}
