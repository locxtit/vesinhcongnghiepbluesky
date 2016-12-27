<?php $this->refreshAddonPage(); $this->dismissAddonNoteOnPage(); ?>
<div class="wrap wpdiscuz_addons_page">
    <div style="float:left; width:50px; height:55px; margin:10px 10px 20px 0px;">
        <img src="<?php echo plugins_url(WPDISCUZ_DIR_NAME . '/assets/img/plugin-icon/plugin-icon-48.png'); ?>" style="border:2px solid #fff;"/>
    </div>
    <h1 style="padding-bottom:20px; padding-top:15px;"><?php _e('wpDiscuz Addons', 'wpdiscuz'); ?></h1>
    <br style="clear:both" />
    <table width="100%" border="0" cellspacing="1" class="widefat">
        <tr>
            <td valign="top" style="padding:10px 10px 0px 10px;">
                <table width="100%" border="0" cellspacing="1">
                    <thead>
                        <tr>
                            <th style="font-size:16px; padding-bottom:15px;"><strong>wpDiscuz Add-ons</strong></th>
                            <th style="font-size:16px; padding-bottom:15px; width:205px; text-align:center; border-bottom:1px solid #008EC2;"><a href="http://gvectors.com/forum/" style="color:#008EC2; overflow:hidden; outline:none;" target="_blank">Addons Support Forum</a></th>
                            <th style="font-size:16px; padding-bottom:15px; width:175px; text-align:center; border-bottom:1px solid #008EC2;"><a href="http://gvectors.com/migrate-to-wpdiscuz/" style="color:#008EC2; overflow:hidden; outline:none;" target="_blank">Comments Migration</a></th> 
                        </tr>
                    </thead>
                    <tr valign="top">
                        <td colspan="3" style="background:#FFF; text-align:left; font-size:13px;">
                            We've released the initial wpDiscuz 1.0.0 version on 30 November 2014. 
                            After one year and one month of hard non-profit work we've decided to create paid add-ons to get some funds for future free wpDiscuz development.
                            wpDiscuz add-ons are also premium level extensions and those are also being actively developed.<br />
                            <p style="font-size:10px; color:#B1B1B1; font-style:italic; text-align:right; line-height:12px; padding-top:6px; margin:0px;">
                                Thank you!<br/> Sincerely yours,<br/>
                                gVectors Team&nbsp;
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <br style="clear:both" />

    <div class="wpdiscuz-addons-wrapper">
        <?php
        foreach ($this->addons as $key => $addon) {
            $installed = (class_exists($addon['class'])) ? true : false;
            ?>
            <div class="wpdiscuz-addon-block">
                <div id="wpdiscuz-addon-<?php echo $key ?>" class="addon-thumb" style="background:url(<?php echo ($installed) ? str_replace('.png', '-off.png', $addon['thumb']) : $addon['thumb']; ?>) top center no-repeat;">
                    &nbsp;
                </div>
                <div class="contenthover">
                    <div class="addon-isactive">
                        <?php if ($installed) { ?>
                            <div class="note-installed"><?php _e('Installed', 'default'); ?></div>
                        <?php } else { ?>
                            <h3 style="font-weight:normal; font-size:22px; text-shadow: 0 0 2px #999;"><?php echo $addon['title'] ?></h3>
                            <ul>
                                <li>Version: <?php echo $addon['version']; ?></li> 
                                <li>wpDiscuz: at least <?php echo $addon['requires']; ?></li> 
                            </ul>
                            <a class="button button-primary addon-button" href="<?php echo $addon['url']; ?>" target="_blank" style="font-size:14px;"><?php echo __('Addon Details | Buy', 'wpdiscuz'); ?></a>
                        <?php } ?>
                    </div>
                </div>
                <div style="clear:both"></div>
                <div class="addon-info" style="<?php if ($installed) echo 'background-color:#bbbbbb'; ?>">
                    <a href="<?php echo $addon['url']; ?>" target="_blank" title="More information about <?php echo $addon['title'] ?> add-on &raquo;">
                        <p class="addon-title"><?php echo $addon['title']; ?></p>
                    </a>
                    <div class="addon-desc"><?php echo $addon['desc']; ?></div>
                </div>
            </div>
            <script language="javascript">jQuery(document).ready(function ($) { $('#wpdiscuz-addon-<?php echo $key ?>').contenthover({ overlay_width:290, overlay_height:<?php echo ($installed) ? '100' : '180'; ?>, effect:'slide', slide_direction:'right', overlay_x_position:'right', overlay_y_position:'center', overlay_background:'#e5e5e5', overlay_opacity:0.9}); });</script>
        <?php } ?>
    </div>
    <div style="clear:both;"></div>
    <h3>&nbsp;</h3>
    <hr />
    <h3>Coming very soon</h3>
    <ul style="list-style:circle; margin-left:20px;">
    <li>wpDiscuz Widgets</li>
    <li>wpDiscuz Quick Tags (free built-in)</li>
    <li>wpDiscuz Comment Front-end Moderation</li>
    </ul>

</div>