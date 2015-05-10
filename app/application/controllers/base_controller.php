<?php

class base_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->library('facebook', array('appId' => '420031188176912', 'secret' => 'c064fa8d54d8518d040874c4384caf2e'));

        // If user is set then get profile info
        $this->fb_user = $this->facebook->getUser() ? $this->facebook->api('/me/') : false;
    }

}