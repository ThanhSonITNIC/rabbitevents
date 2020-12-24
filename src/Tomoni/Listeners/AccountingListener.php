<?php
namespace Nuwber\Events\Tomoni\Listeners;

class AccountingListener extends Listener
{
    protected function getServiceEvent()
    {
        return "Accounting";
    }
}
