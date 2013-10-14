<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		$this->load->helper('url');

		$this->load->database();
		$this->load->helper('language');
                $this->load->library('grocery_CRUD');
                //$this->grocery_crud->set_theme('flexigrid'); // datatables or flexigrid or twitter-bootstrap
                $this->grocery_crud->set_theme('twitter-bootstrap'); // datatables or flexigrid or twitter-bootstrap

                if (!$this->ion_auth->logged_in())
                    redirect('auth/login', 'refresh');
	}

        function test_report()
        {
            $output = "
<div class='row' id='chart'></div>
<script>
$(function () { 
    $('#chart').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Fruit Consumption'
        },
        xAxis: {
            categories: ['Apples', 'Bananas', 'Oranges']
        },
        yAxis: {
            title: {
                text: 'Fruit eaten'
        }
        },
            series: [{
                name: 'Jane',
                    data: [1, 0, 4]
        }, {
            name: 'John',
                data: [5, 7, 3]
        }]
        });
        });
</script>
    ";
        $data = array(
            'output' => $output, 
            'js_files' => array(
                'http://mudita.local/assets/grocery_crud/js/jquery-1.10.2.min.js',
                'http://code.highcharts.com/highcharts.js',
                'http://mudita.local/assets/grocery_crud/themes/twitter-bootstrap/js/libs/bootstrap/bootstrap.min.js'),
            'css_files' => array(
                'http://mudita.local/assets/grocery_crud/themes/twitter-bootstrap/css/bootstrap.min.css',
                'http://mudita.local/assets/grocery_crud/themes/twitter-bootstrap/css/bootstrap-responsive.min.css',
                'http://mudita.local/assets/grocery_crud/themes/twitter-bootstrap/css/style.css')
        );

            $this->_example_output($data); 
        }

        function _example_output($output = null)
        {
            $this->load->view('our_template.php',$output);    
        }

}
