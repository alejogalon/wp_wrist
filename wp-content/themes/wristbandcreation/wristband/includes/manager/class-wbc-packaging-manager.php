<?php

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('WBC_Packaging_Manager')) {
    class WBC_Packaging_Manager extends WBC_Manager
    {
        public function __construct() {
            add_action('init', array($this, 'register'));

            if (!is_admin()) {
                add_filter( 'wristband_settings_array', array( $this, 'get_settings' ), 20 );
            }
        }

        public function register() {
            $this->register_field_group(array (
                'id' => 'acf_packaging-options',
                'title' => 'Packaging Options',
                'fields' => array (
                    array (
                        'key' => 'field_5948b37d13bfa',
                        'label' => 'Packaging Options',
                        'name' => 'packaging_options',
                        'type' => 'repeater',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_5948be05759cc',
                                'label' => 'Name',
                                'name' => 'name',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'html',
                                'maxlength' => '',
                            ),
                            array (
                                'key' => 'field_5948beb069b97',
                                'label' => 'Cost Type',
                                'name' => 'cost_type',
                                'type' => 'select',
                                'column_width' => '',
                                'choices' => array (
                                    'Each Quantity' => 'Each Quantity',
                                    'Per Order' => 'Per Order',
                                ),
                                'default_value' => '',
                                'allow_null' => 0,
                                'multiple' => 0,
                            ),
                            array (
                                'key' => 'field_5948bf3a69b98',
                                'label' => 'Choose Size',
                                'name' => 'choose_size',
                                'type' => 'checkbox',
                                'column_width' => '',
                                'choices' => array (
                                    '1/4' => '1/4',
                                    '1/2' => '1/2',
                                    '3/4' => '3/4',
                                    '1' => '1',
                                    '1.5' => '1.5',
                                    '2' => '2',
                                ),
                                'default_value' => '',
                                'layout' => 'vertical',
                            ),
                            array (
                                'key' => 'field_5948bfd969b99',
                                'label' => 'Tool Tip Text',
                                'name' => 'tool_tip_text',
                                'type' => 'textarea',
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'maxlength' => '',
                                'rows' => '',
                                'formatting' => 'br',
                            ),
                            array (
                                'key' => 'field_5948c01269b9a',
                                'label' => 'Image',
                                'name' => 'image',
                                'type' => 'image',
                                'column_width' => '',
                                'save_format' => 'object',
                                'preview_size' => 'thumbnail',
                                'library' => 'all',
                            ),
                        ),
                        'row_min' => '',
                        'row_limit' => '',
                        'layout' => 'table',
                        'button_label' => 'Add Row',
                    ),
                ),
                'location' => array (
                    array (
                        array (
                            'param' => 'options_page',
                            'operator' => '==',
                            'value' => 'wristband-configuration-packaging',
                            'order_no' => 0,
                            'group_no' => 0,
                        ),
                    ),
                ),
                'options' => array (
                    'position' => 'normal',
                    'layout' => 'default',
                    'hide_on_screen' => array (
                    ),
                ),
                'menu_order' => 0,
            ));
        }


        public function get_settings($settings) {

            $packaging_options = array();
            $acf_packaging_options = get_field('packaging_options', 'option');
            if ($acf_packaging_options) {
                foreach ($acf_packaging_options as $key => $value) {
                    $packaging_options[sanitize_title_with_underscore($value['name'])] = array(
                        'name' => $value['name'],
                        'cost_type' => $value['cost_type'],
                        'choose_size' => $value['choose_size'],
                        'tool_tip_text' => $value['tool_tip_text'],
                        'image' => array(
                            'id' => $value['image']['id'],
                            'url' => $value['image']['url'],
                        )
                    );
                }
            }

            $settings['packaging_options'] = $packaging_options;
            return $settings;
        }
    }
}

return new WBC_Packaging_Manager();