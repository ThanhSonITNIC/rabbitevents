<?php
namespace Nuwber\Events\Tomoni;

class Publisher
{
    /**
     *
     * @param $event
     * @param $payload
     *
     * @return Array
     */
    public static function beforePublish($event, $payload)
    {
        $event = self::getPrefix().'.'.$event;

        $payload = [
            'data' => $payload,
            'user' => auth()->user(),
        ];

        return [$event, $payload];
    }

    public static function getPrefix()
    {
        return app()['config']['rabbitevents']['prefix_event'];
    }
}
