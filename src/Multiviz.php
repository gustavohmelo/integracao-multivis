<?php

namespace Multiviz;

use GuzzleHttp\Client;
use Multiviz\Exceptions\ResourceErrorException;
use Multiviz\Request\Environment;
use Multiviz\Request\PaymentRequest;
use Multiviz\Resources\Auth;
use Multiviz\Resources\Enviroment;

class Multiviz {

    public $client_id;
    public $client_secret;
    public Environment $environment;
    public $token;

    public function __construct($client_id, $client_secret, $environment = 'production') {
        $this->client_id     = $client_id;
        $this->client_secret = $client_secret;
        $this->environment   = $environment == 'production' ? Environment::production() : Environment::sandbox();
    }

    public function auth(){
        $auth = new Auth($this);
        return $this->token = $auth->login();
    }

    public function paymentCreditCard(){
        try {
            $this->auth();

            $payment = new PaymentRequest($this);
            $payment->paymentCreditCard();

        }catch (ResourceErrorException | \Exception $e){
            return $e->getMessage();
        }
    }
}