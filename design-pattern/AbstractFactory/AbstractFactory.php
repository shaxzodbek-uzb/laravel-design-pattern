<?php
namespace DesignPattern\AbstractFactory;

class Payment
{
    public function pay()
    {
        echo 'Paying...';
    }
}

class CashPayment extends Payment
{
    public function pay()
    {
        echo 'Paying with cash...';
    }
}

class CardPayment extends Payment
{
    public function pay()
    {
        echo 'Paying with card...';
    }
}

class CreditPayment extends Payment
{
    public function pay()
    {
        echo 'Paying with credit...';
    }
}

class OrderFactory
{
    
    public function createCardPayment()
    {
        return new CardPayment();
    }

    public function createCashPayment()
    {
        return new CashPayment();
    }

    public function createCreditPayment()
    {
        return new CreditPayment();
    }

}

class BonusOrderFactory extends OrderFactory
{
    public function createCardPayment()
    {
        // logic
        $order = new Order;
        $order->setPayment(new CardPayment());
        $order->setInvoice(new Invoice());
        return $order;
    }

    public function createCashPayment()
    {
        return new CashPayment();
    }

    public function createCreditPayment()
    {
        $order = new Order;
        $order->setPayment(new CreditPayment());
        // creating many invoices
        $order->setInvoices([/*...*/]);
        return $order;
    }
}

$orderFactory  = new BonusOrderFactory;
// $order = $orderFactory->createCardPayment();
// $orderFactory->createCreditPayment();

$order = new OrderFactory;
$order->createCashPayment();


