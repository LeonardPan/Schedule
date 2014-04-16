<?php
 
class MY_DB_mysqli_driver extends CI_DB_mysqli_driver
{
	final public function __construct($params)
	{
		parent::__construct($params);
	}
 
	function _insert_on_duplicate_update($table, $update, $values)
	{
		foreach($values as $key=>$value)
		{
			$insert_fields[] = $key.'='.$value;
		}
 
		foreach($update as $key=>$name)
		{
			$update_fields[] = $name.'='.$values['`'.$name.'`'];
		}
 
		return "INSERT INTO ".$table." SET ".implode(',', $insert_fields)." ON DUPLICATE KEY UPDATE ".implode(',', $update_fields);
	}
}