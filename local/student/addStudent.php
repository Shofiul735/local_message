<?php

require_once(__DIR__ . '/../../config.php');
require_once($CFG->dirroot . get_string('add_student_form', 'local_student'));

$PAGE->set_url(new moodle_url(get_string('add_student_url', 'local_student')));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title(get_string('add_student_title', 'local_student'));


$addForm = new addStudentForm();

//Form processing and displaying is done here
if ($addForm->is_cancelled()) {
    redirect($CFG->wwwroot . get_string('manage_url', 'local_student'), get_string('cancelled_form_text', 'local_student'));
} else if ($fromform = $addForm->get_data()) {
}


echo $OUTPUT->header();
$addForm->display();
echo $OUTPUT->footer();
