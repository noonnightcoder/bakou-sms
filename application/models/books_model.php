 <?php
class Books_model extends CI_Model {

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
        $this->db->from('books');
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
    public function get_all($search_string=null, $subject_id)
    {
        $this->db->select('*');
        $this->db->from('books');
        $this->db->where('subject_id', $subject_id);
        $this->db->where('books.status', 1);
        if($search_string){
            $this->db->like('lower(book_name)', strtolower($search_string));
        }
        $this->db->group_by('id');

        $this->db->order_by('id', 'desc');
        
        $query = $this->db->get();

        return $query->result_array();  
    }

    public function get_all_books($search_string=null, $subject_id=null, $limit_start=null, $limit_end=null)
    {
        $this->db->select('books.*, subjects.subject_name');
        $this->db->from('books');
        $this->db->join('subjects', 'books.subject_id = subjects.id');
        $this->db->where('books.status', 1);
        if($search_string){
            $this->db->like('lower(book_name)', strtolower($search_string));
        }
        
        if($subject_id){
            $this->db->where('subject_id', $subject_id);
        }
        $this->db->group_by('books.id');

        if($limit_start && $limit_end){
          $this->db->limit($limit_start, $limit_end);   
        }

        if($limit_start != null){
          $this->db->limit($limit_start, $limit_end);    
        }

        $this->db->order_by('id', 'desc');
        
        $query = $this->db->get();

        return $query->result_array();  
    }
    
    public function get_all_return_books($search_string=null)
    {
        $this->db->select('book_borrowings.*, students.fullname, books.book_name, subjects.subject_name');
        $this->db->from('book_borrowings');
        $this->db->join('students', 'book_borrowings.student_id = students.id');
        $this->db->join('books', 'book_borrowings.book_id = books.id');
        $this->db->join('subjects', 'books.subject_id = subjects.id');
        $this->db->where('book_borrowings.status', 1);
        
        if($search_string){
            $this->db->like('lower(books.book_name)', strtolower($search_string));
        }
        
        $query = $this->db->get();

        return $query->result_array();  
    }
    
    public function get_all_return_books_by_student($student_id)
    {
        $this->db->select('book_borrowings.*, students.fullname, books.book_name, subjects.subject_name');
        $this->db->from('book_borrowings');
        $this->db->join('students', 'book_borrowings.student_id = students.id');
        $this->db->join('books', 'book_borrowings.book_id = books.id');
        $this->db->join('subjects', 'books.subject_id = subjects.id');
        $this->db->where('book_borrowings.student_id', $student_id);
        
        $query = $this->db->get();

        return $query->result_array();  
    }
    
    public function get_all_purchase_books_by_student($student_id)
    {
        $this->db->select('student_book_purchase.*, students.fullname, books.book_name, subjects.subject_name');
        $this->db->from('student_book_purchase');
        $this->db->join('students', 'student_book_purchase.student_id = students.id');
        $this->db->join('books', 'student_book_purchase.book_id = books.id');
        $this->db->join('subjects', 'books.subject_id = subjects.id');
        $this->db->where('student_book_purchase.student_id', $student_id);
        
        $query = $this->db->get();

        return $query->result_array();  
    }
    
    public function get_all_memberships($search_string=null, $limit_start=null, $limit_end=null)
    {
        $this->db->select('student_library.*, students.fullname');
        $this->db->from('student_library');
        $this->db->join('students', 'student_library.student_id = students.id');
        $this->db->where('student_library.status', 1);
        
        if($search_string){
            $this->db->like('lower(students.fullname)', strtolower($search_string));
        }
        
        $this->db->group_by('student_library.id');

        if($limit_start && $limit_end){
          $this->db->limit($limit_start, $limit_end);   
        }

        if($limit_start != null){
          $this->db->limit($limit_start, $limit_end);    
        }

        $this->db->order_by('student_library.id', 'desc');
        
        $query = $this->db->get();

        return $query->result_array();  
    }
    
    public function get_membership($id)
    {
        $this->db->select('*');
        $this->db->from('student_library');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array(); 
    }
    
    public function get_membership_by_student_id($student_id)
    {
        $this->db->select('*');
        $this->db->from('student_library');
        $this->db->where('student_id', $student_id);
        $query = $this->db->get();
        return $query->row_array(); 
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
        $this->db->from('books');
        $this->db->where('books.status', 1);
        if($search_string){
            $this->db->like('lower(book_name)', strtolower($search_string));
        }
        $query = $this->db->get();
        return $query->num_rows();        
    }

    function count_all_memberships($search_string=null)
    {
        $this->db->select('student_library.*, students.fullname');
        $this->db->from('student_library');
        $this->db->join('students', 'student_library.student_id = students.id');
        $this->db->where('student_library.status', 1);
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
        $insert = $this->db->insert('books', $data);
        return $insert;
    }
    
    function store_membership($data)
    {
        $insert = $this->db->insert('student_library', $data);
        return $insert;
    }

    public function add_membership($p_student_id, $p_amount, $p_effective_from, $p_effective_end, $p_student_library_description, $p_dis_per, $p_dis_amt, $p_payment_date)
    {
    	$sql = "CALL add_library_membership($p_student_id, $p_amount, '".$p_effective_from."', '".$p_effective_end."', '".$p_student_library_description."', $p_dis_per, $p_dis_amt, '".$p_payment_date."')";
    	return $this->db->query($sql);
    }
    /**
    * Update manufacture
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('books', $data);
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
        $this->db->update('student_library', $data);
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
        $this->db->delete('books'); 
    }

    public function borrow_book($p_book_id, $p_student_id, $p_start_date, $p_return_date)
    {
    	$sql = "CALL borrow_book($p_book_id, $p_student_id, '".$p_start_date."', '".$p_return_date."')";
    	return $this->db->query($sql);
    }
    
    public function return_book($p_id)
    {
    	$sql = "CALL return_book($p_id)";
    	return $this->db->query($sql);
    }
    
    public function purchase_book($p_book_id, $p_student_id, $p_amount, $p_purchased_date, $p_description, $p_dis_per, $p_dis_amt)
    {
    	$sql = "CALL purchase_book($p_book_id, $p_student_id, $p_amount, '".$p_purchased_date."', '".$p_description."', $p_dis_per, $p_dis_amt)";
    	return $this->db->query($sql);
    }
    
}
?>                 
                    