<?php
namespace Nuwber\Events\Tomoni\Listeners;

use Illuminate\Support\Str;

abstract class Listener
{
    public function handle($event, $payload)
    {
        try {
            $payload = $payload[0];

            // login if exist user
            if (array_key_exists('user', $payload) && !empty($payload['user'])) {
                $this->setAuth($payload['user']);
            }

            // exec
            app()->call($this->getExecutor($event), $payload);
        } catch (\Throwable $th) {
            // class action not found
        }
    }

    public function middleware($event, $payload)
    {
        // Stops the propagation if return `false`
    }

    protected function setAuth($userData)
    {
        $user = app()->make($this->getUserModel())->fill($userData);
        auth()->guard($this->getGuard())->setUser($user);
    }

    /**
     * Return class/action@exec
     * 
     * @param $event *.*.*
     */
    protected function getExecutor(string $event)
    {
        $paths = explode('.', $event);
        $resource = Str::ucFirst($paths[1]);
        $action = Str::ucFirst($paths[2]);
        /**
         * ------
         * Must validate before return
         * @throws Exception
         * ------
         */
        return $this->getPathExecutor().'\\'.$this->getServiceEvent().'\\'.$resource.'\\'.$action.'@exec';
    }

    abstract protected function getServiceEvent();

    protected function getPathExecutor()
    {
        return app()['config']['rabbitevents']['path_exectors'];
    }

    protected function getUserModel()
    {
        return app()['config']['rabbitevents']['user_model'];
    }

    protected function getGuard()
    {
        return app()['config']['rabbitevents']['guard'];
    }
}
