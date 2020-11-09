<?php
class Live_model extends CI_Model
{
 function load_data($user_id)
 {
  $this->db->where('user_id',$user_id);	
  $this->db->order_by('id', 'DESC');
  $query = $this->db->get('vendorbrands');
  return $query->result_array();
 }

 function insert($data)
 {
  $this->db->insert('vendorbrands', $data);
 }

 function update($data, $id)
 {
  $this->db->where('id', $id);
  $this->db->update('vendorbrands', $data);
 }

 function delete($id)
 {
  $this->db->where('id', $id);
  $this->db->delete('vendorbrands');
 }
 
 
}
?>
