<?php

class base_controller extends CI_Controller
{

    protected $authenticatedUsers;

    public function __construct() {
        $this->authenticatedUsers = array(
            // Brandon
            '808877592535768',
            // Elo
            '10153304215197430',
            // Test
            '1385762988420752',
            // Karl
            '1003580859661065',
        );
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        // dev
        //$this->load->library('facebook', array('appId' => '420031188176912', 'secret' => 'c064fa8d54d8518d040874c4384caf2e', 'cookie' => true));
        // test
        $this->load->library('facebook', array('appId' => '418927931620571', 'secret' => '1cdb542937f1e2ea48fcb9955b7540b5', 'cookie' => true,));

        // If user is set then get profile info
        try
		{
			$this->fb_user = $this->facebook->getUser() ? $this->facebook->api('/me/') : false;
			//var_export($this->fb_user);
			$this->isAuthenticated = (array_search($this->fb_user['id'], $this->authenticatedUsers) !== false) ? 'true' : false;
		}
		catch (FacebookApiException $e)
		{
			error_log($e);
			$this->fb_user = null;
			$this->facebook->destroySession();
			redirect(base_url());
		}
	}

    public function checkAuth() {
        if ($this->isAuthenticated == false) {
            echo '<center><img src="http://i.imgur.com/pZ96Rxa.png" /></center>';
            die();
        }
    }

}
