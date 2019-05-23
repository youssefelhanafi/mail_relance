<?php

function escape($value) {
    $return = '';
    for($i = 0; $i < strlen($value); ++$i) {
        $char = $value[$i];
        $ord = ord($char);
        if($char !== "'" && $char !== "\"" && $char !== '\\' && $ord >= 32 && $ord <= 126)
            $return .= $char;
        else
            $return .= '' . dechex($ord);
    }
    $return = str_replace('da','',$return);
    return $return;
}


require_once('../../config.php');
require_once('mail_relance_form.php');
 
global $DB, $OUTPUT, $PAGE;
 
// Check for all required variables.
$courseid = required_param('courseid', PARAM_INT);
$blockid = required_param('blockid', PARAM_INT);
 
// Next look for optional variables.
//$id = optional_param('id', 0, PARAM_INT);
$id = optional_param('id', 0, PARAM_INT);
$viewpage = optional_param('viewpage', false, PARAM_BOOL);
 
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
    //print_object($fromform);
    $id = '';
    $blockid = $fromform->blockid ;
    $displaytext = '';
    $text = $fromform->displaytext['text'];
    $format = '0';
    $dataobject = array('id' => $id,'blockid' => $blockid,'displaytext' => $displaytext,'text' => $text,'format' => $format);
    $table = 'block_mail_relance';
    $sql = 'UPDATE mdl_block_mail_relance SET blockid = "'.$blockid.'", displaytext = "'.date("Y-m-d h:i:s").'", text = "'.urlencode($text).'", format = "'.$format.'" ';
    //$sql = 'insert into mdl_block_mail_relance (blockid,displaytext,text,format) values ("'.$blockid.'","'.date("Y-m-d h:i:s").'","'.$text.'","'.$format.'")';
    //$DB->update_record($table, $dataobject, $bulk=false);
    if (!$DB->execute($sql)) {
        print_error('inserterror', 'block_mail_relance');
    }
    redirect($courseurl);  
} else {
    // form didn't validate or this is the first display
    $site = get_site();

    echo $OUTPUT->header();
    if ($viewpage) {
        $mail_relancepage = $DB->get_record('block_mail_relance', array('id' => $id));
        block_mail_relance_print_page($mail_relancepage);
    } else {
        $mail_relance->display();
    }
    echo $OUTPUT->footer();
}
 
//$mail_relance->display();
?>

