<?php
/**
 * Created by PhpStorm.
 * User: Andrei
 * Date: 29.03.2018
 * Time: 9:05
 */

namespace app\admin\models;


use app\front\models\Orders;

class aOrders extends Orders
{
    /**
     * @return string
     */
    public function getFullAddress()
    {
        $address = '';
        $this->address_street ? $address .= ' Улица: '.$this->address_street : null;
        $this->address_house ? $address .= ' дом: '.$this->address_house : null;
        $this->address_housing ? $address .= ' стр. : '.$this->address_housing : null;
        $this->address_office ? $address .= ' офис: '.$this->address_office : null;
        return $address;
    }


}