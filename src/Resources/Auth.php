<?php


namespace Multivis\Resources;


use GuzzleHttp\Client;
use Multivis\Exceptions\AuthErrorException;
use Multivis\Multivis;

class Auth {

    private $app;

    public function __construct(Multivis $app) {
        $this->app = $app;
    }

    public function login() {
        try {
            $client = new Client();
            $response = $client->request('POST', $this->app->environment->getUrl().'/auth/oauth2/v1/token', [
                'headers' => [
                    'Authorization' => $this->makeTokenAuthorization()
                ],
                'json' => [
                    'grantType' => 'client_credentials'
                ]
            ]);

            $body = (json_decode($response->getBody()));
            return $body->tokenType.' '.$body->accessToken;
        }catch (\Exception $e){
            return 'Credenciais Invalidas';
        }

    }

    private function makeTokenAuthorization(){
        return 'Basic '.base64_encode($this->app->client_id.':'.$this->app->client_secret);
    }
}