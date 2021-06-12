<?php


namespace Multivis\Request;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Multivis\Multivis;

class CancelPaymentRequest
{
    private $app;

    public function __construct(Multivis $app)
    {
        $this->app = $app;
    }

    public function cancelPayment($paymentId, $amount)
    {
        $request = new Client();

        try {
            $response = $request->request('PUT', $this->app->environment->getUrl().'/v1/payments/'.$paymentId.'/cancel', [
                'headers' => [
                    'Authorization' => $this->app->token
                ],
                'json' => [
                    'amount' => $amount
                ]
            ]);

            return $response->getBody();
        }catch (RequestException $e) {            $responseBody = $e->getResponse()->getBody();
            return json_decode($responseBody)[0];
        }
    }


}