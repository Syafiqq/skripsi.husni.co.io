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
     * @param string $email
     * @param string $password
     * @param string $role
     * @return array
     */
    public function login($email, $password, $role)
    {
        $query = 'SELECT `id`, `username`, `email`, `role`, `gender`, `password`, `status`, `avatar` FROM `user` WHERE `email` = ? AND `password` = ? AND `role` = ? LIMIT 1';
        $result = $this->db->query($query, array($email, md5(md5($password)), $role));
        return $result->result_array();
    }

    public function register($username, $email, $role, $gender, $password, $status)
    {
        if ($gender == 'm')
        {
            $avatar = mt_rand(0, 22);
        }
        else
        {
            $avatar = mt_rand(0, 26);
        }
        $query = 'INSERT INTO `user`(`id`, `username`, `email`, `role`, `gender`, `password`, `status`, `avatar`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)';
        $this->db->query($query, array($username, $email, $role, (string)$gender, md5(md5($password)), $status, (int)$avatar));
    }

    public function getNameAndEmail($id)
    {
        $query = 'SELECT `id`, `username`, `email` FROM `user` WHERE `id` = ?';
        $result = $this->db->query($query, array((int)$id));
        return $result->result_array();
    }
}