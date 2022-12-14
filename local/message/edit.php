<?php
// This file is part of Moodle Course Rollover Plugin
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * @package     local_message
 * @author      Shofiul
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__ . '/../../config.php');
require_once($CFG->dirroot . '/local/message/classes/form/edit.php');

global $DB;

$PAGE->set_url(new moodle_url('/local/message/edit.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title("local plugin edit");

$form = new edit();

//Form processing and displaying is done here
if ($form->is_cancelled()) {
    redirect($CFG->wwwroot . '/local/message/manage.php', 'you cancelled the form!');
} else if ($fromform = $form->get_data()) {
    $record = new stdClass();
    $record->messagetext     = $fromform->message;
    $record->messagetype = $fromform->messagetype;
    $DB->insert_record('local_message', $record);
    redirect($CFG->wwwroot . '/local/message/manage.php');
}




echo $OUTPUT->header();
$form->display();
echo $OUTPUT->footer();
