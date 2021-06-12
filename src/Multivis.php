<?php

namespace Multivis;

use GuzzleHttp\Client;
use Multivis\Exceptions\ResourceErrorException;
use Multivis\Request\CancelPaymentRequest;
use Multivis\Request\Environment;
use Multivis\Request\PaymentRequest;
use Multivis\Resources\Auth;
use Multivis\Resources\Card;
use Multivis\Resources\Enviroment;
use Multivis\Resources\Payment;
use Multivis\Resources\SellerInfo;
use Multivis\Resources\TokenCard;

class Multivis {

    public $client_id;
    public $client_secret;
    public Environment $environment;
    public $token;

    public function __construct($client_id, $client_secret, $environment = 'production')
    {
        $this->client_id     = $client_id;
        $this->client_secret = $client_secret;
        $this->environment   = $environment == 'production' ? Environment::production() : Environment::sandbox();
        $this->auth();
    }

    public function auth()
    {
        $auth = new Auth($this);
        return $this->token = $auth->login();
    }

    public function paymentCard(Payment $payment, Card $cardInfo, SellerInfo $sellerInfo)
    {
        $paymentRequest = new PaymentRequest($this);
        return $paymentRequest->paymentCard($payment, $cardInfo, $sellerInfo);
    }

    public function cancelPayment($paymentId, $amount){
        $cancel = new CancelPaymentRequest($this);
        return $cancel->cancelPayment($paymentId, $amount);
    }
}