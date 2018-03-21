<?php

/**
 * Class Organization_Model
 */
class Organization_Model extends CI_Model
{
	/**
	 * Organization_Model constructor.
	 */
	public function __construct()
	{
		$this->load->database();
	}

	/**
	 * Get Organizations
	 *
	 * @return mixed
	 */
	public function getOrganizations()
	{
		$query = $this->db->select('organizations.*, parent_table.name as parent_name, parent_table.position as parent_position');
		$query = $query->join('organizations as parent_table', 'organizations.parent = parent_table.id', 'LEFT');
		$query = $query->get('organizations');

		return $query->result_array();
	}

	/**
	 * Get Organization Tree
	 *
	 * @return mixed
	 */
	public function getOrganizationTree()
	{
		$organizations 	= array();
		$query 			= $this->db->select('id, name, position, parent as children')
							->from('organizations')
							->where('parent','0')
							->get();

		foreach ($query->result() as $row)
		{
			$child = $this->getChilderen($row->id);

			if (count($child) > 0)
			{
				$row->children = $child;
			}
			else
			{
				$row->children = false;
			}

			$organizations[] = $row;
		}

		return $organizations;
	}

	/**
	 * @param $parentId
	 * @return array|bool
	 */
	private function getChilderen($parentId)
	{
		$child 	= array();
		$query 	= $this->db->select('id, name, position, parent as children')
					->from('organizations')
					->where('parent',$parentId)
					->get();
		if (count($query->result()) > 0)
		{
			foreach ($query->result() as $i => $row)
			{
				if ($row->children > 0)
				{
					$row->children = $this->getChilderen($row->id);
				}

				$child[$i] = $row;
			}

			return $child;
		}
		else
		{
			return false;
		}
	}
}
