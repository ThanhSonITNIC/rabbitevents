<?php
namespace Nuwber\Events\Tomoni\Listeners;

class NotificationListener extends Listener
{
    protected function getServiceEvent()
    {
        return "Notification";
    }
}
