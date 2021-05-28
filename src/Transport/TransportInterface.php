<?php

namespace src\Transport;

interface TransportInterface
{
    public function send(Message $message);
}