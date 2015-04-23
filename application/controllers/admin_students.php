 <?php
class Admin_students extends CI_Controller {

    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('students_model');

        if(!$this->session->userdata('is_logged_in')){
            redirect('admin/login');
        }
    }

    public function index()
    {
        //all the posts sent by the view
        $search = $this->input->post('search');        
        $data['search'] = $search;

        //pagination settings
        $config['per_page'] = 10;

        $config['base_url'] = base_url().'index.php/admin/students';
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 20;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';

        //limit end
        $page = $this->uri->segment(3);

        //math to get the initial record to be select in the database
        $limit_end = ($page * $config['per_page']) - $config['per_page'];
        if ($limit_end < 0){
            $limit_end = 0;
        } 

        //fetch sql data into arrays
        $data['counts']= $this->students_model->count_all();
        $data['result'] = $this->students_model->get_all($search, $config['per_page'], $limit_end);        
        $config['total_rows'] = $data['counts'];

        //initializate the panination helper 
        $this->pagination->initialize($config);   

        //load the view
        $data['main_content'] = 'admin/students/list';
        $this->load->view('includes/template', $data);  
    }//index

    public function add()
    {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            $this->form_validation->set_rules('fullname', 'fullname', 'required');
            $this->form_validation->set_rules('fullname_in_khmer', 'fullname_in_khmer', 'required');
            $this->form_validation->set_rules('birthday', 'birthday', 'required');
            $this->form_validation->set_rules('sex', 'sex', '');
            $this->form_validation->set_rules('address', 'address', '');
            $this->form_validation->set_rules('phone1', 'phone1', 'numeric');
            $this->form_validation->set_rules('phone2', 'phone2', 'numeric');
            $this->form_validation->set_rules('student_description', 'student_description', '');
            $this->form_validation->set_rules('birthplace', 'birthplace', '');
            $this->form_validation->set_rules('photo', 'photo', '');
            $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                // upload file configuration
                $config['upload_path'] = './attachments/';
                $config['allowed_types'] = 'pdf|zip|xls|xlsx|txt|csv|gif|jpg|png|doc|docx';
                $config['max_size'] = '5000';
                $config['file_name'] = 'upload'.time();
                $this->load->library('upload', $config);
                // upload file name in the form
                $file = 'photo';
                
                // start to upload
                if( !$this->upload->do_upload($file) )
                {
                    $data_to_store = array('fullname' => $this->input->post('fullname'),
                                           'fullname_in_khmer' => $this->input->post('fullname_in_khmer'),
                                           'birthday' => $this->input->post('birthday'),
                                           'sex' => $this->input->post('sex'),
                                           'address' => $this->input->post('address'),
                                           'phone1' => $this->input->post('phone1'),
                                           'phone2' => $this->input->post('phone2'),
                                           'student_description' => $this->input->post('student_description'),
                                           'birthplace' => $this->input->post('birthplace'),
                                           'photo' => '/sms/attachments/index.png');
                }else{
                    
                    $file_root = $this->upload->data();
                    
                    $data_to_store = array('fullname' => $this->input->post('fullname'),
                                           'fullname_in_khmer' => $this->input->post('fullname_in_khmer'),
                                           'birthday' => $this->input->post('birthday'),
                                           'sex' => $this->input->post('sex'),
                                           'address' => $this->input->post('address'),
                                           'phone1' => $this->input->post('phone1'),
                                           'phone2' => $this->input->post('phone2'),
                                           'student_description' => $this->input->post('student_description'),
                                           'birthplace' => $this->input->post('birthplace'),
                                           'photo' => '/sms'.substr($config['upload_path'],1).$file_root['file_name']); 
                }
                //if the insert has returned true then we show the flash message
                if($this->students_model->store_data($data_to_store))
                {
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }
            }
        }
        //load the view
        $data['main_content'] = 'admin/students/add';
        $this->load->view('includes/template', $data);  
    }

    public function update()
    {
        $id = $this->uri->segment(4);

        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            $this->form_validation->set_rules('fullname', 'fullname', 'required');
            $this->form_validation->set_rules('fullname_in_khmer', 'fullname_in_khmer', 'required');
            $this->form_validation->set_rules('birthday', 'birthday', 'required');
            $this->form_validation->set_rules('sex', 'sex', '');
            $this->form_validation->set_rules('address', 'address', '');
            $this->form_validation->set_rules('phone1', 'phone1', 'numeric');
            $this->form_validation->set_rules('phone2', 'phone2', 'numeric');
            $this->form_validation->set_rules('student_description', 'student_description', '');
            $this->form_validation->set_rules('birthplace', 'birthplace', '');
            $this->form_validation->set_rules('photo', 'photo', '');
            $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                // upload file configuration
                $config['upload_path'] = './attachments/';
                $config['allowed_types'] = 'pdf|zip|xls|xlsx|txt|csv|gif|jpg|png|doc|docx';
                $config['max_size'] = '5000';
                $config['file_name'] = 'upload'.time();
                $this->load->library('upload', $config);
                // upload file name in the form
                $file = 'photo';
                
                // start to upload
                if( !$this->upload->do_upload($file) )
                {
                    $data_to_store = array('fullname' => $this->input->post('fullname'),
                                           'fullname_in_khmer' => $this->input->post('fullname_in_khmer'),
                                           'birthday' => $this->input->post('birthday'),
                                           'sex' => $this->input->post('sex'),
                                           'address' => $this->input->post('address'),
                                           'phone1' => $this->input->post('phone1'),
                                           'phone2' => $this->input->post('phone2'),
                                           'student_description' => $this->input->post('student_description'),
                                           'birthplace' => $this->input->post('birthplace'));
                }else{
                    $file_root = $this->upload->data();
                    $data_to_store = array('fullname' => $this->input->post('fullname'),
                                           'fullname_in_khmer' => $this->input->post('fullname_in_khmer'),
                                           'birthday' => $this->input->post('birthday'),
                                           'sex' => $this->input->post('sex'),
                                           'address' => $this->input->post('address'),
                                           'phone1' => $this->input->post('phone1'),
                                           'phone2' => $this->input->post('phone2'),
                                           'student_description' => $this->input->post('student_description'),
                                           'birthplace' => $this->input->post('birthplace'),
                                           'photo' => '/sms'.substr($config['upload_path'],1).$file_root['file_name']);
                }
                //if the insert has returned true then we show the flash message
                if($this->students_model->update($id, $data_to_store) == TRUE)
                {
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE;
                }
            }//validation run
        } 
        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        //product data 
        $data['result'] = $this->students_model->get_by_id($id);
        //load the view
        $data['main_content'] = 'admin/students/edit';
        $this->load->view('includes/template', $data);            

    }//update   

    public function delete()
    {
        $id = $this->uri->segment(4);
        //$this->students_model->delete($id);
        $data_to_store = array('status' => 0);
        //if the insert has returned true then we show the flash message
        if($this->students_model->update($id, $data_to_store) == TRUE)
        {
            redirect('admin/students'); 
        }
    }//delete


}                 
                    