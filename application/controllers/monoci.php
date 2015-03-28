<?php

class Monoci extends CI_Controller {


	/**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('monoci_model');

        if(!$this->session->userdata('is_logged_in')){
            redirect('admin/login');
        }
    }

    /**
    * Check if the user is logged in, if he's not, 
    * send him to the login page
    * @return void
    */	
	function index()
	{
		$data['tables'] = $this->monoci_model->list_tables();
		
		//if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

            //form validation
            $this->form_validation->set_rules('table_name', 'table_name', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');
            
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
            	$data['table_name'] = $this->input->post('table_name');
            	$table_name = $data['table_name'];
                // list field of the table
                $data['fields'] = $this->monoci_model->list_fields($table_name);
                $fields = $data['fields'];

                $table_fields = $this->input->post('table_field');
                $data['table_fields'] = $table_fields;

                if($table_fields != NULL)
                {
                	// APPEND ROUTE FILE
	                $this->monoci_model->append_route_file($table_name);

	                // APPEND MODEL FILE
	                $this->monoci_model->append_model_file($table_name);

	                // APPEND CONTROLLER FILE
	                $this->monoci_model->append_controller_file($table_name, $table_fields);
					
					// OPERATION CREATE VIEW FOLDER
					$folder_path = 'application/views/admin/'.$table_name;
					$this->monoci_model->make_dir($folder_path);

					// APPEND VIEW FILE
					$this->monoci_model->append_view_list_file($table_name, $table_fields);
					$this->monoci_model->append_view_add_file($table_name, $table_fields);
					$this->monoci_model->append_view_edit_file($table_name, $table_fields);
					// END OF OPERATION CREATE VIEW FOLDER
                }
                

            }

        }

		$this->load->view('admin/monoci/index', $data);

	}

    

}