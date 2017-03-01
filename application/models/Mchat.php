<?php
/**
 * This <skripsi.husni.co.io> project created by :
 * Name         : syafiq
 * Date / Time  : 27 February 2017, 1:03 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Mchat extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }

    public function addMessage($storyID, $assigneeID, $message)
    {
        $query = 'INSERT INTO `chat`(`id`, `story`, `assign`, `text`, `create_at`) VALUES (NULL, ?, ?, ?, CURRENT_TIMESTAMP)';
        $this->db->query($query, array((int)$storyID, (int)$assigneeID, $message));
    }

    public function getAll($storyID)
    {
        $query = 'SELECT `chat`.`assign`, `chat`.`text`, `chat`.`create_at` FROM `chat` WHERE `chat`.`story` = ? ORDER BY `chat`.`create_at` ASC';
        $result = $this->db->query($query, array((int)$storyID));
        return $result->result_array();
    }
}