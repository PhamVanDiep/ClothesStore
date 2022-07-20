<?php
require_once ROOT . DS . 'config' . DS . 'config.php';
require_once ROOT . DS . 'app' . DS . 'models' . DS . 'User.php';
require_once ROOT . DS . 'services' . DS . 'RegisterService.php';
require_once ROOT . DS . 'services' . DS . 'UserService.php';
require_once ROOT . DS . 'services' . DS . 'Service.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'Router.php';
require_once ROOT . DS . 'api' . DS . 'google-api' . DS . 'vendor' . DS . 'autoload.php';



if(isset($_SESSION['login_id'])){
    header('Location: /web/ClothesStore/');
    exit;
}


// Creating new google client instance
$client = new Google_Client();

// Enter your Client ID
$client->setClientId('733975949854-uunu6ud6s9eaa2eh3tiibmufkijgkpj5.apps.googleusercontent.com');
// Enter your Client Secrect
$client->setClientSecret('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');
// Enter the Redirect URL
$client->setRedirectUri('http://localhost/web/ClothesStore/login');

// Adding those scopes which we want to get (email & profile Information)
$client->addScope("email");
$client->addScope("profile");


if(isset($_GET['code'])):

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if(!isset($token["error"])){

        $service = new Service();

        $client->setAccessToken($token['access_token']);

        // getting profile information
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
    
        // Storing data into database
        $googleId = mysqli_real_escape_string($service->getConnect(), $google_account_info['id']);
        $name = mysqli_real_escape_string($service->getConnect(), trim($google_account_info['name']));
        $email = mysqli_real_escape_string($service->getConnect(), $google_account_info['email']);
        $urlAvatar = mysqli_real_escape_string($service->getConnect(), $google_account_info['picture']);
        $gender = mysqli_real_escape_string($service->getConnect(), $google_account_info['gender']);
        echo $gender;

        // checking user already exists or not
        $user_service = new UserService();
        $get_user = $user_service->getUserByEmail($email);
        if(!is_null($get_user)){
            $_SESSION['login_id'] = $get_user['userID']; 
            header('Location: /web/ClothesStore/');
            exit;

        }
        else{
            $user = new User(0, $name, $name, $email, NULL, $gender, NULL, NULL, 1, $urlAvatar, $googleId);
            $register_service = new RegisterService();
            $checkRegister = $register_service->insertGoogle($user);
            $new_user = $user_service->getUserByEmail($email);
            $_SESSION['login_id'] = $new_user['userID'];
            if (is_null($checkRegister)) {
                header('Location: /web/ClothesStore/');
            } else {
                header('Location: /web/ClothesStore/login');
            }

        }

    }
    else{
        header('Location: /web/ClothesStore/login');
        exit;
    }
    
else: 
    // Google Login Url = $client->createAuthUrl(); 
?>


<?php endif; ?>