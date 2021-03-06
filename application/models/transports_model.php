 <?php
class Transports_model extends CI_Model {

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
        $this->db->from('transports');
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
    public function get_all($search_string=null, $limit_start=null, $limit_end=null)
    {
        $this->db->select('*');
        $this->db->from('transports');
        $this->db->where('status', 1);
        if($search_string){
            $this->db->like('lower(route_name)', strtolower($search_string));
        }
        $this->db->group_by('id');

        if($limit_start && $limit_end){
          $this->db->limit($limit_start, $limit_end);   
        }

        if($limit_start != null){
          $this->db->limit($limit_start, $limit_end);    
        }

        $this->db->order_by('transports.id', 'desc');
        
        $query = $this->db->get();

        return $query->result_array();  
    }
    
    public function get_all_memberships($search_string=null, $limit_start=null, $limit_end=null)
    {
        $this->db->select('student_vehicle.*, students.fullname, vehicles.vehicle_brand, vehicles.vehicle_identity_number');
        $this->db->select('transports.route_name');
        $this->db->from('student_vehicle');
        $this->db->join('students', 'student_vehicle.student_id = students.id');
        $this->db->join('vehicles', 'student_vehicle.vehicle_id = vehicles.id');
        $this->db->join('transports', 'vehicles.transport_id = transports.id');
        $this->db->where('student_vehicle.status', 1);
        
        if($search_string){
            $this->db->like('lower(students.fullname)', strtolower($search_string));
        }
        
        $this->db->group_by('student_vehicle.id');

        if($limit_start && $limit_end){
          $this->db->limit($limit_start, $limit_end);   
        }

        if($limit_start != null){
          $this->db->limit($limit_start, $limit_end);    
        }

        $query = $this->db->get();

        return $query->result_array();  
    }

    /**
    * Count the number of rows
    * @param int $search_string
    * @param int $order
    * @return int
    */
    function count_all($search_string=null)
    {
        $this->db->select('*');
        $this->db->from('transports');
        $this->db->where('status', 1);
        if($search_string){
            $this->db->like('lower(route_name)', strtolower($search_string));
        }

        $query = $this->db->get();
        return $query->num_rows();        
    }
    
    function count_all_memberships($search_string=null)
    {
        $this->db->select('student_vehicle.*, students.fullname');
        $this->db->from('student_vehicle');
        $this->db->join('students', 'student_vehicle.student_id = students.id');
        $this->db->where('student_vehicle.status', 1);
        if($search_string){
            $this->db->like('lower(students.fullname)', strtolower($search_string));
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
        $insert = $this->db->insert('transports', $data);
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
        $this->db->update('transports', $data);
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
        $this->db->delete('transports'); 
    }

}
?>                 
                    