<?php

use Multivis\Resources\Card;
use Multivis\Resources\Payment;
use Multivis\Resources\SellerInfo;
use Multivis\Resources\TokenCard;

require __DIR__ . '/vendor/autoload.php';

$clientId = 'B1D73F35-3620-4BF0-B810-AE57A5D17909';
$clientSecret = 'B83F2B83-7804-44B7-94FD-0CA0F0D88EFE';

$multiviz = new \Multivis\Multivis($clientId, $clientSecret, 'sandbox');

$payment = new Payment();
$payment->setTransactionType('credit');
$payment->setAmount(1000);
$payment->setInstallments(1);
$payment->setCaptureType('ac');
$payment->setCurrencyCode('brl');
$payment->setProductType('avista');
$payment->setRecurrent(false);

$token = new TokenCard($multiviz);
$tokenNumber = $token->makeTokenCard('4761739001010036');

$cardInfo = new Card();
$cardInfo->setNumberToken($tokenNumber);
$cardInfo->setCardholderName('JOSE SILVA');
$cardInfo->setSecurityCode('123');
$cardInfo->setBrand('visa');
$cardInfo->setExpirationMonth('12');
$cardInfo->setExpirationYear('22');

$sellerInfo = new SellerInfo();
$sellerInfo->setOrderNumber(date('dmHis'));
$sellerInfo->setSoftDescriptor('PAG*TESTE');
$sellerInfo->setCavvUcaf('commerceauth');
$sellerInfo->setEci('05');
$sellerInfo->setXid('commerc');
$sellerInfo->setProgramProtocol('2.0.1');

$response = $multiviz->paymentCard($payment, $cardInfo, $sellerInfo);
var_dump(json_decode($response));

$cancel = $multiviz->cancelPayment('020000004906101633170000062686160000000000', 1000);
var_dump(json_decode($cancel));