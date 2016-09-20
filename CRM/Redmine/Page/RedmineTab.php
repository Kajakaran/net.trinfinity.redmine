<?php

require_once 'CRM/Core/Page.php';

class CRM_Redmine_Page_RedmineTab extends CRM_Core_Page {
  protected $_contactId;

    public function run() {
    // Example: Set the page-title dynamically; alternatively, declare a static title in xml/Menu/*.xml
    CRM_Utils_System::setTitle(ts('RedmineTab'));

    // Example: Assign a variable for use in a template
    $this->assign('currentTime', date('Y-m-d H:i:s'));

      $json = file_get_contents('https://projects.trinfinity.net/issues.json?key=0f54d9516187eb8177fdf6e3505a2bfa5dac27fc');
      $issues = json_decode($json);

      $this->assign('issues', $issues->issues);

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
}
