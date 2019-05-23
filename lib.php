<?php

function block_mail_relance_print_page($mail_relance, $return = false) {
    global $OUTPUT, $COURSE;
    $display = $OUTPUT->heading($mail_relance->pagetitle);
    $display .= $OUTPUT->box_start();

    if($mail_relance->displaydate) {
        $display .= html_writer::start_tag('div', array('class' => 'mail_relance displaydate'));
        $display .= userdate($mail_relance->text);
        $display .= html_writer::end_tag('div');
    }

    if($return) {
        return $display;
    } else {
        echo $display;
    }

    $display .= clean_text($mail_relance->displaytext);
 
    //close the box
    $display .= $OUTPUT->box_end();

    
}