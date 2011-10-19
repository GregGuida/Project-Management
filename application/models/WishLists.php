<?php

/*
 *	CREATE TABLE `CodeIgniter2`.`WishLists` (
 *		`wishID` INT NOT NULL AUTO_INCREMENT ,
 *		`cid` INT NOT NULL REFERENCES `CodeIgniter2`.`Customers` (`cid`),
 *		`name` VARCHAR( 75 ) NOT NULL ,
 *	PRIMARY KEY ( `wishID`)
 *	) ENGINE = INNODB;
 *
 *	CREATE TABLE `CodeIgniter2`.`WishListItems` (
 *		`wishID` INT NOT NULL REFERENCES `CodeIgniter2`.`WishLists` (`wishID`),
 *		`pid` INT NOT NULL REFERENCES `CodeIgniter2`.`Products` (`pid`),
 *	PRIMARY KEY ( `wishID` , `pid` )
 *	) ENGINE = INNODB;
*/

class WishLists extends Models
{
	//Constructor
	public WishLists(){
		parent :: Models();
	}
	
}

?>