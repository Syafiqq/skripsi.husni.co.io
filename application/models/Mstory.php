<?php
/**
 * This <skripsi.husni.co.io> project created by :
 * Name         : syafiq
 * Date / Time  : 04 December 2016, 3:30 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Mstory extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }

    /**
     * @param int $user
     * @param string $title
     * @param string $information
     * @param string $main
     */
    public function publish($user, $title, $information, $main)
    {
        $query = 'INSERT INTO `story`(`id`, `user`, `counselor`, `title`, `information`, `main`, `created`, `update`, `count`, `published`) VALUES (NULL, ?, NULL, ?, ?, ?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 0)';
        $this->db->query($query, array((int)$user, $title, $information, $main));
    }

    public function getAllStoriesMetadata($user)
    {
        $query = 'SELECT `id`, `user`, `counselor`, `title`, `rating`, `published` FROM `story` WHERE user = ?';
        $result = $this->db->query($query, array((int)$user));
        return $result->result_array();
    }

    public function getStoredStoryCount($user)
    {
        $query = 'SELECT count(`id`) AS \'count\' FROM `story` WHERE user = ? LIMIT 1';
        $result = $this->db->query($query, array((int)$user));
        return $result->result_array();
    }

    public function getUnfinishedStoryCount($user)
    {
        $query = 'SELECT count(`id`) AS \'count\' FROM `story` WHERE user = ? AND published = 0 LIMIT 1';
        $result = $this->db->query($query, array((int)$user));
        return $result->result_array();
    }

    public function getSharedStoryCount($user)
    {
        $query = 'SELECT count(`id`) AS \'count\' FROM `story` WHERE user = ? AND `counselor` IS NOT NULL LIMIT 1';
        $result = $this->db->query($query, array((int)$user));
        return $result->result_array();
    }
}