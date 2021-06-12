<?php


namespace Multivis\Resources;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Multivis\Exceptions\AuthErrorException;
use Multivis\Multivis;

class TokenCard {

    private $app;

    public function __construct(Multivis $app) {
        $this->app = $app;
    }

    public function makeTokenCard($numberCard) {

       try {
            $request = new Client();

            $response = $request->request('POST', $this->app->environment->getUrl().'/v1/tokens/cards',[
                'headers' =>
                    [
                        'Authorization' => $this->app->token
                    ],
                'json' =>
                    [
                        'cardNumber' => $numberCard
                    ]
            ]);

            $numberToken = json_decode($response->getBody());
            return ($numberToken->numberToken);
        }catch (RequestException $e) {
           $responseBody = $e->getResponse()->getBody();
           return json_decode($responseBody)[0];
       }
    }

}