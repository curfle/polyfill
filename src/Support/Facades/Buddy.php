<?php

namespace Polyfill\Support\Facades;

use Closure;
use Polyfill\Agreements\Console\Kernel as ConsoleKernelAgreement;
use Polyfill\Console\Command;
use Polyfill\Console\Input;
use Polyfill\Console\Output;
use Polyfill\Essence\Console\Kernel;

/**
 * @method static Command command(Command|string $command, Closure $callback=null)
 * @method static Command[] getAllCommands()
 * @method static Output run(Input $input)
 *
 * @see Kernel
 */
class Buddy extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() : string
    {
        return ConsoleKernelAgreement::class;
    }
}