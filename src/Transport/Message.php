<?php

namespace src\Transport;

class Message
{
    protected $body;

    protected $to;

    protected $from;

    protected $title;

    protected $layout;

    /**
     * Message constructor.
     * @param $body
     * @param $to
     * @param $from
     */
    public function __construct($body, $to, $from, $title, $layout = '/../Layouts/register.php')
    {
        $this->layout = $layout;
        $this->body = $body;
        $this->to = $to;
        $this->from = $from;
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }
    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body): void
    {
        $this->body = $body;
    }

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param mixed $to
     */
    public function setTo($to): void
    {
        $this->to = $to;
    }

    /**
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param mixed $from
     */
    public function setFrom($from): void
    {
        $this->from = $from;
    }

    public function renderView($layout, $body)
    {
        ob_start();
        include $layout;
        $var = ob_get_contents();
        ob_end_clean();
        return $var;
    }

    public function sendMail()
    {
        $this->body = $this->renderView($this->layout, $this->body);
        $mail = new MailTransport();
        $mail->send($this);
    }
}