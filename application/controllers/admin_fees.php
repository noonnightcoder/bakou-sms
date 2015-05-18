 <?php
class Admin_fees extends CI_Controller {

    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('fees_model');

        if(!$this->session->userdata('is_logged_in')){
            redirect('admin/login');
        }
    }

    public function paid()
    {
        //all the posts sent by the view
        $start_date = ($this->input->post('start_date')) ? $this->input->post('start_date') : date("Y-m-01");        
        $data['start_date'] = $start_date;
        $end_date = ($this->input->post('end_date')) ? $this->input->post('end_date') : date("Y-m-d");        
        $data['end_date'] = $end_date;

        $data['result'] = $this->fees_model->paid($start_date, $end_date);  

        //load the view
        $data['main_content'] = 'admin/fees/paid';
        $this->load->view('includes/template', $data);  

    }//paid
    
    public function to_be_paid()
    {
        $data['result'] = $this->fees_model->to_be_paid();  

        //load the view
        $data['main_content'] = 'admin/fees/to_be_paid';
        $this->load->view('includes/template', $data);  

    }//paid

}                 
                    