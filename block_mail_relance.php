<?php

class block_mail_relance extends block_base{
    
    public function init(){
        $this->title = get_string('mailrelance', 'block_mail_relance');
    }

    public function specialization() {
        if (isset($this->config)) {
            if (empty($this->config->title)) {
                $this->title = get_string('blocktitle', 'block_mail_relance');            
            } else {
                $this->title = $this->config->title;
            }
     
            if (empty($this->config->text)) {
                $this->config->text = get_string('blockstring', 'block_mail_relance');
            }    
        }
    }

    public function get_content() {
        global $COURSE, $DB;
        /* if ($this->content !== null) {
          return $this->content;
        }
     
        $this->content         =  new stdClass;
        $this->content->text   = 'Veuillez saisir le contenu du mail de relance içi !';
        //$this->content->footer = 'Footer here...';
     
        return $this->content; */
        if ($this->content !== null) {
            return $this->content;
        }
         
        $this->content         = new stdClass;
        $this->content->items  = array();
        $this->content->icons  = array();
        
        $url = new moodle_url('/blocks/mail_relance/view.php', array('blockid' => $this->instance->id, 'courseid' => $COURSE->id));
        $this->content->footer = html_writer::link($url, get_string('addpage', 'block_mail_relance'));

        if (!empty($this->config->text)) {
        $this->content->text = $this->config->text;
        }


        /* $url = new moodle_url('/blocks/mail_relance/view.php', array('blockid' => $this->instance->id, 'courseid' => $COURSE->id));
        $this->content->footer = html_writer::link($url, get_string('addpage1', 'block_mail_relance')); */
        
        
        //$this->content->items[] = html_writer::tag('a', 'Veuillez saisir le contenu du mail de relance içi !', array('href' => 'some_file.php'));
        //$this->content->icons[] = html_writer::empty_tag('img', array('src' => 'images/icons/icon.png', 'class' => 'icon'));
        
        // Add more list items here

        // This is the new code.
        if ($mail_relancepages = $DB->get_records('block_mail_relance', array('blockid' => $this->instance->id))) {
            $this->content->text .= html_writer::start_tag('ul');
            foreach ($mail_relancepages as $mail_relancepage) {
                $pageurl = new moodle_url('/blocks/mail_relance/view.php', array('blockid' => $this->instance->id, 'courseid' => $COURSE->id, 'id' => $mail_relancepage->id, 'viewpage' => '1'));
                $this->content->text .= html_writer::start_tag('li');
                $this->content->text .= html_writer::span($mail_relancepage->text);
                $this->content->text .= html_writer::end_tag('li');
            }
            $this->content->text .= html_writer::end_tag('ul');
        }
         
        return $this->content;
    }

    /* public function instance_allow_multiple() {
        return true;
    } */
    function has_config() {
        return true;
    }

    public function instance_config_save($data,$nolongerused =false) {
        if(get_config('mail_relance', 'Allow_HTML') == '1') {
          $data->text = strip_tags($data->text);
        }
       
        // And now forward to the default implementation defined in the parent class
        return parent::instance_config_save($data,$nolongerused);
      }

      public function html_attributes() {
        $attributes = parent::html_attributes(); // Get default values
        $attributes['class'] .= ' block_'. $this->name(); // Append our class to class attribute
        return $attributes;
    }
}
