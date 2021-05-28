<?php

namespace src\Transport;

class ConfigAdapter
{

    function setConfig($host, $port, $encryption, $username, $password) {

        $result = array();

        $result['host'] = $host;
        $result['port'] = $port;
        $result['encryption'] = $encryption;
        $result['username'] = $username;
        $result['password'] = $password;

        file_put_contents(__DIR__ . '/../../config/config.txt', json_encode($result));
    }

}