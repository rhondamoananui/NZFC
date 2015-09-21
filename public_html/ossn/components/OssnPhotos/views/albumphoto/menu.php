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
if (ossn_isLoggedIn()) {
    ?>
    <div class="ossn-photo-menu">
        <li><a href="<?php echo ossn_site_url("action/photo/delete?id={$params->guid}", true); ?>"> <?php echo ossn_print('delete:photo'); ?> </a></li>
    </div>
<?php } ?>
