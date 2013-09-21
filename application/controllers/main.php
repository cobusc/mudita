<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        /* Standard Libraries of codeigniter are required */
        $this->load->database();
        $this->load->helper('url');
        /* ------------------ */ 

        $this->load->library('grocery_CRUD');
        $this->grocery_crud->set_theme('flexigrid'); // datatables or flexigrid

    }

    public function index()
    {
        echo "<h1>Welcome to the world of Codeigniter</h1>";//Just an example to ensure that we get into the function
        die();
    }

    public function patient()
    {
        $crud = $this->grocery_crud;
        $crud->set_table('patient');
        $crud->set_subject("Patient");
        //$crud->columns('field_name1','field_name2','field_name3','field_name4'); // On edit pages
        //$crud->fields('field_name1','field_name2','field_name3','field_name4'); // Used on list page
        $crud->display_as('school_id','School');
        $crud->required_fields('initials', 'school_id');
        $crud->set_relation('school_id','school','{name}', null, 'name ASC');


        $output = $this->grocery_crud->render();

        $this->_example_output($output);
    }

    public function school()
    {
        $crud = $this->grocery_crud;
        $crud->set_table('school');
        $crud->set_subject("School");
        $crud->columns('name','description', 'notes', 'created_at', 'updated_at'); // On edit pages
        $crud->fields('name', 'description', 'notes'); // Used on list page
        //$crud->display_as('school_id','School');
        $crud->required_fields('name', 'description');

        $output = $this->grocery_crud->render();

        $this->_example_output($output);
    }
                                

    function _example_output($output = null)
    {
        $this->load->view('our_template.php',$output);    
    }
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
