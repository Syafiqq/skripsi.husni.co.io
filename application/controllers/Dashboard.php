<?php
/**
 * This <skripsi.husni.co.io> project created by :
 * Name         : syafiq
 * Date / Time  : 04 December 2016, 3:50 AM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */
use Carbon\Carbon;

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
        $this->load->library('session');
        log_message('ERROR', var_export($_SESSION, true));
        // Your own constructor code
    }

    public function index()
    {
        if (isset($_SESSION['user']['auth']))
        {
            switch ($_SESSION['user']['auth']['role'])
            {
                case 'student' :
                {
                    $this->index_user();
                }
                    break;
                case 'counselor' :
                {
                    $this->index_counselor();
                }
                    break;
            }
        }
        else
        {
            redirect('/');
        }
    }

    private function index_user()
    {
        $this->load->view('dashboard/home/user', array('user' => $_SESSION['user']['auth'], 'year' => Carbon::now()->year));
    }

    private function index_counselor()
    {
        $this->load->view('dashboard/home/counselor', array('user' => $_SESSION['user']['auth'], 'year' => Carbon::now()->year));
    }
}