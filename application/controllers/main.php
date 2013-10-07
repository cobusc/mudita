<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        /* Standard Libraries of codeigniter are required */
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('ion_auth');

        if (!$this->ion_auth->logged_in())
            redirect('auth/login');
        /* ------------------ */ 

        $this->load->library('grocery_CRUD');
        //$this->grocery_crud->set_theme('flexigrid'); // datatables or flexigrid or twitter-bootstrap
        $this->grocery_crud->set_theme('twitter-bootstrap'); // datatables or flexigrid or twitter-bootstrap

    }

    public function index()
    {
        redirect('main/patient');
#        echo "<h1>Welcome to the world of Codeigniter</h1>";//Just an example to ensure that we get into the function
#        die();
    }

    function _example_output($output = null)
    {
        $this->load->view('our_template.php',$output);    
    }
    
    
    public function school()
    {
        $crud = $this->grocery_crud;
        $crud->set_table('school');
        $crud->set_subject("School");
        $crud->columns('name','description', 'notes', 'created_at', 'updated_at'); // On list pages
        $crud->fields('name', 'description', 'notes'); // Used on edit page
        //$crud->display_as('school_id','School');
        $crud->required_fields('name', 'description');

        $output = $this->grocery_crud->render();

        $this->_example_output($output);
    }

    public function patient()
    {
        $crud = $this->grocery_crud;
        $crud->set_table('patient');
        $crud->set_subject("Patient");
        $crud->columns('case_number','initials','school_id','grade'); // On list
        //$crud->fields('field_name1','field_name2','field_name3','field_name4'); // Used on edit
        $crud->display_as('school_id','School');
        $crud->required_fields('initials', 'school_id');
        $crud->set_relation('school_id','school','{name}', null, 'name ASC');


        $output = $this->grocery_crud->render();

        $this->_example_output($output);
    }

    public function drugtest_type()
    {
        $crud = $this->grocery_crud;
        $crud->set_table('drugtest_type');
        $crud->set_subject("Drug Test Type");
        $crud->columns('name','description', 'created_at', 'updated_at'); // On list pages
        $crud->fields('name', 'description'); // Used on edit page
        //$crud->display_as('school_id','School');
        $crud->required_fields('name', 'description');

        $output = $this->grocery_crud->render();

        $this->_example_output($output);
    }

    public function drugtest()
    {
        $crud = $this->grocery_crud;
        $crud->set_table('drugtest');
        $crud->set_subject("Drug Test");
        //$crud->columns('field_name1','field_name2','field_name3','field_name4'); // On list
        //$crud->fields('field_name1','field_name2','field_name3','field_name4'); // Used on edit
        $crud->display_as('test_date','Date Performed');
        $crud->display_as('drugtest_type_id', 'Drug Test Type');
        $crud->display_as('patient_id','Patient');
        $crud->display_as('positive_result', 'Result');
        $crud->field_type('positive_result', 'enum', array('Negative','Positive'));
        $crud->set_relation('patient_id', 'patient', '[{case_number}] {initials}');
        $crud->set_relation('drugtest_type_id','drugtest_type','name', null, 'name ASC');
        $crud->required_fields('test_date', 'drugtest_type_id', 'patient_id', 'positive_result');

        $crud->set_relation_n_n('substances_found', 'drugtest_substance', 'substance', 'drugtest_id', 'substance_id', 'name');

        $output = $this->grocery_crud->render();

        $this->_example_output($output);
    }

    public function substance()
    {
        $crud = $this->grocery_crud;
        $crud->set_table('substance');
        $crud->set_subject('Substance');
        $output = $this->grocery_crud->render();

        $this->_example_output($output);

    }    

    public function facilitator()
    {
         $crud = $this->grocery_crud;
         $crud->set_table('facilitator');
         $crud->set_subject('Facilitator');
         $output = $this->grocery_crud->render();

         $this->_example_output($output);
    }

    
    public function individual_session_type()
    {
         $crud = $this->grocery_crud;
         $crud->set_table('individual_session_type');
         $crud->set_subject('Individual Session Type');
         $output = $this->grocery_crud->render();

         $this->_example_output($output);
    }

    public function group_session_type()
    {
         $crud = $this->grocery_crud;
         $crud->set_table('group_session_type');
         $crud->set_subject('Group Session Type');
         $output = $this->grocery_crud->render();

         $this->_example_output($output);
    }

    public function group_session()
    {
         $crud = $this->grocery_crud;
         $crud->set_table('group_session');
         $crud->set_subject("Group Session");
         //$crud->columns('field_name1','field_name2','field_name3','field_name4'); // On list
         //$crud->fields('field_name1','field_name2','field_name3','field_name4'); // Used on edit
         $crud->display_as('date','Date Performed');
         $crud->display_as('facilitator_id','Facilitator');
         $crud->display_as('type_id', 'Type of Session');
         $crud->set_relation('facilitator_id', 'facilitator', 'name');
         $crud->set_relation('type_id','group_session_type','name', null, 'name ASC');
         $crud->required_fields('date', 'type_id', 'patient_id');
         
         $crud->set_relation_n_n('patients_attending', 'group_session_patient', 'patient', 'group_session_id', 'patient_id', '[{case_number}] {initials}');
                 
         $output = $this->grocery_crud->render();
                 
         $this->_example_output($output);
    }

    public function individual_session()
    {
         $crud = $this->grocery_crud;
         $crud->set_table('individual_session');
         $crud->set_subject("Individual Session");
         //$crud->columns('field_name1','field_name2','field_name3','field_name4'); // On list
         //$crud->fields('field_name1','field_name2','field_name3','field_name4'); // Used on edit
         $crud->display_as('date','Date Performed');
         $crud->display_as('patient_id','Patient');
         $crud->display_as('facilitator_id', 'Facilitator');
         $crud->display_as('type_id', 'Type of Session');
         $crud->set_relation('patient_id', 'patient', '[{case_number}] {initials}');
         $crud->set_relation('facilitator_id', 'facilitator', 'name');
         $crud->set_relation('type_id','individual_session_type','name', null, 'name ASC');
         $crud->required_fields('date', 'type_id', 'patient_id', 'facilitator_id');

         $output = $this->grocery_crud->render();

         $this->_example_output($output);
    }
                  
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
