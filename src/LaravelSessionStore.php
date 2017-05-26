<?php

namespace Laravel\FlashMessage;

use Illuminate\Session\Store;

class LaravelSessionStore implements SessionStore
{
    /**
     * @var \Illuminate\Session\Store
     */
    private $session;

    /**
     * Create a new session store instance.
     *
     * @param Store $session
     */
    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Flash a message to the session.
     *
     * @param string $name
     * @param array $data
     * @return void
     */
    public function flash(string $name, array $data)
    {
        $this->session->flash($name, $data);
    }
}
