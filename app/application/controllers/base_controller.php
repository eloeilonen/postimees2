<?php

class base_controller extends CI_Controller
{

    protected $authenticatedUsers;

    public function __construct() {
        $this->authenticatedUsers = array(
            // Brandon
            '808877592535768',
        );
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->library('facebook', array('appId' => '418927931620571', 'secret' => '1cdb542937f1e2ea48fcb9955b7540b5'));

        // If user is set then get profile info
        $this->fb_user = $this->facebook->getUser() ? $this->facebook->api('/me/') : false;
        $this->isAuthenticated = (array_search($this->fb_user['id'], $this->authenticatedUsers) !== false) ? 'true' : false;
    }

    public function checkAuth() {
        if ($this->isAuthenticated == false) {
            echo '<center><img src="http://i.imgur.com/pZ96Rxa.png" /></center>';
            die();
        }
    }

}