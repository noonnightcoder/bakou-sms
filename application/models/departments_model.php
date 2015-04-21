 <?php
class Departments_model extends CI_Model {

    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
        $this->load->database();
    }

    /**
    * Get product by his is
    * @param int $product_id 
    * @return array
    */
    public function get_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('departments');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array(); 
    }    

    /**
    * Fetch manufacturers data from the database
    * possibility to mix search, filter and order
    * @param string $search_string 
    * @param strong $order
    * @param string $order_type 
    * @param int $limit_start
    * @param int $limit_end
    * @return array
    */
    public function get_all($search_string=null, $faculty_id)
    {

        $this->db->select('*');
        $this->db->from('departments');
        $this->db->where('faculty_id', $faculty_id);
        if($search_string){
            $this->db->like('lower(department_name)', strtolower($search_string));
        }
        $this->db->group_by('id');

        $query = $this->db->get();

        return $query->result_array();  
    }

    /**
    * Count the number of rows
    * @param int $search_string
    * @param int $order
    * @return int
    */
    function count_all($search_string=null, $faculty_id)
    {
        $this->db->select('*');
        $this->db->from('departments');
        $this->db->where('faculty_id', $faculty_id);
        if($search_string){
            $this->db->like('lower(department_name)', strtolower($search_string));
        }

        $query = $this->db->get();
        return $query->num_rows();        
    }

    /**
    * Store the new item into the database
    * @param array $data - associative array with data to store
    * @return boolean 
    */
    function store_data($data)
    {
        $insert = $this->db->insert('departments', $data);
        return $insert;
    }

    /**
    * Update manufacture
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('departments', $data);
        $report = array();
        $report['error'] = $this->db->_error_number();
        $report['message'] = $this->db->_error_message();
        if($report !== 0){
            return true;
        }else{
            return false;
        }
    }

    /**
    * Delete manufacturer
    * @param int $id - manufacture id
    * @return boolean
    */
    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('departments'); 
    }

}
?>                 
                    