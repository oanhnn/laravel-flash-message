<?php

namespace Laravel\FlashMessage;

interface SessionStore
{
    /**
     * Flash a message to the session.
     *
     * @param string $name
     * @param array $data
     * @return void
     */
    public function flash(string $name, array $data);
}
