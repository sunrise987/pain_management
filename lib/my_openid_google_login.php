<?php
# Logging in with Google accounts requires setting special identity, so this example shows how to do it.
require '../lib/globals.php';
require '../lightopenid-lightopenid/openid.php';
try {
    $openid = new LightOpenID($hostname);
    if(!$openid->mode) {
        if(isset($_GET['login'])) {
            $openid->identity = 'https://www.google.com/accounts/o8/id';
            $openid->required = array('contact/email', 'namePerson/first');
            $openid->optional = array('namePerson/last');
            header('Location: ' . $openid->authUrl());
        }
?>
<form action="?login" method="post">
    <button>Login with Google</button>
</form>
<?php

    } elseif($openid->mode == 'cancel') {
        echo 'User has canceled authentication!';

    } else {
        session_start();
        header('Location:../patient/view_all_patients.php');
        $attributes = $openid->getAttributes();

        echo 'User ' . ($openid->validate() ? $openid->identity .
          ' has ' : 'has not ') . 'logged in.';
        print_r($openid->getAttributes());

        $_SESSION['user_email'] = $attributes['contact/email'];
        $_SESSION['firstName'] = $attributes['namePerson/first'];
        $_SESSION['lastName'] = $attributes['namePerson/last'];
        $_SESSION['time'] = time();
        die();
    }
} catch(ErrorException $e) {
    echo $e->getMessage();
}
?>
