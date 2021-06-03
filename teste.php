<?php

require __DIR__ . '/vendor/autoload.php';

$clientId = 'B1D73F35-3620-4BF0-B810-AE57A5D17909';
$clientSecret = 'B83F2B83-7804-44B7-94FD-0CA0F0D88EFE';

(new Multiviz\Multiviz($clientId, $clientSecret))->paymentCreditCard();