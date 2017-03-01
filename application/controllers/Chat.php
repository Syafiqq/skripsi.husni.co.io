<?php
/**
 * This <skripsi.husni.co.io> project created by :
 * Name         : syafiq
 * Date / Time  : 27 February 2017, 12:57 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller
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

    public function sendc()
    {
        $this->send('counselor');
    }

    public function send($type)
    {
        if ($this->input->is_ajax_request() && ($_SERVER['REQUEST_METHOD'] === 'POST'))
        {
            if (isset($_POST['message']) &&
                isset($_GET['id'])
            )
            {
                $this->load->model('mstory');
                if ($type === 'counselor')
                {
                    $story = $this->mstory->getSpecificStoryForCounselor($_SESSION['user']['auth']['id'], $_GET['id']);
                }
                else
                {
                    $story = $this->mstory->getSpecificStory($_SESSION['user']['auth']['id'], $_GET['id']);
                }
                if (count($story) > 0)
                {
                    $this->load->model('mchat');
                    $this->mchat->addMessage($_GET['id'], $_SESSION['user']['auth']['id'], $_POST['message']);
                    echo json_encode(array('code' => 200, 'message' => 'Message Sent'));
                }
                else
                {
                    echo json_encode(array('code' => 402, 'message' => 'Invalid Story', 'data' => array('notify' => array(
                        array('Invalid Story', 'warning')
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
                array('Update Rating Error', 'danger')
            ))));
        }
    }

    public function sends()
    {
        $this->send('student');
    }

    public function getc()
    {
        $this->get('counselor');
    }

    public function get($type)
    {
        if ($this->input->is_ajax_request() && ($_SERVER['REQUEST_METHOD'] === 'POST'))
        {
            if (isset($_GET['id']))
            {
                $this->load->model('mstory');
                if ($type === 'counselor')
                {
                    $story = $this->mstory->getSpecificStoryForCounselor($_SESSION['user']['auth']['id'], $_GET['id']);
                }
                else
                {
                    $story = $this->mstory->getSpecificStory($_SESSION['user']['auth']['id'], $_GET['id']);
                }
                if (count($story) > 0)
                {
                    $this->load->model('mauth');
                    $story = $story[0];
                    $_users = array($story['user'], $story['counselor']);
                    $users = array();
                    foreach ($_users as $_user)
                    {
                        $users[".{$_user}"] = $this->mauth->getChatInformation($_user)[0];
                        $users[".{$_user}"]['avatar'] = base_url('assets/frontend/avatar/' . ($users[".{$_user}"]['gender'] == 'm' ?
                                'm/boy-' . $users[".{$_user}"]['avatar'] . '.png' :
                                'w/girl-' . $users[".{$_user}"]['avatar'] . '.png'));
                        $users[".{$_user}"]['isuser'] = $_user == $_SESSION['user']['auth']['id'];
                        unset($users[".{$_user}"]['gender']);
                    }
                    $this->load->model('mchat');
                    $chat = $this->mchat->getAll($_GET['id']);
                    foreach ($chat as &$_chat)
                    {
                        $_chat['assign'] = $users[".{$_chat['assign']}"];
                    }
                    echo json_encode(array('code' => 200, 'message' => 'Message Sent', 'chat' => $chat));
                }
                else
                {
                    echo json_encode(array('code' => 402, 'message' => 'Invalid Story', 'data' => array('notify' => array(
                        array('Invalid Story', 'warning')
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
                array('Update Rating Error', 'danger')
            ))));
        }
    }

    public function gets()
    {
        $this->get('student');
    }
}