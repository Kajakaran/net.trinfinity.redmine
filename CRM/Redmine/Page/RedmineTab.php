<?php

require_once 'CRM/Core/Page.php';

class CRM_Redmine_Page_RedmineTab extends CRM_Core_Page {
  protected $_contactId;

    public function run() {
    // Example: Set the page-title dynamically; alternatively, declare a static title in xml/Menu/*.xml
    CRM_Utils_System::setTitle(ts('RedmineTab'));

    // Example: Assign a variable for use in a template
    $this->assign('currentTime', date('Y-m-d H:i:s'));

      global $civicrm_setting;
      $baseurl = $civicrm_setting['CiviCRM Preferences']['civiredmine_base_url'];
      $key = $civicrm_setting['CiviCRM Preferences']['civiredmine_api_key'];
    //  $baseurl = CIVICRM_REDMINE_BASE_URL;
     // $key= CIVICRM_REDMINE_KEY;
       $projectid = $this->getProjectId($this->_contactId);

       if (is_numeric($projectid)) {
           $json = file_get_contents($baseurl . '/issues.json?key=' . $key . '&project_id='.$projectid);
           $issues = json_decode($json);

           $this->assign('issues', $issues->issues);
           $this->assign('redmineurl', $baseurl);
       }

      parent::run();
  }

    protected function preProcess() {
        $this->_contactId = CRM_Utils_Request::retrieve('cid', 'Positive', $this, TRUE);
        $this->assign('contactId', $this->_contactId);

        $this->setUserContext();
    }

    protected function setUserContext() {
        $session = CRM_Core_Session::singleton();
        $userContext = CRM_Utils_System::url('civicrm/contact/view', 'cid='.$this->_contactId.'&selectedChild=contact_redmine&reset=1');
        $session->pushUserContext($userContext);
    }

    public static function getProjectId($contactId){
        try {
            $customfield = civicrm_api3('CustomField', 'getsingle', array(
                'name' => "Redmine_Project",
            ));
            $id = $customfield["id"];

            $project = civicrm_api3('Contact', 'getsingle', array(
                'id' => $contactId,
                'return' => 'custom_' . $id
            ));

            $projectid = $project["custom_" . $id];

            if (is_numeric($projectid)) {
                return $projectid;
            }
        }
        catch (Exception $e){}
    }
}
