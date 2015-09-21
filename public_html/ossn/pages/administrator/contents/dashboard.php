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
<div class="ossn-admin-dsahboard">
    <div class="dashboard-block">
        <div class="dashboard-block-title">
            <?php echo ossn_print('components'); ?>
        </div>
        <div class="dsahboard-block-contents">
            <?php echo ossn_total_components(); ?>
        </div>
    </div>

    <div class="dashboard-block">
        <div class="dashboard-block-title">
            <?php echo ossn_print('themes'); ?>
        </div>
        <div class="dsahboard-block-contents">
            <?php echo ossn_site_total_themes(); ?>
        </div>
    </div>


    <div class="dashboard-block">
        <div class="dashboard-block-title">
            <?php echo ossn_print('users'); ?>
        </div>
        <div class="dsahboard-block-contents">
            <?php echo ossn_total_site_users(); ?>
        </div>
    </div>


    <div class="dashboard-block">
        <div class="dashboard-block-title">
            <?php echo ossn_print('online:users'); ?>
        </div>
        <div class="dsahboard-block-contents">
            <?php echo ossn_total_online(); ?>
        </div>
    </div>

    <div class="dashboard-block">
        <div class="dashboard-block-title">
            <?php echo ossn_print('my:version'); ?>
        </div>
        <div class="dsahboard-block-contents">
            <?php echo ossn_package_information()->version; ?>
        </div>
    </div>

    <div class="dashboard-block">
        <div class="dashboard-block-title">
            <?php echo ossn_print('available:updates'); ?>
        </div>
        <div class="dsahboard-block-contents">
            <?php echo ossn_check_update(); ?>
        </div>
    </div>

</div>

<!-- Link to the admin area of the main nzfc website, for editing images and updating content -->
<div class="ossn-message-developers">
  <h2>Admin - NZ Fishing Club</h2>
  Update Home page and Resource pages 
  <a href="http://nzfishingclub.co.nz/admin">Admin</a>
</div>
