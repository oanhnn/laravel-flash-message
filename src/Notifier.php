<?php

namespace Laravel\FlashMessage;

use Illuminate\Support\Collection;

class Notifier
{
    const SESSION_KEY = 'flash_notification';

    /**
     * @var SessionStore
     */
    protected $session;

    /**
     * @var Collection
     */
    protected $messages;

    /**
     * Create a new Flash Notifier instance.
     *
     * @param SessionStore $session
     */
    public function __construct(SessionStore $session)
    {
        $this->session = $session;
        $this->messages = new Collection();
    }

    /**
     * Magic call method
     *
     * @param string $name
     * @param array  $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        $levels = [
            'error' => true,
            'warning' => true,
            'info' => true,
            'success' => true,
        ];

        if (isset($levels[$name]) && count($arguments) > 0) {
            return $this->message((string)$arguments[0], $name);
        }
    }

    /**
     * Flash a general message.
     *
     * @param string $message
     * @param string|null $level
     * @return self
     */
    public function message(string $message, string $level = null)
    {
        $this->messages->push(new Message($message, $level ?? 'info'));
        $this->session->flash(self::SESSION_KEY, $this->messages->all());

        return $this;
    }

    /**
     * Make last flash message to overlay message with title
     *
     * @param string $title
     * @return self
     */
    public function overlay(string $title)
    {
        $this->messages->last()->update([
            'overlay' => true,
            'title' => $title,
        ]);

        return $this;
    }

    /**
     * Add an "important" flag for last flash message in the session.
     *
     * @return self
     */
    public function important()
    {
        $this->messages->last()->update([
            'important' => true,
        ]);

        return $this;
    }
}
