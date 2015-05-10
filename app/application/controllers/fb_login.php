<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require_once 'base_controller.php';
class fb_login extends base_controller
{

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if ($this->fb_user) {
            redirect(base_url());
        } else {
            redirect($this->facebook->getLoginUrl(array('scope' => 'email')));
        }
    }

    public function logout() {

        session_destroy();
        redirect(base_url());
    }

}