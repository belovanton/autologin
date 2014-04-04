<?php

class Komplizierte_Autologin_Model_Observer extends Varien_Event_Observer
{
    public function __construct()
    {
    }

    public function createAutologinLink($observer)
    {
        $username = $observer->getEvent()->getData('username');
        $link = $observer->getEvent()->getLink();
        $model = Mage::getModel('autologin/keys')->load($username, 'username');
        if (strtotime($model->getExpiredAt()) < strtotime(date('Y-m-d H:i:s'))) {
            $model->setUsername($username);
            $hash = md5($username . date('Y-m-d'));
            $model->setHash($hash);
            $model->setUpdatedAt(date('Y-m-d H:i:s'));
            $model->setExpiredAt(date('Y-m-d H:i:s', strtotime(' +5 days')));
            $model->save();
        } else {
            $hash = $model->getHash();
        }
        $link->setLinkData('autologin.php?username=' . $username . '&hash=' . $hash);
    }
}
