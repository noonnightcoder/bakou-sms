<?php
class Monoci_model extends CI_Model {
 
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('file');
    }

    public function list_tables()
    {
        return $this->db->list_tables();
    }

    public function list_fields($table)
    {
        return $this->db->list_fields($table);
    }

    public function read_file($file_path)
    {
        return read_file($file_path);
    }

    public function append_file($file_path, $data)
    {
        if ( ! write_file($file_path, $data))
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function append_route_file($table_name)
    {
        // OPERATION IN ROUTES FILE
        // read the routes file
        $file_path = 'application/config/routes.php';
        $current = $this->monoci_model->read_file($file_path);
        // append file to route
        $string = $current.' $route[\'admin/'.$table_name.'\'] = \'admin_'.$table_name.'/index\';
                    $route[\'admin/'.$table_name.'/add\'] = \'admin_'.$table_name.'/add\';
                    $route[\'admin/'.$table_name.'/update\'] = \'admin_'.$table_name.'/update\';
                    $route[\'admin/'.$table_name.'/update/(:any)\'] = \'admin_'.$table_name.'/update/$1\';
                    $route[\'admin/'.$table_name.'/delete/(:any)\'] = \'admin_'.$table_name.'/delete/$1\';
                    $route[\'admin/'.$table_name.'/(:any)\'] = \'admin_'.$table_name.'/index/$1\'; //$1 = page number
                    
                    ';
        $this->monoci_model->append_file($file_path, $string);
        // END OF ROUTE FILE OPERATION
    }

    public function append_model_file($table_name)
    {
        // OPERATION IN ROUTES FILE
        // read the routes file
        $file_path = 'application/models/'.$table_name.'_model.php';
        $header = ucfirst($table_name).'_model';
        // append file to route
        $string = ' <?php
                        class '.$header.' extends CI_Model {
                         
                            /**
                            * Responsable for auto load the database
                            * @return void
                            */
                            public function __construct()
                            {
                                $this->load->database();
                            }

                            /**
                            * Get product by his is
                            * @param int $product_id 
                            * @return array
                            */
                            public function get_by_id($id)
                            {
                                $this->db->select(\'*\');
                                $this->db->from(\''.$table_name.'\');
                                $this->db->where(\'id\', $id);
                                $query = $this->db->get();
                                return $query->row_array(); 
                            }    

                            /**
                            * Fetch manufacturers data from the database
                            * possibility to mix search, filter and order
                            * @param string $search_string 
                            * @param strong $order
                            * @param string $order_type 
                            * @param int $limit_start
                            * @param int $limit_end
                            * @return array
                            */
                            public function get_all($search_string=null, $limit_start=null, $limit_end=null)
                            {
                                
                                $this->db->select(\'*\');
                                $this->db->from(\''.$table_name.'\');

                                if($search_string){
                                    $this->db->like(\'lower(name)\', strtolower($search_string));
                                }
                                $this->db->group_by(\'id\');

                                if($limit_start && $limit_end){
                                  $this->db->limit($limit_start, $limit_end);   
                                }

                                if($limit_start != null){
                                  $this->db->limit($limit_start, $limit_end);    
                                }
                                
                                $query = $this->db->get();
                                
                                return $query->result_array();  
                            }

                            /**
                            * Count the number of rows
                            * @param int $search_string
                            * @param int $order
                            * @return int
                            */
                            function count_all($search_string=null)
                            {
                                $this->db->select(\'*\');
                                $this->db->from(\''.$table_name.'\');
                                if($search_string){
                                    $this->db->like(\'name\', $search_string);
                                }
                                
                                $query = $this->db->get();
                                return $query->num_rows();        
                            }

                            /**
                            * Store the new item into the database
                            * @param array $data - associative array with data to store
                            * @return boolean 
                            */
                            function store_data($data)
                            {
                                $insert = $this->db->insert(\''.$table_name.'\', $data);
                                return $insert;
                            }

                            /**
                            * Update manufacture
                            * @param array $data - associative array with data to store
                            * @return boolean
                            */
                            function update($id, $data)
                            {
                                $this->db->where(\'id\', $id);
                                $this->db->update(\''.$table_name.'\', $data);
                                $report = array();
                                $report[\'error\'] = $this->db->_error_number();
                                $report[\'message\'] = $this->db->_error_message();
                                if($report !== 0){
                                    return true;
                                }else{
                                    return false;
                                }
                            }

                            /**
                            * Delete manufacturer
                            * @param int $id - manufacture id
                            * @return boolean
                            */
                            function delete($id){
                                $this->db->where(\'id\', $id);
                                $this->db->delete(\''.$table_name.'\'); 
                            }
                         
                        }
                    ?>                 
                    ';
        $this->monoci_model->append_file($file_path, $string);
    }


    public function append_controller_file($table_name, $field_name)
    {
        $file_path = 'application/controllers/admin_'.$table_name.'.php';
        $header = 'Admin_'.$table_name;

        $validation = '';
        foreach($field_name as $value)
        {
            $validation .= '$this->form_validation->set_rules(\''.$value.'\', \''.$value.'\', \'\');';
        }

        $data_to_store = '$data_to_store = array(';
        foreach($field_name as $value)
        {
            $data_to_store .= '\''.$value.'\' => $this->input->post(\''.$value.'\'),';
        }
        $data_to_store .= ');';
        // append file to route
        $string = ' <?php
                        class '.$header.' extends CI_Controller {

                         
                            /**
                            * Responsable for auto load the model
                            * @return void
                            */
                            public function __construct()
                            {
                                parent::__construct();
                                $this->load->model(\''.$table_name.'_model\');

                                if(!$this->session->userdata(\'is_logged_in\')){
                                    redirect(\'admin/login\');
                                }
                            }
                         
                            public function index()
                            {

                                //all the posts sent by the view
                                $search = $this->input->post(\'search\');        
                                $data[\'search\'] = $search;

                                //pagination settings
                                $config[\'per_page\'] = 10;

                                $config[\'base_url\'] = base_url().\'index.php/admin/'.$table_name.'\';
                                $config[\'use_page_numbers\'] = TRUE;
                                $config[\'num_links\'] = 20;
                                $config[\'full_tag_open\'] = \'<ul>\';
                                $config[\'full_tag_close\'] = \'</ul>\';
                                $config[\'num_tag_open\'] = \'<li>\';
                                $config[\'num_tag_close\'] = \'</li>\';
                                $config[\'cur_tag_open\'] = \'<li class="active"><a>\';
                                $config[\'cur_tag_close\'] = \'</a></li>\';

                                //limit end
                                $page = $this->uri->segment(3);

                                //math to get the initial record to be select in the database
                                $limit_end = ($page * $config[\'per_page\']) - $config[\'per_page\'];
                                if ($limit_end < 0){
                                    $limit_end = 0;
                                } 

                                //fetch sql data into arrays
                                $data[\'counts\']= $this->'.$table_name.'_model->count_all();
                                $data[\'result\'] = $this->'.$table_name.'_model->get_all($search, $config[\'per_page\'], $limit_end);        
                                $config[\'total_rows\'] = $data[\'counts\'];

                                 
                                //initializate the panination helper 
                                $this->pagination->initialize($config);   

                                //load the view
                                $data[\'main_content\'] = \'admin/'.$table_name.'/list\';
                                $this->load->view(\'includes/template\', $data);  

                            }//index

                            public function add()
                            {
                                //if save button was clicked, get the data sent via post
                                if ($this->input->server(\'REQUEST_METHOD\') === \'POST\')
                                {
                                    '.$validation.
                                    '
                                    $this->form_validation->set_error_delimiters(\'<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>\', \'</strong></div>\');
                                    
                                    //if the form has passed through the validation
                                    if ($this->form_validation->run())
                                    {
                                        '.$data_to_store.'
                                        //if the insert has returned true then we show the flash message
                                        if($this->'.$table_name.'_model->store_data($data_to_store)){
                                            $data[\'flash_message\'] = TRUE; 
                                        }else{
                                            $data[\'flash_message\'] = FALSE; 
                                        }

                                    }

                                }
                                //load the view
                                $data[\'main_content\'] = \'admin/'.$table_name.'/add\';
                                $this->load->view(\'includes/template\', $data);  
                            }

                            public function update()
                            {
                                $id = $this->uri->segment(4);
                          
                                //if save button was clicked, get the data sent via post
                                if ($this->input->server(\'REQUEST_METHOD\') === \'POST\')
                                {
                                    //form validation
                                    '.$validation.'
                                    $this->form_validation->set_error_delimiters(\'<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>\', \'</strong></div>\');
                                    //if the form has passed through the validation
                                    if ($this->form_validation->run())
                                    {
                            
                                        '.$data_to_store.'
                                        //if the insert has returned true then we show the flash message
                                        if($this->'.$table_name.'_model->update($id, $data_to_store) == TRUE){
                                            $data[\'flash_message\'] = TRUE; 
                                        }else{
                                            $data[\'flash_message\'] = FALSE;
                                        }

                                    }//validation run

                                } 
                                //if we are updating, and the data did not pass trough the validation
                                //the code below wel reload the current data

                                //product data 
                                $data[\'result\'] = $this->'.$table_name.'_model->get_by_id($id);
                                //load the view
                                $data[\'main_content\'] = \'admin/'.$table_name.'/edit\';
                                $this->load->view(\'includes/template\', $data);            

                            }//update   

                            public function delete()
                            {
                                $id = $this->uri->segment(4);
                                $this->'.$table_name.'_model->delete($id);
                                redirect(\'admin/'.$table_name.'\');
                            }//delete


                        }                 
                    ';
        $this->monoci_model->append_file($file_path, $string);
    }

    public function append_view_list_file($table_name, $field_name)
    {
        $file_path = 'application/views/admin/'.$table_name.'/list.php';

        $header = '<tr>';
        foreach($field_name as $value)
        {
            $header .= '<th>'.ucfirst($value).'</th>';
        }
        $header .= '<th class="td-actions">Action</th></tr>';

        $body = '<?php foreach($result as $res){ ?> <tr>';
        foreach($field_name as $value)
        {
            $body .= '<td><?php echo $res[\''.$value.'\']; ?></td>';
        }
        $body .= '<td class="td-actions"><a href="'.$table_name.'/update/<?php echo ; ?>" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="'.$table_name.'/delete/<?php echo ; ?>" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>';
        $body .= '</tr>';  
        $body .= '<?php } ?>'; 
        // append file to route
        $string = '<div class="main">
    
                        <div class="main-inner">

                            <div class="container">
                        
                            <div class="row">
                            <div class="span12">
                                            
                                    <div class="widget widget-plain">
                                        
                                        <div class="widget-content">
                                            
                                            <a href="<?php echo site_url("admin").\'/\'.$this->uri->segment(2); ?>/add" class="btn btn-large btn-success btn-support-ask">Add New</a> 
                                            
                                        </div> <!-- /widget-content -->
                                            
                                    </div> <!-- /widget -->

                                </div> <!-- /span12 -->
                             </div> 
                        
                              <div class="row">
                                
                                <div class="span12">
                                    
                                    <div class="widget">
                                            
                                        <div class="widget-header">
                                            <i class="icon-pushpin"></i>
                                            <h3>'.ucfirst($table_name).'</h3>
                                        </div> <!-- /widget-header -->
                                        
                                        <div class="widget-content">
                                                        
                                            <form action="<?php echo base_url(); ?>index.php/admin/'.$table_name.'" method="post" class="form-horizontal">
                                                <div class="control-group">
                                                    <label class="control-label" for="radiobtns">'.ucfirst($table_name).' Name: </label>                                            
                                                    <div class="controls">
                                                       <div class="input-append">
                                                          <input class="span2 m-wrap" id="appendedInputButton" type="text" name="search" value="<?php echo @$search; ?>">
                                                          <button class="btn" type="submit">Search</button>
                                                        </div>
                                                    </div>  <!-- /controls -->          
                                                </div> <!-- /control-group -->
                                            </form>         

                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                '.$header.'
                                                </thead>
                                                <tbody>
                                                '.$body.'  
                                                </tbody>
                                            </table>
                                            <?php echo \'<div class="pagination widget-content">\'.$this->pagination->create_links().\'</div>\'; ?>
                                        </div> <!-- /widget-content -->
                                            
                                    </div> <!-- /widget --> 
                                    
                                </div> <!-- /spa12 -->
                                
                              </div> <!-- /row -->
                        
                            </div> <!-- /container -->
                        
                        </div> <!-- /main-inner -->
                            
                    </div> <!-- /main -->                 
                    ';
        $this->monoci_model->append_file($file_path, $string);
    }

    public function append_view_add_file($table_name, $field_name)
    {
        $file_path = 'application/views/admin/'.$table_name.'/add.php';

        $content = '';
        foreach($field_name as $value)
        {
            $content .= '<div class="control-group">                                         
                            <label class="control-label" for="firstname">'.ucfirst($value).'</label>
                            <div class="controls">
                                <input type="text" class="span6" id="'.$value.'" name="'.$value.'" value="<?php echo set_value(\''.$value.'\'); ?>">
                            </div> <!-- /controls -->               
                        </div> <!-- /control-group -->';
        }

       
        // append file to route
        $string = '<div class="main">
    
                        <div class="main-inner">

                            <div class="container">
                        
                              <div class="row">
                                
                                <div class="span12">
                                    
                                    <div class="widget">
                                            
                                        <div class="widget-header">
                                            <i class="icon-pushpin"></i>
                                            <h3>'.ucfirst($table_name).'</h3>
                                        </div> <!-- /widget-header -->
                                        
                                        <div class="widget-content">
                                            
                                            <form action="<?php echo base_url(); ?>index.php/admin/'.$table_name.'/add" method="post" id="edit-profile" class="form-horizontal">
                                                    <fieldset>
                                                        <?php
                                                            //flash messages
                                                            if(isset($flash_message)){
                                                                if(@$flash_message == TRUE)
                                                                {
                                                                  echo \'<div class="alert alert-success">\';
                                                                    echo \'<button type="button" class="close" data-dismiss="alert">&times;</button>\';
                                                                    echo \'<strong>Well done!</strong> created with success.\';
                                                                  echo \'</div>\';       
                                                                }else{
                                                                  echo \'<div class="alert">\';
                                                                    echo \'<button type="button" class="close" data-dismiss="alert">&times;</button>\';
                                                                    echo \'<strong>Oh snap!</strong> change a few things up and try submitting again.\';
                                                                  echo \'</div>\';          
                                                                }
                                                            }
                                                        ?>
                                                        <?php 
                                                            //form validation
                                                            echo validation_errors(); 
                                                        ?>
                                                        '.$content.'

                                                        <div class="form-actions">
                                                            <button type="submit" class="btn btn-primary">Save</button> 
                                                            <button class="btn">Cancel</button>
                                                        </div> <!-- /form-actions -->
                                                        
                                                    </fieldset>
                                            </form>
                                            
                                        </div> <!-- /widget-content -->
                                            
                                    </div> <!-- /widget --> 
                                    
                                </div> <!-- /spa12 -->
                                
                              </div> <!-- /row -->
                        
                            </div> <!-- /container -->
                        
                        </div> <!-- /main-inner -->
                            
                    </div> <!-- /main -->                
                    ';
        $this->monoci_model->append_file($file_path, $string);
    }

    public function append_view_edit_file($table_name, $field_name)
    {
        $file_path = 'application/views/admin/'.$table_name.'/edit.php';

        $content = '';
        foreach($field_name as $value)
        {
            $content .= '<div class="control-group">                                         
                            <label class="control-label" for="firstname">'.$value.'</label>
                            <div class="controls">
                                <input type="text" class="span6" id="'.$value.'" name="'.$value.'" value="<?php echo $result[\''.$value.'\']; ?>">
                            </div> <!-- /controls -->               
                        </div> <!-- /control-group -->';
        }

       
        // append file to route
        $string = '<div class="main">
    
                        <div class="main-inner">

                            <div class="container">
                        
                              <div class="row">
                                
                                <div class="span12">
                                    
                                    <div class="widget">
                                            
                                        <div class="widget-header">
                                            <i class="icon-pushpin"></i>
                                            <h3>'.ucfirst($table_name).'</h3>
                                        </div> <!-- /widget-header -->
                                        
                                        <div class="widget-content">
                                            
                                            <form action="<?php echo base_url(); ?>index.php/admin/'.$table_name.'/update/<?php echo $this->uri->segment(4); ?>" method="post" id="edit-profile" class="form-horizontal">
                                                    <fieldset>
                                                        <?php
                                                            //flash messages
                                                            if(isset($flash_message)){
                                                                if(@$flash_message == TRUE)
                                                                {
                                                                  echo \'<div class="alert alert-success">\';
                                                                    echo \'<button type="button" class="close" data-dismiss="alert">&times;</button>\';
                                                                    echo \'<strong>Well done!</strong> updated with success.\';
                                                                  echo \'</div>\';       
                                                                }else{
                                                                  echo \'<div class="alert">\';
                                                                    echo \'<button type="button" class="close" data-dismiss="alert">&times;</button>\';
                                                                    echo \'<strong>Oh snap!</strong> change a few things up and try submitting again.\';
                                                                  echo \'</div>\';          
                                                                }
                                                            }
                                                        ?>
                                                        <?php 
                                                            //form validation
                                                            echo validation_errors(); 
                                                        ?>
                                                        '.$content.'

                                                        <div class="form-actions">
                                                            <button type="submit" class="btn btn-primary">Update</button> 
                                                            <button class="btn">Cancel</button>
                                                        </div> <!-- /form-actions -->
                                                        
                                                    </fieldset>
                                            </form>
                                            
                                        </div> <!-- /widget-content -->
                                            
                                    </div> <!-- /widget --> 
                                    
                                </div> <!-- /spa12 -->
                                
                              </div> <!-- /row -->
                        
                            </div> <!-- /container -->
                        
                        </div> <!-- /main-inner -->
                            
                    </div> <!-- /main -->               
                    ';
        $this->monoci_model->append_file($file_path, $string);
    }


    public function make_dir($folder_path)
    {
        if (!is_dir($folder_path))
        {
            mkdir($folder_path, 0777, TRUE);
        }
    }
    
}
?>	
