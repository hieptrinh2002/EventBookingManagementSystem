<?php

namespace App\Models\order\request;

use Dflydev\DotAccessData\Data;

class InitOrderRequest
{
    private $userId;
    private $email;
    private $address;
    private $paymentMethod;
    private $quantity;
    private $currency;
    private $eventId;

    // No-args constructor
    public function __construct()
    {
        $this->userId = null;
        $this->email = null;
        $this->address = null;
        $this->paymentMethod = null;
        $this->quantity = null;
        $this->currency = null;
        $this->eventId = null;
    }

    // All-args constructor
    public function __constructWithArgs($userId, $email, $address, $paymentMethod, $quantity, $currency,$eventId)
    {
        $this->userId = $userId;
        $this->email = $email;
        $this->address = $address;
        $this->paymentMethod = $paymentMethod;
        $this->quantity = $quantity;
        $this->currency = $currency;
        $this->eventId = $eventId;
    }

    // Getters
    public function getUserId()
    {
        return $this->userId;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function getEventId()
    {
        return $this->eventId;
    }

    // Setters
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    public function setEventId($eventId)
    {
        $this->eventId = $eventId;
    }

    public function __toString()
    {
        return sprintf(
            "User ID: %s, Email: %s, Address: %s, Payment Method: %s, Quantity: %d, Currency: %s",
            $this->userId,
            $this->email,
            $this->address,
            $this->paymentMethod,
            $this->quantity,
            $this->currency
        );
    }

    // Initialize from an array
    public function initialize(array $data)
    {
        $this->userId = $data['userId'] ?? null;
        $this->email = $data['email'] ?? null;
        $this->address = $data['address'] ?? null;
        $this->paymentMethod = $data['paymentMethod'] ?? null;
        $this->quantity = $data['quantity'] ?? null;
        $this->currency = $data['currency'] ?? null;
        $this->eventId = $data['eventId'] ?? null;
    }
}

