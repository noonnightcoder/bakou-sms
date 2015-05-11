 <?php
class Admin_departments extends CI_Controller {

    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('departments_model');

        if(!$this->session->userdata('is_logged_in')){
            redirect('admin/login');
        }
    }

    public function index()
    {
        $faculty_id = $this->uri->segment(3);
        //all the posts sent by the view
        $search = $this->input->post('search');        
        $data['search'] = $search;

        //fetch sql data into arrays
        $data['counts']= $this->departments_model->count_all($search, $faculty_id);
        $data['result'] = $this->departments_model->get_all($search, $faculty_id);        

        //load the view
        $data['main_content'] = 'admin/departments/list';
        $this->load->view('includes/template', $data);  

    }//index

    public function add()
    {
        $faculty_id = $this->uri->segment(4);
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            $this->form_validation->set_rules('department_name', 'department_name', 'required');
            $this->form_validation->set_rules('department_phone1', 'department_phone1', '');
            $this->form_validation->set_rules('department_phone2', 'department_phone2', '');
            $this->form_validation->set_rules('department_fax', 'department_fax', '');
            $this->form_validation->set_rules('department_description', 'department_description', '');
            $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array('department_name' => $this->input->post('department_name'),
                                       'department_phone1' => $this->input->post('department_phone1'),
                                       'department_phone2' => $this->input->post('department_phone2'),
                                       'department_fax' => $this->input->post('department_fax'),
                                       'department_description' => $this->input->post('department_description'),
                                       'faculty_id' => $faculty_id);
                //if the insert has returned true then we show the flash message
                if($this->departments_model->store_data($data_to_store))
                {
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }
            }
        }
        //load the view
        $data['main_content'] = 'admin/departments/add';
        $this->load->view('includes/template', $data);  
    }

    public function update()
    {
        $faculty_id = $this->uri->segment(4);
        $id = $this->uri->segment(5);

        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            $this->form_validation->set_rules('department_name', 'department_name', 'required');
            $this->form_validation->set_rules('department_phone1', 'department_phone1', '');
            $this->form_validation->set_rules('department_phone2', 'department_phone2', '');
            $this->form_validation->set_rules('department_fax', 'department_fax', '');
            $this->form_validation->set_rules('department_description', 'department_description', '');
            $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array('department_name' => $this->input->post('department_name'),
                                       'department_phone1' => $this->input->post('department_phone1'),
                                       'department_phone2' => $this->input->post('department_phone2'),
                                       'department_fax' => $this->input->post('department_fax'),
                                       'department_description' => $this->input->post('department_description'),
                                       'modified_date' => date('Y-m-d H:i:s'));
                //if the insert has returned true then we show the flash message
                if($this->departments_model->update($id, $data_to_store) == TRUE)
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
        $data['result'] = $this->departments_model->get_by_id($id);
        //load the view
        $data['main_content'] = 'admin/departments/edit';
        $this->load->view('includes/template', $data);            

    }//update   

    public function delete()
    {
        $faculty_id = $this->uri->segment(4);
        $id = $this->uri->segment(5);
        //$this->departments_model->delete($id);
        $data_to_store = array('status' => 0);
        //if the insert has returned true then we show the flash message
        if($this->departments_model->update($id, $data_to_store) == TRUE)
        {
            redirect('admin/departments/'.$faculty_id); 
        }
        
    }//delete


}                 
                    