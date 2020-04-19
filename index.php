<?php

class Package
{
    protected $orderId;
    protected $content;
    protected $totalPrice;
    protected $destination;
    protected $deliveryMethod;
    protected $paymentMethod;

    function __construct($orderId, $content, $destination, $deliveryMethod, $paymentMethod)
    {
        $this->orderId = $orderId;
        $this->content = $content;
        $this->destination = $destination;
        $this->deliveryMethod = $deliveryMethod;
        $this->paymentMethod = $paymentMethod;
    }

    function countTotalPrice()
    {
//         foreach ($this->content as $item) {
//             $this->totalPrice += $item.price * $item.count;
//         }

         return $this->totalPrice;
    }
}

class Export extends Package {
    private $destinationCountry;
    private $exportDuty;
}