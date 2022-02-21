<?php

namespace Trilobyte\Xilnex;

use Trilobyte\Xilnex\Clients\ClientApi;

abstract class XilnexCore
{
    protected $endpoint = "https://api.xilnex.com/logic/v2/";
    protected $appId = "";
    protected $token = "";
    protected $auth = "5";


    public function setAppId($appId)
    {
        $this->appId = $appId;
    }

    public function getAppId()
    {
        return $this->appId;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function setAuth($auth)
    {
        $this->auth = $auth;
    }

    public function getAuth()
    {
        return $this->auth;
    }

    public function post($path, $payload = null)
    {
        return $this->send("POST", $path, $payload);
    }

    public function put($path, $payload = null)
    {
        return $this->send("PUT", $path, $payload);
    }

    public function get($path, $payload = null)
    {
        return $this->send("GET", $path, $payload);
    }

    protected function headers()
    {
        return [
            'Content-Type: application/json; charset=utf-8',
            'Accept: application/json',
            'Cache-Control: no-cache',
            'appid: ' . $this->appId,
            'token: ' . $this->token,
            'auth: ' . $this->auth,
        ];
    }

    private function send(String $method, String $path, array $payload = null)
    {
        $url = $this->endpoint . $path;
        if ($method == "GET" && $payload != null) {
            $url = $url . "?" . http_build_query($payload);
        }

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers());
        if ($method == "POST" || $method == "PUT") {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

            if ($method == "PUT") {
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            }
        }

        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpcode == "200" || $httpcode == "201") {
            if (is_string($response)) {
                $output = json_decode($response, true);
                return $output['data'];
            } else {
                throw (new \Exception('Response is not a string'));
            }
        } else {
            throw (new \Exception($response));
        }
    }
}
