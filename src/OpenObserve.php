<?php

namespace Krzysztofzylka\OpenObserve;

class OpenObserve
{

    /**
     * OpenObserve username
     * @var string
     */
    public static $USERNAME = '';

    /**
     * OpenObserve password
     * @var string
     */
    public static $PASSWORD = '';

    /**
     * OpenObserve host
     * @var string
     */
    public static $HOST = 'http://127.0.0.1:5080';

    /**
     * OpenObserve host
     * @var string
     */
    public static $STREAM = 'default';

    /**
     * OpenObserve organization
     * @var string
     */
    public static $ORGANIZATION = 'default';

    /**
     * SSL Verification
     * @var bool
     */
    public static $SSLVERIFYPEER = false;

    /**
     * Send log to OpenObserve
     * @param mixed $message
     * @param string $level
     * @param array $data
     * @return bool|string
     */
    public static function send(
        string $message,
        string $level = 'INFO',
        array $data = []
    ) {
        $data = [
            'message' => $message,
            'level' => $level
        ] + $data;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, self::$HOST . '/api/' . self::$ORGANIZATION . '/' . self::$STREAM . '/_json');
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, self::$USERNAME . ':' . self::$PASSWORD);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, self::$SSLVERIFYPEER);
        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }

}