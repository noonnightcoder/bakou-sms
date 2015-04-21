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
            $this->form_validation->set_rules('driver_contact', 'driver_contact', '');
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
            $this->form_validation->set_rules('driver_contact', 'driver_contact', '');
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
                                       'vehicle_description' => $this->input->post('vehicle_description'));
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
        $this->vehicles_model->delete($id);
        redirect('admin/vehicles/'.$vehicle_id);
    }//delete


}                 
                    