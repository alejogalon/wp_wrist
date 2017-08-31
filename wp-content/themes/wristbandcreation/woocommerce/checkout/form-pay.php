<?php
/**
 * Pay for order form
 *
 * @author   WooThemes
 * @package  WooCommerce/Templates
 * @version  2.4.7
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
//var_dump($order);
$order_id = $order->id;
$meta = get_post_meta($order_id);
//print_r($meta);
?>
<div class="container">
	<div class="col-md-7 col-1-custom changestyle">
	<form name="checkout" class="checkout1 woocommerce-checkout" method="POST" id="save-meta-form" action="" >
		<div class="col2-set" id="customer_details">
			<div class="row">
				<div class="changestyle">
				<div class="woocommerce-billing-fields">
					<div class="billinghead">Billing Details</div>
					<p class="form-row form-row form-row-first validate-required" id="billing_first_name_field">
						<label for="billing_first_name" class="">First Name <abbr class="required" title="required">*</abbr></label>
						<input type="text" class="input-text " name="billing_first_name" id="billing_first_name" placeholder=""  autocomplete="given-name" value="<?php echo $meta['_billing_first_name'][0]; ?>" data-val="<?php echo $meta['_billing_first_name'][0]; ?>" required />
					</p>
					<p class="form-row form-row form-row-last validate-required" id="billing_last_name_field">
						<label for="billing_last_name" class="">Last Name <abbr class="required" title="required">*</abbr></label>
						<input type="text" class="input-text " name="billing_last_name" id="billing_last_name" placeholder=""  autocomplete="family-name" value="<?php echo $meta['_billing_last_name'][0]; ?>" data-val="<?php echo $meta['_billing_last_name'][0]; ?>" required />
					</p>
					<div class="clear"></div>
					<p class="form-row form-row form-row-wide" id="billing_company_field">
						<label for="billing_company" class="">Company Name</label>
						<input type="text" class="input-text " name="billing_company" id="billing_company" placeholder=""  autocomplete="organization" value="<?php echo $meta['_billing_company'][0]; ?>" data-val="<?php echo $meta['_billing_company'][0]; ?>" />
					</p>
					<p class="form-row form-row form-row-wide address-field update_totals_on_change validate-required" id="billing_country_field">
						<label for="billing_country" class="" style="float: left;">Country <abbr class="required" title="required">*</abbr></label>
						<select name="billing_country" id="billing_country" data-country="<?php echo $meta['_billing_country'][0]; ?>" autocomplete="country" class="country_to_state country_select " ><option value="">Select a country&hellip;</option><option value="AX" >&#197;land Islands</option><option value="AF" >Afghanistan</option><option value="AL" >Albania</option><option value="DZ" >Algeria</option><option value="AS" >American Samoa</option><option value="AD" >Andorra</option><option value="AO" >Angola</option><option value="AI" >Anguilla</option><option value="AQ" >Antarctica</option><option value="AG" >Antigua and Barbuda</option><option value="AR" >Argentina</option><option value="AM" >Armenia</option><option value="AW" >Aruba</option><option value="AU" >Australia</option><option value="AT" >Austria</option><option value="AZ" >Azerbaijan</option><option value="BS" >Bahamas</option><option value="BH" >Bahrain</option><option value="BD" >Bangladesh</option><option value="BB" >Barbados</option><option value="BY" >Belarus</option><option value="PW" >Belau</option><option value="BE" >Belgium</option><option value="BZ" >Belize</option><option value="BJ" >Benin</option><option value="BM" >Bermuda</option><option value="BT" >Bhutan</option><option value="BO" >Bolivia</option><option value="BQ" >Bonaire, Saint Eustatius and Saba</option><option value="BA" >Bosnia and Herzegovina</option><option value="BW" >Botswana</option><option value="BV" >Bouvet Island</option><option value="BR" >Brazil</option><option value="IO" >British Indian Ocean Territory</option><option value="VG" >British Virgin Islands</option><option value="BN" >Brunei</option><option value="BG" >Bulgaria</option><option value="BF" >Burkina Faso</option><option value="BI" >Burundi</option><option value="KH" >Cambodia</option><option value="CM" >Cameroon</option><option value="CA" >Canada</option><option value="CV" >Cape Verde</option><option value="KY" >Cayman Islands</option><option value="CF" >Central African Republic</option><option value="TD" >Chad</option><option value="CL" >Chile</option><option value="CN" >China</option><option value="CX" >Christmas Island</option><option value="CC" >Cocos (Keeling) Islands</option><option value="CO" >Colombia</option><option value="KM" >Comoros</option><option value="CG" >Congo (Brazzaville)</option><option value="CD" >Congo (Kinshasa)</option><option value="CK" >Cook Islands</option><option value="CR" >Costa Rica</option><option value="HR" >Croatia</option><option value="CU" >Cuba</option><option value="CW" >Cura&ccedil;ao</option><option value="CY" >Cyprus</option><option value="CZ" >Czech Republic</option><option value="DK" >Denmark</option><option value="DJ" >Djibouti</option><option value="DM" >Dominica</option><option value="DO" >Dominican Republic</option><option value="EC" >Ecuador</option><option value="EG" >Egypt</option><option value="SV" >El Salvador</option><option value="GQ" >Equatorial Guinea</option><option value="ER" >Eritrea</option><option value="EE" >Estonia</option><option value="ET" >Ethiopia</option><option value="FK" >Falkland Islands</option><option value="FO" >Faroe Islands</option><option value="FJ" >Fiji</option><option value="FI" >Finland</option><option value="FR" >France</option><option value="GF" >French Guiana</option><option value="PF" >French Polynesia</option><option value="TF" >French Southern Territories</option><option value="GA" >Gabon</option><option value="GM" >Gambia</option><option value="GE" >Georgia</option><option value="DE" >Germany</option><option value="GH" >Ghana</option><option value="GI" >Gibraltar</option><option value="GR" >Greece</option><option value="GL" >Greenland</option><option value="GD" >Grenada</option><option value="GP" >Guadeloupe</option><option value="GU" >Guam</option><option value="GT" >Guatemala</option><option value="GG" >Guernsey</option><option value="GN" >Guinea</option><option value="GW" >Guinea-Bissau</option><option value="GY" >Guyana</option><option value="HT" >Haiti</option><option value="HM" >Heard Island and McDonald Islands</option><option value="HN" >Honduras</option><option value="HK" >Hong Kong</option><option value="HU" >Hungary</option><option value="IS" >Iceland</option><option value="IN" >India</option><option value="ID" >Indonesia</option><option value="IR" >Iran</option><option value="IQ" >Iraq</option><option value="IM" >Isle of Man</option><option value="IL" >Israel</option><option value="IT" >Italy</option><option value="CI" >Ivory Coast</option><option value="JM" >Jamaica</option><option value="JP" >Japan</option><option value="JE" >Jersey</option><option value="JO" >Jordan</option><option value="KZ" >Kazakhstan</option><option value="KE" >Kenya</option><option value="KI" >Kiribati</option><option value="KW" >Kuwait</option><option value="KG" >Kyrgyzstan</option><option value="LA" >Laos</option><option value="LV" >Latvia</option><option value="LB" >Lebanon</option><option value="LS" >Lesotho</option><option value="LR" >Liberia</option><option value="LY" >Libya</option><option value="LI" >Liechtenstein</option><option value="LT" >Lithuania</option><option value="LU" >Luxembourg</option><option value="MO" >Macao S.A.R., China</option><option value="MK" >Macedonia</option><option value="MG" >Madagascar</option><option value="MW" >Malawi</option><option value="MY" >Malaysia</option><option value="MV" >Maldives</option><option value="ML" >Mali</option><option value="MT" >Malta</option><option value="MH" >Marshall Islands</option><option value="MQ" >Martinique</option><option value="MR" >Mauritania</option><option value="MU" >Mauritius</option><option value="YT" >Mayotte</option><option value="MX" >Mexico</option><option value="FM" >Micronesia</option><option value="MD" >Moldova</option><option value="MC" >Monaco</option><option value="MN" >Mongolia</option><option value="ME" >Montenegro</option><option value="MS" >Montserrat</option><option value="MA" >Morocco</option><option value="MZ" >Mozambique</option><option value="MM" >Myanmar</option><option value="NA" >Namibia</option><option value="NR" >Nauru</option><option value="NP" >Nepal</option><option value="NL" >Netherlands</option><option value="NC" >New Caledonia</option><option value="NZ" >New Zealand</option><option value="NI" >Nicaragua</option><option value="NE" >Niger</option><option value="NG" >Nigeria</option><option value="NU" >Niue</option><option value="NF" >Norfolk Island</option><option value="KP" >North Korea</option><option value="MP" >Northern Mariana Islands</option><option value="NO" >Norway</option><option value="OM" >Oman</option><option value="PK" >Pakistan</option><option value="PS" >Palestinian Territory</option><option value="PA" >Panama</option><option value="PG" >Papua New Guinea</option><option value="PY" >Paraguay</option><option value="PE" >Peru</option><option value="PH" >Philippines</option><option value="PN" >Pitcairn</option><option value="PL" >Poland</option><option value="PT" >Portugal</option><option value="PR" >Puerto Rico</option><option value="QA" >Qatar</option><option value="IE" >Republic of Ireland</option><option value="RE" >Reunion</option><option value="RO" >Romania</option><option value="RU" >Russia</option><option value="RW" >Rwanda</option><option value="ST" >S&atilde;o Tom&eacute; and Pr&iacute;ncipe</option><option value="BL" >Saint Barth&eacute;lemy</option><option value="SH" >Saint Helena</option><option value="KN" >Saint Kitts and Nevis</option><option value="LC" >Saint Lucia</option><option value="SX" >Saint Martin (Dutch part)</option><option value="MF" >Saint Martin (French part)</option><option value="PM" >Saint Pierre and Miquelon</option><option value="VC" >Saint Vincent and the Grenadines</option><option value="WS" >Samoa</option><option value="SM" >San Marino</option><option value="SA" >Saudi Arabia</option><option value="SN" >Senegal</option><option value="RS" >Serbia</option><option value="SC" >Seychelles</option><option value="SL" >Sierra Leone</option><option value="SG" >Singapore</option><option value="SK" >Slovakia</option><option value="SI" >Slovenia</option><option value="SB" >Solomon Islands</option><option value="SO" >Somalia</option><option value="ZA" >South Africa</option><option value="GS" >South Georgia/Sandwich Islands</option><option value="KR" >South Korea</option><option value="SS" >South Sudan</option><option value="ES" >Spain</option><option value="LK" >Sri Lanka</option><option value="SD" >Sudan</option><option value="SR" >Suriname</option><option value="SJ" >Svalbard and Jan Mayen</option><option value="SZ" >Swaziland</option><option value="SE" >Sweden</option><option value="CH" >Switzerland</option><option value="SY" >Syria</option><option value="TW" >Taiwan</option><option value="TJ" >Tajikistan</option><option value="TZ" >Tanzania</option><option value="TH" >Thailand</option><option value="TL" >Timor-Leste</option><option value="TG" >Togo</option><option value="TK" >Tokelau</option><option value="TO" >Tonga</option><option value="TT" >Trinidad and Tobago</option><option value="TN" >Tunisia</option><option value="TR" >Turkey</option><option value="TM" >Turkmenistan</option><option value="TC" >Turks and Caicos Islands</option><option value="TV" >Tuvalu</option><option value="UG" >Uganda</option><option value="UA" >Ukraine</option><option value="AE" >United Arab Emirates</option><option value="GB" >United Kingdom (UK)</option><option value="US"  selected='selected'>United States (US)</option><option value="UM" >United States (US) Minor Outlying Islands</option><option value="VI" >United States (US) Virgin Islands</option><option value="UY" >Uruguay</option><option value="UZ" >Uzbekistan</option><option value="VU" >Vanuatu</option><option value="VA" >Vatican</option><option value="VE" >Venezuela</option><option value="VN" >Vietnam</option><option value="WF" >Wallis and Futuna</option><option value="EH" >Western Sahara</option><option value="YE" >Yemen</option><option value="ZM" >Zambia</option><option value="ZW" >Zimbabwe</option></select><noscript>
						<input type="submit" name="woocommerce_checkout_update_totals" value="Update country" /></noscript>
						</p>
						<p class="form-row form-row form-row-wide address-field validate-required" id="billing_address_1_field">
							<label for="billing_address_1" class="">Address <abbr class="required" title="required">*</abbr></label>
							<input type="text" class="input-text " name="billing_address_1" id="billing_address_1" placeholder="Street address"  autocomplete="address-line1" value="<?php echo $meta['_billing_address_1'][0]; ?>" data-val="<?php echo $meta['_billing_address_1'][0]; ?>" required />
						</p>
						<p class="form-row form-row form-row-wide address-field" id="billing_address_2_field">
							<input type="text" class="input-text " name="billing_address_2" id="billing_address_2" placeholder="Apartment, suite, unit etc. (optional)"  autocomplete="address-line2" value="<?php echo $meta['_billing_address_2'][0]; ?>" data-val="<?php echo $meta['_billing_address_2'][0]; ?>" />
						</p>
						<p class="form-row form-row form-row-wide address-field validate-required" id="billing_city_field">
							<label for="billing_city" class="">Town / City <abbr class="required" title="required">*</abbr></label>
							<input type="text" class="input-text " name="billing_city" id="billing_city" placeholder=""  autocomplete="address-level2" value="<?php echo $meta['_billing_city'][0]; ?>" data-val="<?php echo $meta['_billing_city'][0]; ?>" required />
						</p>
						<p class="form-row form-row form-row-first address-field validate-required validate-state" id="billing_state_field">
							<label for="billing_state" class=""  style="float: left">State <abbr class="required" title="required">*</abbr></label>
							<select name="billing_state" id="billing_state" class="state_select "  data-placeholder="" autocomplete="address-level1" data-state="<?php echo $meta['_billing_state'][0]; ?>" ><option value="">Select a state&hellip;</option><option value="AL" >Alabama</option><option value="AK" >Alaska</option><option value="AZ" >Arizona</option><option value="AR" >Arkansas</option><option value="CA"  selected='selected'>California</option><option value="CO" >Colorado</option><option value="CT" >Connecticut</option><option value="DE" >Delaware</option><option value="DC" >District Of Columbia</option><option value="FL" >Florida</option><option value="GA" >Georgia</option><option value="HI" >Hawaii</option><option value="ID" >Idaho</option><option value="IL" >Illinois</option><option value="IN" >Indiana</option><option value="IA" >Iowa</option><option value="KS" >Kansas</option><option value="KY" >Kentucky</option><option value="LA" >Louisiana</option><option value="ME" >Maine</option><option value="MD" >Maryland</option><option value="MA" >Massachusetts</option><option value="MI" >Michigan</option><option value="MN" >Minnesota</option><option value="MS" >Mississippi</option><option value="MO" >Missouri</option><option value="MT" >Montana</option><option value="NE" >Nebraska</option><option value="NV" >Nevada</option><option value="NH" >New Hampshire</option><option value="NJ" >New Jersey</option><option value="NM" >New Mexico</option><option value="NY" >New York</option><option value="NC" >North Carolina</option><option value="ND" >North Dakota</option><option value="OH" >Ohio</option><option value="OK" >Oklahoma</option><option value="OR" >Oregon</option><option value="PA" >Pennsylvania</option><option value="RI" >Rhode Island</option><option value="SC" >South Carolina</option><option value="SD" >South Dakota</option><option value="TN" >Tennessee</option><option value="TX" >Texas</option><option value="UT" >Utah</option><option value="VT" >Vermont</option><option value="VA" >Virginia</option><option value="WA" >Washington</option><option value="WV" >West Virginia</option><option value="WI" >Wisconsin</option><option value="WY" >Wyoming</option><option value="AA" >Armed Forces (AA)</option><option value="AE" >Armed Forces (AE)</option><option value="AP" >Armed Forces (AP)</option>
							</select>
						</p>
						<p class="form-row form-row form-row-last address-field validate-required validate-postcode" id="billing_postcode_field">
							<label for="billing_postcode" class="">ZIP <abbr class="required" title="required">*</abbr></label>
							<input type="text" class="input-text " name="billing_postcode" id="billing_postcode" placeholder=""  autocomplete="postal-code" value="<?php echo $meta['_billing_postcode'][0]; ?>" data-val="<?php echo $meta['_billing_postcode'][0]; ?>" required />
						</p>
						<div class="clear"></div>
						<p class="form-row form-row form-row-first validate-required validate-email" id="billing_email_field">
							<label for="billing_email" class="">Email Address <abbr class="required" title="required">*</abbr></label>
							<input type="email" class="input-text " name="billing_email" id="billing_email" placeholder=""  autocomplete="email" value="<?php echo $meta['_billing_email'][0]; ?>" data-val="<?php echo $meta['_billing_email'][0]; ?>" required />
						</p>
						<p class="form-row form-row form-row-last validate-required validate-phone" id="billing_phone_field">
							<label for="billing_phone" class="">Phone <abbr class="required" title="required">*</abbr></label>
							<input type="tel" class="input-text " name="billing_phone" id="billing_phone" placeholder=""  autocomplete="tel" value="<?php echo $meta['_billing_phone'][0]; ?>" data-val="<?php echo $meta['_billing_phone'][0]; ?>" required />
						</p>
						<div class="clear"></div>
					</div>
					<a data-name="col-2" href="#" class="fusion-button button-default button-medium button default medium continue-checkout">Continue</a>
					<div class="clearboth"></div>
					<a data-name="order_review" href="#" class="fusion-button button-default button-medium continue-checkout button default medium">Continue</a>
					<div class="clearboth"></div>

					<div class="woocommerce-shipping-fields">
						<h3 id="ship-to-different-address">
							<label for="ship-to-different-address-checkbox" class="checkbox">Ship to a different address?</label> 
							<input id="ship-to-different-address-checkbox" class="input-checkbox"  type="checkbox" name="ship_to_different_address" value="1"/>
						</h3>
						<div class="shipping_address">
							<p class="form-row form-row form-row-first validate-required" id="shipping_first_name_field">
								<label for="shipping_first_name" class="">First Name <abbr class="required" title="required">*</abbr></label>
								<input type="text" class="input-text " name="shipping_first_name" id="shipping_first_name" placeholder=""  autocomplete="given-name" value="<?php echo $meta['_shipping_first_name'][0]; ?>" />
							</p>
							<p class="form-row form-row form-row-last validate-required" id="shipping_last_name_field">
								<label for="shipping_last_name" class="">Last Name <abbr class="required" title="required">*</abbr></label><input type="text" class="input-text " name="shipping_last_name" id="shipping_last_name" placeholder=""  autocomplete="family-name" value="<?php echo $meta['_shipping_last_name'][0]; ?>"  />
							</p>
							<div class="clear"></div>
							<p class="form-row form-row form-row-wide" id="shipping_company_field">
								<label for="shipping_company" class="">Company Name</label>
								<input type="text" class="input-text " name="shipping_company" id="shipping_company" placeholder=""  autocomplete="organization" value="<?php echo $meta['_shipping_company'][0]; ?>"  />
							</p>
							<p class="form-row form-row form-row-wide address-field update_totals_on_change validate-required" id="shipping_country_field">
								<label for="shipping_country" class="" style="float: left;">Country <abbr class="required" title="required">*</abbr></label>
								<select name="shipping_country" id="shipping_country" autocomplete="country" class="country_to_state country_select " data-country="<?php echo $meta['_shipping_country'][0]; ?>"><option value="">Select a country&hellip;</option><option value="AX" >&#197;land Islands</option><option value="AF" >Afghanistan</option><option value="AL" >Albania</option><option value="DZ" >Algeria</option><option value="AS" >American Samoa</option><option value="AD" >Andorra</option><option value="AO" >Angola</option><option value="AI" >Anguilla</option><option value="AQ" >Antarctica</option><option value="AG" >Antigua and Barbuda</option><option value="AR" >Argentina</option><option value="AM" >Armenia</option><option value="AW" >Aruba</option><option value="AU" >Australia</option><option value="AT" >Austria</option><option value="AZ" >Azerbaijan</option><option value="BS" >Bahamas</option><option value="BH" >Bahrain</option><option value="BD" >Bangladesh</option><option value="BB" >Barbados</option><option value="BY" >Belarus</option><option value="PW" >Belau</option><option value="BE" >Belgium</option><option value="BZ" >Belize</option><option value="BJ" >Benin</option><option value="BM" >Bermuda</option><option value="BT" >Bhutan</option><option value="BO" >Bolivia</option><option value="BQ" >Bonaire, Saint Eustatius and Saba</option><option value="BA" >Bosnia and Herzegovina</option><option value="BW" >Botswana</option><option value="BV" >Bouvet Island</option><option value="BR" >Brazil</option><option value="IO" >British Indian Ocean Territory</option><option value="VG" >British Virgin Islands</option><option value="BN" >Brunei</option><option value="BG" >Bulgaria</option><option value="BF" >Burkina Faso</option><option value="BI" >Burundi</option><option value="KH" >Cambodia</option><option value="CM" >Cameroon</option><option value="CA" >Canada</option><option value="CV" >Cape Verde</option><option value="KY" >Cayman Islands</option><option value="CF" >Central African Republic</option><option value="TD" >Chad</option><option value="CL" >Chile</option><option value="CN" >China</option><option value="CX" >Christmas Island</option><option value="CC" >Cocos (Keeling) Islands</option><option value="CO" >Colombia</option><option value="KM" >Comoros</option><option value="CG" >Congo (Brazzaville)</option><option value="CD" >Congo (Kinshasa)</option><option value="CK" >Cook Islands</option><option value="CR" >Costa Rica</option><option value="HR" >Croatia</option><option value="CU" >Cuba</option><option value="CW" >Cura&ccedil;ao</option><option value="CY" >Cyprus</option><option value="CZ" >Czech Republic</option><option value="DK" >Denmark</option><option value="DJ" >Djibouti</option><option value="DM" >Dominica</option><option value="DO" >Dominican Republic</option><option value="EC" >Ecuador</option><option value="EG" >Egypt</option><option value="SV" >El Salvador</option><option value="GQ" >Equatorial Guinea</option><option value="ER" >Eritrea</option><option value="EE" >Estonia</option><option value="ET" >Ethiopia</option><option value="FK" >Falkland Islands</option><option value="FO" >Faroe Islands</option><option value="FJ" >Fiji</option><option value="FI" >Finland</option><option value="FR" >France</option><option value="GF" >French Guiana</option><option value="PF" >French Polynesia</option><option value="TF" >French Southern Territories</option><option value="GA" >Gabon</option><option value="GM" >Gambia</option><option value="GE" >Georgia</option><option value="DE" >Germany</option><option value="GH" >Ghana</option><option value="GI" >Gibraltar</option><option value="GR" >Greece</option><option value="GL" >Greenland</option><option value="GD" >Grenada</option><option value="GP" >Guadeloupe</option><option value="GU" >Guam</option><option value="GT" >Guatemala</option><option value="GG" >Guernsey</option><option value="GN" >Guinea</option><option value="GW" >Guinea-Bissau</option><option value="GY" >Guyana</option><option value="HT" >Haiti</option><option value="HM" >Heard Island and McDonald Islands</option><option value="HN" >Honduras</option><option value="HK" >Hong Kong</option><option value="HU" >Hungary</option><option value="IS" >Iceland</option><option value="IN" >India</option><option value="ID" >Indonesia</option><option value="IR" >Iran</option><option value="IQ" >Iraq</option><option value="IM" >Isle of Man</option><option value="IL" >Israel</option><option value="IT" >Italy</option><option value="CI" >Ivory Coast</option><option value="JM" >Jamaica</option><option value="JP" >Japan</option><option value="JE" >Jersey</option><option value="JO" >Jordan</option><option value="KZ" >Kazakhstan</option><option value="KE" >Kenya</option><option value="KI" >Kiribati</option><option value="KW" >Kuwait</option><option value="KG" >Kyrgyzstan</option><option value="LA" >Laos</option><option value="LV" >Latvia</option><option value="LB" >Lebanon</option><option value="LS" >Lesotho</option><option value="LR" >Liberia</option><option value="LY" >Libya</option><option value="LI" >Liechtenstein</option><option value="LT" >Lithuania</option><option value="LU" >Luxembourg</option><option value="MO" >Macao S.A.R., China</option><option value="MK" >Macedonia</option><option value="MG" >Madagascar</option><option value="MW" >Malawi</option><option value="MY" >Malaysia</option><option value="MV" >Maldives</option><option value="ML" >Mali</option><option value="MT" >Malta</option><option value="MH" >Marshall Islands</option><option value="MQ" >Martinique</option><option value="MR" >Mauritania</option><option value="MU" >Mauritius</option><option value="YT" >Mayotte</option><option value="MX" >Mexico</option><option value="FM" >Micronesia</option><option value="MD" >Moldova</option><option value="MC" >Monaco</option><option value="MN" >Mongolia</option><option value="ME" >Montenegro</option><option value="MS" >Montserrat</option><option value="MA" >Morocco</option><option value="MZ" >Mozambique</option><option value="MM" >Myanmar</option><option value="NA" >Namibia</option><option value="NR" >Nauru</option><option value="NP" >Nepal</option><option value="NL" >Netherlands</option><option value="NC" >New Caledonia</option><option value="NZ" >New Zealand</option><option value="NI" >Nicaragua</option><option value="NE" >Niger</option><option value="NG" >Nigeria</option><option value="NU" >Niue</option><option value="NF" >Norfolk Island</option><option value="KP" >North Korea</option><option value="MP" >Northern Mariana Islands</option><option value="NO" >Norway</option><option value="OM" >Oman</option><option value="PK" >Pakistan</option><option value="PS" >Palestinian Territory</option><option value="PA" >Panama</option><option value="PG" >Papua New Guinea</option><option value="PY" >Paraguay</option><option value="PE" >Peru</option><option value="PH" >Philippines</option><option value="PN" >Pitcairn</option><option value="PL" >Poland</option><option value="PT" >Portugal</option><option value="PR" >Puerto Rico</option><option value="QA" >Qatar</option><option value="IE" >Republic of Ireland</option><option value="RE" >Reunion</option><option value="RO" >Romania</option><option value="RU" >Russia</option><option value="RW" >Rwanda</option><option value="ST" >S&atilde;o Tom&eacute; and Pr&iacute;ncipe</option><option value="BL" >Saint Barth&eacute;lemy</option><option value="SH" >Saint Helena</option><option value="KN" >Saint Kitts and Nevis</option><option value="LC" >Saint Lucia</option><option value="SX" >Saint Martin (Dutch part)</option><option value="MF" >Saint Martin (French part)</option><option value="PM" >Saint Pierre and Miquelon</option><option value="VC" >Saint Vincent and the Grenadines</option><option value="WS" >Samoa</option><option value="SM" >San Marino</option><option value="SA" >Saudi Arabia</option><option value="SN" >Senegal</option><option value="RS" >Serbia</option><option value="SC" >Seychelles</option><option value="SL" >Sierra Leone</option><option value="SG" >Singapore</option><option value="SK" >Slovakia</option><option value="SI" >Slovenia</option><option value="SB" >Solomon Islands</option><option value="SO" >Somalia</option><option value="ZA" >South Africa</option><option value="GS" >South Georgia/Sandwich Islands</option><option value="KR" >South Korea</option><option value="SS" >South Sudan</option><option value="ES" >Spain</option><option value="LK" >Sri Lanka</option><option value="SD" >Sudan</option><option value="SR" >Suriname</option><option value="SJ" >Svalbard and Jan Mayen</option><option value="SZ" >Swaziland</option><option value="SE" >Sweden</option><option value="CH" >Switzerland</option><option value="SY" >Syria</option><option value="TW" >Taiwan</option><option value="TJ" >Tajikistan</option><option value="TZ" >Tanzania</option><option value="TH" >Thailand</option><option value="TL" >Timor-Leste</option><option value="TG" >Togo</option><option value="TK" >Tokelau</option><option value="TO" >Tonga</option><option value="TT" >Trinidad and Tobago</option><option value="TN" >Tunisia</option><option value="TR" >Turkey</option><option value="TM" >Turkmenistan</option><option value="TC" >Turks and Caicos Islands</option><option value="TV" >Tuvalu</option><option value="UG" >Uganda</option><option value="UA" >Ukraine</option><option value="AE" >United Arab Emirates</option><option value="GB" >United Kingdom (UK)</option><option value="US"  selected='selected'>United States (US)</option><option value="UM" >United States (US) Minor Outlying Islands</option><option value="VI" >United States (US) Virgin Islands</option><option value="UY" >Uruguay</option><option value="UZ" >Uzbekistan</option><option value="VU" >Vanuatu</option><option value="VA" >Vatican</option><option value="VE" >Venezuela</option><option value="VN" >Vietnam</option><option value="WF" >Wallis and Futuna</option><option value="EH" >Western Sahara</option><option value="YE" >Yemen</option><option value="ZM" >Zambia</option><option value="ZW" >Zimbabwe</option>
								</select>
								<noscript><input type="submit" name="woocommerce_checkout_update_totals" value="Update country" /></noscript>
							</p>
							<p class="form-row form-row form-row-wide address-field validate-required" id="shipping_address_1_field">
								<label for="shipping_address_1" class="">Address <abbr class="required" title="required">*</abbr></label>
								<input type="text" class="input-text " name="shipping_address_1" id="shipping_address_1" placeholder="Street address"  autocomplete="address-line1" value="<?php echo $meta['_shipping_address_1'][0]; ?>"  />
							</p>
							<p class="form-row form-row form-row-wide address-field" id="shipping_address_2_field">
								<input type="text" class="input-text " name="shipping_address_2" id="shipping_address_2" placeholder="Apartment, suite, unit etc. (optional)"  autocomplete="address-line2" value="<?php echo $meta['_shipping_address_2'][0]; ?>"  />
							</p>
							<p class="form-row form-row form-row-wide address-field validate-required" id="shipping_city_field">
								<label for="shipping_city" class="">Town / City <abbr class="required" title="required">*</abbr></label>
								<input type="text" class="input-text " name="shipping_city" id="shipping_city" placeholder=""  autocomplete="address-level2" value="<?php echo $meta['_shipping_city'][0]; ?>"  />
							</p>
							<p class="form-row form-row form-row-first address-field validate-required validate-state" id="shipping_state_field">
								<label for="shipping_state" class="" style="float: left;">State <abbr class="required" title="required">*</abbr></label>
								<select name="shipping_state" id="shipping_state" class="state_select "  data-placeholder="" autocomplete="address-level1" data-state="<?php echo $meta['_shipping_state'][0]; ?>" ><option value="">Select a state&hellip;</option><option value="AL" >Alabama</option><option value="AK" >Alaska</option><option value="AZ" >Arizona</option><option value="AR" >Arkansas</option><option value="CA"  selected='selected'>California</option><option value="CO" >Colorado</option><option value="CT" >Connecticut</option><option value="DE" >Delaware</option><option value="DC" >District Of Columbia</option><option value="FL" >Florida</option><option value="GA" >Georgia</option><option value="HI" >Hawaii</option><option value="ID" >Idaho</option><option value="IL" >Illinois</option><option value="IN" >Indiana</option><option value="IA" >Iowa</option><option value="KS" >Kansas</option><option value="KY" >Kentucky</option><option value="LA" >Louisiana</option><option value="ME" >Maine</option><option value="MD" >Maryland</option><option value="MA" >Massachusetts</option><option value="MI" >Michigan</option><option value="MN" >Minnesota</option><option value="MS" >Mississippi</option><option value="MO" >Missouri</option><option value="MT" >Montana</option><option value="NE" >Nebraska</option><option value="NV" >Nevada</option><option value="NH" >New Hampshire</option><option value="NJ" >New Jersey</option><option value="NM" >New Mexico</option><option value="NY" >New York</option><option value="NC" >North Carolina</option><option value="ND" >North Dakota</option><option value="OH" >Ohio</option><option value="OK" >Oklahoma</option><option value="OR" >Oregon</option><option value="PA" >Pennsylvania</option><option value="RI" >Rhode Island</option><option value="SC" >South Carolina</option><option value="SD" >South Dakota</option><option value="TN" >Tennessee</option><option value="TX" >Texas</option><option value="UT" >Utah</option><option value="VT" >Vermont</option><option value="VA" >Virginia</option><option value="WA" >Washington</option><option value="WV" >West Virginia</option><option value="WI" >Wisconsin</option><option value="WY" >Wyoming</option><option value="AA" >Armed Forces (AA)</option><option value="AE" >Armed Forces (AE)</option><option value="AP" >Armed Forces (AP)</option>
								</select>
							</p>
							<p class="form-row form-row form-row-last address-field validate-required validate-postcode" id="shipping_postcode_field">
								<label for="shipping_postcode" class="">ZIP <abbr class="required" title="required">*</abbr></label>
								<input type="text" class="input-text " name="shipping_postcode" id="shipping_postcode" placeholder=""  autocomplete="postal-code" value="<?php echo $meta['_shipping_postcode'][0]; ?>"  />
							</p>
							<div class="clear"></div>
						</div>
						<p class="form-row form-row notes" id="order_comments_field">
							<label for="order_comments" class="">Order Notes</label>
							<textarea name="order_comments" class="input-text " id="order_comments" placeholder="Delivery Notes" rows="2" cols="5"><?php echo $meta['order_notes'][0]; ?></textarea>
						</p> 

						<button type="submit" id="wbc_update_meta" data-id="<?php echo $order->id; ?>" style="display: none!important;">Save</button>
					</div>
				</div>
			</div>
		</div>	
		<div id="status-meta" style="display: none;border: 2px solid #398f14;padding: 0.2em 1em;text-align: center;position: relative;margin: 0em 2em;" role="alert">Successfuly Saved.</div>
	</form>	
	</div>
	<div class="col-md-5 col-2-custom your-order-desktop copy-float-right">
	<form class="order-pay" name="order-pay" id="order_review" method="post" style="border: none !important;padding: 0;"> 

		<table class="shop_table copy-float-left" style="border: 2px solid #f5f8fb !important;padding: 20px 0;">
			<thead class="copy-block">
			<tr style="width: 100%;display: block;">
				<!-- <th class="product-name copy-proxima-reg" style="text-transform: uppercase; letter-spacing: 1px; font-size: 16px; color: #606060;width: 50%; float: left;padding-left: 25px;"><?php _e( 'ITEM', 'woocommerce' ); ?></th>
				<th class="product-quantity copy-proxima-reg text-center" style="text-transform: uppercase; letter-spacing: 1px; font-size: 16px; color: #606060;width: 25%; float: left;"><?php _e( 'QTY', 'woocommerce' ); ?></th>
				<th class="product-total copy-proxima-reg text-center" style="text-transform: uppercase; letter-spacing: 1px; font-size: 16px; color: #606060;width: 25%; float: left;"><?php _e( 'SUBTOTAL', 'woocommerce' ); ?></th> -->
				<th class="product-details details-title">Your Order</th>
			</tr>
			</thead>
			<tbody class="copy-float-left" style="width: 100%;padding: 0 20px;">

			<?php

			// var_dump($order);
			// echo "<br>";
			//$order_id = $order->id;
			// echo $order_id;
			// echo "<br>";
			//$order_meta = get_post_meta($order_id);
			//print_r($order_meta);
			if ( sizeof( $order->get_items() ) > 0 ) :
				foreach ( $order->get_items() as $item ) :
					$item_meta = new WC_Order_Item_Meta( $item['item_meta'] );
					$_product  = apply_filters( 'woocommerce_order_item_product', $order->get_product_from_item( $item ), $item );
	                foreach ($item_meta as $key => $value) {
	                  if($key == 'meta'){
	                    $meta = unserialize($value['wristband_meta'][0]);
	                  }
	                }
					echo '
							<tr style="height: auto; display: block;float: left; width: 100%;padding-top: 1em;">
								<td class="product-name" style="float: left;padding: 0;"><table><tr><td class="table-product-name" style="padding: 0; position: absolute; font-size: 18px;">' . $item['name']. ' Wristbands' .'</td><td>';

					display_order_summary($_product, $meta);
					echo '
								</td></tr></table></td>
								<td class="product-quantity" style="width: 25%;float: left;padding: 0;">' . $item['qty'].'</td>
								<td class="product-subtotal" style="width: 100%;float: left;padding: 0;position: relative;display:none;">' . $order->get_formatted_line_subtotal( $item ) . '</td>
							</tr>';				
				endforeach;
			endif;
			?>
			</tbody>
			<tfoot class="copy-tfoot-pay copy-float-left">
			<?php
			if ( $totals = $order->get_order_item_totals() ) foreach ( $totals as $total ) : if( $total['label'] == 'Shipping:') continue;
				?>
				<tr class="copy-float-left" style="width: 100%;">
					<th class="copy-proxima-reg copy-float-left" scope="row" colspan="2"><?php echo $total['label']; ?></th>
					<td class="product-total"><?php echo $total['value']; ?></td>
				</tr>
				<?php
			endforeach;
			?>
			</tfoot>
		</table>

		<div class="copy-float-left copy-form-pay-payment" id="payment" style="width: 100%;font-size: 16px;">
			<span class="payment-head copy-proxima-sbold copy-font-reg-2 copy-block">PAYMENT METHOD</span>
			<?php if ( $order->needs_payment() ) : ?>
				<ul class="payment_methods methods" style="margin: 1em 25px 0;">
					<?php
					if ( $available_gateways = WC()->payment_gateways->get_available_payment_gateways() ) {
						// Chosen Method
						if ( sizeof( $available_gateways ) ) {
							current( $available_gateways )->set_current();
						}

						foreach ( $available_gateways as $gateway ) {
							?>
							<li class="copy-block payment_method_<?php echo $gateway->id; ?>">
								<input id="payment_method_<?php echo $gateway->id; ?>" type="radio" class="input-radio" name="payment_method" value="<?php echo esc_attr( $gateway->id ); ?>" <?php checked( $gateway->chosen, true ); ?> data-order_button_text="<?php echo esc_attr( $gateway->order_button_text ); ?>" />
								<label for="payment_method_<?php echo $gateway->id; ?>"><?php echo $gateway->get_title(); ?> <?php echo $gateway->get_icon(); ?></label>
								<?php
								if ( $gateway->has_fields() || $gateway->get_description() ) {
									echo '<div class="payment_box payment_method_' . $gateway->id . '" style="display:none;">';
									$gateway->payment_fields();
									echo '</div>';
								}
								?>
							</li>
							<?php
						}
					} else {

						echo '<p>' . __( 'Sorry, it seems that there are no available payment methods for your location. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' ) . '</p>';

					}
					?>
				</ul>
			<?php endif; ?>
			<p class="form-row terms copy-float-left">
				<input type="checkbox" class="input-checkbox copy-float-left" name="terms" id="terms" />
				<label for="terms" class="checkbox copy-float-left">I agree to the <a class="term-mod" id="terms_modal" data-toggle="modal" data-target="#ModalTerms" target="_blank" onClick="$('#ModalTerms').modal()">terms &amp; conditions</a></label>
			</p>
			<div class="form-row copy-form-pay-submit copy-clear">
				<?php wp_nonce_field( 'woocommerce-pay' ); ?>
				<?php
				$pay_order_button_text = apply_filters( 'woocommerce_pay_order_button_text', __( 'Pay for order', 'woocommerce' ) );

				echo apply_filters( 'woocommerce_pay_order_button_html', '<input class="button alt" id="place_order" value="' . esc_attr( $pay_order_button_text ) . '" data-value="' . esc_attr( $pay_order_button_text ) . '" />' );
				?>		
				<input type="hidden" name="woocommerce_pay" id="woocommerce_pay" value="1" />
			</div>
			<!-- TERM AND CONDITION Modal -->
            <div class="modal-term modal fade" id="ModalTerms" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            	 <div class="modal-dialog" role="document">
                	<div class="modal-content">
                    	<div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="myModalLabel">Terms &amp; Conditions</h4>
                   	</div>
                    <div class="modal-body">
                    	<p class="parag-title">Payment Method and Policies</p>
                        We accept payments in the form of Major Credit Cards (Visa, MasterCard, Discover, and American Express), Money Orders, PayPal, Bank Wire Transfers, and Checks only. We will not accept any other forms of payment other than listed above. We do not ship orders COD. We are not responsible for delays in order processing due to declined credit cards or waiting for PayPal payments to clear. For all orders shipped to California, we will add a 9% sales tax on top of the total order amount.

                        &nbsp;
                        <p class="parag-title">Shipping and Handling Policy</p>
                        We do not ship on Saturday, Sunday and holidays. Once payment for your order has been verified, your order will begin processing. Expected arrival assumes that processing or production is not delayed. Guaranteed delivery assurance assumes that there is no delay. Reasons for delays include waiting for payment to clear, artwork, or custom color bands. We will also not be liable with delays on shipments by 3rd party shipping couriers or customs, which invalidates our guaranteed shipping assurance. The turnaround count time of the bracelets starts on the same day if the order was placed before 11am PST, and may start on the next day if placed after 11am.

                        We will not be responsible for any lost shipments or damaged goods due to shipping couriers, unless shipping insurance was availed. For any shipment that was returned to us due to an incorrect address or refused package, we will charge a fixed cost of $20 to ship the item again to another address.

                        “Days” are referred to business days. If in a situation that we fail to deliver the bands in time, then we shall issue a credit based on the difference of the actual rush shipping method that was met.

                        If you have any questions regarding the status of your order, you may email your inquiry at info@wristbandcreation.com.

                        &nbsp;
                       	<p class="parag-title">International Shipping Policy</p>
                        Shipping time does not include any time your order might be delayed going through customs. We are not responsible for delays in shipment due to customs or other international shipping delays.

                        Orders that ship internationally to other countries besides Canada will usually incur additional taxes, duties, VAT, and other fees associated with customs. We are not responsible for these charges and they are the sole responsibility of the recipient. Please verify or get an estimate of what these charges might be before placing an international order. All shipping charges on our Web site include only the cost of shipping the order. All taxes, duties, and other fees charged are not included in the shipping charges on our Web site and are the sole responsibility of the recipient.

                        &nbsp;
                        <p class="parag-title">Copyright and Infringements</p>
                        We will not be held liable of any copyrights or infringements issues. It is the duty of the customer to make sure that the bracelet will not infringe any other company’s rights.

                        &nbsp;
                        <p class="parag-title">Production Quality</p>
                        Proofs/artworks only illustrate a digital mock-up of the actual bracelets produced for reference to the customer. The actual bracelets produced may not fully represent the proof, since this is only a representation. We shall base the actual produced bracelets on the wristband details on the invoice, agreed upon the customer. For any production flaws or mistakes on our side, we will be happy to reproduce the wristbands at no additional cost, as long as this will be claimed within 10 days of receiving the wristbands.

                        For swirl and segmented patterns, there might be a slight hint of other colors that may appear on the bracelets. For example, in a yellow and red swirl bracelet, a hint of orange may appear. This is normal and there is no way to control this due to the production method of the bracelets. For any re-orders, we cannot guarantee that the re-ordered wristbands will completely match the exact color of the previous order.

                        We use silk-screen process for our imprinted wristbands. The printed ink may fade in the long run, just like how printed t-shirts do also fade after washing several times. If there is a major sign of fading off on the wristbands within two months of delivery of the wristbands, then we will happy to reproduce the number of wristbands with fading ink. After two months, any hint of fading will not be entitled for reproduction.

                        &nbsp;
                       	<p class="parag-title">Ordering Policy</p>
                        Once an order is received, we may send a digital proof to confirm the details of the wristband design to the email address provided. The digital proof must be approved immediately. To avoid any delays, the digital proof will be auto-approved if no update was received within 24 hours, to ensure a timely delivery. The time of production will begin only when digital proof is approved. The order cannot be cancelled anymore once the wristbands are in production. There will be a processing fee of 15% of the total cost for any successfully placed orders to be cancelled prior to the production stage.

                        &nbsp;
                        <p class="parag-title">Privacy Policy</p>
                        We do not sell our customer list to anyone. You can order with the assurance that you will not receive spam mail.If we have a customer who fails to make payment for an order, a customer who reverses payment on an order already received, or a customer we feel is making an attempt to defraud us, we reserve the right to provide information to credit agencies and other collections services.

                       	&nbsp;
                        <p class="parag-title">Return Policy</p>
                        Due to the customized nature of our product we do not accept returns unless there was a production error on our part. Ordering the wrong size, color, or phrase on a wristband does not warrant a return. We encourage customers to verify all order information before submitting the final order. If we make a mistake on color, size, quantity, or phrases on a wristband we will be happy to find a solution to remedy the problem.

                        All returns must be approved through our office at info@wristbandcreation.com. If product defect is detected, our office must be notified within 10 days from time of arrival of your package

                        &nbsp;
						This document was last updated on April 17, 2017
                       </div>
            		<div class="modal-footer">
                   		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
              	</div>
            </div>
        </div>
        <!-- END TERMS AND CONDITION -->
		</div>

	</form>
	</div>
</div>
