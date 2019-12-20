
<?php
class user_model extends CI_Model
{
 function fetch_data()
 {
    $query = $this->db->get("codeigniter_register");
    return $query ;
 }
}

?>