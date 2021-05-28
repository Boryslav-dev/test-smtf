<?php

namespace src\Transport;

class MailCompile
{
    public function run(Message $message, ConfigAdapter $configAdapter)
    {
        $message->body = $message->renderView($message->layout, $message->body);
        $mail = new MailTransport();
        $mail->setConfig($configAdapter);
        $mail->send($message);
    }
}