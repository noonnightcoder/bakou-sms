 <?php
class Admin_classrooms extends CI_Controller {

    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('classrooms_model');
        $this->load->model('classroom_types_model');

        if(!$this->session->userdata('is_logged_in')){
            redirect('admin/login');
        }
    }

    public function index()
    {
        $building_id = $this->uri->segment(3);
        //all the posts sent by the view
        $search = $this->input->post('search');        
        $data['search'] = $search;

        //fetch sql data into arrays
        $data['counts']= $this->classrooms_model->count_all($search, $building_id);
        $data['result'] = $this->classrooms_model->get_all($search, $building_id);        
        
        //load the view
        $data['main_content'] = 'admin/classrooms/list';
        $this->load->view('includes/template', $data);  

    }//index

    public function add()
    {
        $building_id = $this->uri->segment(4);
        $data['classroom_types'] = $this->classroom_types_model->get_all();
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            $this->form_validation->set_rules('classroom_type_id', 'classroom_type_id', 'required');
            $this->form_validation->set_rules('classroom_name', 'classroom_name', 'required');
            $this->form_validation->set_rules('number_of_student', 'number_of_student', 'required');
            $this->form_validation->set_rules('classroom_description', 'classroom_description', '');
            $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array('building_id' => $building_id,
                                       'classroom_type_id' => $this->input->post('classroom_type_id'),
                                       'classroom_name' => $this->input->post('classroom_name'),
                                       'number_of_student' => $this->input->post('number_of_student'),
                                       'classroom_description' => $this->input->post('classroom_description'));
                //if the insert has returned true then we show the flash message
                if($this->classrooms_model->store_data($data_to_store))
                {
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }
            }
        }
        //load the view
        $data['main_content'] = 'admin/classrooms/add';
        $this->load->view('includes/template', $data);  
    }

    public function update()
    {
        $building_id = $this->uri->segment(4);
        $id = $this->uri->segment(5);
        $data['classroom_types'] = $this->classroom_types_model->get_all();
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            $this->form_validation->set_rules('classroom_type_id', 'classroom_type_id', 'required');
            $this->form_validation->set_rules('classroom_name', 'classroom_name', 'required');
            $this->form_validation->set_rules('number_of_student', 'number_of_student', 'required');
            $this->form_validation->set_rules('classroom_description', 'classroom_description', '');
            $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array('classroom_type_id' => $this->input->post('classroom_type_id'),
                                       'classroom_name' => $this->input->post('classroom_name'),
                                       'number_of_student' => $this->input->post('number_of_student'),
                                       'classroom_description' => $this->input->post('classroom_description'));
                //if the insert has returned true then we show the flash message
                if($this->classrooms_model->update($id, $data_to_store) == TRUE)
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
        $data['result'] = $this->classrooms_model->get_by_id($id);
        //load the view
        $data['main_content'] = 'admin/classrooms/edit';
        $this->load->view('includes/template', $data);            

    }//update   

    public function delete()
    {
        $building_id = $this->uri->segment(4);
        $id = $this->uri->segment(5);
        //$this->classrooms_model->delete($id);
        $data_to_store = array('status' => 0);
        //if the insert has returned true then we show the flash message
        if($this->classrooms_model->update($id, $data_to_store) == TRUE)
        {
            redirect('admin/classrooms/'.$building_id); 
        } 
    }//delete


}                 
                    