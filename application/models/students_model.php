 <?php
class Students_model extends CI_Model {

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
        $this->db->from('students');
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
        $this->db->select('students.*, student_types.student_type');
        $this->db->from('students');
        $this->db->join('student_types', 'students.student_type_id = student_types.id');
        $this->db->where('students.status', 1);
        if($search_string){
            $this->db->like('lower(fullname)', strtolower($search_string));
        }
        $this->db->group_by('students.id');

        if($limit_start && $limit_end){
          $this->db->limit($limit_start, $limit_end);   
        }

        if($limit_start != null){
          $this->db->limit($limit_start, $limit_end);    
        }

        $this->db->order_by('students.id', 'desc');
        
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
        $this->db->from('students');
        $this->db->where('status', 1);
        if($search_string){
            $this->db->like('lower(fullname)', strtolower($search_string));
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
        //$insert = $this->db->insert('students', $data);
        //return $insert;
        $this->db->trans_start();
        $this->db->insert('students', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return  $insert_id;
    }

    /**
    * Update manufacture
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('students', $data);
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
        $this->db->delete('students'); 
    }

    public function admission($p_student_id, $p_academic_program_id, $p_amount, $p_effective_from, $p_effective_end, $p_student_academic_program_description, $p_discount_per, $p_discount_amt, $p_admission_date)
    {
    	$sql = "CALL admission($p_student_id, $p_academic_program_id, $p_amount, '".$p_effective_from."', '".$p_effective_end."', '".$p_student_academic_program_description."', $p_discount_per, $p_discount_amt, '".$p_admission_date."')";
    	return $this->db->query($sql);
    }
    
    public function service($p_student_id, $p_service_id, $p_amount, $p_payment_date)
    {
    	$sql = "CALL service($p_student_id, $p_service_id, $p_amount, '".$p_payment_date."')";
    	return $this->db->query($sql);
    }
    
}
?>                 
                    