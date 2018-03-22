<?php

/**
 * Class Organization_Model
 *
 * @author: Niraj Jani
 * @email: jani.niraj@outlook.com
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
     * @param $list=false
     * @param $id=NULL
	 * @return mixed
	 */
	public function getOrganizations($list = false, $id = NULL)
	{
        $query = $this->db;

	    if($list)
        {
            $query = $query->select('id, name');
        }
        else
        {
            $query = $query->select('organizations.*, parent_table.name as parent_name, parent_table.position as parent_position')
                        ->join('organizations as parent_table', 'organizations.parent = parent_table.id', 'LEFT');
        }

        // In case of Edit, remove the same record from list
        if($id)
        {
        	$query = $query->where('id !=', $id);
        }

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
			$child = $this->getChildren($row->id);

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
     * Get Children
     *
	 * @param $parentId
	 * @return array|bool
	 */
	private function getChildren($parentId)
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
					$row->children = $this->getChildren($row->id);
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

    /**
     * Delete Record
     *
     * @param $id
     * @return mixed
     */
	public function delete($id)
    {
        return $this->db->delete('organizations', array('id' => $id));
    }

    /**
     * Create New Record
     *
     * @param $postData
     * @return mixed
     */
    public function create($postData)
    {
        return $this->db->insert('organizations', $postData);
    }

    /**
     * Fetch Record By Id
     *
     * @param $id
     * @return mixed
     */
    public function fetchById($id)
    {
        $query = $this->db->get_where('organizations', array('id' => $id));

        return $query->row_array();
    }

    /**
     * Update Record By Id
     *
     * @param $postData
     * @param $id
     * @return mixed
     */
    public function update($postData, $id)
    {
        $this->db->where('id', $id);

        return $this->db->update('organizations', $postData);
    }
}
