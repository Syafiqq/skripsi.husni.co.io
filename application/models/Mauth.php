<?php
/**
 * This <skripsi.husni.co.io> project created by :
 * Name         : syafiq
 * Date / Time  : 03 December 2016, 8:39 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Mauth extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }

    /**
     * @param $email
     * @param $password
     * return array
     */
    public function login($email, $password)
    {
        $query = 'SELECT `id`, `username`, `email`, `password`, `status` FROM `user` WHERE `email` = ? AND `password` = ? LIMIT 1';
        $result = $this->db->query($query, array(strtolower($email), md5(md5($password))));
        return $result->result_array();
    }
}