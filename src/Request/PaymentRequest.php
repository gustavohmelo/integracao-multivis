<?php


namespace Multiviz\Request;


use GuzzleHttp\Client;
use Multiviz\Multiviz;
use Multiviz\Resources\Card;
use Multiviz\Resources\Payment;
use Multiviz\Resources\SellerInfo;
use Multiviz\Resources\TokenCard;

class PaymentRequest {

    private Multiviz $app;

    public function __construct($app) {
        $this->app = $app;
    }

    public function getTokenCard($numberCard){
        $token = new TokenCard($this->app);
        return $token->makeTokenCard($numberCard);
    }

    public function paymentCreditCard() {
        $payment = new Payment();
        $payment->setTransactionType('credit');
        $payment->setAmount(10);
        $payment->setInstallments(1);
        $payment->setCaptureType('ac');
        $payment->setCurrencyCode('brl');
        $payment->setProductType('AA');



        $cardInfo = new Card();
        $cardInfo->setNumberToken($this->getTokenCard("5127070096468707"));
        $cardInfo->setCardholderName('JOSE SILVA');
        $cardInfo->setSecurityCode('123');
        $cardInfo->setBrand('visa');
        $cardInfo->setExpirationMonth('01');
        $cardInfo->setExpirationYear('27');

        $sellerInfo = new SellerInfo();
        $sellerInfo->setOrderNumber('000001');
        $sellerInfo->setSoftDescriptor('CompraTeste');
        $sellerInfo->setDynamicMcc('9999');
        $sellerInfo->setCavvUcaf('commerceauth');
        $sellerInfo->setEci('05');
        $sellerInfo->setXid('commerc');
        $sellerInfo->setProgramProtocol('2.0.1');

        $data = array(
            "payment" => $payment,
            "cardInfo" => $cardInfo,
            "sellerInfo" => $sellerInfo
        );

        try {
            $request = new Client();

            $response = $request->request('POST', $this->app->environment->getUrl().'/v1/payments',[
                'headers' =>
                    [
                        'Authorization' => $this->app->token
                    ],
               'json' =>
                   [
                       "payment" => [
                           'transactionType' =>  $payment->getTransactionType(),
                           'amount' => $payment->getAmount(),
                       ],
                       "cardInfo" => $cardInfo,
                       "sellerInfo" => $sellerInfo
                   ]
            ]);

            $numberToken = json_decode($response->getBody());

            var_dump($response->getBody());
        }catch (\Exception $e){
            var_dump(
                $e->getMessage()
            );
        }
    }

}