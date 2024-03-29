<?php

require_once 'paypalrefund.civix.php';
use CRM_Paypalrefund_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function paypalrefund_civicrm_config(&$config) {
  _paypalrefund_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function paypalrefund_civicrm_xmlMenu(&$files) {
  _paypalrefund_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function paypalrefund_civicrm_install() {
  _paypalrefund_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function paypalrefund_civicrm_postInstall() {
  _paypalrefund_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function paypalrefund_civicrm_uninstall() {
  _paypalrefund_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function paypalrefund_civicrm_enable() {
  _paypalrefund_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function paypalrefund_civicrm_disable() {
  _paypalrefund_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function paypalrefund_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _paypalrefund_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function paypalrefund_civicrm_managed(&$entities) {
  _paypalrefund_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function paypalrefund_civicrm_caseTypes(&$caseTypes) {
  _paypalrefund_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function paypalrefund_civicrm_angularModules(&$angularModules) {
  _paypalrefund_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function paypalrefund_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _paypalrefund_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_entityTypes
 */
function paypalrefund_civicrm_entityTypes(&$entityTypes) {
  _paypalrefund_civix_civicrm_entityTypes($entityTypes);
}

function paypalrefund_civicrm_buildForm($formName, &$form) {
  if (($formName == 'CRM_Contribute_Form_AdditionalPayment') && ($form->getVar('_paymentType') == 'refund')) {
    // Assumes templates are in a templates folder relative to this file
    $templatePath = realpath(dirname(__FILE__)."/templates");
    // Add the field element in the form
    $form->addElement('checkbox', 'processor_refund', ts('Record refund from the payment processor?'));
    // dynamically insert a template block in the page
    CRM_Core_Region::instance('page-body')->add(array(
      'template' => "{$templatePath}/refund.tpl"
     ));
  }
}


// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function paypalrefund_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function paypalrefund_civicrm_navigationMenu(&$menu) {
  _paypalrefund_civix_insert_navigation_menu($menu, 'Mailings', array(
    'label' => E::ts('New subliminal message'),
    'name' => 'mailing_subliminal_message',
    'url' => 'civicrm/mailing/subliminal',
    'permission' => 'access CiviMail',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _paypalrefund_civix_navigationMenu($menu);
} // */
