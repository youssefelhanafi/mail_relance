<?php

require_once("{$CFG->libdir}/formslib.php");
 
class mail_relance_form extends moodleform {
 
    function definition() {
 
        $mform =& $this->_form;
        $mform->addElement('header','displayinfo', get_string('textfields', 'block_mail_relance'));

        // add page title element.
        /* $mform->addElement('text', 'pagetitle', get_string('pagetitle', 'block_mail_relance'));
        $mform->setType('pagetitle', PARAM_RAW);
        $mform->addRule('pagetitle', null, 'required', null, 'client'); */
        
        // add display text field
        $mform->addElement('htmleditor', 'displaytext', get_string('content', 'block_mail_relance'));
        $mform->setType('displaytext', PARAM_RAW);
        $mform->addRule('displaytext', null, 'required', null, 'client');

                // hidden elements
        $mform->addElement('hidden', 'blockid');
        $mform->addElement('hidden', 'courseid');
        $this->add_action_buttons();
    }
}
