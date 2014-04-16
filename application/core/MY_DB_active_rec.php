<?php
 
class MY_DB_active_record extends CI_DB_active_record
{
	function on_duplicate_update($table = '',$fields = NULL,$set = NULL)
	{
		if ( ! is_null($set))
		{
			$this->set($set);
		}
 
		if (count($this->ar_set) == 0)
		{
			if ($this->db_debug)
			{
				return $this->display_error('db_must_use_set');
			}
			return FALSE;
		}
		if ($table == '')
		{
			if ( ! isset($this->ar_from[0]))
			{
				if ($this->db_debug)
				{
					return $this->display_error('db_must_set_table');
				}
				return FALSE;
			}
 
			$table = $this->ar_from[0];
		}
 
		$sql = $this->_insert_on_duplicate_update($this->_protect_identifiers($table, TRUE, NULL, FALSE), $fields, $this->ar_set);
		$this->_reset_write();
		return $this->query($sql);
	}
}