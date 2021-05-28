<?php

namespace src\Transport;

use Monolog\Handler\StreamHandler;
use src\Transport\TransportInterface;
use Monolog\Formatter\JsonFormatter;
use Monolog\Logger;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class MailTransport implements Transportinterface
{
    public function send(Message $message): bool
    {
        $log = new Logger('Mailer');

        $formater = new JsonFormatter();

        $stream = new StreamHandler(__DIR__ . '/../../logs/dev.logs');
        $stream->setFormatter($formater);

        $log->pushHandler($stream);

        $log->warning('Warning');
        $log->error('Error');

        $config = json_decode(file_get_contents(__DIR__ . '/../../config/config.txt'), true);

        $transport = (new Swift_SmtpTransport(
            $config['host'],
            $config['port'],
            $config['encryption']
        ,))
            ->setUsername($config['username'])
            ->setPassword($config['password'])
        ;

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a message
        $message = (new Swift_Message($message->getTitle()))
            ->setFrom($message->getFrom())
            ->setTo($message->getTo())
            ->setBody($message->getBody(),'text/html')
        ;

        // Send the message
        return (bool) $mailer->send($message);
    }
}