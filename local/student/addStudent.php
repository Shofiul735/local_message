<?php

require_once(__DIR__ . '/../../config.php');


$PAGE->set_url(new moodle_url(get_string('add_student_url', 'local_student')));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title(get_string('add_student_title', 'local_student'));


echo $OUTPUT->header();
echo "<h1>Hello</h1>";
echo $OUTPUT->footer();
