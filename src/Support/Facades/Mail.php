<?php

namespace Polyfill\Support\Facades;

use Polyfill\Agreements\Mail\Mailer;

/**
 * @method static Mailer mailer(string $name)
 * @method static Mailer to(string|array $recipient)
 * @method static Mailer cc(string|array $recipient)
 * @method static Mailer bcc(string|array $recipient)
 * @method static Mailer replyTo(string|array $recipient)
 * @method static Mailer from(string|array $recipient)
 *
 * @see \Polyfill\Mail\MailManager
 */
class Mail extends Facade
{

    /**
     * @inheritDoc
     */
    protected static function getFacadeAccessor(): string
    {
        return "mail";
    }
}