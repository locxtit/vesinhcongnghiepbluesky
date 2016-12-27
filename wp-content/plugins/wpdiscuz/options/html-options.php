<div class="wrap wpdiscuz_options_page">
    <div style="float:left; width:50px; height:55px; margin:10px 10px 20px 0px;">
        <img src="<?php echo plugins_url(WPDISCUZ_DIR_NAME . '/assets/img/plugin-icon/plugin-icon-48.png'); ?>" style="border:2px solid #fff;"/>
    </div>
    <h1 style="padding-bottom:20px; padding-top:15px;"><?php _e('wpDiscuz General Settings', 'wpdiscuz'); ?></h1>
    <br style="clear:both" />
    <?php do_action('wpdiscuz_option_page');?>
    <table width="100%" border="0" cellspacing="1" class="widefat">
        <tr>
            <td valign="top" style="padding:10px;">
                <table width="100%" border="0" cellspacing="1">
                    <thead>
                        <tr>
                            <th style="font-size:16px;"><strong>Like wpDiscuz?</strong> <br /><span style="font-size:14px">We really need your reviews!</span></th>
                            <th style="font-size:16px; width:135px; text-align:center; border-bottom:1px solid #008EC2;"><a href="http://wpdiscuz.com/wpdiscuz-documentation/" style="color:#008EC2; overflow:hidden; outline:none;" target="_blank">Documentation</a></th>
                        	<th style="font-size:16px; width:75px; text-align:center; border-bottom:1px solid #008EC2;"><a href="http://gvectors.com/forum/" style="color:#008EC2; overflow:hidden; outline:none;" target="_blank">Support</a></th>
                        </tr>
                    </thead>
                    <tr valign="top">
                        <td colspan="3" style="background:#FFF; text-align:left; font-size:13px;">
                            We do our best to make wpDiscuz the best self-hosted comment plugin for Wordpress. Thousands users are currently satisfied with wpDiscuz but only about 1% of them give us 5 start rating.
                            However we have a very few users who for some very specific reasons are not satisfied and they are very active in decreasing wpDiscuz rating.
                            Please help us keep plugin rating high, encouraging us to develop and maintain this plugin. Take a one minute to leave <a href="https://wordpress.org/support/view/plugin-reviews/wpdiscuz?filter=5" title="Go to wpDiscuz Reviews section on Wordpress.org"><img src="<?php echo plugins_url(WPDISCUZ_DIR_NAME . '/assets/img/gc/5s.png'); ?>" border="0" align="absmiddle" /></a> star review on <a href="https://wordpress.org/support/view/plugin-reviews/wpdiscuz?filter=5">Wordpress.org</a>. Thank You!
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <?php
    if (isset($_GET['wpdiscuz_reset_options']) && $_GET['wpdiscuz_reset_options'] == 1 && current_user_can('manage_options')) {
        delete_option(WpdiscuzCore::OPTION_SLUG_OPTIONS);
        $this->optionsSerialized->postTypes = array('post');
        $this->optionsSerialized->shareButtons = array('fb', 'twitter', 'google');
        $this->optionsSerialized->addOptions();
        $this->optionsSerialized->initOptions(get_option(WpdiscuzCore::OPTION_SLUG_OPTIONS));
        $this->optionsSerialized->blogRoles['post_author'] = '#00B38F';
        $blogRoles = get_editable_roles();
        foreach ($blogRoles as $roleName => $roleInfo) {
            $this->optionsSerialized->blogRoles[$roleName] = '#00B38F';
        }
        $this->optionsSerialized->blogRoles['guest'] = '#00B38F';
        $this->optionsSerialized->showPluginPoweredByLink = 1;
        $this->optionsSerialized->updateOptions();
        do_action('wpdiscuz_reset_options');
    }
    ?>

    <form action="<?php echo admin_url(); ?>edit-comments.php?page=wpdiscuz_options_page" method="post" name="wpdiscuz_options_page" class="wc-main-settings-form wc-form" enctype="multipart/form-data">
        <?php
        if (function_exists('wp_nonce_field')) {
            wp_nonce_field('wc_options_form');
        }
        ?>
        <h2>&nbsp;</h2>
        <div id="optionsTab">
            <ul class="resp-tabs-list options_tab_id">
                <li><?php _e('General Settings', 'wpdiscuz'); ?></li>
                <li><?php _e('Live Update', 'wpdiscuz'); ?></li>
                <li><?php _e('Show/Hide', 'wpdiscuz'); ?></li>
                <li><?php _e('Subscription', 'wpdiscuz'); ?> <?php if (class_exists('Prompt_Comment_Form_Handling')): ?> <?php _e('and Postmatic', 'wpdiscuz'); ?> <?php endif; ?></li>
                <li><?php _e('Styling', 'wpdiscuz'); ?></li>
                <li><?php _e('Social Login', 'wpdiscuz'); ?></li>
                <li><?php _e('Integrations', 'wpdiscuz'); ?></li>
                <li><?php _e('Addons', 'wpdiscuz'); ?></li>
            </ul>
            <div class="resp-tabs-container options_tab_id">
                <?php
                include 'options-layouts/settings-general.php';
                include 'options-layouts/settings-live-update.php';
                include 'options-layouts/settings-show-hide.php';
                include 'options-layouts/settings-subscription.php';
                include 'options-layouts/settings-style.php';
                include 'options-layouts/settings-social.php';
                include 'options-layouts/settings-integrations.php';
                include 'options-layouts/settings-addons.php';
                ?>
            </div>
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                var width = 0;
                var optionsTabsType = 'default';
                $('#optionsTab ul.resp-tabs-list.options_tab_id li').each(function () {
                    width += $(this).outerWidth(true);
                });

                if (width > $('#optionsTab').innerWidth()) {
                    optionsTabsType = 'vertical';
                }

                var url = '<?php echo plugins_url(WPDISCUZ_DIR_NAME . '/assets/img/social-icons/'); ?>';
                $('.wpdiscuz-share-buttons').each(function () {
                    setBG($(this));
                });
                $('.wpdiscuz-share-buttons').click(function () {
                    setBG($(this));
                });
                function setBG(field) {
                    if ($('.wc_share_button', field).is(':checked')) {
                        $(field).css('background', 'url("' + url + $('.wc_share_button', field).val() + '-18x18-orig.png")');
                    } else {
                        $(field).css('background', 'url("' + url + $('.wc_share_button', field).val() + '-18x18.png")');
                    }
                }
                //Horizontal Tab
                $('#optionsTab').easyResponsiveTabs({
                    type: optionsTabsType, //Types: default, vertical, accordion
                    width: 'auto', //auto or any width like 600px
                    fit: true, // 100% fit in a container
                    tabidentify: 'options_tab_id' // The tab groups identifier
                });


                // Child Tab
                $('#integrationsChild').easyResponsiveTabs({
                    type: 'vertical',
                    width: 'auto',
                    fit: true,
                    tabidentify: 'integrationsChild', // The tab groups identifier
                });

                // Child Tab
                $('#wpdiscuz-addons-options').easyResponsiveTabs({
                    type: 'vertical',
                    width: 'auto',
                    fit: true,
                    tabidentify: 'wpdiscuz-addons-options', // The tab groups identifier
                });
                
                $(document).delegate('.options_tab_id .resp-tab-item', 'click', function () {
                    var activeTabIndex = $('.resp-tabs-list.options_tab_id li.resp-tab-active').index();
                    $.cookie('optionsActiveTabIndex', activeTabIndex, {expires: 30});
                });
                var savedIndex = $.cookie('optionsActiveTabIndex') >= 0 ? $.cookie('optionsActiveTabIndex') : 0;
                $('.resp-tabs-list.options_tab_id li').removeClass('resp-tab-active');
                $('.resp-tabs-container.options_tab_id > div').removeClass('resp-tab-content-active');
                $('.resp-tabs-container.options_tab_id > div').css('display', 'none');
                $('.resp-tabs-list.options_tab_id li').eq(savedIndex).addClass('resp-tab-active');
                $('.resp-tabs-container.options_tab_id > div').eq(savedIndex).addClass('resp-tab-content-active');
                $('.resp-tabs-container.options_tab_id > div').eq(savedIndex).css('display', 'block');
            });
        </script>
        <table class="form-table wc-form-table">
            <tbody>
                <tr valign="top">
                    <td colspan="4">
                        <p class="submit">
                            <a style="float: left;" class="button button-secondary" href="<?php echo admin_url(); ?>edit-comments.php?page=wpdiscuz_options_page&wpdiscuz_reset_options=1"><?php _e('Reset Options', 'wpdiscuz'); ?></a>
                            <?php $clearChildrenUrl = admin_url('admin-post.php/?action=clearChildrenData&clear=1'); ?>
                            <a href="<?php echo wp_nonce_url($clearChildrenUrl, 'clear_children_data'); ?>" class="button button-secondary" title="Use this button if wpDiscuz has been deactivated for a while." style="margin-left: 5px;" id="wpdiscuz_synch_comments"><?php _e('Refresh comment optimization', 'wpdiscuz'); ?></a>
                            <?php $voteUrl = admin_url('admin-post.php/?action=removeVoteData&remove=1'); ?>
                            <a href="<?php echo wp_nonce_url($voteUrl, 'remove_vote_data'); ?>" class="button button-secondary" style="margin-left: 5px;" id="wpdiscuz_clear_votes"><?php _e('Remove vote data', 'wpdiscuz'); ?></a>
                            <input style="float: right;" type="submit" class="button button-primary" name="wc_submit_options" value="<?php _e('Save Changes', 'wpdiscuz'); ?>" />                                
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <input type="hidden" name="action" value="update" />
    </form>
</div>