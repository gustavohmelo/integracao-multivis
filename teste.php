<?php

use Multiviz\Resources\Card;
use Multiviz\Resources\Payment;
use Multiviz\Resources\SellerInfo;
use Multiviz\Resources\TokenCard;

require __DIR__ . '/vendor/autoload.php';

$clientId = 'B1D73F35-3620-4BF0-B810-AE57A5D17909';
$clientSecret = 'B83F2B83-7804-44B7-94FD-0CA0F0D88EFE';

$multiviz = new \Multiviz\Multiviz($clientId, $clientSecret, 'sandbox');

$payment = new Payment();
$payment->setTransactionType('credit');
$payment->setAmount(10);
$payment->setInstallments(1);
$payment->setCaptureType('ac');
$payment->setCurrencyCode('brl');
$payment->setProductType('avista');
$payment->setRecurrent(false);

$token = new TokenCard($multiviz);
$tokenNumber = $token->makeTokenCard('5127070096468706');


$cardInfo = new Card();
$cardInfo->setNumberToken($tokenNumber);
$cardInfo->setCardholderName('JOSE SILVA');
$cardInfo->setSecurityCode('123');
$cardInfo->setBrand('visa');
$cardInfo->setExpirationMonth('01');
$cardInfo->setExpirationYear('27');

$sellerInfo = new SellerInfo();
$sellerInfo->setOrderNumber('000007');
$sellerInfo->setSoftDescriptor('CompraTeste');
$sellerInfo->setDynamicMcc('9999');
$sellerInfo->setCavvUcaf('commerceauth');
$sellerInfo->setEci('05');
$sellerInfo->setXid('commerc');
$sellerInfo->setProgramProtocol('2.0.1');



$response = $multiviz->paymentCard($payment, $cardInfo, $sellerInfo);

var_dump($response);

$cancel = $multiviz->cancelPayment('123123123', 12000);