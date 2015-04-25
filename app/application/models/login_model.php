</head><body>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model
{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     //get the username & password from tbl_usrs
     function get_user($usr, $pwd)
     {
          $sql = "select * from kasutaja where kasutaja_USERNAME = '" . $usr . "' and kasutaja_PASSWORD = '" .$pwd . "';";
          //log_message('error', $sql);
          $query = $this->db->query($sql);
          return count($query->result());
          //log_message('error', count($query->result()));
     }
}?>
