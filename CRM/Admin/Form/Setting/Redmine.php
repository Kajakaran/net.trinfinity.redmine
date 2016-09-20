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

    public function buildQuickForm( )
    {
        CRM_Utils_System::setTitle(ts('Settings - Redmine'));
        $this->addElement('text','civiredmine_api_key', ts('Redmine User API Key'));
        $this->addElement('text','civiredmine_base_url', ts('Redmine Base URL'));
        $check = true;

        // redirect to Administer Section After hitting either Save or Cancel button.
        $session = CRM_Core_Session::singleton( );
        $session->pushUserContext( CRM_Utils_System::url( 'civicrm/admin', 'reset=1' ) );

        parent::buildQuickForm( $check );
    }
}

