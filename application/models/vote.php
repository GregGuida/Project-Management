<?php
/**
 *
 * DROP TABLE IF EXISTS `CodeIgniter2`.`Votes`;
 * CREATE TABLE `CodeIgniter2`.`Votes` (
 *   `uid` INT NOT NULL REFERENCES `CodeIgniter2`.`Votes` (`uid`),
 *   `pid` INT NOT NULL REFERENCES `CodeIgniter2`.`Products` (`pid`),
 *   `direction` BOOL NOT NULL,
 *   PRIMARY KEY ( `uid`, `pid` ),
 *   INDEX ( `pid` )
 * ) ENGINE = INNODB;
 *
 */

 class Vote extends CI_Model {
    
   function __construct() {
     parent::__construct();
   }


   function all($limit = 0) {
     $votes = array();
     $query  = $this->db->get('Votes', $limit);
 
     foreach($query->result_array() as $vote) {
       $votes[] = $vote;
     }
     return $votes;
   }

   function find( $pid, $limit = 0) {
     $votes = array();
     $this->db->select('direction,FirstName,LastName,Email');  
     $this->db->from('Votes');
     $this->db->where('Votes.pid',$pid);
     $this->db->join('Users','Users.uid = Votes.uid');
     $query = $this->db->get_where();

     foreach($query->result_array() as $vote) {
       $votes[] = $vote;
     } 

     return $votes;
   }

   function find_by_user( $uid, $limit = 0 ) {
     $votes = array();
     $query = $this->db->get_where('Votes', array('uid' => $uid),  $limit);

     foreach($query->result_array() as $vote) {
       $votes[] = $vote;
     } 

     return $votes;

   }

   function has_voted( $uid, $pid ) {
     $votes = array();
     $query = $this->db->get_where('Votes', array('uid' => $uid, 'pid' => $pid));

     if (count($query->result_array()) >= 1 ) {
       return true;
     } else {
       return false;
     }
   }
  
   function create($uid, $pid, $direction) {

     $result = false;
     $data = array(
       'uid'        => $uid,
       'pid'       => $pid,
       'direction' => $direction
     );
     
     $this->db->insert('Votes', $data);
 
     if (!$this->db->_error_message()) {
       $result = $this->db->insert_id();
     }
 
     return $result;
   }

 }
 
?>
