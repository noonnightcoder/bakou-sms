 <?php
class Academic_programs_model extends CI_Model {

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
        $this->db->select('academic_programs.*, classes.class_name, departments.department_name, faculties.faculty_name');
        $this->db->from('academic_programs');
        $this->db->join('classes', 'academic_programs.class_id = classes.id');
        $this->db->join('departments', 'classes.department_id = departments.id');
        $this->db->join('faculties', 'departments.faculty_id = faculties.id');
        $this->db->where('academic_programs.id', $id);
        $query = $this->db->get();
        return $query->row_array(); 
    }    
    
    public function get_by_student_id($student_id)
    {
        $this->db->select('student_academic_program.*, academic_programs.academic_program_description, classes.class_name, departments.department_name, faculties.faculty_name');
        $this->db->from('student_academic_program');
        $this->db->join('academic_programs', 'student_academic_program.academic_program_id = academic_programs.id');
        $this->db->join('classes', 'academic_programs.class_id = classes.id');
        $this->db->join('departments', 'classes.department_id = departments.id');
        $this->db->join('faculties', 'departments.faculty_id = faculties.id');
        $this->db->where('student_academic_program.student_id', $student_id);
        $query = $this->db->get();
        return $query->result_array(); 
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
    public function get_all($search_string=null, $academic_id)
    {
        $this->db->select('academic_programs.*, classes.class_name, departments.department_name, faculties.faculty_name');
        $this->db->from('academic_programs');
        $this->db->join('classes', 'academic_programs.class_id = classes.id');
        $this->db->join('departments', 'classes.department_id = departments.id');
        $this->db->join('faculties', 'departments.faculty_id = faculties.id');
        $this->db->where('academic_programs.academic_id', $academic_id);
        $this->db->where('academic_programs.status', 1);
        
        if($search_string){
            $this->db->like('lower(classes.class_name)', strtolower($search_string));
        }
        $this->db->group_by('academic_programs.id');

        $this->db->order_by('academic_programs.id', 'desc');
        
        $query = $this->db->get();

        return $query->result_array();  
    }
    
    public function get_all_academic_programs()
    {
        $this->db->select('academic_programs.*, classes.class_name, departments.department_name, faculties.faculty_name');
        $this->db->from('academic_programs');
        $this->db->join('classes', 'academic_programs.class_id = classes.id');
        $this->db->join('departments', 'classes.department_id = departments.id');
        $this->db->join('faculties', 'departments.faculty_id = faculties.id');
        $this->db->where('academic_programs.academic_id in (select id from academics where academics.status = 1) ');
        $this->db->where('academic_programs.status', 1);
        
        
        $this->db->group_by('academic_programs.id');

        $query = $this->db->get();

        return $query->result_array();  
    }

    /**
    * Count the number of rows
    * @param int $search_string
    * @param int $order
    * @return int
    */
    function count_all($search_string=null, $academic_id)
    {
        $this->db->select('*');
        $this->db->from('academic_programs');
        $this->db->where('academic_programs.academic_id', $academic_id);
        $this->db->where('academic_programs.status', 1);
        if($search_string){
            $this->db->like('lower(classes.class_name)', strtolower($search_string));
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
        $insert = $this->db->insert('academic_programs', $data);
        return $insert;
    }
    
    function store_aca_pro_sub_data($data)
    {
        $insert = $this->db->insert('academic_program_subjects', $data);
        return $insert;
    }

    public function get_all_aca_pro_subs($academic_program_id, $day)
    {
        $this->db->select('academic_program_subjects.*, subjects.subject_name, staffs.fullname');
        $this->db->from('academic_program_subjects');
        $this->db->join('subjects', 'academic_program_subjects.subject_id = subjects.id');
        $this->db->join('staffs', 'academic_program_subjects.taught_by = staffs.id');
        $this->db->where('academic_program_subjects.academic_program_id', $academic_program_id);
        $this->db->where('academic_program_subjects.status', 1);
        
        if($day == 'monday')
        {
            $this->db->where('academic_program_subjects.monday', $day);
            $this->db->order_by('academic_program_subjects.monday_time_start');
        }            
        elseif($day == 'tuesday')
        {
            $this->db->where('academic_program_subjects.tuesday', $day);
            $this->db->order_by('academic_program_subjects.tuesday_time_start');
        }
        elseif($day == 'wednesday')
        {
            $this->db->where('academic_program_subjects.wednesday', $day);
            $this->db->order_by('academic_program_subjects.wednesday_time_start');
        }
        elseif($day == 'thursday')
        {
            $this->db->where('academic_program_subjects.thursday', $day);
            $this->db->order_by('academic_program_subjects.thursday_time_start');
        }
        elseif($day == 'friday')
        {
            $this->db->where('academic_program_subjects.friday', $day);
            $this->db->order_by('academic_program_subjects.friday_time_start');
        }
        elseif($day == 'saturday')
        {
            $this->db->where('academic_program_subjects.saturday', $day);
            $this->db->order_by('academic_program_subjects.saturday_time_start');
        }
        elseif($day == 'sunday')
        {
            $this->db->where('academic_program_subjects.sunday', $day);
            $this->db->order_by('academic_program_subjects.sunday_time_start');
        }
        
        $this->db->group_by('academic_program_subjects.id');
        $query = $this->db->get();

        return $query->result_array();  
    }
    
    public function get_all_subjects($academic_program_id)
    {
        $this->db->select('academic_program_subjects.*, books.book_name, subjects.subject_name, staffs.fullname');
        $this->db->from('academic_program_subjects');
        $this->db->join('subjects', 'academic_program_subjects.subject_id = subjects.id');
        $this->db->join('books', 'subjects.id = books.subject_id');
        $this->db->join('staffs', 'academic_program_subjects.taught_by = staffs.id');
        $this->db->where('academic_program_subjects.academic_program_id', $academic_program_id);
        
        //$this->db->group_by('academic_program_subjects.id');
        $this->db->group_by('books.id');
        //$this->db->group_by('academic_program_subjects.id');
        $query = $this->db->get();

        return $query->result_array();  
    }
    
    public function get_all_students($academic_program_id)
    {
        $this->db->select('student_academic_program.*, students.fullname, students.fullname_in_khmer, students.sex');
        $this->db->from('student_academic_program');
        $this->db->join('students', 'student_academic_program.student_id = students.id');
        $this->db->where('student_academic_program.academic_program_id', $academic_program_id);
        
        $this->db->group_by('student_academic_program.id');
        $this->db->order_by('students.fullname', 'desc');
        $query = $this->db->get();
        return $query->result_array();  
    }
    
    /**
    * Update manufacture
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('academic_programs', $data);
        $report = array();
        $report['error'] = $this->db->_error_number();
        $report['message'] = $this->db->_error_message();
        if($report !== 0){
            return true;
        }else{
            return false;
        }
    }

    function update_subject($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('academic_program_subjects', $data);
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
        $this->db->delete('academic_programs'); 
    }

    /**
    * Delete manufacturer
    * @param int $id - manufacture id
    * @return boolean
    */
    function delete_subject($id){
        $this->db->where('id', $id);
        $this->db->delete('academic_program_subjects'); 
    }
    
    function mark_absence($data)
    {
        $insert = $this->db->insert('student_absences', $data);
        return $insert;
    }
    
    function get_absences($academic_program_id)
    {
        $sql = "SELECT t1.*, t2.fullname, t2.fullname_in_khmer, t4.subject_name
                FROM student_absences t1
                JOIN students t2 ON t1.student_id = t2.id
                JOIN academic_program_subjects t3 ON t1.academic_program_subject_id = t3.id
                JOIN subjects t4 ON t3.subject_id = t4.id
                WHERE t3.academic_program_id = $academic_program_id
                GROUP BY t1.absent_date, t4.subject_name
                ORDER BY t1.absent_date";
        $query = $this->db->query($sql);
		
        return $query->result_array();
    }
}
?>                 
                    