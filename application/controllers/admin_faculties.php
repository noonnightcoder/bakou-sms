 <?php
class Admin_faculties extends CI_Controller {

    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('faculties_model');

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

        $config['base_url'] = base_url().'index.php/admin/faculties';
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
        $data['counts']= $this->faculties_model->count_all();
        $data['result'] = $this->faculties_model->get_all($search, $config['per_page'], $limit_end);        
        $config['total_rows'] = $data['counts'];


        //initializate the panination helper 
        $this->pagination->initialize($config);   

        //load the view
        $data['main_content'] = 'admin/faculties/list';
        $this->load->view('includes/template', $data);  

    }//index

    public function add()
    {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            $this->form_validation->set_rules('faculty_name', 'faculty_name', 'required');
            $this->form_validation->set_rules('faculty_phone1', 'faculty_phone1', '');
            $this->form_validation->set_rules('faculty_phone2', 'faculty_phone2', '');
            $this->form_validation->set_rules('faculty_fax', 'faculty_fax', '');
            $this->form_validation->set_rules('faculty_description', 'faculty_description', '');
            $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array('faculty_name' => $this->input->post('faculty_name'),
                                       'faculty_phone1' => $this->input->post('faculty_phone1'),
                                       'faculty_phone2' => $this->input->post('faculty_phone2'),
                                       'faculty_fax' => $this->input->post('faculty_fax'),
                                       'faculty_description' => $this->input->post('faculty_description'),
                                       'school_id' => 1);
                //if the insert has returned true then we show the flash message
                if($this->faculties_model->store_data($data_to_store))
                {
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }

            }

        }
        //load the view
        $data['main_content'] = 'admin/faculties/add';
        $this->load->view('includes/template', $data);  
    }

    public function update()
    {
        $id = $this->uri->segment(4);

        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            $this->form_validation->set_rules('faculty_name', 'faculty_name', 'required');
            $this->form_validation->set_rules('faculty_phone1', 'faculty_phone1', '');
            $this->form_validation->set_rules('faculty_phone2', 'faculty_phone2', '');
            $this->form_validation->set_rules('faculty_fax', 'faculty_fax', '');
            $this->form_validation->set_rules('faculty_description', 'faculty_description', '');
            $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {

                $data_to_store = array('faculty_name' => $this->input->post('faculty_name'),
                                       'faculty_phone1' => $this->input->post('faculty_phone1'),
                                       'faculty_phone2' => $this->input->post('faculty_phone2'),
                                       'faculty_fax' => $this->input->post('faculty_fax'),
                                       'faculty_description' => $this->input->post('faculty_description'),
                                       'modified_date' => date('Y-m-d H:i:s'));
                //if the insert has returned true then we show the flash message
                if($this->faculties_model->update($id, $data_to_store) == TRUE)
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
        $data['result'] = $this->faculties_model->get_by_id($id);
        //load the view
        $data['main_content'] = 'admin/faculties/edit';
        $this->load->view('includes/template', $data);            

    }//update   

    public function delete()
    {
        $id = $this->uri->segment(4);
        //$this->faculties_model->delete($id);
        $data_to_store = array('status' => 0);
        //if the insert has returned true then we show the flash message
        if($this->faculties_model->update($id, $data_to_store) == TRUE)
        {
            redirect('admin/faculties'); 
        }
        
    }//delete


}                 
                    