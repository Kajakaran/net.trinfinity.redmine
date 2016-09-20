<?php
/*
 * Settings metadata file
 */
return array (
    'redmine_api_key' => array(
        'group_name' => 'Redmine Preferences',
        'group' => 'civiredmine',
        'name' => 'civiredmine_api_key',
        'type' => 'String',
        'add' => '4.6',
        'is_domain' => 1,
        'is_contact' => 0,
        'title' => 'Redmine user API Key',
        'description' => 'The user API Key for communicating with Mailchimp.',
        'help_text' => '',
        'html_type' => 'Text',
        'html_attributes' => array(
            'size' => 100,
        ),
        'quick_form_type' => 'Element',
    ),
    'mailchimp_webhook_base_url' => array(
        'group_name' => 'Redmine Preferences',
        'group' => 'civiredmine',
        'name' => 'civiredmine_base_url',
        'type' => 'String',
        'add' => '4.6',
        'is_domain' => 1,
        'is_contact' => 0,
        'title' => 'Redmine Base URL',
        'description' => 'The Redmine Base URL',
        'help_text' => '',
        'html_type' => 'Text',
        'html_attributes' => array(
            'size' => 100,
        ),
        'quick_form_type' => 'Element',
    ),
);