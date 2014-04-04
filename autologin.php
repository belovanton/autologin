<?php
require_once 'app/Mage.php';
umask(0);
$app = Mage::app('default');

Mage::getSingleton('core/session', array('name' => 'adminhtml'));

// supply username
echo base64_encode($_GET['key']);
$username =$_GET['username'];
$hash = $_GET['hash'];

$model = Mage::getModel('autologin/keys')->load($username, 'username');
if (strtotime($model->getExpiredAt()) > strtotime(date('Y-m-d H:i:s')) && $model->getHash()==$hash) {


    $user = Mage::getModel('admin/user')->loadByUsername($username); // user your admin username


    if (Mage::getSingleton('adminhtml/url')->useSecretKey()) {
        Mage::getSingleton('adminhtml/url')->renewSecretUrls();
    }

    $session = Mage::getSingleton('admin/session');
    $session->setIsFirstVisit(true);
    $session->setUser($user);
    $session->setAcl(Mage::getResourceModel('admin/acl')->loadAcl());
    Mage::dispatchEvent('admin_session_user_login_success', array('user' => $user));

    if ($session->isLoggedIn()) {
        echo "Logged in";
    } else {
        echo 'Not Logged';
    }
}

header('Location: ' . Mage::helper('adminhtml')->getUrl("adminhtml"));

//http://shop.mattino.ru/autologin.php?username=mag-mr-leskova&hash=0a7f2b5bf42a5363fcdf31f4322e5123