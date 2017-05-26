<?php

namespace Laravel\FlashMessage\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Flash
 *
 * @method static \Laravel\FlashMessage\Notifier error(string $message)
 * @method static \Laravel\FlashMessage\Notifier warning(string $message)
 * @method static \Laravel\FlashMessage\Notifier info(string $message)
 * @method static \Laravel\FlashMessage\Notifier success(string $message)
 */
class Flash extends Facade
{
    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'flash';
    }
}
