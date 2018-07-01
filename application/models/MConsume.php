<?php

class MConsume extends CI_Model{

  // Create consume record in database
  function addConsume($data)
  {
    $this->db->insert('consume', $data);
  }

  // Retrieve all consume records
  function listConsumes()
  {
    $this->db->order_by('date', 'asc');
    return $this->db->get('consume');
  }

  // Retrieve one consume record
  function getConsume($id)
  {
    return $this->db->get_where('consume', array('id'=> $id));
  }

  // Update one consume record
  function updateConsume($id, $data)
  {
    $this->db->where('id', $id);
    $this->db->update('consume', $data);
  }

  // Delete one consume record
  function deleteConsume($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('consume');
  }

}
/* End of file MConsume.php */
/* Location: ./system/application/models/MConsume.php */
