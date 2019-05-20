<?php
$settings->add(new admin_setting_heading(
            'headerconfig',
            get_string('headerconfig', 'block_mail_relance'),
            get_string('descconfig', 'block_mail_relance')
        ));
 
$settings->add(new admin_setting_configcheckbox(
            'mail_relance/Allow_HTML',
            get_string('labelallowhtml', 'block_mail_relance'),
            get_string('descallowhtml', 'block_mail_relance'),
            '0'
        ));
