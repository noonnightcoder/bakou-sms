 <?php
class Admin_transports extends CI_Controller {

    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('transports_model');
        $this->load->model('students_model');
        $this->load->model('vehicles_model');
        $this->load->model('promotions_model');

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

        $config['base_url'] = base_url().'index.php/admin/transports';
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
        $data['counts']= $this->transports_model->count_all();
        $data['result'] = $this->transports_model->get_all($search, $config['per_page'], $limit_end);        
        $config['total_rows'] = $data['counts'];

        //initializate the panination helper 
        $this->pagination->initialize($config);   

        //load the view
        $data['main_content'] = 'admin/transports/list';
        $this->load->view('includes/template', $data);  

    }//index

    public function add()
    {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            $this->form_validation->set_rules('route_name', 'route_name', 'required');
            $this->form_validation->set_rules('route_fare', 'route_fare', 'required|numeric');
            $this->form_validation->set_rules('number_of_vehicle', 'number_of_vehicle', '');
            $this->form_validation->set_rules('transport_description', 'transport_description', '');
            $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array('route_name' => $this->input->post('route_name'),
                                       'route_fare' => $this->input->post('route_fare'),
                                       'number_of_vehicle' => $this->input->post('number_of_vehicle'),
                                       'transport_description' => $this->input->post('transport_description'));
                //if the insert has returned true then we show the flash message
                if($this->transports_model->store_data($data_to_store))
                {
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }

            }

        }
        //load the view
        $data['main_content'] = 'admin/transports/add';
        $this->load->view('includes/template', $data);  
    }

    public function update()
    {
        $id = $this->uri->segment(4);

        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            $this->form_validation->set_rules('route_name', 'route_name', 'required');
            $this->form_validation->set_rules('route_fare', 'route_fare', 'required|numeric');
            $this->form_validation->set_rules('number_of_vehicle', 'number_of_vehicle', '');
            $this->form_validation->set_rules('transport_description', 'transport_description', '');
            $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array('route_name' => $this->input->post('route_name'),
                                       'route_fare' => $this->input->post('route_fare'),
                                       'number_of_vehicle' => $this->input->post('number_of_vehicle'),
                                       'transport_description' => $this->input->post('transport_description'),
                                       'modified_date' => date('Y-m-d H:i:s'));
                //if the insert has returned true then we show the flash message
                if($this->transports_model->update($id, $data_to_store) == TRUE)
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
        $data['result'] = $this->transports_model->get_by_id($id);
        //load the view
        $data['main_content'] = 'admin/transports/edit';
        $this->load->view('includes/template', $data);            

    }//update   

    public function delete()
    {
        $id = $this->uri->segment(4);
        //$this->transports_model->delete($id);
        $data_to_store = array('status' => 0);
        //if the insert has returned true then we show the flash message
        if($this->transports_model->update($id, $data_to_store) == TRUE)
        {
            redirect('admin/transports'); 
        }
    }//delete
    
    public function memberships()
    {
        //all the posts sent by the view
        $search = $this->input->post('search');        
        $data['search'] = $search;
        
        //pagination settings
        $config['per_page'] = 10;

        $config['base_url'] = base_url().'index.php/admin/transport_memberships';
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
        $data['counts']= $this->transports_model->count_all_memberships($search);
        $data['result'] = $this->transports_model->get_all_memberships($search, $config['per_page'], $limit_end);        
        $config['total_rows'] = $data['counts'];

        //initializate the panination helper 
        $this->pagination->initialize($config);   

        //load the view
        $data['main_content'] = 'admin/transports/membership';
        $this->load->view('includes/template', $data);   

    }//index
    
    public function add_membership()
    {
        $data['students'] = $this->students_model->get_all();
        $data['transports'] = $this->transports_model->get_all();
        $data['promotion'] = $this->promotions_model->get_promotion_by_type('Transportation');
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            $this->form_validation->set_rules('student_id', 'student_id', 'required');
            $this->form_validation->set_rules('transport_id', 'transport_id', 'required');
            $this->form_validation->set_rules('vehicle_id', 'vehicle_id', 'required');
            $this->form_validation->set_rules('amount', 'amount', 'required|numeric');
            $this->form_validation->set_rules('payment_date', 'payment_date', 'required');
            $this->form_validation->set_rules('effective_from', 'effective_from', 'required');
            $this->form_validation->set_rules('effective_end', 'effective_end', 'required');
            $this->form_validation->set_rules('student_vehicle_description', 'student_vehicle_description', '');
            $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');

            $transport_id = $this->input->post('transport_id');
            if($transport_id)
            {    
                $data['vehicles'] = $this->vehicles_model->get_all('', $transport_id);
            }
            
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $p_dis_per = ($this->input->post('discount_percentage')) ? $this->input->post('discount_percentage') : 0;
                $p_dis_amt = ($this->input->post('discount_amount')) ? $this->input->post('discount_amount') : 0;
                $student_id = $this->input->post('student_id');
                
                foreach($student_id as $s_id)
                {
                    if($this->vehicles_model->add_membership($s_id, $this->input->post('vehicle_id'), 
                                                             $this->input->post('amount'), $this->input->post('effective_from'), 
                                                             $this->input->post('effective_end'), $this->input->post('student_vehicle_description'),
                                                             $p_dis_per, $p_dis_amt, $this->input->post('payment_date')))
                    {
                        // do nothing 
                    }else{
                        $data['flash_message'] = FALSE; 
                    }
                }
                $data['flash_message'] = TRUE;
            }

        }
        //load the view
        $data['main_content'] = 'admin/transports/add_membership';
        $this->load->view('includes/template', $data);  
    }
    
    public function update_membership()
    {
        $id = $this->uri->segment(4);
        $data['students'] = $this->students_model->get_all();
        $data['transports'] = $this->transports_model->get_all();
        $data['result'] = $this->vehicles_model->get_membership($id);
        $result = $data['result'];
        $data['vehicles'] = $this->vehicles_model->get_all('', $result['transport_id']);
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            $this->form_validation->set_rules('transport_id', 'transport_id', 'required');
            $this->form_validation->set_rules('vehicle_id', 'vehicle_id', 'required');
            $this->form_validation->set_rules('payment_date', 'payment_date', 'required');
            $this->form_validation->set_rules('effective_from', 'effective_from', 'required');
            $this->form_validation->set_rules('effective_end', 'effective_end', 'required');
            $this->form_validation->set_rules('student_vehicle_description', 'student_vehicle_description', '');
            $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');

            $transport_id = $this->input->post('transport_id');
            if($transport_id)
            {    
                $data['vehicles'] = $this->vehicles_model->get_all('', $transport_id); 
            }
            
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array('vehicle_id' => $this->input->post('vehicle_id'),
                                       'payment_date' => $this->input->post('payment_date'),
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
            }

        }
        
        //load the view
        $data['main_content'] = 'admin/transports/update_membership';
        $this->load->view('includes/template', $data);  
    }
    
    public function detail_membership()
    {
        $id = $this->uri->segment(4);
        //product data 
        
        $data['result'] = $this->vehicles_model->get_membership($id);
        $membership = $data['result'];
        $data['student'] = $this->students_model->get_by_id($membership['student_id']);
        
        //load the view
        $data['main_content'] = 'admin/transports/detail_membership';
        $this->load->view('includes/template', $data);  
    }
    
    public function delete_membership()
    {
        $id = $this->uri->segment(4);
        //$this->books_model->delete($id);
        $data_to_store = array('status' => 0);
        //if the insert has returned true then we show the flash message
        if($this->vehicles_model->update_membership($id, $data_to_store) == TRUE)
        {
            redirect('admin/transport_memberships');
        }
    }//delete


}                 
                    