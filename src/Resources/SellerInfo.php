<?php


namespace Multiviz\Resources;


class SellerInfo {

    private $orderNumber;
    private $softDescriptor;
    private $dynamicMcc;
    private $cavvUcaf;
    private $eci;
    private $xid;
    private $programProtocol;

    /**
     * @return mixed
     */
    public function getOrderNumber() {
        return $this->orderNumber;
    }

    /**
     * @param mixed $orderNumber
     */
    public function setOrderNumber($orderNumber): void {
        $this->orderNumber = $orderNumber;
    }

    /**
     * @return mixed
     */
    public function getSoftDescriptor() {
        return $this->softDescriptor;
    }

    /**
     * @param mixed $softDescriptor
     */
    public function setSoftDescriptor($softDescriptor): void {
        $this->softDescriptor = $softDescriptor;
    }

    /**
     * @return mixed
     */
    public function getDynamicMcc() {
        return $this->dynamicMcc;
    }

    /**
     * @param mixed $dynamicMcc
     */
    public function setDynamicMcc($dynamicMcc): void {
        $this->dynamicMcc = $dynamicMcc;
    }

    /**
     * @return mixed
     */
    public function getCavvUcaf() {
        return $this->cavvUcaf;
    }

    /**
     * @param mixed $cavvUcaf
     */
    public function setCavvUcaf($cavvUcaf): void {
        $this->cavvUcaf = $cavvUcaf;
    }

    /**
     * @return mixed
     */
    public function getEci() {
        return $this->eci;
    }

    /**
     * @param mixed $eci
     */
    public function setEci($eci): void {
        $this->eci = $eci;
    }

    /**
     * @return mixed
     */
    public function getXid() {
        return $this->xid;
    }

    /**
     * @param mixed $xid
     */
    public function setXid($xid): void {
        $this->xid = $xid;
    }

    /**
     * @return mixed
     */
    public function getProgramProtocol() {
        return $this->programProtocol;
    }

    /**
     * @param mixed $programProtocol
     */
    public function setProgramProtocol($programProtocol): void {
        $this->programProtocol = $programProtocol;
    }


}