<?php

namespace src\Transport;

class ConfigAdapter
{
    protected $host;

    protected $port;

    protected $enc;

    protected $username;

    protected $password;

    /**
     * ConfigAdapter constructor.
     * @param $host
     * @param $port
     * @param $enc
     * @param $username
     * @param $password
     */
    public function __construct($host, $port, $enc, $username, $password)
    {
        $this->host = $host;
        $this->port = $port;
        $this->enc = $enc;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param mixed $host
     */
    public function setHost($host): void
    {
        $this->host = $host;
    }

    /**
     * @return mixed
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param mixed $port
     */
    public function setPort($port): void
    {
        $this->port = $port;
    }

    /**
     * @return mixed
     */
    public function getEnc()
    {
        return $this->enc;
    }

    /**
     * @param mixed $enc
     */
    public function setEnc($enc): void
    {
        $this->enc = $enc;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

}