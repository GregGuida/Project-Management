<?php

/*
 * CREATE TABLE `CodeIgniter2`.`StockTickets` (
 *	`ticketNum` INT NOT NULL AUTO_INCREMENT,
 *	`pid` INT NOT NULL REFERENCES `CodeIgniter2`.`Products` (`pid`),
 *	`uid` INT NOT NULL REFERENCES `CodeIgniter2`.`Employees` (`eid`),
 *	`PriceUSD` DECIMAL NOT NULL ,
 *	`Quantity` INT NOT NULL ,
 *	`DateSubmitted` TIMESTAMP NOT NULL ,
 *	`Status` VARCHAR( 20 ) NOT NULL ,
 *	PRIMARY KEY( `ticketNum`),
 * 	INDEX ( `pid` , `uid` )
 * ) ENGINE = INNODB;
*/

class Stock_Ticket extends CI_Model
{
	//Constructor
	function __construct() {
		parent :: __construct();
	}
	
	/*
	 * Finds a Stock Ticket by its ticketNum.
	 *
	 * @param int $ticket_num the id of the concerned ticket
	 *
	 * @return array $ticket the associative array of the returned tickets elements, or false. 
	 */
    function find($ticket_num) {
        $result = false;
        $cursor = $this->db->get_where('StockTickets', array('ticketNum' => $ticket_num));
        
        if($cursor->num_rows() > 0) {
            $result = $cursor->row_array();
            $cursor->free_result();
        }
        
        return $result; 
    }

    /*
	 * Finds all stock tickets by equivalence to some arbitrary parameter.
	 * Here for completeness, can't really see a need for this.
	 *
	 * @param array $data associative array of the data requested
	 *
	 * @return array $tickets the resulting array of stock tickets
	 */
    function find_by($data) {
        $tickets = array();
        $cursor = $this->db->get_where('StockTickets', $data);
        
        foreach($cursor->result_array() as $ticket) {
            $tickets[] = $ticket;
        }
        
        return $tickets;
    }
    
    /*
	 * Finds all Stock Tickets.
	 *
	 * @param int $limit The number of stock tickets you would like returned.
	 *
	 * @return array $tickets the resulting array of stock tickets
	 */
    function all($limit = 0) {
      $tickets = array();
      $cursor = $this->db->get('StockTickets', $limit);

      foreach($cursor->result_array() as $ticket) {
        $tickets[] = $ticket;
      }
      return $tickets;
    }
    
    /*
	 * Create a new Stock Ticket in the database
	 *
	 * @param array $data array of the items you want to create.
	 *
	 * @return boolean $ticket_id the id of the inserted Stock Ticket if the insert succeeded, false otherwise.
	 */
    function create($data) {
        $result = false;
        
        $this->db->insert('StockTickets', $data);
        
        if(!$this->db->_error_message()) {
            $result = true;
        }
        
        return $result;
    }
    
    /*
	 * Update a Stock Ticket in the database
	 *
	 * @param array $data array of the parameters you want updated for the ticket.
	 *
	 * @return boolean $ticket_id the id of the inserted Stock Ticket if the insert succeeded, false otherwise.
	 */
	 function update($ticket_num) {
	     $ticket_num = false;

         $this->db->update('StockTickets', $data, array('ticketNum' => $ticket_num));

         if (!$this->db->_error_message()) {
           $ticket_num = $id;
         }

         return $ticket_num;
	 }
    
    /*
	 * Removes a Stock Ticket from the database
	 *
	 * @param int $ticket_num array of the items you want to create.
	 *
	 * @return boolean returns true is the delete executed without issue, otherwise false.
	 */
    function destroy($ticket_num) {
        $this->db->delete('StockTickets', array('ticketNum' => $ticket_num));
        return !!$this->db->_error_message();
    }
}