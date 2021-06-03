<?php

namespace Multiviz;

use GuzzleHttp\Client;
use Multiviz\Exceptions\ResourceErrorException;
use Multiviz\Request\CancelPaymentRequest;
use Multiviz\Request\Environment;
use Multiviz\Request\PaymentRequest;
use Multiviz\Resources\Auth;
use Multiviz\Resources\Card;
use Multiviz\Resources\Enviroment;
use Multiviz\Resources\Payment;
use Multiviz\Resources\SellerInfo;
use Multiviz\Resources\TokenCard;

class Multiviz {

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