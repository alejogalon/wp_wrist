<?php
/**
 * Email Styles
 *
 * @author  WooThemes
 * @package WooCommerce/Templates/Emails
 * @version 2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Load colours
$bg              = get_option( 'woocommerce_email_background_color' );
$body            = get_option( 'woocommerce_email_body_background_color' );
$base            = get_option( 'woocommerce_email_base_color' );
$base_text       = wc_light_or_dark( $base, '#202020', '#ffffff' );
$text            = get_option( 'woocommerce_email_text_color' );

$bg_darker_10    = wc_hex_darker( $bg, 10 );
$body_darker_10  = wc_hex_darker( $body, 10 );
$base_lighter_20 = wc_hex_lighter( $base, 20 );
$base_lighter_40 = wc_hex_lighter( $base, 40 );
$text_lighter_20 = wc_hex_lighter( $text, 20 );

// !important; is a gmail hack to prevent styles being stripped if it doesn't like something.
?>
.table-order {
    width: 100%;
}
.table-order ul {
    padding: 0;
    margin: 0;
    line-height: 1.5;
}

.table-order ul label {
    text-transform: uppercase !important;
}
table.table-order td {
    padding: 1em 12px;
}
.table-order label {
    font-weight: normal! important;
}
ul li {
    list-style-type: none;
    margin: 0 !important;
    font-size: 14px;
    color: #202020;
}
label {
    text-transform: uppercase;
    font-size: 14px;
    font-family: Arial;
    margin-top: 1em;
    display: block;
    color: #202020;
}
.table-order br {
    display: none;
}
table tbody > tr:nth-child(1) td:nth-child(1) {
    font-size: 16px !important;
}
td {
    color: #202020 !important;
    border: none !important;
}
.table-order td {
    color: #202020 !important;
}
.table-order td {
    border: none !important;
    font-size: 16px !important;
}
tfoot th {
    border: none !important;
}

tfoot tr:nth-child(1) {
    display: none;
}
tfoot:before {
    content: "";
    border-top: 1px solid #d4dee8;
    display: block;
    margin-left: 10px;
}
tfoot tr:nth-child(2) th div:before {
    content: "Grand Total";
    color: #333;
}
tfoot tr:nth-child(2) th div {
    color: transparent;
}
tfoot tr:nth-child(2) span {
    float: right;
}
tfoot tr:nth-child(2) span span {
    float: none;
}
tfoot tr:nth-child(2) td {
    width: 65%;
}
tfoot div {
    font-weight: normal;
    font-size: 16px;
}
h2 {
    color: #333 !important;
    font-size: 16px !important;
    font-weight: normal !important;
}
strong {
    font-weight: normal;
}
span {
    color: #333 !important;
}
h3 {
    font-weight: normal !important;
    color: #333 !important;
}
p {
    color: #333 !important;
    font-size: 16px;
}
table h3:nth-child(1):after {
    content: ":";
}
table a {
    color: #00acee !important;
}
table td {
    border: none !important;
    font-size: 16px !important;
}


#wrapper {
    background-color: <?php echo esc_attr( $bg ); ?>;
    margin: 0;
    padding: 70px 0 70px 0;
    -webkit-text-size-adjust: none !important;
    width: 100%;
}

#template_container {
    box-shadow: 0 1px 4px rgba(0,0,0,0.1) !important;
    background-color: <?php echo esc_attr( $body ); ?>;
    border: 1px solid <?php echo esc_attr( $bg_darker_10 ); ?>;
    border-radius: 3px !important;
}

#template_header {
    background-color: <?php echo esc_attr( $base ); ?>;
    border-radius: 3px 3px 0 0 !important;
    color: <?php echo esc_attr( $base_text ); ?>;
    border-bottom: 0;
    font-weight: bold;
    line-height: 100%;
    vertical-align: middle;
    font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;
}

#template_header h1 {
    color: <?php echo esc_attr( $base_text ); ?>;
}

#template_footer td {
    padding: 0;
    -webkit-border-radius: 6px;
}

#template_footer #credit {
    border:0;
    color: <?php echo esc_attr( $base_lighter_40 ); ?>;
    font-family: Arial;
    font-size:12px;
    line-height:125%;
    text-align:center;
    padding: 0 48px 48px 48px;
}

#body_content {
    background-color: <?php echo esc_attr( $body ); ?>;
}

#body_content table td {
    padding: 48px;
}

#body_content table td td {
    padding: 12px;
}

#body_content table td th {
    padding: 12px;
}

#body_content p {
    margin: 0 0 16px;
}

#body_content_inner {
    color: <?php echo esc_attr( $text_lighter_20 ); ?>;
    font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;
    font-size: 14px;
    line-height: 150%;
    text-align: <?php echo is_rtl() ? 'right' : 'left'; ?>;
}

.td {
    color: <?php echo esc_attr( $text_lighter_20 ); ?>;
    border: 1px solid <?php echo esc_attr( $body_darker_10 ); ?>;
}

.text {
    color: <?php echo esc_attr( $text ); ?>;
    font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;
}

.link {
    color: <?php echo esc_attr( $base ); ?>;
}

#header_wrapper {
    padding: 36px 48px;
    display: block;
}

h1 {
    color: <?php echo esc_attr( $base ); ?>;
    font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;
    font-size: 30px;
    font-weight: 300;
    line-height: 150%;
    margin: 0;
    text-align: <?php echo is_rtl() ? 'right' : 'left'; ?>;
    text-shadow: 0 1px 0 <?php echo esc_attr( $base_lighter_20 ); ?>;
    -webkit-font-smoothing: antialiased;
}

h2 {
    color: <?php echo esc_attr( $base ); ?>;
    display: block;
    font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;
    font-size: 18px;
    font-weight: bold;
    line-height: 130%;
    margin: 16px 0 8px;
    text-align: <?php echo is_rtl() ? 'right' : 'left'; ?>;
}

h3 {
    color: <?php echo esc_attr( $base ); ?>;
    display: block;
    font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;
    font-size: 16px;
    font-weight: bold;
    line-height: 130%;
    margin: 16px 0 8px;
    text-align: <?php echo is_rtl() ? 'right' : 'left'; ?>;
}

a {
    color: <?php echo esc_attr( $base ); ?>;
    font-weight: normal;
    text-decoration: underline;
}

img {
    border: none;
    display: inline;
    font-size: 14px;
    font-weight: bold;
    height: auto;
    line-height: 100%;
    outline: none;
    text-decoration: none;
    text-transform: capitalize;
}

.CssTitleBlack{
    color: black !important;
}

.CssTitleBold{
    font-weight: bold !important;
}

.icon-wrapper {
    display: table;
    float: left;
}

<?php