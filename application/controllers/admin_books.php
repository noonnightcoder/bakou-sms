 <?php
class Admin_books extends CI_Controller {

    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('books_model');
        $this->load->model('subjects_model');

        if(!$this->session->userdata('is_logged_in')){
            redirect('admin/login');
        }
    }

    public function index()
    {
        $subject_id = $this->uri->segment(3);
        //all the posts sent by the view
        $search = $this->input->post('search');        
        $data['search'] = $search;

        //fetch sql data into arrays
        $data['counts']= $this->books_model->count_all($search, $subject_id);
        $data['result'] = $this->books_model->get_all($search, $subject_id);        
        
        //load the view
        $data['main_content'] = 'admin/books/list';
        $this->load->view('includes/template', $data);  

    }//index

    public function add()
    {
        $subject_id = $this->uri->segment(4);
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            $this->form_validation->set_rules('book_name', 'book_name', 'required');
            $this->form_validation->set_rules('isbn', 'isbn', '');
            $this->form_validation->set_rules('author', 'author', '');
            $this->form_validation->set_rules('edition', 'edition', '');
            $this->form_validation->set_rules('publisher', 'publisher', '');
            $this->form_validation->set_rules('copy', 'copy', 'numeric');
            $this->form_validation->set_rules('book_position', 'book_position', '');
            $this->form_validation->set_rules('shelf_no', 'shelf_no', '');
            $this->form_validation->set_rules('price', 'price', 'numeric');
            $this->form_validation->set_rules('book_description', 'book_description', '');
            $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array('book_name' => $this->input->post('book_name'),
                                       'isbn' => $this->input->post('isbn'),
                                       'author' => $this->input->post('author'),
                                       'price' => $this->input->post('price'),
                                       'book_description' => $this->input->post('book_description'),
                                       'edition' => $this->input->post('edition'),
                                       'publisher' => $this->input->post('publisher'),
                                       'copy' => $this->input->post('copy'),
                                       'book_position' => $this->input->post('book_position'),
                                       'shelf_no' => $this->input->post('shelf_no'),
                                       'subject_id' => $subject_id);
                //if the insert has returned true then we show the flash message
                if($this->books_model->store_data($data_to_store))
                {
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }
            }
        }
        //load the view
        $data['main_content'] = 'admin/books/add';
        $this->load->view('includes/template', $data);  
    }

    public function update()
    {
        $subject_id = $this->uri->segment(4);
        $id = $this->uri->segment(5);

        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            $this->form_validation->set_rules('book_name', 'book_name', 'required');
            $this->form_validation->set_rules('isbn', 'isbn', '');
            $this->form_validation->set_rules('author', 'author', '');
            $this->form_validation->set_rules('edition', 'edition', '');
            $this->form_validation->set_rules('publisher', 'publisher', '');
            $this->form_validation->set_rules('copy', 'copy', 'numeric');
            $this->form_validation->set_rules('book_position', 'book_position', '');
            $this->form_validation->set_rules('shelf_no', 'shelf_no', '');
            $this->form_validation->set_rules('price', 'price', 'numeric');
            $this->form_validation->set_rules('book_description', 'book_description', '');
            $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array('book_name' => $this->input->post('book_name'),
                                       'isbn' => $this->input->post('isbn'),
                                       'author' => $this->input->post('author'),
                                       'price' => $this->input->post('price'),
                                       'book_description' => $this->input->post('book_description'),
                                       'edition' => $this->input->post('edition'),
                                       'publisher' => $this->input->post('publisher'),
                                       'copy' => $this->input->post('copy'),
                                       'book_position' => $this->input->post('book_position'),
                                       'shelf_no' => $this->input->post('shelf_no'));
                //if the insert has returned true then we show the flash message
                if($this->books_model->update($id, $data_to_store) == TRUE)
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
        $data['result'] = $this->books_model->get_by_id($id);
        //load the view
        $data['main_content'] = 'admin/books/edit';
        $this->load->view('includes/template', $data);            

    }//update   
    
    public function detail()
    {
        $id = $this->uri->segment(4);
        $data['subjects'] = $this->subjects_model->get_all_subjects();
        //product data 
        $data['result'] = $this->books_model->get_by_id($id);
        //load the view
        $data['main_content'] = 'admin/books/detail';
        $this->load->view('includes/template', $data);            

    }//update 

    public function delete()
    {
        $subject_id = $this->uri->segment(4);
        $id = $this->uri->segment(5);
        //$this->books_model->delete($id);
        $data_to_store = array('status' => 0);
        //if the insert has returned true then we show the flash message
        if($this->books_model->update($id, $data_to_store) == TRUE)
        {
            redirect('admin/books/'.$subject_id); 
        }
    }//delete


    public function library()
    {
        //all the posts sent by the view
        $search = $this->input->post('search');        
        $data['search'] = $search;
        $subject_id = $this->input->post('subject_id');        
        $data['subject_id'] = $subject_id;
        
        $data['subjects'] = $this->subjects_model->get_all_subjects();
        //pagination settings
        $config['per_page'] = 10;

        $config['base_url'] = base_url().'index.php/admin/library';
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
        $data['counts']= $this->books_model->count_all($search);
        $data['result'] = $this->books_model->get_all_books($search, $subject_id, $config['per_page'], $limit_end);        
        $config['total_rows'] = $data['counts'];

        //initializate the panination helper 
        $this->pagination->initialize($config);   

        //load the view
        $data['main_content'] = 'admin/books/library';
        $this->load->view('includes/template', $data);   

    }//index
    
    public function add_book()
    {
        $data['subjects'] = $this->subjects_model->get_all_subjects();
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            $this->form_validation->set_rules('subject_id', 'subject_id', 'required');
            $this->form_validation->set_rules('book_name', 'book_name', 'required');
            $this->form_validation->set_rules('isbn', 'isbn', '');
            $this->form_validation->set_rules('author', 'author', '');
            $this->form_validation->set_rules('edition', 'edition', '');
            $this->form_validation->set_rules('publisher', 'publisher', '');
            $this->form_validation->set_rules('copy', 'copy', 'numeric');
            $this->form_validation->set_rules('book_position', 'book_position', '');
            $this->form_validation->set_rules('shelf_no', 'shelf_no', '');
            $this->form_validation->set_rules('price', 'price', 'numeric');
            $this->form_validation->set_rules('book_description', 'book_description', '');
            $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array('book_name' => $this->input->post('book_name'),
                                       'isbn' => $this->input->post('isbn'),
                                       'author' => $this->input->post('author'),
                                       'price' => $this->input->post('price'),
                                       'book_description' => $this->input->post('book_description'),
                                       'edition' => $this->input->post('edition'),
                                       'publisher' => $this->input->post('publisher'),
                                       'copy' => $this->input->post('copy'),
                                       'book_position' => $this->input->post('book_position'),
                                       'shelf_no' => $this->input->post('shelf_no'),
                                       'subject_id' => $this->input->post('subject_id'));
                //if the insert has returned true then we show the flash message
                if($this->books_model->store_data($data_to_store))
                {
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }
            }
        }
        //load the view
        $data['main_content'] = 'admin/books/add_book';
        $this->load->view('includes/template', $data);  
    }
    
    public function update_book()
    {
        $id = $this->uri->segment(4);
        $data['subjects'] = $this->subjects_model->get_all_subjects();
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            $this->form_validation->set_rules('subject_id', 'subject_id', 'required');
            $this->form_validation->set_rules('book_name', 'book_name', 'required');
            $this->form_validation->set_rules('isbn', 'isbn', '');
            $this->form_validation->set_rules('author', 'author', '');
            $this->form_validation->set_rules('edition', 'edition', '');
            $this->form_validation->set_rules('publisher', 'publisher', '');
            $this->form_validation->set_rules('copy', 'copy', 'numeric');
            $this->form_validation->set_rules('book_position', 'book_position', '');
            $this->form_validation->set_rules('shelf_no', 'shelf_no', '');
            $this->form_validation->set_rules('price', 'price', 'numeric');
            $this->form_validation->set_rules('book_description', 'book_description', '');
            $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array('book_name' => $this->input->post('book_name'),
                                       'isbn' => $this->input->post('isbn'),
                                       'author' => $this->input->post('author'),
                                       'price' => $this->input->post('price'),
                                       'book_description' => $this->input->post('book_description'),
                                       'edition' => $this->input->post('edition'),
                                       'publisher' => $this->input->post('publisher'),
                                       'copy' => $this->input->post('copy'),
                                       'book_position' => $this->input->post('book_position'),
                                       'shelf_no' => $this->input->post('shelf_no'),
                                       'subject_id' => $this->input->post('subject_id'));
                //if the insert has returned true then we show the flash message
                if($this->books_model->update($id, $data_to_store) == TRUE)
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
        $data['result'] = $this->books_model->get_by_id($id);
        //load the view
        $data['main_content'] = 'admin/books/edit_book';
        $this->load->view('includes/template', $data);            

    }//update
    
    public function delete_book()
    {
        $id = $this->uri->segment(4);
        //$this->books_model->delete($id);
        $data_to_store = array('status' => 0);
        //if the insert has returned true then we show the flash message
        if($this->books_model->update($id, $data_to_store) == TRUE)
        {
            redirect('admin/library');
        }
    }//delete
    
}                 
                    