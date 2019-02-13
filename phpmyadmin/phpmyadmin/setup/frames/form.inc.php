<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Form edit view
 *
 * @package phpMyAdmin-setup
 */

if (!defined('PHPMYADMIN')) {
    exit;
}

/**
 * Core libraries.
 */
require_once './libraries/config/Form.class.php';
require_once './libraries/config/FormDisplay.class.php';
require_once './setup/lib/form_processing.lib.php';

require './libraries/config/setup.forms.php';

$formset_id = isset($_GET['formset']) ? $_GET['formset'] : null;
$mode = isset($_GET['mode']) ? $_GET['mode'] : null;
if (!isset($forms[$formset_id])) {
    die('Incorrect formset, check $formsets array in setup/frames/form.inc.php');
}

if (isset($GLOBALS['strConfigFormset_' . $formset_id])) {
    echo '<h2>' . $GLOBALS['strConfigFormset_' . $formset_id] . '</h2>';
}
$form_display = new FormDisplay();
foreach ($forms[$formset_id] as $form_name => $form) {
    $form_display->registerForm($form_name, $form);
}
process_formset($form_display);
?>