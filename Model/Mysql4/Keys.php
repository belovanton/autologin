<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 13.09.13
 * Time: 20:55
 * To change this template use File | Settings | File Templates.
 */
class Komplizierte_Autologin_Model_Mysql4_Keys extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init('autologin/keys','id');
    }
}