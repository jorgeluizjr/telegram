<?php

namespace Telegram\Http;

use Zend\Http\Client as ClientZend;

class Client extends ClientZend
{
    const URL_API_TELEGRAM = 'https://api.telegram.org';

    private $token;

    public function __construct($uri = nulal, $options = null, $token = null)
    {
        if ($uri === null) {
            $uri = self::URL_API_TELEGRAM;
        }

        if ($token !== null)
            $this->setToken($token);

        parent::__construct($uri, $options);
    }

    public function getUpdates()
    {
        $this->setUri(self::URL_API_TELEGRAM. '/bot' . $this->getToken() . '/getUpdates');
        return $this->send();
    }

    public function sendMessage(array $arrPost)
    {
        $this->setUri(self::URL_API_TELEGRAM. '/bot' . $this->getToken() . '/sendMessage')
            ->setMethod('POST')
            ->setParameterPost($arrPost);
        return $this->send();
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     * @return Client
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    public function __call($name, $arguments)
    {
        var_dump($name, $arguments);exit;
    }

}
