<?php

include __DIR__ . '/vendor/autoload.php';
include __DIR__ . '/credentials.php';

use Discord\Discord;
use Discord\Parts\Channel\Message;
use Discord\WebSockets\Intents;
use Discord\WebSockets\Event;

$discord = new Discord([
    'token' => TOKEN,
    'intents' => [
        Intents::GUILDS, Intents::GUILD_BANS, Intents::GUILD_MESSAGES, Intents::DIRECT_MESSAGES
    ],

]);

$discord->on('ready', function (Discord $discord) {
    echo "Bot is ready!", PHP_EOL;

    // Listen for messages.
    $discord->on(Event::MESSAGE_CREATE, function (Message $message, Discord $discord) {
        echo "{$message->author->username}: {$message->content}", PHP_EOL;
    });
});

$discord->run();
