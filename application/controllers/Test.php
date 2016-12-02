<?php
/**
 * This <skripsi.husni.co.io> project created by : 
 * Name         : syafiq
 * Date / Time  : 02 December 2016, 6:00 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        // Your own constructor code
    }

    public function index()
    {
        
    }

    public function html5boilerplate()
    {
        $this->load->view('test/html5boilerplate');
    }

    public function notebookweb()
    {
        $this->load->view('test/notebookweb');
    }
}