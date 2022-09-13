<?php
//moodleform is defined in formslib.php
require_once("$CFG->libdir/formslib.php");
class edit extends moodleform {
    //Add elements to form
    public function definition() {
        global $CFG;
       
        $mform = $this->_form; // Don't forget the underscore! 

        $mform->addElement('text','message','Your message');
        $mform->setType('message', PARAM_NOTAGS);
        $choice = [];
        $choice[] = \core\notification::INFO;
        $choice[] = \core\notification::ERROR;
        $choice[] = \core\notification::SUCCESS;
        $mform->addElement('select','messagetype','Select One:',$choice);
        $mform->setDefault('messagetype',0);
        $this->add_action_buttons();
    }
    //Custom validation should be added here
    function validation($data, $files) {
        return array();
    }
}

