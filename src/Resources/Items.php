<?php


namespace Multivis\Resources;


class Items {

    private $id;
    private $description;
    private $amount;
    private $ratePercent;
    private $rateAmount;

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void {
        $this->description = $description;
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
    public function getRatePercent() {
        return $this->ratePercent;
    }

    /**
     * @param mixed $ratePercent
     */
    public function setRatePercent($ratePercent): void {
        $this->ratePercent = $ratePercent;
    }

    /**
     * @return mixed
     */
    public function getRateAmount() {
        return $this->rateAmount;
    }

    /**
     * @param mixed $rateAmount
     */
    public function setRateAmount($rateAmount): void {
        $this->rateAmount = $rateAmount;
    }

    public function toArray() : array {
        $item = [];

        if ($this->getId()){
            $item['id'] = $this->getId();
        }
        if ($this->getDescription()){
            $item['description'] = $this->getDescription();
        }
        if ($this->getAmount()){
            $item['amount'] = $this->getAmount();
        }
        if ($this->getRatePercent()){
            $item['ratePercent'] = $this->getRatePercent();
        }
        if ($this->getRateAmount()){
            $item['rateAmount'] = $this->getRateAmount();
        }

        return $item;
    }
}