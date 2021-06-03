<?php


namespace Multiviz\Request;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use Multiviz\Multiviz;
use Multiviz\Resources\Card;
use Multiviz\Resources\Payment;
use Multiviz\Resources\SellerInfo;
use Multiviz\Resources\TokenCard;
use Psr\Http\Client\ClientExceptionInterface;


class PaymentRequest {

    private Multiviz $app;

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
                       "payment" => [
                           'transactionType' =>  $payment->getTransactionType(),
                           'amount' => $payment->getAmount(),
                           'currencyCode' => $payment->getCurrencyCode(),
                           'productType' => $payment->getProductType(),
                           'installments' => $payment->getInstallments(),
                           'captureType' => $payment->getCaptureType(),
                           'recurrent' => $payment->getRecurrent()
                       ],
                       "cardInfo" => [
                           'vaultId' => $cardInfo->getVaultId(),
                           'numberToken' => $cardInfo->getNumberToken(),
                           'cardHolderName' => $cardInfo->getCardholderName(),
                           'securityCode' => $cardInfo->getSecurityCode(),
                           'brand' => $cardInfo->getBrand(),
                           'expirationMonth' => $cardInfo->getExpirationMonth(),
                           'expirationYear' => $cardInfo->getExpirationYear()
                       ],
                       "sellerInfo" => [
                           'orderNumber' => $sellerInfo->getOrderNumber(),
                           'softDescriptor' => $sellerInfo->getSoftDescriptor(),
                           'dynamicMcc' => $sellerInfo->getDynamicMcc(),
                           'cavvUcaf' => $sellerInfo->getCavvUcaf(),
                           'eci' => $sellerInfo->getEci(),
                           'xid' => $sellerInfo->getXid(),
                           'programProtocol' => $sellerInfo->getProgramProtocol()
                       ]
                   ]
            ]);

            return $response->getBody();
        } catch (RequestException $e) {
            $responseBody = $e->getResponse()->getBody();
            return  json_decode($responseBody)[0];
        }
    }

}