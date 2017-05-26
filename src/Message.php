<?php

namespace Laravel\FlashMessage;

class Message implements \ArrayAccess
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     * Message constructor.
     *
     * @param string $message
     * @param string $level
     */
    public function __construct(string $message, string $level)
    {
        $this->data = $this->update([
            'message' => $message,
            'level' => $level,
        ]);
    }

    /**
     * @param string|int $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    /**
     * @param string|int $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->data[$offset] ?? null;
    }

    /**
     * @param string|int $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        $this->data[$offset] = $value;
    }

    /**
     * @param string|int $offset
     */
    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }

    /**
     * Update the attributes.
     *
     * @param array $attributes
     */
    public function update($attributes = [])
    {
        $this->data = array_merge($this->data, $attributes);
    }
}
