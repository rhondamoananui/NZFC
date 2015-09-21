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

//get phpmailer autload
require_once(ossn_route()->classes . 'mail/PHPMailerAutoload.php');

class OssnMail extends PHPMailer {
		/**
		 * Send email to user.
		 *
		 * @parans = $email => user email
		 *           $subject => email subject
		 *           $body = email body
		 *
		 * @return (bool)
		 */
		public function NotifiyUser($email, $subject, $body) {
				$this->setFrom(ossn_site_settings('notification_email'), ossn_site_settings('site_name'));
				$this->addAddress($email);
				
				$this->Subject = $subject;
				$this->Body    = $body;
				$this->CharSet = "UTF-8";
				
				try {
						if($this->send()) {
								return true;
						}
				}
				catch(phpmailerException $e) {
						error_log("Cannot send email " . $e->errorMessage(), 0);
				}
				return false;
		}
		
} //class
