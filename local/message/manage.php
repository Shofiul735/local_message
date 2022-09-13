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

global $DB;
global $USER;

// var_dump(get_string('text', 'local_message'));
// var_dump(get_string('manage_title', 'local_message'));
// die;

$PAGE->set_url(new moodle_url('/local/message/manage.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title(get_string('manage_title', 'local_message'));

$messages = $DB->get_records('local_message');
// $query = "SELECT lm.id, lm.messagetext, lm.messagetype FROM {local_message} AS lm
//           LEFT JOIN {local_message_read} AS lmr
//           ON lm.id = lmr.messageid WHERE lmr.userid != :id OR lmr.userid IS NULL";
// $parma_array = [
//     'id' => $USER->id,
// ];

// $messages = $DB->get_record_sql($query, $parma_array);

$choice = [];
$choice[] = \core\notification::INFO;
$choice[] = \core\notification::ERROR;
$choice[] = \core\notification::SUCCESS;


foreach ($messages as $message) {
    \core\notification::add($message->messagetext, $choice[$message->messagetype - 1]);
    $message_read = new stdClass();
    $message_read->messageid = $message->id;
    $message_read->userid = $USER->id;
    $message_read->timeread = time();
    // $DB->insert_record('local_message_read', $message_read);
}

$values = array_values($messages);

echo $OUTPUT->header();

$templatecontext = (object)[
    'messages' => $values,
    'distinationURL' => new moodle_url('/local/message/edit.php'),
];


echo get_string('text', 'local_message') . '<br/>';
echo get_string('manage_title', 'local_message');


echo $OUTPUT->render_from_template('local_message/manage', $templatecontext);
echo $OUTPUT->footer();
