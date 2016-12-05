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
        $query = 'INSERT INTO `story`(`id`, `user`, `counselor`, `title`, `information`, `main`, `created`, `update`, `count`, `published`, `read`) VALUES (NULL, ?, NULL, ?, ?, ?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 0, 0)';
        $this->db->query($query, array((int)$user, $title, $information, $main));
    }

    public function getAllStoriesMetadata($user)
    {
        $query = 'SELECT `id`, `user`, `counselor`, `title`, `rating`, `published`, `read` FROM `story` WHERE user = ?';
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

    public function getSpecificStory($user, $storyID)
    {
        $query = 'SELECT `id`, `user`, `counselor`, `title`, `information`, `main`, `rating`, `created`, `update`, `count`, `published` FROM `story` WHERE `user` = ? AND `id` = ? LIMIT 1';
        $result = $this->db->query($query, array((int)$user, (int)$storyID));
        return $result->result_array();
    }

    public function getSpecificStoryData($user, $storyID)
    {
        $query = 'SELECT `id`, `title`, `main`, `published` FROM `story` WHERE `user` = ? AND `id` = ? LIMIT 1';
        $result = $this->db->query($query, array((int)$user, (int)$storyID));
        return $result->result_array();
    }

    public function updateRating($story, $value)
    {
        $query = 'UPDATE `story` SET `rating`= ? WHERE id = ?';
        $this->db->query($query, array((float)round($value, 1, PHP_ROUND_HALF_UP), (int)$story));
    }

    public function do_publish($story)
    {
        $query = 'UPDATE `story` SET `published`= 1 WHERE id = ?';
        $this->db->query($query, array((int)$story));
    }

    public function updateStoryMain($story, $main)
    {
        $query = 'UPDATE `story` SET `main`= ?, `count` = `count` + 1, `update` = CURRENT_TIMESTAMP WHERE id = ?';
        $this->db->query($query, array($main, (int)$story));
    }

    public function assignCounselor($story, $counselor)
    {
        $query = 'UPDATE `story` SET `counselor`= ? WHERE id = ?';
        $this->db->query($query, array((int)$counselor, (int)$story));
    }

    public function getFollower($user)
    {
        $query = 'SELECT count(DISTINCT `user`) AS \'count\' FROM `story` WHERE `counselor` = ? LIMIT 1';
        $result = $this->db->query($query, array((int)$user));
        return $result->result_array();
    }

    public function getUnreadStory($user)
    {
        $query = 'SELECT count(`id`) AS \'count\' FROM `story` WHERE `counselor` = ? AND `read` = 0 LIMIT 1';
        $result = $this->db->query($query, array((int)$user));
        return $result->result_array();
    }

    public function getStorySubmitted($user)
    {
        $query = 'SELECT count(`id`) AS \'count\' FROM `story` WHERE `counselor` = ? LIMIT 1';
        $result = $this->db->query($query, array((int)$user));
        return $result->result_array();
    }

    public function getAllSharedStoriesMetadata($user)
    {
        $query = 'SELECT `id`, `user`, `counselor`, `title`, `rating`, `published`, `read` FROM `story` WHERE `counselor` = ?';
        $result = $this->db->query($query, array((int)$user));
        return $result->result_array();
    }
}