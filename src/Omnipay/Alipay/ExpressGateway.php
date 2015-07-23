<?php

namespace Omnipay\Alipay;

/**
 * Class ExpressGateway
 *
 * @package Omnipay\Alipay
 */
class ExpressGateway extends BaseAbstractGateway
{

    protected $service_name = ["directPay" => 'create_direct_pay_by_user','donatePay' => "create_donate_trade_p"];

    /**
     * Get gateway display name
     *
     * This can be used by carts to get the display name for each gateway.
     */
    public function getName()
    {
        return 'Alipay Express';
    }

    public function purchase(array $parameters = array(), $pay_type="directPay")
    {

        if(!$pay_type){
            $pay_type = "directPay";
        }

        $this->setService($this->service_name[$pay_type]);
        return $this->createRequest('\Omnipay\Alipay\Message\ExpressPurchaseRequest', $parameters);

    }
}
