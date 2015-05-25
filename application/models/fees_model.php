 <?php
class Fees_model extends CI_Model {

    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
        $this->load->database();
    }

    public function paid($start_date, $end_date)
    {
    	$sql = "SELECT t2.fullname, t3.student_type, t1.* FROM 
                (SELECT student_id, 'Admission' AS fee_type, amount, discount_percentage, discount_amount, last_amount, admission_date AS payment_date
                FROM student_academic_program
                UNION
                SELECT student_id, 'Selling Book' AS fee_type, amount, discount_percentage, discount_amount, last_amount, purchased_date AS payment_date
                FROM student_book_purchase
                UNION
                SELECT student_id, 'Library Membership' AS fee_type, amount, discount_percentage, discount_amount, last_amount, payment_date
                FROM student_library
                UNION
                SELECT student_id, 'Service Fee' AS service_type, amount, 0 AS discount_percentage, 0 AS discount_amount, amount AS last_amount, payment_date
                FROM student_service
                UNION
                SELECT student_id, 'Transportation Membership' AS fee_type, amount, discount_percentage, discount_amount, last_amount, payment_date
                FROM student_vehicle) t1
                LEFT JOIN students t2 ON t1.student_id = t2.id
                LEFT JOIN student_types t3 ON t2.student_type_id = t3.id
                WHERE t1.payment_date >= '$start_date' and t1.payment_date <= '$end_date' 
                ORDER BY t1.payment_date";
    	
        $query = $this->db->query($sql);
        return $query->result_array(); 
    }
    
    public function to_be_paid()
    {
    	$sql = "SELECT t2.fullname, t3.student_type, t1.* FROM 
                (SELECT student_id, 'Admission' AS fee_type, amount, discount_percentage, discount_amount, last_amount, effective_end AS due_date
                FROM student_academic_program
                UNION
                SELECT student_id, 'Library Membership' AS fee_type, amount, discount_percentage, discount_amount, last_amount, effective_end AS due_date
                FROM student_library
                UNION
                SELECT student_id, 'Transportation Membership' AS fee_type, amount, discount_percentage, discount_amount, last_amount, effective_end AS due_date
                FROM student_vehicle) t1 
                LEFT JOIN students t2 ON t1.student_id = t2.id
                LEFT JOIN student_types t3 ON t2.student_type_id = t3.id
                WHERE t1.due_date <= NOW()";
    	
        $query = $this->db->query($sql);
        return $query->result_array(); 
    }
    
}
?>                 
                    