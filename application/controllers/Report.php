<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sale_model', 'sale');
    }
    public function sale_report()
    {
        $data['report_sale'] = $this->sale->getJoinAll()->result();

        $this->template->load('template/template', 'report/sale', $data);
    }
    public function hapusSaleReport()
    {
        $id = $this->input->post('id');
        $query = $this->sale->hapusReport($id);
        echo json_encode($query);
    }
    public function cetakSaleReport($id)
    {
        $data['report'] = $this->sale->getJoinId($id)->row();

        $html = $this->load->view('print/report', $data, true);
        $this->data->print($html, 'report-' . date('ymd'), 'A4', 'potrait');
    }
}
