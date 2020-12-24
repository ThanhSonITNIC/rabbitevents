<?php
namespace Nuwber\Events\Tomoni;

class RabbitEventsServiceProvider extends \Nuwber\Events\RabbitEventsServiceProvider
{
    protected $listen = [
        'Auth.*' => [
            Listeners\AuthListener::class
        ],
        'Product.*' => [
            Listeners\ProductListener::class
        ],
        'Order.*' => [
            Listeners\OrderListener::class
        ],
        'Accounting.*' => [
            Listeners\AccountingListener::class
        ],
        'Warehouse.*' => [
            Listeners\WarehouseListener::class
        ],
        'Nofitication.*' => [
            Listeners\NofiticationListener::class
        ],
    ];
}

