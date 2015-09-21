<?php
/**
 *    OpenSource-SocialNetwork
 *
 * @package   (Informatikon.com).ossn
 * @author    OSSN Core Team <info@opensource-socialnetwork.com>
 * @copyright 2014 iNFORMATIKON TECHNOLOGIES
 * @license   General Public Licence http://opensource-socialnetwork.com/licence
 * @link      http://www.opensource-socialnetwork.com/licence
 */

// if the user is logged in redirect the user to the home page
// but if the username & password fields are empty trigger an error message
// 

if (ossn_isLoggedin()) {
    redirect('home');
}
$username = input('username');
$password = input('password');

if (empty($username) || empty($password)) {
    ossn_trigger_message(ossn_print('login:error'));
    redirect();
}
$user = ossn_user_by_username($username);
if($user && !$user->isUserVALIDATED()){
	$user->resendValidationEmail();
	ossn_trigger_message(ossn_print('ossn:user:validation:resend'), 'error');
	redirect(REF);
}
$login = new OssnUser;
$login->username = $username;
$login->password = $password;
if ($login->Login()) {
    redirect(REF);
} else {
    redirect('login?error=1');
}
