 <?php
class Admin_school extends CI_Controller {

    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('school_model');

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

        $config['base_url'] = base_url().'index.php/admin/school';
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
        $data['counts']= $this->school_model->count_all();
        $data['result'] = $this->school_model->get_all($search, $config['per_page'], $limit_end);        
        $config['total_rows'] = $data['counts'];


        //initializate the panination helper 
        $this->pagination->initialize($config);   

        //load the view
        $data['main_content'] = 'admin/school/list';
        $this->load->view('includes/template', $data);  

    }//index

    public function add()
    {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            $this->form_validation->set_rules('school_name', 'school_name', 'required');
            $this->form_validation->set_rules('school_address', 'school_address', '');
            $this->form_validation->set_rules('school_phone1', 'school_phone1', 'required');
            $this->form_validation->set_rules('school_phone2', 'school_phone2', '');
            $this->form_validation->set_rules('school_fax', 'school_fax', '');
            $this->form_validation->set_rules('school_email', 'school_email', 'required');
            $this->form_validation->set_rules('school_website', 'school_website', '');
            $this->form_validation->set_rules('school_logo', 'school_logo', '');
            $this->form_validation->set_rules('school_description', 'school_description', '');
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
                $file = 'school_logo';
                
                // start to upload
                if( !$this->upload->do_upload($file) )
                {
                    $data_to_store = array('school_name' => $this->input->post('school_name'),
                                           'school_address' => $this->input->post('school_address'),
                                           'school_phone1' => $this->input->post('school_phone1'),
                                           'school_phone2' => $this->input->post('school_phone2'),
                                           'school_fax' => $this->input->post('school_fax'),
                                           'school_email' => $this->input->post('school_email'),
                                           'school_website' => $this->input->post('school_website'),
                                           'school_logo' => '/sms/attachments/index.png',
                                           'school_description' => $this->input->post('school_description'));
                    
                    //if the insert has returned true then we show the flash message
                    if($this->school_model->store_data($data_to_store))
                    {
                        $data['flash_message'] = TRUE; 
                    }else{
                        $data['flash_message'] = FALSE; 
                    }
                }else{
                    $file_root = $this->upload->data();
                    
                    $data_to_store = array('school_name' => $this->input->post('school_name'),
                                           'school_address' => $this->input->post('school_address'),
                                           'school_phone1' => $this->input->post('school_phone1'),
                                           'school_phone2' => $this->input->post('school_phone2'),
                                           'school_fax' => $this->input->post('school_fax'),
                                           'school_email' => $this->input->post('school_email'),
                                           'school_website' => $this->input->post('school_website'),
                                           'school_logo' => '/sms'.substr($config['upload_path'],1).$file_root['file_name'],
                                           'school_description' => $this->input->post('school_description'));
                    
                    //if the insert has returned true then we show the flash message
                    if($this->school_model->store_data($data_to_store))
                    {
                        $data['flash_message'] = TRUE; 
                    }else{
                        $data['flash_message'] = FALSE; 
                    }
                }
            }
        }
        //load the view
        $data['main_content'] = 'admin/school/add';
        $this->load->view('includes/template', $data);  
    }

    public function update()
    {
        $id = $this->uri->segment(4);
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            $this->form_validation->set_rules('school_name', 'school_name', 'required');
            $this->form_validation->set_rules('school_address', 'school_address', '');
            $this->form_validation->set_rules('school_phone1', 'school_phone1', 'required');
            $this->form_validation->set_rules('school_phone2', 'school_phone2', '');
            $this->form_validation->set_rules('school_fax', 'school_fax', '');
            $this->form_validation->set_rules('school_email', 'school_email', 'required');
            $this->form_validation->set_rules('school_website', 'school_website', '');
            $this->form_validation->set_rules('school_logo', 'school_logo', '');
            $this->form_validation->set_rules('school_description', 'school_description', '');
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
                $file = 'school_logo';
                
                // start to upload
                if( !$this->upload->do_upload($file) )
                {
                    $data_to_store = array('school_name' => $this->input->post('school_name'),
                                           'school_address' => $this->input->post('school_address'),
                                           'school_phone1' => $this->input->post('school_phone1'),
                                           'school_phone2' => $this->input->post('school_phone2'),
                                           'school_fax' => $this->input->post('school_fax'),
                                           'school_email' => $this->input->post('school_email'),
                                           'school_website' => $this->input->post('school_website'),
                                           'school_description' => $this->input->post('school_description'));
                    
                    //if the insert has returned true then we show the flash message
                    if($this->school_model->update($id, $data_to_store) == TRUE)
                    {
                        $data['flash_message'] = TRUE; 
                    }else{
                        $data['flash_message'] = FALSE;
                    }
                }else{
                    $file_root = $this->upload->data();
                    
                    $data_to_store = array('school_name' => $this->input->post('school_name'),
                                           'school_address' => $this->input->post('school_address'),
                                           'school_phone1' => $this->input->post('school_phone1'),
                                           'school_phone2' => $this->input->post('school_phone2'),
                                           'school_fax' => $this->input->post('school_fax'),
                                           'school_email' => $this->input->post('school_email'),
                                           'school_website' => $this->input->post('school_website'),
                                           'school_logo' => '/sms'.substr($config['upload_path'],1).$file_root['file_name'],
                                           'school_description' => $this->input->post('school_description'));
                    
                    //if the insert has returned true then we show the flash message
                    if($this->school_model->update($id, $data_to_store) == TRUE)
                    {
                        $data['flash_message'] = TRUE; 
                    }else{
                        $data['flash_message'] = FALSE;
                    }
                }
            }//validation run

        } 
        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        //product data 
        $data['result'] = $this->school_model->get_by_id($id);
        //load the view
        $data['main_content'] = 'admin/school/edit';
        $this->load->view('includes/template', $data);            

    }//update   

    public function delete()
    {
        $id = $this->uri->segment(4);
        $this->school_model->delete($id);
        redirect('admin/school');
    }//delete

}                 
                    