<?php
//include("./site/modules/AllinoneAccessibility/AllinoneAccessibility.js");
class AllinoneAccessibilityConfig extends ModuleConfig {
    public function getDefaults() {
        return array(
        'useAjax' => 1,
        'moduleStyles' => 1,
        //'license_key'=>"ADAAIOA-FD8BCB9FDC14475BF7B0AB75BBE54FA1",
//        'colorTheme' => 'dark',
//        'position' => 'bottom',
//        'buttonText' => __("Accept cookies"),
//        'messageText' => __("This website uses cookies to ensure you get the best experience on our website"),
        //'buttonPrepend' => '',
        //'buttonAppend' => '',
        //'privacyText' => '',
//        'privacyPage' => 1,
//        'privacyPageUrl' => '',
//        'privacyTarget' => '_self',
//        'privacyTargetCustom' => '',
        'cookieName' => 'AllinoneAccessibility',
//        'cookieExpire' => 60*60*24*365,
//        'cookieDomain' => null,
//        'cookieSSL' => false,
//        'cookieHttp' => true,
//        'classPrefix' => 'mCCF',
        );
    }

    public function __construct() {
        $mcc = $this->wire('modules')->get('AllinoneAccessibility');
        $this->add(array(
            array(
                'type' => 'fieldset',
                'label' => __("Settings"),
                'children' => array(
                    array(
                        'type' => 'checkbox',
                        'name' => 'useAjax',
                        'label' => __('Enable Ajax'),
                        'notes' => __('No dependencies (vanilla js), prevents confirmation from reloading page'),
                        'columnWidth' => 20
                    ),
                    array(
                        'type' => 'checkbox',
                        'name' => 'moduleStyles',
                        'label' => __('Inject modules stylesheet?'),
                        'notes' => __('Automagically appends the stylesheet to your <head>'),
                        'columnWidth' => 20
                    ),
                )
            ),
            array(
                'type' => 'text',
                'name' => 'license_key',
                'label' => __('License Key'),
                'useLanguages' => true,
                'columnWidth' => 100
            ),

            array(
                'type' => 'text',
                'name' => 'colorcode',
                'label' => __('Color Code'),
                'useLanguages' => true,
                'columnWidth' => 100
            ),
            array(
                'type' => 'select',
                'name' => 'position',
                'label' => __('Position'),
                'columnWidth' => 100,
                'options' => array(
                            'top_left' => __('Top left'),
                            'top_center' => __('Top Center'),
                            'top_right' => __('Top Right'),
                            'middle_left' => __('Middle left'),
                            'middle_right' => __('Middle Right'),
                            'bottom_left' => __('Bottom left'),
                            'bottam_center' => __('Bottom Center'),
                            'bottom_right' =>  __('Bottom Right'),

                        ),
            ),
            array(
                'type' => 'select',
                'name' => 'aioa_icon_type',
                'classes' =>'select_icon_type',
                'label' => __('Icon Type'),
                'columnWidth' => 100,
                'options' => array(
                    'aioa-icon-type-1' => __('Accessibility'),
                    'aioa-icon-type-2' => __('Wheelchair'),
                    'aioa-icon-type-3' => __('Low Vision'),
                ),
            ),
            array(
                'type' => 'select',
                'name' => 'aioa_icon_size',
                'label' => __('Icon Size'),
                'columnWidth' => 100,
                'options' => array(
                    'aioa-big-icon' => __('Big'),
                    'aioa-medium-icon' => __('Medium'),
                    'aioa-default-icon' => __('Default'),
                    'aioa-small-icon' => __('Small'),
                    'aioa-extra-small-icon' => __('Extra-Small'),
                ),
            ),
        ));
    }
}