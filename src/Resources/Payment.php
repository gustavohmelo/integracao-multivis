<?php


namespace Multivis\Resources;


class Payment {

    private $transactionType;
    private $amount;
    private $currencyCode;
    private $productType;
    private $installments;
    private $captureType;
    private $recurrent;

    /**
     * @return mixed
     */
    public function getTransactionType() {
        return $this->transactionType;
    }

    /**
     * @param mixed $transactionType
     */
    public function setTransactionType($transactionType): void {
        $this->transactionType = $transactionType;
    }

    /**
     * @return mixed
     */
    public function getAmount() {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount): void {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getCurrencyCode() {
        return $this->currencyCode;
    }

    /**
     * @param mixed $currencyCode
     */
    public function setCurrencyCode($currencyCode): void {
        $this->currencyCode = $currencyCode;
    }

    /**
     * @return mixed
     */
    public function getProductType() {
        return $this->productType;
    }

    /**
     * @param mixed $productType
     */
    public function setProductType($productType): void {
        $this->productType = $productType;
    }

    /**
     * @return mixed
     */
    public function getInstallments() {
        return $this->installments;
    }

    /**
     * @param mixed $installments
     */
    public function setInstallments($installments): void {
        $this->installments = $installments;
    }

    /**
     * @return mixed
     */
    public function getCaptureType() {
        return $this->captureType;
    }

    /**
     * @param mixed $captureType
     */
    public function setCaptureType($captureType): void {
        $this->captureType = $captureType;
    }

    /**
     * @return mixed
     */
    public function getRecurrent() {
        return $this->recurrent;
    }

    /**
     * @param mixed $recurrent
     */
    public function setRecurrent($recurrent): void {
        $this->recurrent = $recurrent;
    }

    public function toArray() : array {
        $payment = [];

        if ($this->getTransactionType()){
            $payment['transactionType'] = $this->getTransactionType();
        }

        if( $this->getAmount()){
            $payment['amount'] = $this->getAmount();
        }

        if( $this->getCurrencyCode()){
            $payment['currencyCode'] = $this->getCurrencyCode();
        }

        if( $this->getProductType()){
            $payment['productType'] = $this->getProductType();
        }

        if( $this->getInstallments()){
            $payment['installments'] = $this->getInstallments();
        }

        if( $this->getCaptureType()){
            $payment['captureType'] = $this->getCaptureType();
        }

        $payment['recurrent'] = $this->getRecurrent();

        return $payment;
    }


}