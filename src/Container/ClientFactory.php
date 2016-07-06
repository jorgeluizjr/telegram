<?php

namespace Telegram\Container;

use Interop\Container\ContainerInterface;
use Telegram\Http\Client;

class ClientFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get('config');
        $client = new Client();
        if (array_key_exists('telegram', $config) && array_key_exists('token', $config['telegram']))
            $client->setToken($config['telegram']['token']);

        return $client;
    }
}