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
?>
    <h2><?php echo ossn_print('notifications'); ?></h2>
<?php
$get = new  OssnNotifications;
$notifications = $get->get(ossn_loggedin_user()->guid);
echo '<div class="ossn-notifications-all ossn-notification-page">';
if ($notifications) {
    foreach ($notifications as $not) {
        echo "{$not}";
    }
}
echo '</div>';
?>