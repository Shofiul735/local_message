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
 * @package     local_student
 * @author      Shofiul
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__ . '/../../config.php');


$PAGE->set_url(new moodle_url(get_string('manage_url', 'local_student')));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title(get_string('manage_title', 'local_student'));

$student = (object)[
    'add_url' => new moodle_url(get_string('add_student_url', 'local_student')),
    'update_url' => new moodle_url(get_string('update_student_url', 'local_student')),
    'delete_url' => new moodle_url(get_string('delete_student_url', 'local_student')),
    'student' => [
        [
            'id' => 1,
            'name' => 'Md. Rakib',
            'age' => 24,
            'class' => 15,
            'phone' => '0182983898',
            'parentname' => 'Abdklj',
            'parentphone' => '0189387389',
        ],
        [
            'id' => 2,
            'name' => 'Md. Shofiul Islam',
            'age' => 24,
            'class' => 15,
            'phone' => '0182983898',
            'parentname' => 'Abdulj',
            'parentphone' => '0189387389',
        ]
    ]
];

echo $OUTPUT->header();
echo $OUTPUT->render_from_template('local_student/manage', $student);
echo $OUTPUT->footer();
