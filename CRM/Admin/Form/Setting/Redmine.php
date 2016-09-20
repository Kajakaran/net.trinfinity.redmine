<?php
/**
 * Created by PhpStorm.
 * User: hans
 * Date: 19-9-16
 * Time: 21:43
 */

require_once 'CRM/Core/Form.php';
/**
 * Form controller class
 *
 * @see http://wiki.civicrm.org/confluence/display/CRMDOC43/QuickForm+Reference
 */
class CRM_Admin_Form_Setting_Redmine extends CRM_Admin_Form_Setting
{
    protected $_settings = array(
        'civiredmine_api_key' => CRM_Core_BAO_Setting::SYSTEM_PREFERENCES_NAME,
        'civiredmine_base_url' => CRM_Core_BAO_Setting::SYSTEM_PREFERENCES_NAME
    );
}

