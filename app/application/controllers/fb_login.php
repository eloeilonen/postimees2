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
            $CI =& get_instance();
            redirect(
                $this->facebook->getLoginUrl(
                    array('scope'        => 'email',
                          'redirect_uri' => base_url().$_GET['redirect'])
                )
            );
        }
    }

    public function logout() {

        session_destroy();
        redirect(base_url());
    }

}
