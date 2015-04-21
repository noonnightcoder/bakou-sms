 <?php
class Admin_subjects extends CI_Controller {

    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('subjects_model');

        if(!$this->session->userdata('is_logged_in')){
            redirect('admin/login');
        }
    }

    public function index()
    {
        $class_id = $this->uri->segment(3);
        //all the posts sent by the view
        $search = $this->input->post('search');        
        $data['search'] = $search;

        //fetch sql data into arrays
        $data['counts']= $this->subjects_model->count_all($search, $class_id);
        $data['result'] = $this->subjects_model->get_all($search, $class_id);         

        //load the view
        $data['main_content'] = 'admin/subjects/list';
        $this->load->view('includes/template', $data);  

    }//index

    public function add()
    {
        $class_id = $this->uri->segment(4);
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            $this->form_validation->set_rules('subject_name', 'subject_name', 'required');
            $this->form_validation->set_rules('subject_description', 'subject_description', '');
            $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array('subject_name' => $this->input->post('subject_name'),
                                       'subject_description' => $this->input->post('subject_description'),
                                       'class_id' => $class_id);
                //if the insert has returned true then we show the flash message
                if($this->subjects_model->store_data($data_to_store))
                {
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }
            }
        }
        //load the view
        $data['main_content'] = 'admin/subjects/add';
        $this->load->view('includes/template', $data);  
    }

    public function update()
    {
        $department_id = $this->uri->segment(4);
        $id = $this->uri->segment(5);

        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            $this->form_validation->set_rules('subject_name', 'subject_name', 'required');
            $this->form_validation->set_rules('subject_description', 'subject_description', '');
            $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array('subject_name' => $this->input->post('subject_name'),
                                       'subject_description' => $this->input->post('subject_description'));
                //if the insert has returned true then we show the flash message
                if($this->subjects_model->update($id, $data_to_store) == TRUE)
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
        $data['result'] = $this->subjects_model->get_by_id($id);
        //load the view
        $data['main_content'] = 'admin/subjects/edit';
        $this->load->view('includes/template', $data);            

    }//update   

    public function delete()
    {
        $class_id = $this->uri->segment(4);
        $id = $this->uri->segment(5);
        $this->subjects_model->delete($id);
        redirect('admin/subjects/'.$class_id);
    }//delete


}                 
                    