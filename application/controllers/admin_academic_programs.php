 <?php
class Admin_academic_programs extends CI_Controller {

    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('academic_programs_model');
        $this->load->model('classes_model');
        $this->load->model('subjects_model');
        $this->load->model('staffs_model');

        if(!$this->session->userdata('is_logged_in')){
            redirect('admin/login');
        }
    }

    public function index()
    {
        $academic_id = $this->uri->segment(3);
        //all the posts sent by the view
        $search = $this->input->post('search');        
        $data['search'] = $search;

        //fetch sql data into arrays
        $data['counts']= $this->academic_programs_model->count_all($search, $academic_id);
        $data['result'] = $this->academic_programs_model->get_all($search, $academic_id);        
        $config['total_rows'] = $data['counts'];   

        //load the view
        $data['main_content'] = 'admin/academic_programs/list';
        $this->load->view('includes/template', $data);  
    }//index

    public function add()
    {
        $academic_id = $this->uri->segment(4);
        // find classes
        $data['classes'] = $this->classes_model->get_all_classes();
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            $this->form_validation->set_rules('class_id', 'class_id', 'required');
            $this->form_validation->set_rules('start_date', 'start_date', 'required');
            $this->form_validation->set_rules('end_date', 'end_date', 'required');
            $this->form_validation->set_rules('academic_program_description', 'academic_program_description', '');
            $this->form_validation->set_rules('number_of_semester', 'number_of_semester', 'required|numeric');
            $this->form_validation->set_rules('price_per_semester', 'price_per_semester', 'required|numeric');
            $this->form_validation->set_rules('number_of_term', 'number_of_term', 'required|numeric');
            $this->form_validation->set_rules('price_per_term', 'price_per_term', 'required|numeric');
            $this->form_validation->set_rules('number_of_month', 'number_of_month', '');
            $this->form_validation->set_rules('price_per_month', 'price_per_month', '');
            $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array('start_date' => $this->input->post('start_date'),
                                       'end_date' => $this->input->post('end_date'),
                                       'academic_program_description' => $this->input->post('academic_program_description'),
                                       'number_of_semester' => $this->input->post('number_of_semester'),
                                       'price_per_semester' => $this->input->post('price_per_semester'),
                                       'number_of_term' => $this->input->post('number_of_term'),
                                       'price_per_term' => $this->input->post('price_per_term'),
                                       'number_of_month' => $this->input->post('number_of_month'),
                                       'price_per_month' => $this->input->post('price_per_month'),
                                       'class_id' => $this->input->post('class_id'),
                                       'academic_id' => $academic_id);
                //if the insert has returned true then we show the flash message
                if($this->academic_programs_model->store_data($data_to_store))
                {
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }

            }

        }
        //load the view
        $data['main_content'] = 'admin/academic_programs/add';
        $this->load->view('includes/template', $data);  
    }

    public function update()
    {
        $academic_id = $this->uri->segment(4);
        $id = $this->uri->segment(5);
        // find classes
        $data['classes'] = $this->classes_model->get_all_classes();
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            $this->form_validation->set_rules('class_id', 'class_id', 'required');
            $this->form_validation->set_rules('start_date', 'start_date', 'required');
            $this->form_validation->set_rules('end_date', 'end_date', 'required');
            $this->form_validation->set_rules('academic_program_description', 'academic_program_description', '');
            $this->form_validation->set_rules('number_of_semester', 'number_of_semester', 'required|numeric');
            $this->form_validation->set_rules('price_per_semester', 'price_per_semester', 'required|numeric');
            $this->form_validation->set_rules('number_of_term', 'number_of_term', 'required|numeric');
            $this->form_validation->set_rules('price_per_term', 'price_per_term', 'required|numeric');
            $this->form_validation->set_rules('number_of_month', 'number_of_month', '');
            $this->form_validation->set_rules('price_per_month', 'price_per_month', '');
            $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array('start_date' => $this->input->post('start_date'),
                                       'end_date' => $this->input->post('end_date'),
                                       'academic_program_description' => $this->input->post('academic_program_description'),
                                       'number_of_semester' => $this->input->post('number_of_semester'),
                                       'price_per_semester' => $this->input->post('price_per_semester'),
                                       'number_of_term' => $this->input->post('number_of_term'),
                                       'price_per_term' => $this->input->post('price_per_term'),
                                       'number_of_month' => $this->input->post('number_of_month'),
                                       'price_per_month' => $this->input->post('price_per_month'),
                                       'class_id' => $this->input->post('class_id'));
                //if the insert has returned true then we show the flash message
                if($this->academic_programs_model->update($id, $data_to_store) == TRUE)
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
        $data['result'] = $this->academic_programs_model->get_by_id($id);
        //load the view
        $data['main_content'] = 'admin/academic_programs/edit';
        $this->load->view('includes/template', $data);            

    }//update
    
    public function detail()
    {
        $academic_id = $this->uri->segment(4);
        $id = $this->uri->segment(5);
        //academic program data 
        $data['result'] = $this->academic_programs_model->get_by_id($id);
        $academic_program = $data['result'];
        
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            $this->form_validation->set_rules('subject_id', 'subject_id', 'required');
            $this->form_validation->set_rules('taught_by', 'taught_by', 'required');
            $this->form_validation->set_rules('number_of_session', 'number_of_session', '');
            //$this->form_validation->set_rules('time_start', 'time_start', 'required');
            //$this->form_validation->set_rules('time_end', 'time_end', 'required');
            //$this->form_validation->set_rules('day', 'day', 'required');
            $this->form_validation->set_rules('academic_program_subject_description', 'academic_program_subject_description', '');
            $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {

                $data_to_store = array('subject_id' => $this->input->post('subject_id'),
                                       'taught_by' => $this->input->post('taught_by'),
                                       'number_of_session' => $this->input->post('number_of_session'),
                                       'monday' => $this->input->post('monday'),
                                       'monday_time_start' => $this->input->post('mon_hour1').':'.$this->input->post('mon_minute1'),
                                       'monday_time_end' => $this->input->post('mon_hour2').':'.$this->input->post('mon_minute2'),
                                       'tuesday' => $this->input->post('tuesday'),
                                       'tuesday_time_start' => $this->input->post('tue_hour1').':'.$this->input->post('tue_minute1'),
                                       'tuesday_time_end' => $this->input->post('tue_hour2').':'.$this->input->post('tue_minute2'),
                                       'wednesday' => $this->input->post('wednesday'),
                                       'wednesday_time_start' => $this->input->post('wed_hour1').':'.$this->input->post('wed_minute1'),
                                       'wednesday_time_end' => $this->input->post('wed_hour2').':'.$this->input->post('wed_minute2'),
                                       'thursday' => $this->input->post('thursday'),
                                       'thursday_time_start' => $this->input->post('thu_hour1').':'.$this->input->post('thu_minute1'),
                                       'thursday_time_end' => $this->input->post('thu_hour2').':'.$this->input->post('thu_minute2'),
                                       'friday' => $this->input->post('friday'),
                                       'friday_time_start' => $this->input->post('fri_hour1').':'.$this->input->post('fri_minute1'),
                                       'friday_time_end' => $this->input->post('fri_hour2').':'.$this->input->post('fri_minute2'),
                                       'saturday' => $this->input->post('saturday'),
                                       'saturday_time_start' => $this->input->post('sat_hour1').':'.$this->input->post('sat_minute1'),
                                       'saturday_time_end' => $this->input->post('sat_hour2').':'.$this->input->post('sat_minute2'),
                                       'sunday' => $this->input->post('sunday'),
                                       'sunday_time_start' => $this->input->post('sun_hour1').':'.$this->input->post('sun_minute1'),
                                       'sunday_time_end' => $this->input->post('sun_hour2').':'.$this->input->post('sun_minute2'),
                                       'academic_program_subject_description' => $this->input->post('academic_program_subject_description'),
                                       'academic_program_id' => $id);
                //if the insert has returned true then we show the flash message
                if($this->academic_programs_model->store_aca_pro_sub_data($data_to_store) == TRUE)
                {
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE;
                }

            }//validation run

        } 
        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data
        // find classes
        $data['classes'] = $this->classes_model->get_all_classes();
        // find subject
        $data['subjects'] = $this->subjects_model->get_all('', $academic_program['class_id']);
        // find subject related to this academic program
        $data['all_subjects'] = $this->academic_programs_model->get_all_subjects($id);
        // find staffs
        $data['staffs'] = $this->staffs_model->get_all();
        // find subjects
        $data['sunday_subjects'] = $this->academic_programs_model->get_all_aca_pro_subs($id, 'sunday');
        $data['monday_subjects'] = $this->academic_programs_model->get_all_aca_pro_subs($id, 'monday');
        $data['tuesday_subjects'] = $this->academic_programs_model->get_all_aca_pro_subs($id, 'tuesday');
        $data['wednesday_subjects'] = $this->academic_programs_model->get_all_aca_pro_subs($id, 'wednesday');
        $data['thursday_subjects'] = $this->academic_programs_model->get_all_aca_pro_subs($id, 'thursday');
        $data['friday_subjects'] = $this->academic_programs_model->get_all_aca_pro_subs($id, 'friday');
        $data['saturday_subjects'] = $this->academic_programs_model->get_all_aca_pro_subs($id, 'saturday');
        //load the view
        $data['main_content'] = 'admin/academic_programs/detail';
        $this->load->view('includes/template', $data);            

    }//update

    public function delete_subject()
    {
        $academic_id = $this->uri->segment(4);
        $academic_program_id = $this->uri->segment(5);
        $id = $this->uri->segment(6);
        //$this->academic_programs_model->delete_subject($id);
        $data_to_store = array('status' => 0);
        if($this->academic_programs_model->update_subject($id, $data_to_store) == TRUE)
        {
            redirect('admin/academic_programs/detail/'.$academic_id.'/'.$academic_program_id); 
        }
    }//delete
    
    
    public function delete()
    {
        $academic_id = $this->uri->segment(4);
        $id = $this->uri->segment(5);
        $data_to_store = array('status' => 0);
        //if the insert has returned true then we show the flash message
        if($this->academic_programs_model->update($id, $data_to_store) == TRUE)
        {
            redirect('admin/academic_programs/'.$academic_id); 
        }
        //$this->academic_programs_model->delete($id);
    }//delete


}                 
                    