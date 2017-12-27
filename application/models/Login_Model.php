<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Model Extends CI_Model {
    public function __constructor() {
        parent::__contructor();
    }

    // Check login credentials match any user data on database and return
    public function index($args) {
        $query = $this->db->select()
                    ->from('authorized_users')
                    ->where('email', $args->username)
                    ->where('password', $args->password)
                    ->get()->row();
        if(!isset($query)) {
            $query = $this->db->select()
                ->from('customers')
                ->where('email', $args->username)
                ->where('password', $args->password)
                ->get()->row();
        }
        return $query;
    }
}