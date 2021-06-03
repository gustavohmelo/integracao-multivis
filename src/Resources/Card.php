<?php


namespace Multiviz\Resources;


class Card {

    private $vaultId;
    private $numberToken;
    private $cardholderName;
    private $securityCode;
    private $brand;
    private $expirationMonth;
    private $expirationYear;

    /**
     * @return mixed
     */
    public function getVaultId() {
        return $this->vaultId;
    }

    /**
     * @param mixed $vaultId
     */
    public function setVaultId($vaultId): void {
        $this->vaultId = $vaultId;
    }

    /**
     * @return mixed
     */
    public function getNumberToken() {
        return $this->numberToken;
    }

    /**
     * @param mixed $numberToken
     */
    public function setNumberToken($numberToken): void {
        $this->numberToken = $numberToken;
    }

    /**
     * @return mixed
     */
    public function getCardholderName() {
        return $this->cardholderName;
    }

    /**
     * @param mixed $cardholderName
     */
    public function setCardholderName($cardholderName): void {
        $this->cardholderName = $cardholderName;
    }

    /**
     * @return mixed
     */
    public function getSecurityCode() {
        return $this->securityCode;
    }

    /**
     * @param mixed $securityCode
     */
    public function setSecurityCode($securityCode): void {
        $this->securityCode = $securityCode;
    }

    /**
     * @return mixed
     */
    public function getBrand() {
        return $this->brand;
    }

    /**
     * @param mixed $brand
     */
    public function setBrand($brand): void {
        $this->brand = $brand;
    }

    /**
     * @return mixed
     */
    public function getExpirationMonth() {
        return $this->expirationMonth;
    }

    /**
     * @param mixed $expirationMonth
     */
    public function setExpirationMonth($expirationMonth): void {
        $this->expirationMonth = $expirationMonth;
    }

    /**
     * @return mixed
     */
    public function getExpirationYear() {
        return $this->expirationYear;
    }

    /**
     * @param mixed $expirationYear
     */
    public function setExpirationYear($expirationYear): void {
        $this->expirationYear = $expirationYear;
    }


}