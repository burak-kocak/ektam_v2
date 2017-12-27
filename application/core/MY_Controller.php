<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_Controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        // PHP -> "strtotime" fonksiyonu timezone'un ayarlı olmasını istiyor.
        date_default_timezone_set('Europe/Istanbul'); 

        // Language
        if(!$this->session->lang)
            $this->session->set_userdata('lang', 'TR');

        $lang = $this->session->lang;

        $this->lang->load('ui_lang', $lang);
		$this->lang->load('email_lang', $lang);
        $this->lang->load('notification_lang', $lang);
    }

    // Login Redirects for All Controllers except Login
    public function control_loginRedirects() {
        if(empty($this->session->userdata('user')->email)) {
            redirect(base_url());
        } else if(!empty($this->session->userdata('user')->authorisation) AND 
                    (current_url() == base_url('dashboard/customer')) OR 
                    current_url() == base_url('login/validate')) {
            redirect(base_url('dashboard/administrator'));
        } else if(empty($this->session->userdata('user')->authorisation) AND 
                    ((current_url() == base_url('dashboard/administrator')) OR strpos(current_url(), base_url('dashboard/administrator')) !== FALSE) OR 
                    current_url() == base_url('login/validate')) {
            redirect(base_url('dashboard/customer'));
        }
    }

    // Login redirects for Login Controller only
    public function default_loginRedirect() {
        if(!empty($this->session->userdata('user')->email)) {
            if(!empty($this->session->userdata('user')->authorisation))
                redirect(base_url('dashboard/administrator'));
            else
                redirect(base_url('dashboard/customer'));
        } else if(current_url() != base_url() AND 
                    current_url() != base_url('login/validate')) {
            redirect(base_url());
        }
    }



    // Client IP
    function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }



    // Format Size Units in KB/MB/GB etc...
    function formatSizeUnits($bytes)
    {
        if ($bytes >= 1099511627776)
        {
            $bytes = number_format($bytes / 1099511627776, 2) . ' TB';
        }
        elseif ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
    }



    // Get Folder Size of the Specified Directory
    public function folderSize ($dir)
	{
        $size = 0;
        $count = 0;
        foreach (glob(rtrim($dir, '/').'/*', GLOB_NOSORT) as $each) {
            if(is_file($each)) {
                $size += filesize($each);
                $count++;
            } else {
                $result = $this->folderSize($each);
                $size += $result['size'];
                $count += $result['count'];
            }
            //$size += is_file($each) ? filesize($each) : $this->folderSize($each);
        }
		return array('size' => $size, 'count' => $count);
	}

}