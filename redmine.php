<?php

require_once 'redmine.civix.php';

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function redmine_civicrm_config(&$config) {
  _redmine_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @param $files array(string)
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function redmine_civicrm_xmlMenu(&$files) {
  _redmine_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function redmine_civicrm_install() {



    _redmine_civix_civicrm_install();

}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function redmine_civicrm_uninstall() {
  _redmine_civix_civicrm_uninstall();

}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function redmine_civicrm_enable() {

  _redmine_civix_civicrm_enable();

}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function redmine_civicrm_disable() {
  _redmine_civix_civicrm_disable();

}
/**
 * Implements hook_civicrm_upgrade().
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed
 *   Based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function redmine_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _redmine_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function redmine_civicrm_managed(&$entities) {
  _redmine_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function redmine_civicrm_caseTypes(&$caseTypes) {
  _redmine_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function redmine_civicrm_angularModules(&$angularModules) {
_redmine_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function redmine_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _redmine_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Functions below this ship commented out. Uncomment as required.
 *
*/


function redmine_civicrm_pre($op, $objectName, $id, &$params){

}

function redmine_civicrm_tabs( &$tabs, $contactID ){
    $url = CRM_Utils_System::url( 'civicrm/contact/view/redmine-issues',
        "cid=$contactID&snippet=1" );

    //Count number of documents

    $issues = CRM_Redmine_Page_RedmineTab::getRedmineIssues($contactID);

    if ($issues && $issues->total_count > 0) {
        $tabs[] = array('id' => 'contact_redmine',
            'url' => $url,
            'count' => $issues->total_count,
            'title' => ts('Redmine'),
            'weight' => 1);
    }
}

function redmine_civicrm_tabset($tabsetName, &$tabs, $context) {
    if ($tabsetName == 'civicrm/contact/view') {
        $contactId = $context['contact_id'];
        $url = CRM_Utils_System::url( 'civicrm/contact/view/redmine-issues',
            "reset=1&snippet=1&force=1&cid=$contactId" );
        $tabs[] = array( 'id'    => 'Redmine',
            'title' => 'Redmine Issues',
            'weight' => 300,
        );
    }



}