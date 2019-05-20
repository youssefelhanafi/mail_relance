<?php
 
require_once('../../config.php');
require_once('mail_relance_form.php');
 
global $DB, $OUTPUT, $PAGE;
 
// Check for all required variables.
$courseid = required_param('courseid', PARAM_INT);
$blockid = required_param('blockid', PARAM_INT);
 
// Next look for optional variables.
$id = optional_param('id', 0, PARAM_INT);
 
if (!$course = $DB->get_record('course', array('id' => $courseid))) {
    print_error('invalidcourse', 'block_mail_relance', $courseid);
}
 
require_login($course);
$PAGE->set_url('/blocks/mail_relance/view.php', array('id' => $courseid));
$PAGE->set_pagelayout('standard');
$PAGE->set_heading(get_string('editmail', 'block_mail_relance'));
 
$mail_relance = new mail_relance_form();
$toform['blockid'] = $blockid;
$toform['courseid'] = $courseid;
$mail_relance->set_data($toform);
if($mail_relance->is_cancelled()) {
    // Cancelled forms redirect to the course main page.
    $courseurl = new moodle_url('/course/view.php', array('id' => $id));
    redirect($courseurl);
} else if ($fromform = $mail_relance->get_data()) {
    // We need to add code to appropriately act on and store the submitted data
    // but for now we will just redirect back to the course main page.
    $courseurl = new moodle_url('/course/view.php', array('id' => $courseid));
    // We need to add code to appropriately act on and store the submitted data
    /* if (!$DB->insert_record('block_mail_relance', $fromform)) {
        print_error('inserterror', 'block_mail_relance');
    } */
    //redirect($courseurl);
    print_object($fromform);
} else {
    // form didn't validate or this is the first display
    $site = get_site();
    echo $OUTPUT->header();
    $mail_relance->display();
    echo $OUTPUT->footer();
}
 
$mail_relance->display();
?>
