<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 13.09.13
 * Time: 20:58
 * To change this template use File | Settings | File Templates.
 */
class Komplizierte_Autologin_Model_Mysql4_Keys_Collection extends  Mage_Core_Model_Mysql4_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('autologin/keys');
    }

}