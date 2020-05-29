<?php


class Data
{

    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('user_model', 'user_data');
    }

    public function get_data()
    {
        $id = $this->ci->session->userdata('user_id');
        $result = $this->ci->user_data->get($id)->row();
        return $result;
    }

    public function print($html, $file_name, $paper, $orientation)
    {
        $options = new Dompdf\Options();
        $options->set('isRemoteEnabled', true);
        // $options->set('isHtml5ParserEnabled', true);
        // instantiate and use the dompdf class
        $dompdf = new Dompdf\Dompdf($options);

        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper($paper, $orientation);

        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF to Browser
        $dompdf->stream($file_name, array('Attachment' => 0));
    }
    public function item_count()
    {
        $this->ci->load->model('items_model');
        return $this->ci->items_model->get()->num_rows();
    }
    public function suplier_count()
    {
        $this->ci->load->model('suplier_model');
        return $this->ci->suplier_model->get()->num_rows();
    }
    public function customer_count()
    {
        $this->ci->load->model('customers_model');
        return $this->ci->customers_model->get()->num_rows();
    }
    public function user_count()
    {
        $this->ci->load->model('user_model');
        return $this->ci->user_model->get()->num_rows();
    }
}
