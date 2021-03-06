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
                    return;
                case 'counselor' :
                {
                    $this->index_counselor();
                }
                    return;
            }
            redirect('/');
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
        $storiesMetadata = $this->mstory->getAllStoriesMetadata($_SESSION['user']['auth']['id']);
        $this->load->view('dashboard/home/user', array(
            'user' => $_SESSION['user']['auth'],
            'year' => Carbon::now()->year,
            'storyTotal' => array(
                'stored' => $storedStory[0]['count'],
                'unfinished' => $unfinishedStory[0]['count'],
                'shared' => $sharedStory[0]['count']),
            'storiesMetadata' => $storiesMetadata
        ));
    }

    private function index_counselor()
    {
        $this->load->model('mstory');
        $this->load->model('mauth');
        $follower = $this->mstory->getFollower($_SESSION['user']['auth']['id']);
        $unreadStory = $this->mstory->getUnreadStory($_SESSION['user']['auth']['id']);
        $submittedStory = $this->mstory->getStorySubmitted($_SESSION['user']['auth']['id']);
        $storiesMetadata = $this->mstory->getAllSharedStoriesMetadata($_SESSION['user']['auth']['id']);
        foreach ($storiesMetadata as $key => $value)
        {
            $storiesMetadata[$key]['user'] = $this->mauth->getNameAndEmail($value['user'])[0];
        }
        $this->load->view('dashboard/home/counselor', array(
            'user' => $_SESSION['user']['auth'],
            'year' => Carbon::now()->year,
            'storyTotal' => array(
                'follow' => $follower[0]['count'],
                'unread' => $unreadStory[0]['count'],
                'shared' => $submittedStory[0]['count']),
            'storiesMetadata' => $storiesMetadata
        ));
    }
}