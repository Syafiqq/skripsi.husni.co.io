<?php
/**
 * This <emosi.ekspresif> project created by :
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
        // Your own constructor code
    }

    public function index()
    {
        if (isset($_SESSION['user']['auth']))
        {
            redirect('dashboard');
        }
        else
        {
            redirect('/');
        }
    }

    public function login()
    {
        if (isset($_SESSION['user']['auth']))
        {
            redirect('dashboard');
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
                $_POST['email'] = strtolower($_POST['email']);
                $_POST['role'] = strtolower($_POST['role']);
                if ($this->isEmailValid($_POST['email']))
                {
                    $this->load->model('mauth');
                    $result = $this->mauth->login($_POST['email'], $_POST['password'], isset($_POST['role']) ? $_POST['role'] : 'student');
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
                    echo json_encode(array('code' => 402, 'message' => 'Invalid Email', 'data' => array('notify' => array(
                        array('Invalid Email', 'info')
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

    private function isEmailValid($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function register()
    {
        if (isset($_SESSION['user']['auth']))
        {
            redirect('dashboard');
        }
        else
        {
            $this->load->view('auth/register');
        }
    }

    public function do_register()
    {
        log_message('ERROR', var_export($_POST, true));
        if ($this->input->is_ajax_request() && ($_SERVER['REQUEST_METHOD'] === 'POST'))
        {
            if (isset($_POST['username']) &&
                isset($_POST['kelas']) &&
                isset($_POST['email']) &&
                isset($_POST['role']) &&
                isset($_POST['choosen_counselor']) &&
                isset($_POST['gender']) &&
                isset($_POST['password']) &&
                isset($_POST['status'])
            )
            {
                $_POST['email'] = strtolower($_POST['email']);
                if ($this->isEmailValid($_POST['email']))
                {
                    $_POST['role'] = strtolower($_POST['role']);
                    if (($_POST['role'] == 'student') || ($_POST['role'] == 'counselor'))
                    {
                        $_POST['gender'] = strtolower($_POST['gender']);
                        $this->load->model('mauth');
                        $result = $this->mauth->login($_POST['email'], $_POST['password'], $_POST['role']);
                        if (count($result) == 0)
                        {
                            $_POST['kelas'] = strlen($_POST['kelas']) == 0 ? '-' : $_POST['kelas'];
                            $id = $this->mauth->register($_POST['username'], $_POST['kelas'], $_POST['email'], $_POST['role'], $_POST['gender'], $_POST['password'], $_POST['status']);
                            log_message('ERROR', 'GATE 1 ' . var_export($id, true));

                            if ($_POST['role'] == 'student')
                            {
                                log_message('ERROR', 'GATE 2 STUDENT');
                                if (is_numeric($id))
                                {
                                    log_message('ERROR', 'GATE 3 IS NUMERIC ' . var_export($_POST['choosen_counselor'], true));

                                    $counselor = $this->mauth->getSpecificUser($_POST['choosen_counselor'], 'counselor');
                                    log_message('ERROR', 'GATE 4 ' . var_export($counselor, true));
                                    if (is_array($counselor) && (count($counselor) > 0))
                                    {
                                        log_message('ERROR', 'GATE 5 EXISTS');

                                        $this->load->model('mmember');
                                        $this->mmember->add($id, $_POST['choosen_counselor']);
                                        echo json_encode(array('code' => 200, 'message' => 'Accepted', 'redirect' => site_url('auth/login'), 'data' => array('notify' => array(
                                            array('Authentication complete', 'success')
                                        ))));
                                        return;
                                    }
                                }
                            }
                            else
                            {
                                echo json_encode(array('code' => 200, 'message' => 'Accepted', 'redirect' => site_url('auth/login'), 'data' => array('notify' => array(
                                    array('Authentication complete', 'success')
                                ))));
                                return;
                            }
                            echo json_encode(array('code' => 401, 'message' => 'Error', 'data' => array('notify' => array(
                                array('Error', 'danger')
                            ))));

                        }
                        else
                        {
                            echo json_encode(array('code' => 402, 'message' => 'Email Already Exists', 'data' => array('notify' => array(
                                array('Email Already Exists', 'info')
                            ))));
                        }
                    }
                    else
                    {
                        echo json_encode(array('code' => 402, 'message' => 'Invalid Role', 'data' => array('notify' => array(
                            array('Invalid Role', 'info')
                        ))));
                    }
                }
                else
                {
                    echo json_encode(array('code' => 402, 'message' => 'Invalid Email', 'data' => array('notify' => array(
                        array('Invalid Email', 'info')
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


    public function do_signout()
    {
        session_destroy();
        echo json_encode(array('code' => 200, 'message' => 'Accepted', 'data' => array('notify' => array(
            array('Sign out successfully', 'success')
        ))));
    }

    public function get_counselor_data()
    {
        if ($this->input->is_ajax_request() && ($_SERVER['REQUEST_METHOD'] === 'POST'))
        {
            $this->load->model('mauth');
            $counselors = $this->mauth->getAllCounselor();
            echo json_encode($counselors);
        }
        else
        {
            echo json_encode(array('code' => 401, 'message' => 'Bad Request', 'data' => array('notify' => array(
                array('danger', 'Bad Request')
            ))));
        }
    }

}