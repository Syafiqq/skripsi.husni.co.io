<?php
/**
 * This <skripsi.husni.co.io> project created by :
 * Name         : syafiq
 * Date / Time  : 03 December 2016, 6:07 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
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
        unset($_SESSION);
        // Your own constructor code
    }

    public function index()
    {

    }

    public function login()
    {
        if (isset($_SESSION['user']['auth']))
        {
            redirect('/');
        }
        else
        {
            if (isset($_GET['role']))
            {
                if (strtolower($_GET['role']) == 'counselor')
                {
                    $this->load->view('auth/login/counselor');
                    return;
                }
            }
            $this->load->view('auth/login/user');
        }
    }

    public function do_login()
    {
        if ($this->input->is_ajax_request() && ($_SERVER['REQUEST_METHOD'] === 'POST'))
        {
            if (isset($_POST['email']) && isset($_POST['password']))
            {
                $this->load->model('mauth');
                $result = $this->mauth->login($_POST['email'], $_POST['password'], isset($_POST['role']) ? $_POST['role'] : 'user');
                if (count($result) > 0)
                {
                    $_SESSION['user']['auth'] = $result[0];
                    echo json_encode(array('code' => 200, 'message' => 'Accepted', 'data' => array('notify' => array(
                        array('Authentication complete', 'success')
                    ))));
                }
                else
                {
                    echo json_encode(array('code' => 403, 'message' => 'User Not Registered', 'data' => array('notify' => array(
                        array('User Not Registered', 'info')
                    ))));
                }
            }
            else
            {
                echo json_encode(array('code' => 402, 'message' => 'Insufficient Data', 'data' => array('notify' => array(
                    array('Insufficient Data', 'info')
                ))));
            }
        }
        else
        {
            echo json_encode(array('code' => 401, 'message' => 'Bad Request', 'data' => array('notify' => array(
                array('danger', 'Bad Request')
            ))));
        }
    }

    public function register()
    {
    }


}