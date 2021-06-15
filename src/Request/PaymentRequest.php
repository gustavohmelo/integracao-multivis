<?php


namespace Multivis\Request;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use Multivis\Multivis;
use Multivis\Resources\Card;
use Multivis\Resources\Payment;
use Multivis\Resources\SellerInfo;
use Multivis\Resources\TokenCard;
use Psr\Http\Client\ClientExceptionInterface;


class PaymentRequest {

    private Multivis $app;

    public function __construct($app) {
        $this->app = $app;
    }

    public function paymentCard(Payment $payment, Card $cardInfo, SellerInfo $sellerInfo) {

        try {
            $request = new Client();

            $response = $request->request('POST', $this->app->environment->getUrl().'/v1/payments',[
                'headers' =>
                    [
                        'Authorization' => $this->app->token
                    ],
               'json' =>
                   [
                       "payment" => $payment->toArray(),
                       "cardInfo" => $cardInfo->toArray(),
                       "sellerInfo" => $sellerInfo->toArray()
                   ]
            ]);

            return $response->getBody();
        } catch (RequestException $e) {
            $responseBody = $e->getResponse()->getBody();
            return  json_decode($responseBody)[0];
        }
    }

}