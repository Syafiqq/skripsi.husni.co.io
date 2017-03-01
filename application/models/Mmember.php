<?php
/**
 * This <skripsi.husni.co.io> project created by :
 * Name         : syafiq
 * Date / Time  : 24 February 2017, 8:59 AM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Mmember extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }

    public function add($student, $counselor)
    {
        $query = 'INSERT INTO `member`(`student`, `counselor`) VALUES (?, ?)';
        $this->db->query($query, array($student, $counselor));
    }

    public function getCounselor($student)
    {
        $query = 'SELECT `counselor` FROM `member` WHERE `student` = ?';
        $result = $this->db->query($query, array((int)$student));
        return $result->result_array();
    }
}