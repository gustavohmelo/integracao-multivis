<?php


namespace Multiviz\Resources;


class Sellers {
    private $id;
    private $amount;
    private Items $items;

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
     * @return Items
     */
    public function getItems(): Items {
        return $this->items;
    }

    /**
     * @param Items $items
     */
    public function setItems(Items $items): void {
        $this->items = $items;
    }



}