<?php


namespace Multivis\Resources;


class SellerInfo {

    private $orderNumber;
    private $softDescriptor;
    private $dynamicMcc;
    private $cavvUcaf;
    private $eci;
    private $xid;
    private $programProtocol;
    private $tid;
    private $mid;

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

    /**
     * @return mixed
     */
    public function getTid()
    {
        return $this->tid;
    }

    /**
     * @param mixed $tid
     */
    public function setTid($tid): void
    {
        $this->tid = $tid;
    }

    /**
     * @return mixed
     */
    public function getMid()
    {
        return $this->mid;
    }

    /**
     * @param mixed $mid
     */
    public function setMid($mid): void
    {
        $this->mid = $mid;
    }

    public function toArray() : array {
        $seller = [];

        if ($this->getOrderNumber()){
            $seller['orderNumber'] = $this->getOrderNumber();
        }

        if ($this->getSoftDescriptor()){
            $seller['softDescriptor'] = $this->getSoftDescriptor();
        }

        if ($this->getDynamicMcc()){
            $seller['dynamicMcc'] = $this->getDynamicMcc();
        }

        if ($this->getCavvUcaf()){
            $seller['cavvUcaf'] = $this->getCavvUcaf();
        }

        if ($this->getEci()){
            $seller['eci'] = $this->getEci();
        }

        if ($this->getXid()){
            $seller['xid'] = $this->getXid();
        }

        if ($this->getProgramProtocol()){
            $seller['programProtocol'] = $this->getProgramProtocol();
        }

        if ($this->getTid()){
            $seller['tid'] = $this->getTid();
        }

        if ($this->getXid()){
            $seller['xid'] = $this->getXid();
        }

        return $seller;
    }


}