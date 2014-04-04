<?php

class Komplizierte_Autologin_Model_Keys extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        parent::_construct();
        $this->_init('autologin/keys');
    }
}