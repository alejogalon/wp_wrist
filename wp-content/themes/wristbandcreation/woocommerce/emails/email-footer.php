<?php
/**
 * Email Footer
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates/Emails
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- End Content -->
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- End Body -->
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top">
                                    <!-- Footer -->
                                    <table border="0" cellpadding="10" cellspacing="0" width="600" id="template_footer">
                                        <tr>
                                            <td valign="top">
                                                <table border="0" cellpadding="10" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td colspan="2" valign="middle" id="credit" style="display: none;">
                                                            <?php echo wpautop( wp_kses_post( wptexturize( apply_filters( 'woocommerce_email_footer_text', get_option( 'woocommerce_email_footer_text' ) ) ) ) ); ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- End Footer -->
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <div class="email-footer-links" style="text-align: center; background: #f5f6f7; margin-top: -15px; padding-bottom: 2em; margin-top: -2.5em; padding-top: 1em;">
                <!-- <ul class="email-copy-list-button" style="margin: 0 auto; width: 600px; background: #fdfdfd; padding: 0 0 2em;">
                    <li style="display: inline-block; border: 1px solid #00acee; border-radius: 5px; padding: 1em;">
                        <a style="text-decoration: none;font-size: 16px;color: #00acee" href="#"><i class="fa fa-facebook"></i>Share Order on Facebook</a>
                    </li>
                    <li style="display: inline-block; border: 1px solid #00acee; border-radius: 5px; padding: 1em;background: #00acee;margin-right: 5em;">
                        <a style="text-decoration: none;font-size: 16px;color: #fff;" href="#">View or Manage Order</a>
                    </li>
                </ul> -->
                <span class="copy-quote" style="font-size: 16px; margin-top: 1em; display: block;">We look forward to your continued business!</span>
                <!-- <div class="copy-footer-note">
                    <span class="copy-note" style="color: #808080!important; margin-top: 1em; display: block;">This email was sent from a notification-only address that cannot accept incoming email.<br></br>Please do not reply to this message.</span>
                </div> -->
            </div>
        </div>
    </body>
</html>
