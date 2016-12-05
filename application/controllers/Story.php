<?php
/**
 * This <skripsi.husni.co.io> project created by :
 * Name         : syafiq
 * Date / Time  : 04 December 2016, 1:59 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */
use Carbon\Carbon;

defined('BASEPATH') OR exit('No direct script access allowed');

class Story extends CI_Controller
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
        redirect('story/tell');
    }

    public function tell()
    {
        if (isset($_SESSION['user']['auth']))
        {
            switch ($_SESSION['user']['auth']['role'])
            {
                case 'student' :
                {
                    $this->index_user();
                }
                    return;
            }
            redirect('dashboard');
        }
        else
        {
            redirect('/');
        }
    }

    private function index_user()
    {
        $this->load->model('mstory');
        $storedStory = $this->mstory->getStoredStoryCount($_SESSION['user']['auth']['id']);
        $unfinishedStory = $this->mstory->getUnfinishedStoryCount($_SESSION['user']['auth']['id']);
        $sharedStory = $this->mstory->getSharedStoryCount($_SESSION['user']['auth']['id']);
        $this->load->view('story/index/user', array(
            'user' => $_SESSION['user']['auth'],
            'year' => Carbon::now()->year,
            'storyTotal' => array(
                'stored' => $storedStory[0]['count'],
                'unfinished' => $unfinishedStory[0]['count'],
                'shared' => $sharedStory[0]['count'],
            )));
    }

    public function detail()
    {
        if (isset($_SESSION['user']['auth']))
        {
            if (isset($_GET['id']))
            {
                switch ($_SESSION['user']['auth']['role'])
                {
                    case 'student' :
                    {
                        $this->load->model('mstory');
                        $storedStory = $this->mstory->getStoredStoryCount($_SESSION['user']['auth']['id']);
                        $unfinishedStory = $this->mstory->getUnfinishedStoryCount($_SESSION['user']['auth']['id']);
                        $sharedStory = $this->mstory->getSharedStoryCount($_SESSION['user']['auth']['id']);
                        $story = $this->mstory->getSpecificStory($_SESSION['user']['auth']['id'], $_GET['id']);
                        if (count($story) > 0)
                        {
                            $story = $story[0];
                            if ($story['counselor'] != null)
                            {
                                $this->load->model('mauth');
                                $story['counselor'] = $this->mauth->getNameAndEmail($story['counselor'])[0];
                            }
                        }
                        else
                        {
                            $story = array();
                        }
                        $this->load->view('story/detail/user', array(
                            'user' => $_SESSION['user']['auth'],
                            'year' => Carbon::now()->year,
                            'storyTotal' => array(
                                'stored' => $storedStory[0]['count'],
                                'unfinished' => $unfinishedStory[0]['count'],
                                'shared' => $sharedStory[0]['count']),
                            'story' => $story));
                    }
                        return;
                }
                redirect('dashboard');
            }
            else
            {
                redirect('dashboard');
            }
        }
        else
        {
            redirect('/');
        }
    }

    public function edit()
    {
        if (isset($_SESSION['user']['auth']))
        {
            if (isset($_GET['id']))
            {
                switch ($_SESSION['user']['auth']['role'])
                {
                    case 'student' :
                    {
                        $this->load->model('mstory');
                        $storedStory = $this->mstory->getStoredStoryCount($_SESSION['user']['auth']['id']);
                        $unfinishedStory = $this->mstory->getUnfinishedStoryCount($_SESSION['user']['auth']['id']);
                        $sharedStory = $this->mstory->getSharedStoryCount($_SESSION['user']['auth']['id']);
                        $story = $this->mstory->getSpecificStoryData($_SESSION['user']['auth']['id'], $_GET['id']);
                        if ((count($story) > 0) && ($story[0]['published'] == 0))
                        {
                            $story = $story[0];
                        }
                        else
                        {
                            $story = array();
                        }
                        $this->load->view('story/edit/user', array(
                            'user' => $_SESSION['user']['auth'],
                            'year' => Carbon::now()->year,
                            'storyTotal' => array(
                                'stored' => $storedStory[0]['count'],
                                'unfinished' => $unfinishedStory[0]['count'],
                                'shared' => $sharedStory[0]['count']),
                            'story' => $story));
                    }
                        return;
                }
                redirect('dashboard');
            }
            else
            {
                redirect('dashboard');
            }
        }
        else
        {
            redirect('/');
        }
    }

    public function do_publish()
    {
        if ($this->input->is_ajax_request() && ($_SERVER['REQUEST_METHOD'] === 'POST'))
        {
            if (isset($_POST['title']) &&
                isset($_POST['information']) &&
                isset($_POST['main'])
            )
            {
                $this->load->model('mstory');
                $this->mstory->publish($_SESSION['user']['auth']['id'], $_POST['title'], $_POST['information'], $_POST['main']);
                echo json_encode(array('code' => 200, 'message' => 'Accepted', 'data' => array('notify' => array(
                    array('Publishing complete', 'success')
                ))));
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

    public function do_updaterating()
    {
        if ($this->input->is_ajax_request() && ($_SERVER['REQUEST_METHOD'] === 'POST'))
        {
            if (isset($_POST['value']) && isset($_GET['id']))
            {
                $this->load->model('mstory');
                $story = $this->mstory->getSpecificStory($_SESSION['user']['auth']['id'], $_GET['id']);
                if (count($story) > 0)
                {
                    if (($_POST['value'] >= 0.0) && ($_POST['value'] <= 10.0))
                    {
                        $this->mstory->updateRating($_GET['id'], $_POST['value']);
                        echo json_encode(array('code' => 200, 'message' => 'Update Successful', 'data' => array('notify' => array(
                            array('Update Successful', 'success')
                        ))));
                    }
                    else
                    {
                        echo json_encode(array('code' => 402, 'message' => 'Invalid Rating', 'data' => array('notify' => array(
                            array('Invalid Rating', 'warning')
                        ))));
                    }
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

    public function do_mark()
    {
        if ($this->input->is_ajax_request() && ($_SERVER['REQUEST_METHOD'] === 'POST'))
        {
            if (isset($_GET['id']))
            {
                $this->load->model('mstory');
                $story = $this->mstory->getSpecificStory($_SESSION['user']['auth']['id'], $_GET['id']);
                if (count($story) > 0)
                {
                    if ($story[0]['published'] == 0)
                    {
                        $this->mstory->do_publish($_GET['id']);
                        echo json_encode(array('code' => 200, 'message' => 'Change Successful', 'data' => array('notify' => array(
                            array('Change Successful', 'success')
                        ))));
                    }
                    else
                    {
                        echo json_encode(array('code' => 402, 'message' => 'Story is already finished', 'data' => array('notify' => array(
                            array('Story is already finished', 'warning')
                        ))));
                    }
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

    public function do_edit()
    {
        if ($this->input->is_ajax_request() && ($_SERVER['REQUEST_METHOD'] === 'POST'))
        {
            if (isset($_POST['main']) && isset($_GET['id']))
            {
                $this->load->model('mstory');
                $story = $this->mstory->getSpecificStory($_SESSION['user']['auth']['id'], $_GET['id']);
                if (count($story) > 0)
                {
                    $this->mstory->updateStoryMain($_GET['id'], $_POST['main']);
                    echo json_encode(array('code' => 200, 'message' => 'Update Successful', 'redirect' => site_url('story/detail') . '?id=' . $_GET['id'], 'data' => array('notify' => array(
                        array('Update Successful', 'success')
                    ))));
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
}