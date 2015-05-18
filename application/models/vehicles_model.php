 <?php
class Vehicles_model extends CI_Model {

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
        $this->db->from('vehicles');
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
    public function get_all($search_string=null, $transport_id)
    {
        $this->db->select('*');
        $this->db->from('vehicles');
        $this->db->where('transport_id', $transport_id);
        $this->db->where('vehicles.status', 1);
        if($search_string){
            $this->db->like('lower(vehicle_brand)', strtolower($search_string));
        }
        $this->db->group_by('id');

        $this->db->order_by('id', 'desc');
        
        $query = $this->db->get();

        return $query->result_array();  
    }
    
    public function get_all_memberships($vehicle_id)
    {
        $this->db->select('student_vehicle.*, students.fullname');
        $this->db->from('student_vehicle');
        $this->db->join('students', 'student_vehicle.student_id = students.id');
        $this->db->where('student_vehicle.vehicle_id', $vehicle_id);
        $this->db->where('student_vehicle.status', 1);
        
        $this->db->group_by('student_vehicle.id');

        $query = $this->db->get();

        return $query->result_array();  
    }
    
    public function get_membership($id)
    {
        $this->db->select('student_vehicle.*, vehicles.transport_id, vehicles.vehicle_brand, vehicles.vehicle_identity_number');
        $this->db->select('transports.route_name');
        $this->db->from('student_vehicle');
        $this->db->join('vehicles', 'student_vehicle.vehicle_id = vehicles.id');
        $this->db->join('transports', 'vehicles.transport_id = transports.id');
        $this->db->where('student_vehicle.id', $id);
        $query = $this->db->get();
        return $query->row_array();  
    }

    /**
    * Count the number of rows
    * @param int $search_string
    * @param int $order
    * @return int
    */
    function count_all($search_string=null, $transport_id)
    {
        $this->db->select('*');
        $this->db->from('vehicles');
        $this->db->where('transport_id', $transport_id);
        $this->db->where('vehicles.status', 1);
        if($search_string){
            $this->db->like('lower(vehicle_brand)', strtolower($search_string));
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
        $insert = $this->db->insert('vehicles', $data);
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
        $this->db->update('vehicles', $data);
        $report = array();
        $report['error'] = $this->db->_error_number();
        $report['message'] = $this->db->_error_message();
        if($report !== 0){
            return true;
        }else{
            return false;
        }
    }
    
    function update_membership($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('student_vehicle', $data);
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
        $this->db->delete('vehicles'); 
    }

    public function add_membership($p_student_id, $p_vehicle_id, $p_amount, $p_effective_from, $p_effective_end, $p_student_vehicle_description, $p_dis_per, $p_dis_amt, $p_payment_date)
    {
    	$sql = "CALL add_vehicle_membership($p_student_id, $p_vehicle_id, $p_amount, '".$p_effective_from."', '".$p_effective_end."', '".$p_student_vehicle_description."', $p_dis_per, $p_dis_amt, '".$p_payment_date."')";
    	return $this->db->query($sql);
    }
    
}
?>                 
                    