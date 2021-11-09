# Integração com o Gateway de Pagamento Multivis


Integração com o Gateway de pagamento Multiviz

## Principais recursos

* [x] Pagamentos por cartão de crédito.
* [x] Pagamentos por cartão de débito.
* [x] Cancelamento de autorização.
* [x] Tokenização de cartão.

## Instalando

Basta executar diretamente em seu terminal:

```
composer require "magus94/multivis-payment"
```

## Utilizando o SDK

Para criar um pagamento simples com cartão de crédito, basta fazer:

### Autenticação

Para utilização dos recursos desta API, deve ser realizado a autenticação e com o Token recebido nas resposta deve ser enviado em todas as requisições subsequentes.
A autenticação acontece ao instanciar um novo objeto desta API.

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use Multivis\Multivis;

$clientId = 'YOUR_CLIENT_ID';
$clientSecret = 'YOUR_CLIENT_SECRET';

//Criando a instancia
$multiviz = new Multivis($clientId, $clientSecret, 'production');

```


### Criando um objeto de pagamento

```php

<?php
require __DIR__ . '/vendor/autoload.php';

use Multivis\Resources\Payment;

$payment = new Payment();
$payment->setTransactionType('credit');
$payment->setAmount(1000);
$payment->setInstallments(1);
$payment->setCaptureType('ac');
$payment->setCurrencyCode('brl');
$payment->setProductType('avista');
$payment->setRecurrent(false);

```

### Criando um objeto Cartão e Tokenizando o número do cartão

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use Multivis\Resources\Card;
use Multivis\Resources\TokenCard;


$token = new TokenCard($multiviz);
$tokenNumber = $token->makeTokenCard('01212012000000000000');

$cardInfo = new Card();
$cardInfo->setNumberToken($tokenNumber);
$cardInfo->setCardholderName('JOSE SILVA');
$cardInfo->setSecurityCode('123');
$cardInfo->setBrand('visa');
$cardInfo->setExpirationMonth('12');
$cardInfo->setExpirationYear('22');

```

### Criando um objeto Seller

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use Multivis\Resources\SellerInfo;

$sellerInfo = new SellerInfo();
$sellerInfo->setOrderNumber('orderNumber');
$sellerInfo->setSoftDescriptor('TESTE');
$sellerInfo->setCavvUcaf('commerceauth');
$sellerInfo->setEci('05');
$sellerInfo->setXid('commerc');
$sellerInfo->setMid('XXXXXXXXXX');
$sellerInfo->setTid('BC038931');
$sellerInfo->setProgramProtocol('2.0.1');
```

## Realizando a venda

```php
<?php

// Para realizar a venda, passe os objetos criados anteriormente: Payment, Card e Seller
$response = $multiviz->paymentCard($payment, $cardInfo, $sellerInfo);

// O objeto de resposta conterá os dados de autorização da compra.
```

## Cancelando uma venda
```php
<?php

// Para cancelar uma venda, passe o ID da autorização, e o Valor a ser cancelado.
$cancel = $multiviz->cancelPayment('020000004906101633170000062686160000000000', 1000);

```

***

## Desenvolvido por

Gustavo H Melo - [@gustavohmelo]('https://github.com/gustavohmelo')

Marcelo de Melo Junior - [@marcelomelojr]('https://github.com/marcelomelojr')

*** 
Para sugestões ou reportar bugs, utilize [/gustavohmelo/integracao-multivis/issues]('https://github.com/gustavohmelo/integracao-multivis/issues').