 <?php
class Admin_vehicles extends CI_Controller {

    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('vehicles_model');
        $this->load->model('students_model');

        if(!$this->session->userdata('is_logged_in')){
            redirect('admin/login');
        }
    }

    public function index()
    {
        $transport_id = $this->uri->segment(3);
        //all the posts sent by the view
        $search = $this->input->post('search');        
        $data['search'] = $search;

        //fetch sql data into arrays
        $data['counts']= $this->vehicles_model->count_all($search, $transport_id);
        $data['result'] = $this->vehicles_model->get_all($search, $transport_id);         

        //load the view
        $data['main_content'] = 'admin/vehicles/list';
        $this->load->view('includes/template', $data);  

    }//index

    public function add()
    {
        $transport_id = $this->uri->segment(4);
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            $this->form_validation->set_rules('vehicle_brand', 'vehicle_brand', 'required');
            $this->form_validation->set_rules('vehicle_identity_number', 'vehicle_identity_number', 'required');
            $this->form_validation->set_rules('vehicle_capacity', 'vehicle_capacity', 'numeric');
            $this->form_validation->set_rules('driver_name', 'driver_name', 'required');
            $this->form_validation->set_rules('driver_contact', 'driver_contact', 'numeric');
            $this->form_validation->set_rules('vehicle_description', 'vehicle_description', '');
            $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array('vehicle_brand' => $this->input->post('vehicle_brand'),
                                       'vehicle_identity_number' => $this->input->post('vehicle_identity_number'),
                                       'vehicle_capacity' => $this->input->post('vehicle_capacity'),
                                       'driver_name' => $this->input->post('driver_name'),
                                       'driver_contact' => $this->input->post('driver_contact'),
                                       'vehicle_description' => $this->input->post('vehicle_description'),
                                       'transport_id' => $transport_id);
                //if the insert has returned true then we show the flash message
                if($this->vehicles_model->store_data($data_to_store))
                {
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }
            }
        }
        //load the view
        $data['main_content'] = 'admin/vehicles/add';
        $this->load->view('includes/template', $data);  
    }

    public function update()
    {
        $transport_id = $this->uri->segment(4);
        $id = $this->uri->segment(5);

        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            $this->form_validation->set_rules('vehicle_brand', 'vehicle_brand', 'required');
            $this->form_validation->set_rules('vehicle_identity_number', 'vehicle_identity_number', 'required');
            $this->form_validation->set_rules('vehicle_capacity', 'vehicle_capacity', 'numeric');
            $this->form_validation->set_rules('driver_name', 'driver_name', 'required');
            $this->form_validation->set_rules('driver_contact', 'driver_contact', 'numeric');
            $this->form_validation->set_rules('vehicle_description', 'vehicle_description', '');
            $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {

                $data_to_store = array('vehicle_brand' => $this->input->post('vehicle_brand'),
                                       'vehicle_identity_number' => $this->input->post('vehicle_identity_number'),
                                       'vehicle_capacity' => $this->input->post('vehicle_capacity'),
                                       'driver_name' => $this->input->post('driver_name'),
                                       'driver_contact' => $this->input->post('driver_contact'),
                                       'vehicle_description' => $this->input->post('vehicle_description'),
                                       'modified_date' => date('Y-m-d H:i:s'));
                //if the insert has returned true then we show the flash message
                if($this->vehicles_model->update($id, $data_to_store) == TRUE)
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
        $data['result'] = $this->vehicles_model->get_by_id($id);
        //load the view
        $data['main_content'] = 'admin/vehicles/edit';
        $this->load->view('includes/template', $data);            

    }//update   

    public function delete()
    {
        $vehicle_id = $this->uri->segment(4);
        $id = $this->uri->segment(5);
        //$this->vehicles_model->delete($id);
        $data_to_store = array('status' => 0);
        //if the insert has returned true then we show the flash message
        if($this->vehicles_model->update($id, $data_to_store) == TRUE)
        {
            redirect('admin/vehicles/'.$vehicle_id); 
        }
    }//delete

    public function detail()
    {
        $transport_id = $this->uri->segment(4);
        $id = $this->uri->segment(5);
        
        $data['students'] = $this->students_model->get_all();

        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            $this->form_validation->set_rules('student_id', 'student_id', 'required');
            $this->form_validation->set_rules('vehicle_id', 'vehicle_id', '');
            $this->form_validation->set_rules('amount', 'amount', 'required|numeric');
            $this->form_validation->set_rules('effective_from', 'effective_from', 'required');
            $this->form_validation->set_rules('effective_end', 'effective_end', 'required');
            $this->form_validation->set_rules('student_vehicle_description', 'student_vehicle_description', '');
            $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array('student_id' => $this->input->post('student_id'),
                                       'amount' => $this->input->post('amount'),
                                       'effective_from' => $this->input->post('effective_from'),
                                       'effective_end' => $this->input->post('effective_end'),
                                       'student_vehicle_description' => $this->input->post('student_vehicle_description'));
                //if the insert has returned true then we show the flash message
                //if($this->books_model->store_membership($data_to_store))
                if($this->vehicles_model->add_membership($this->input->post('student_id'), $id, $this->input->post('amount'),
                                                      $this->input->post('effective_from'), $this->input->post('effective_end'),
                                                      $this->input->post('student_vehicle_description')))
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
        $data['result'] = $this->vehicles_model->get_by_id($id);
        //membership
        $data['memberships'] = $this->vehicles_model->get_all_memberships($id);
        //load the view
        $data['main_content'] = 'admin/vehicles/detail';
        $this->load->view('includes/template', $data);            

    }//update
    
    public function update_membership()
    {
        $transport_id = $this->uri->segment(4);
        $vehicle_id = $this->uri->segment(5);
        $id = $this->uri->segment(6);
        
        $data['students'] = $this->students_model->get_all();

        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            $this->form_validation->set_rules('student_id', 'student_id', 'required');
            $this->form_validation->set_rules('vehicle_id', 'vehicle_id', '');
            $this->form_validation->set_rules('amount', 'amount', 'required|numeric');
            $this->form_validation->set_rules('effective_from', 'effective_from', 'required');
            $this->form_validation->set_rules('effective_end', 'effective_end', 'required');
            $this->form_validation->set_rules('student_vehicle_description', 'student_vehicle_description', '');
            $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array('student_id' => $this->input->post('student_id'),
                                       'amount' => $this->input->post('amount'),
                                       'effective_from' => $this->input->post('effective_from'),
                                       'effective_end' => $this->input->post('effective_end'),
                                       'student_vehicle_description' => $this->input->post('student_vehicle_description'));
                //if the insert has returned true then we show the flash message
                //if($this->books_model->store_membership($data_to_store))
                if($this->vehicles_model->update_membership($id, $data_to_store) == TRUE)
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
        $data['result'] = $this->vehicles_model->get_by_id($vehicle_id);
        //membership
        $data['memberships'] = $this->vehicles_model->get_all_memberships($vehicle_id);
        $data['member'] = $this->vehicles_model->get_membership($id);
        //load the view
        $data['main_content'] = 'admin/vehicles/update_membership';
        $this->load->view('includes/template', $data);            

    }//update
    
    public function delete_membership()
    {
        $id = $this->uri->segment(6);
        //$this->books_model->delete($id);
        $data_to_store = array('status' => 0);
        //if the insert has returned true then we show the flash message
        if($this->vehicles_model->update_membership($id, $data_to_store) == TRUE)
        {
            redirect('admin/vehicles/detail/'.$this->uri->segment(4).'/'.$this->uri->segment(5));
        }
    }//delete
    
    public function detail_membership()
    {
        $transport_id = $this->uri->segment(4);
        $vehicle_id = $this->uri->segment(5);
        $id = $this->uri->segment(6);
        //product data 
        
        $data['result'] = $this->vehicles_model->get_membership($id);
        $membership = $data['result'];
        $data['student'] = $this->students_model->get_by_id($membership['student_id']);
        
        //load the view
        $data['main_content'] = 'admin/vehicles/detail_membership';
        $this->load->view('includes/template', $data);  
    }
    
    
}                 
                    