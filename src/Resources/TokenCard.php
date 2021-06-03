<?php


namespace Multiviz\Resources;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Multiviz\Exceptions\AuthErrorException;
use Multiviz\Multiviz;

class TokenCard {

    private $app;

    public function __construct(Multiviz $app) {
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