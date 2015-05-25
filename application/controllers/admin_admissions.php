<?php
class Admin_admissions extends CI_Controller {

    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('students_model');
        $this->load->model('academic_programs_model');
        $this->load->model('books_model');
        $this->load->model('subjects_model');
        $this->load->model('transports_model');
        $this->load->model('vehicles_model');
        $this->load->model('parents_model');
        $this->load->model('services_model');
        $this->load->model('promotions_model');
        $this->load->model('student_types_model');

        if(!$this->session->userdata('is_logged_in')){
            redirect('admin/login');
        }
    }

    public function step1()
    {
        // have to find student type
        $data['student_types'] = $this->student_types_model->get_all();
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            $this->form_validation->set_rules('student_type_id', 'student_type_id', 'required');
            $this->form_validation->set_rules('student_id_number', 'student_id_number', '');
            $this->form_validation->set_rules('fullname', 'fullname', 'required');
            $this->form_validation->set_rules('fullname_in_khmer', 'fullname_in_khmer', 'required');
            $this->form_validation->set_rules('registered_date', 'registered_date', 'required');
            $this->form_validation->set_rules('birthday', 'birthday', 'required');
            $this->form_validation->set_rules('sex', 'sex', '');
            $this->form_validation->set_rules('address', 'address', '');
            $this->form_validation->set_rules('phone1', 'phone1', 'numeric');
            $this->form_validation->set_rules('phone2', 'phone2', 'numeric');
            $this->form_validation->set_rules('student_description', 'student_description', '');
            $this->form_validation->set_rules('birthplace', 'birthplace', '');
            $this->form_validation->set_rules('photo', 'photo', '');
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
                $file = 'photo';
                
                // start to upload
                if( !$this->upload->do_upload($file) )
                {
                    $data_to_store = array('registered_date' => $this->input->post('registered_date'),
                                           'fullname' => $this->input->post('fullname'),
                                           'fullname_in_khmer' => $this->input->post('fullname_in_khmer'),
                                           'birthday' => $this->input->post('birthday'),
                                           'sex' => $this->input->post('sex'),
                                           'address' => $this->input->post('address'),
                                           'phone1' => $this->input->post('phone1'),
                                           'phone2' => $this->input->post('phone2'),
                                           'student_description' => $this->input->post('student_description'),
                                           'birthplace' => $this->input->post('birthplace'),
                                           'photo' => '/sms/attachments/index.png',
                                           'student_type_id' => $this->input->post('student_type_id'));
                }else{
                    
                    $file_root = $this->upload->data();
                    
                    $data_to_store = array('registered_date' => $this->input->post('registered_date'),
                                           'fullname' => $this->input->post('fullname'),
                                           'fullname_in_khmer' => $this->input->post('fullname_in_khmer'),
                                           'birthday' => $this->input->post('birthday'),
                                           'sex' => $this->input->post('sex'),
                                           'address' => $this->input->post('address'),
                                           'phone1' => $this->input->post('phone1'),
                                           'phone2' => $this->input->post('phone2'),
                                           'student_description' => $this->input->post('student_description'),
                                           'birthplace' => $this->input->post('birthplace'),
                                           'photo' => '/sms'.substr($config['upload_path'],1).$file_root['file_name'],
                                           'student_type_id' => $this->input->post('student_type_id')); 
                }
                //if the insert has returned true then we show the flash message
                $student_id = $this->students_model->store_data($data_to_store);
                if($student_id)
                {
                    //$data['flash_message'] = TRUE; 
                    redirect('admin/admission/parent/'.$student_id);
                }else{
                    $data['flash_message'] = FALSE; 
                }
            }
        }
        //load the view
        $data['main_content'] = 'admin/admissions/step1';
        $this->load->view('includes/template', $data);  
    }

    public function step2()
    {
        $student_id = $this->uri->segment(4);
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            if($this->input->post('required'))
            {
                $this->form_validation->set_rules('relationship', 'relationship', 'required');
                $this->form_validation->set_rules('fullname', 'fullname', 'required');
                $this->form_validation->set_rules('fullname_in_khmer', 'fullname_in_khmer', 'required');
                $this->form_validation->set_rules('birthday', 'birthday', '');
                $this->form_validation->set_rules('sex', 'sex', '');
                $this->form_validation->set_rules('address', 'address', '');
                $this->form_validation->set_rules('phone1', 'phone1', 'numeric');
                $this->form_validation->set_rules('phone2', 'phone2', 'numeric');
                $this->form_validation->set_rules('parent_description', 'parent_description', '');
                $this->form_validation->set_rules('profession', 'profession', 'required');
                $this->form_validation->set_rules('birthplace', 'birthplace', '');
                $this->form_validation->set_rules('photo', 'photo', '');
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
                    $file = 'photo';
                    // start to upload
                    if( !$this->upload->do_upload($file) )
                    {
                        $data_to_store = array('relationship' => $this->input->post('relationship'),
                                               'fullname' => $this->input->post('fullname'),
                                               'fullname_in_khmer' => $this->input->post('fullname_in_khmer'),
                                               'birthday' => $this->input->post('birthday'),
                                               'sex' => $this->input->post('sex'),
                                               'address' => $this->input->post('address'),
                                               'phone1' => $this->input->post('phone1'),
                                               'phone2' => $this->input->post('phone2'),
                                               'parent_description' => $this->input->post('parent_description'),
                                               'profession' => $this->input->post('profession'),
                                               'student_id' => $student_id,
                                               'birthplace' => $this->input->post('birthplace'),
                                               'photo' => '/sms/attachments/index.png');
                    }else{
                        $file_root = $this->upload->data();
                        $data_to_store = array('relationship' => $this->input->post('relationship'),
                                               'fullname' => $this->input->post('fullname'),
                                               'fullname_in_khmer' => $this->input->post('fullname_in_khmer'),
                                               'birthday' => $this->input->post('birthday'),
                                               'sex' => $this->input->post('sex'),
                                               'address' => $this->input->post('address'),
                                               'phone1' => $this->input->post('phone1'),
                                               'phone2' => $this->input->post('phone2'),
                                               'parent_description' => $this->input->post('parent_description'),
                                               'profession' => $this->input->post('profession'),
                                               'student_id' => $student_id,
                                               'birthplace' => $this->input->post('birthplace'),
                                               'photo' => '/sms'.substr($config['upload_path'],1).$file_root['file_name']);
                    }
                    //if the insert has returned true then we show the flash message
                    if($this->parents_model->store_data($data_to_store))
                    {
                        redirect('admin/admission/admission/'.$student_id); 
                    }else{
                        $data['flash_message'] = FALSE; 
                    }
                }
            }else{
                redirect('admin/admission/admission/'.$student_id);
            }
            
        }
        //load the view
        $data['main_content'] = 'admin/admissions/step2';
        $this->load->view('includes/template', $data);  
    }  
    
    public function step3()
    {
        $student_id = $this->uri->segment(4);
        // find classes
        $data['academic_programs'] = $this->academic_programs_model->get_all_academic_programs();
        $data['services'] = $this->services_model->get_all();
        $data['promotion'] = $this->promotions_model->get_promotion_by_type('Admission');
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            $this->form_validation->set_rules('academic_program_id', 'academic_program_id', 'required');
            $this->form_validation->set_rules('amount', 'amount', 'required|numeric');
            $this->form_validation->set_rules('admission_date', 'admission_date', 'required');
            $this->form_validation->set_rules('effective_from', 'effective_from', 'required');
            $this->form_validation->set_rules('effective_end', 'effective_end', 'required');
            $this->form_validation->set_rules('student_academic_program_description', 'student_academic_program_description', '');
            $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');

            $academic_program_id = $this->input->post('academic_program_id');
            if($academic_program_id)
            {    
                $data['result'] = $this->academic_programs_model->get_by_id($academic_program_id);
            }
            
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                // check discount
                $p_dis_per = ($this->input->post('discount_percentage')) ? $this->input->post('discount_percentage') : 0;
                $p_dis_amt = ($this->input->post('discount_amount')) ? $this->input->post('discount_amount') : 0;
                
                $service_id = $this->input->post('service_id');

                foreach($service_id as $s_id)
                {
                    // find book detail
                    $service = $this->services_model->get_by_id($s_id);
                    //if the insert has returned true then we show the flash message
                    $this->students_model->service($student_id, $s_id, $service['service_price'], $this->input->post('admission_date'));
                }
                //if the insert has returned true then we show the flash message
                if($this->students_model->admission($student_id, $this->input->post('academic_program_id'), 
                                                    $this->input->post('amount'), $this->input->post('effective_from'), 
                                                    $this->input->post('effective_end'), $this->input->post('student_academic_program_description'),
                                                    $p_dis_per, $p_dis_amt, $this->input->post('admission_date')))
                {
                    redirect('admin/admission/purchase/'.$student_id); 
                }else{
                    $data['flash_message'] = FALSE; 
                }
            }
        }
        //load the view
        $data['main_content'] = 'admin/admissions/step3';
        $this->load->view('includes/template', $data);  
    }
    
    public function step4()
    {
        $student_id = $this->uri->segment(4);
        $data['promotion'] = $this->promotions_model->get_promotion_by_type('Stationery');
        $data['services'] = $this->services_model->get_all();
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            if($this->input->post('required'))
            {
                $this->form_validation->set_rules('book_id', 'book_id', 'required');
                $this->form_validation->set_rules('purchased_date', 'purchased_date', 'required');
                $this->form_validation->set_rules('student_book_purchase_description', 'student_book_purchase_description', '');
                $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');

                //if the form has passed through the validation
                if ($this->form_validation->run())
                {
                    // check discount
                    $p_dis_per = ($this->input->post('discount_percentage')) ? $this->input->post('discount_percentage') : 0;
                    $p_dis_amt = ($this->input->post('discount_amount')) ? $this->input->post('discount_amount') : 0;
                    $book_id = $this->input->post('book_id');

                    foreach($book_id as $b_id)
                    {
                        // find book detail
                        $book = $this->books_model->get_by_id($b_id);
                        //if the insert has returned true then we show the flash message
                        if($this->books_model->purchase_book($b_id, $student_id, $book['price'], $this->input->post('purchased_date'), $this->input->post('student_book_purchase_description'), $p_dis_per, $p_dis_amt))
                        {
                             
                        }else{
                            $data['flash_message'] = FALSE; 
                        }
                    }
                    redirect('admin/admission/transportation/'.$student_id);
                }
            }else{
                redirect('admin/admission/transportation/'.$student_id);
            }
        }

        //product data 
        $data['result'] = $this->books_model->get_all_books();
        
        //load the view
        $data['main_content'] = 'admin/admissions/step4';
        $this->load->view('includes/template', $data);            

    }//update
    
    public function step5()
    {
        $student_id = $this->uri->segment(4);
        $data['transports'] = $this->transports_model->get_all();
        $data['promotion'] = $this->promotions_model->get_promotion_by_type('Transportation');
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            if($this->input->post('required'))
            {
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
                    // check discount
                    $p_dis_per = ($this->input->post('discount_percentage')) ? $this->input->post('discount_percentage') : 0;
                    $p_dis_amt = ($this->input->post('discount_amount')) ? $this->input->post('discount_amount') : 0;
                    //if the insert has returned true then we show the flash message
                    if($this->vehicles_model->add_membership($student_id, $this->input->post('vehicle_id'), 
                                                             $this->input->post('amount'), $this->input->post('effective_from'), 
                                                             $this->input->post('effective_end'), $this->input->post('student_vehicle_description'),
                                                             $p_dis_per, $p_dis_amt, $this->input->post('payment_date')))
                    {
                        redirect('admin/admission/library/'.$student_id); 
                    }else{
                        $data['flash_message'] = FALSE; 
                    }

                }
            }else{
                redirect('admin/admission/library/'.$student_id);
            }
        }
        //load the view
        $data['main_content'] = 'admin/admissions/step5';
        $this->load->view('includes/template', $data);  
    }
    
    public function step6()
    {
        $student_id = $this->uri->segment(4);
        $data['promotion'] = $this->promotions_model->get_promotion_by_type('Library');
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            if($this->input->post('required'))
            {
                $this->form_validation->set_rules('amount', 'amount', 'required|numeric');
                $this->form_validation->set_rules('payment_date', 'payment_date', 'required');
                $this->form_validation->set_rules('effective_from', 'effective_from', 'required');
                $this->form_validation->set_rules('effective_end', 'effective_end', 'required');
                $this->form_validation->set_rules('student_library_description', 'student_library_description', '');
                $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');

                //if the form has passed through the validation
                if ($this->form_validation->run())
                {
                    // check discount
                    $p_dis_per = ($this->input->post('discount_percentage')) ? $this->input->post('discount_percentage') : 0;
                    $p_dis_amt = ($this->input->post('discount_amount')) ? $this->input->post('discount_amount') : 0;
                    //if the insert has returned true then we show the flash message
                    //if($this->books_model->store_membership($data_to_store))
                    if($this->books_model->add_membership($student_id, $this->input->post('amount'),
                                                          $this->input->post('effective_from'), $this->input->post('effective_end'),
                                                          $this->input->post('student_library_description'), $p_dis_per, $p_dis_amt,
                                                          $this->input->post('payment_date')))
                    {
                        //redirect('admin/admission/service/'.$student_id); 
                        redirect('admin/students/history/'.$student_id);
                    }else{
                        $data['flash_message'] = FALSE; 
                    }
                }
            }else{
                redirect('admin/students/history/'.$student_id);
                //redirect('admin/admission/service/'.$student_id);
            }
            
        }
        //load the view
        $data['main_content'] = 'admin/admissions/step6';
        $this->load->view('includes/template', $data);  
    }

    
    public function step7()
    {
        $student_id = $this->uri->segment(4);
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            if($this->input->post('required'))
            {
                $this->form_validation->set_rules('student_id', 'student_id', 'required');
                $this->form_validation->set_rules('amount', 'amount', 'required|numeric');
                $this->form_validation->set_rules('effective_from', 'effective_from', 'required');
                $this->form_validation->set_rules('effective_end', 'effective_end', 'required');
                $this->form_validation->set_rules('student_library_description', 'student_library_description', '');
                $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');

                //if the form has passed through the validation
                if ($this->form_validation->run())
                {
                    $data_to_store = array('student_id' => $this->input->post('student_id'),
                                           'amount' => $this->input->post('amount'),
                                           'effective_from' => $this->input->post('effective_from'),
                                           'effective_end' => $this->input->post('effective_end'),
                                           'student_library_description' => $this->input->post('student_library_description'));
                    //if the insert has returned true then we show the flash message
                    //if($this->books_model->store_membership($data_to_store))
                    if($this->books_model->add_membership($this->input->post('student_id'), $this->input->post('amount'),
                                                          $this->input->post('effective_from'), $this->input->post('effective_end'),
                                                          $this->input->post('student_library_description')))
                    {
                        redirect('admin/admission/service/'.$student_id); 
                    }else{
                        $data['flash_message'] = FALSE; 
                    }
                }
            }else{
                redirect('admin/admission/service/'.$student_id);
            }
            
        }
        //load the view
        $data['main_content'] = 'admin/admissions/step7';
        $this->load->view('includes/template', $data);  
    }

}                 
                    