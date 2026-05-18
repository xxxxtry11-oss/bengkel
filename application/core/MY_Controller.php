<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * MY_Controller
 * 
 * Disiapkan untuk teman-teman yang membutuhkan loadPartials
 * (Praktikum 3 - Partials). Fitur Authorization tidak memakainya.
 */
class MY_Controller extends CI_Controller {

    public function loadPartials($view = '', $data = '')
    {
        $this->load->view('_partials/headers', $data);
        $this->load->view($view, $data);
        $this->load->view('_partials/footer');
    }

}
