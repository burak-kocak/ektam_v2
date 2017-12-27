<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator_Model Extends CI_Model {
    public function __constructor() {
        parent::__contructor();
    }

    public function index() {

    }

    public function count($table) {
        $query = $this->db->count_all_results($table);

        return $query;
    }

    public function tree($path = 'uploads/') {
        if($path != 'uploads/') {
            $query = $this->db->like('path', $path, 'both')
                ->from('upload_paths')
                ->get()->result();
        } else {
            $query = $this->db->select()
                ->from('upload_paths')
                ->get()->result();
        }

        return $query;
    }

    public function docs($current_path = '') {
        if($current_path != '') {
            $query = $this->db->select()
                ->from('uploads')
                ->where('path', $current_path)
                ->get()->result();
        } else {
            $query = $this->db->select()
                ->from('uploads')
                ->get()->result();
        }

        return $query;
    }
}