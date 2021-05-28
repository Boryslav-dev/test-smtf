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
    public $transport;

    /**
     * MailTransport constructor.
     * @param $transport
     */
    public function setConfig(ConfigAdapter $config)
    {
        $this->transport = (new Swift_SmtpTransport(
            $config->getHost(),
            $config->getPort(),
            $config->getEnc()
            ,))
            ->setUsername($config->getUsername())
            ->setPassword($config->getPassword())
        ;
    }

    public function send(Message $message): bool
    {
        $log = new Logger('Mailer');

        $formater = new JsonFormatter();

//        $stream = new StreamHandler(__DIR__ . '/../../logs/dev.logs');
//        $stream->setFormatter($formater);
//
//        $log->pushHandler($stream);
//
//        $log->warning('Warning');
//        $log->error('Error');

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($this->transport);

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