<?php

class base_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->library('facebook', array('appId' => '418927931620571', 'secret' => '1cdb542937f1e2ea48fcb9955b7540b5'));

        // If user is set then get profile info
        $this->fb_user = $this->facebook->getUser() ? $this->facebook->api('/me/') : false;
    }

}