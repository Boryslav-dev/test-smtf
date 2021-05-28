<?php

namespace src\Transport;

interface TransportInterface
{
    public function setConfig(ConfigAdapter $configAdapter);

    public function send(Message $message);
}