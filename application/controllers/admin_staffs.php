 <?php
class Admin_staffs extends CI_Controller {

    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('staffs_model');
        $this->load->model('positions_model');

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

        $config['base_url'] = base_url().'index.php/admin/staffs';
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
        $data['counts']= $this->staffs_model->count_all();
        $data['result'] = $this->staffs_model->get_all($search, $config['per_page'], $limit_end);        
        $config['total_rows'] = $data['counts'];

        //initializate the panination helper 
        $this->pagination->initialize($config);   

        //load the view
        $data['main_content'] = 'admin/staffs/list';
        $this->load->view('includes/template', $data);  

    }//index

    public function add()
    {
        $data['positions'] = $this->positions_model->get_all();
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            $this->form_validation->set_rules('position_id', 'position_id', 'required');
            $this->form_validation->set_rules('fullname', 'fullname', 'required');
            $this->form_validation->set_rules('fullname_in_khmer', 'fullname_in_khmer', 'required');
            $this->form_validation->set_rules('birthday', 'birthday', '');
            $this->form_validation->set_rules('sex', 'sex', '');
            $this->form_validation->set_rules('phone1', 'phone1', 'required');
            $this->form_validation->set_rules('phone2', 'phone2', '');
            $this->form_validation->set_rules('email', 'email', '');
            $this->form_validation->set_rules('staff_description', 'staff_description', '');
            $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array('position_id' => $this->input->post('position_id'),
                                       'fullname' => $this->input->post('fullname'),
                                       'fullname_in_khmer' => $this->input->post('fullname_in_khmer'),
                                       'birthday' => $this->input->post('birthday'),
                                       'sex' => $this->input->post('sex'),
                                       'phone1' => $this->input->post('phone1'),
                                       'phone2' => $this->input->post('phone2'),
                                       'email' => $this->input->post('email'),
                                       'staff_description' => $this->input->post('staff_description'),);
                //if the insert has returned true then we show the flash message
                if($this->staffs_model->store_data($data_to_store))
                {
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }
            }
        }
        //load the view
        $data['main_content'] = 'admin/staffs/add';
        $this->load->view('includes/template', $data);  
    }

    public function update()
    {
        $id = $this->uri->segment(4);
        $data['positions'] = $this->positions_model->get_all();
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            $this->form_validation->set_rules('position_id', 'position_id', 'required');
            $this->form_validation->set_rules('fullname', 'fullname', 'required');
            $this->form_validation->set_rules('fullname_in_khmer', 'fullname_in_khmer', 'required');
            $this->form_validation->set_rules('birthday', 'birthday', '');
            $this->form_validation->set_rules('sex', 'sex', '');
            $this->form_validation->set_rules('phone1', 'phone1', 'required');
            $this->form_validation->set_rules('phone2', 'phone2', '');
            $this->form_validation->set_rules('email', 'email', '');
            $this->form_validation->set_rules('staff_description', 'staff_description', '');
            $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array('position_id' => $this->input->post('position_id'),
                                       'fullname' => $this->input->post('fullname'),
                                       'fullname_in_khmer' => $this->input->post('fullname_in_khmer'),
                                       'birthday' => $this->input->post('birthday'),
                                       'sex' => $this->input->post('sex'),
                                       'phone1' => $this->input->post('phone1'),
                                       'phone2' => $this->input->post('phone2'),
                                       'email' => $this->input->post('email'),
                                       'staff_description' => $this->input->post('staff_description'),);
                //if the insert has returned true then we show the flash message
                if($this->staffs_model->update($id, $data_to_store) == TRUE)
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
        $data['result'] = $this->staffs_model->get_by_id($id);
        //load the view
        $data['main_content'] = 'admin/staffs/edit';
        $this->load->view('includes/template', $data);            

    }//update   

    public function delete()
    {
        $id = $this->uri->segment(4);
        //$this->staffs_model->delete($id);
        $data_to_store = array('status' => 0);
        //if the insert has returned true then we show the flash message
        if($this->staffs_model->update($id, $data_to_store) == TRUE)
        {
            redirect('admin/staffs'); 
        }
    }//delete


}                 
                    