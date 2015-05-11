 <?php
class Admin_parents extends CI_Controller {

    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('parents_model');

        if(!$this->session->userdata('is_logged_in')){
            redirect('admin/login');
        }
    }

    public function index()
    {
        $student_id = $this->uri->segment(3); 
        //all the posts sent by the view
        $search = $this->input->post('search');        
        $data['search'] = $search;

        //fetch sql data into arrays
        $data['counts']= $this->parents_model->count_all();
        $data['result'] = $this->parents_model->get_all($search, $student_id);        

        //load the view
        $data['main_content'] = 'admin/parents/list';
        $this->load->view('includes/template', $data);  
    }//index

    public function add()
    {
        $student_id = $this->uri->segment(4);
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            $this->form_validation->set_rules('relationship', 'relationship', 'required');
            $this->form_validation->set_rules('fullname', 'fullname', 'required');
            $this->form_validation->set_rules('fullname_in_khmer', 'fullname_in_khmer', 'required');
            $this->form_validation->set_rules('birthday', 'birthday', '');
            $this->form_validation->set_rules('sex', 'sex', '');
            $this->form_validation->set_rules('address', 'address', '');
            $this->form_validation->set_rules('phone1', 'phone1', 'numeric');
            $this->form_validation->set_rules('phone2', 'phone2', 'numeric');
            $this->form_validation->set_rules('parent_description', 'parent_description', '');
            $this->form_validation->set_rules('profession', 'profession', 'required');
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
                    $data_to_store = array('relationship' => $this->input->post('relationship'),
                                           'fullname' => $this->input->post('fullname'),
                                           'fullname_in_khmer' => $this->input->post('fullname_in_khmer'),
                                           'birthday' => $this->input->post('birthday'),
                                           'sex' => $this->input->post('sex'),
                                           'address' => $this->input->post('address'),
                                           'phone1' => $this->input->post('phone1'),
                                           'phone2' => $this->input->post('phone2'),
                                           'parent_description' => $this->input->post('parent_description'),
                                           'profession' => $this->input->post('profession'),
                                           'student_id' => $student_id,
                                           'birthplace' => $this->input->post('birthplace'),
                                           'photo' => '/sms/attachments/index.png');
                }else{
                    $file_root = $this->upload->data();
                    $data_to_store = array('relationship' => $this->input->post('relationship'),
                                           'fullname' => $this->input->post('fullname'),
                                           'fullname_in_khmer' => $this->input->post('fullname_in_khmer'),
                                           'birthday' => $this->input->post('birthday'),
                                           'sex' => $this->input->post('sex'),
                                           'address' => $this->input->post('address'),
                                           'phone1' => $this->input->post('phone1'),
                                           'phone2' => $this->input->post('phone2'),
                                           'parent_description' => $this->input->post('parent_description'),
                                           'profession' => $this->input->post('profession'),
                                           'student_id' => $student_id,
                                           'birthplace' => $this->input->post('birthplace'),
                                           'photo' => '/sms'.substr($config['upload_path'],1).$file_root['file_name']);
                }
                //if the insert has returned true then we show the flash message
                if($this->parents_model->store_data($data_to_store))
                {
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }
            }
        }
        //load the view
        $data['main_content'] = 'admin/parents/add';
        $this->load->view('includes/template', $data);  
    }

    public function update()
    {
        $student_id = $this->uri->segment(4);
        $id = $this->uri->segment(5);

        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            $this->form_validation->set_rules('relationship', 'relationship', 'required');
            $this->form_validation->set_rules('fullname', 'fullname', 'required');
            $this->form_validation->set_rules('fullname_in_khmer', 'fullname_in_khmer', 'required');
            $this->form_validation->set_rules('birthday', 'birthday', '');
            $this->form_validation->set_rules('sex', 'sex', '');
            $this->form_validation->set_rules('address', 'address', '');
            $this->form_validation->set_rules('phone1', 'phone1', 'numeric');
            $this->form_validation->set_rules('phone2', 'phone2', 'numeric');
            $this->form_validation->set_rules('parent_description', 'parent_description', '');
            $this->form_validation->set_rules('profession', 'profession', 'required');
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
                
                if( !$this->upload->do_upload($file) )
                {
                    $data_to_store = array('relationship' => $this->input->post('relationship'),
                                           'fullname' => $this->input->post('fullname'),
                                           'fullname_in_khmer' => $this->input->post('fullname_in_khmer'),
                                           'birthday' => $this->input->post('birthday'),
                                           'sex' => $this->input->post('sex'),
                                           'address' => $this->input->post('address'),
                                           'phone1' => $this->input->post('phone1'),
                                           'phone2' => $this->input->post('phone2'),
                                           'parent_description' => $this->input->post('parent_description'),
                                           'profession' => $this->input->post('profession'),
                                           'birthplace' => $this->input->post('birthplace'),
                                           'modified_date' => date('Y-m-d H:i:s'));
                }else{
                    $file_root = $this->upload->data();
                    $data_to_store = array('relationship' => $this->input->post('relationship'),
                                           'fullname' => $this->input->post('fullname'),
                                           'fullname_in_khmer' => $this->input->post('fullname_in_khmer'),
                                           'birthday' => $this->input->post('birthday'),
                                           'sex' => $this->input->post('sex'),
                                           'address' => $this->input->post('address'),
                                           'phone1' => $this->input->post('phone1'),
                                           'phone2' => $this->input->post('phone2'),
                                           'parent_description' => $this->input->post('parent_description'),
                                           'profession' => $this->input->post('profession'),
                                           'birthplace' => $this->input->post('birthplace'),
                                           'photo' => '/sms'.substr($config['upload_path'],1).$file_root['file_name'],
                                           'modified_date' => date('Y-m-d H:i:s'));
                }
                
                //if the insert has returned true then we show the flash message
                if($this->parents_model->update($id, $data_to_store) == TRUE)
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
        $data['result'] = $this->parents_model->get_by_id($id);
        //load the view
        $data['main_content'] = 'admin/parents/edit';
        $this->load->view('includes/template', $data);            

    }//update   

    public function detail()
    {
        $student_id = $this->uri->segment(4);
        $id = $this->uri->segment(5);
        //product data 
        $data['result'] = $this->parents_model->get_by_id($id);
        //load the view
        $data['main_content'] = 'admin/parents/detail';
        $this->load->view('includes/template', $data);            

    }//update 
    
    public function delete()
    {
        $student_id = $this->uri->segment(4);
        $id = $this->uri->segment(5);
        //$this->parents_model->delete($id);
        $data_to_store = array('status' => 0);
        //if the insert has returned true then we show the flash message
        if($this->parents_model->update($id, $data_to_store) == TRUE)
        {
            redirect('admin/parents/'.$student_id);
        }
    }//delete


}                 
                    