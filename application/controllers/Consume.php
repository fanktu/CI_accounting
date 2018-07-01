<?php

class Consume extends CI_Controller {

  function __construct()
  {
    parent::__construct();

    // load helpers
    $this->load->helper('url');
  }

  function index()
  {
    // display information for the view
    $data['title'] = "記帳簿：主頁";
    $data['headline'] = "歡迎使用記帳簿系統";
    $data['include'] = 'consume_index';

    $this->load->view('template', $data);
  }

  function add()
  {
    $this->load->helper('form');

    // display information for the view
    $data['title'] = "記帳簿：新增消費";
    $data['headline'] = "新增一筆消費";
    $data['include'] = 'consume_add';

    $this->load->view('template', $data);
  }

  function create()
  {
    $this->load->helper('url');

    $this->load->model('MConsume','',TRUE);
    $this->MConsume->addConsume($_POST);
    redirect('consume/listing','refresh');
  }

  function listing()
  {
    $this->load->library('table');

    $this->load->model('MConsume','',TRUE);
    $consumes_qry = $this->MConsume->listConsumes();

    // generate HTML table from query results
    $tmpl = array (
      'table_open' => '<table border="0" cellpadding="3" cellspacing="0">',
      'heading_row_start' => '<tr bgcolor="#66cc44">',
      'row_start' => '<tr bgcolor="#dddddd">'
    );
    $this->table->set_template($tmpl);

    $this->table->set_empty("&nbsp;");

    $this->table->set_heading('', '消費日期', '類別', '金額', '備註');


    $table_row = array();
    foreach ($consumes_qry->result() as $consume)
    {
      $table_row = NULL;
      $table_row[] = '<nobr>' .
      anchor('consume/edit/' . $consume->id, '編輯') . ' | ' .
      anchor('consume/delete/' . $consume->id, '刪除',
      "onClick=\" return confirm('你確定想要 刪除資料 $consume->date $consume->category?')\"") .
      '</nobr>';
      // replaced above :: $table_row[] = anchor('consume/edit/' . $consume->id, 'edit');
      $table_row[] = $consume->date;
      $table_row[] = $consume->category;
      $table_row[] = $consume->money;
      $table_row[] = $consume->memo;

      $this->table->add_row($table_row);
    }

    $consumes_table = $this->table->generate();

    // generate HTML table from query results
    // replaced above :: $consumes_table = $this->table->generate($consumes_qry);

    // display information for the view
    $data['title'] = "記帳簿：消費明細";
    $data['headline'] = "消費明細";
    $data['include'] = 'consume_listing';

    $data['data_table'] = $consumes_table;

    $this->load->view('template', $data);
  }

  function edit()
  {
  $this->load->helper('form');

  $id = $this->uri->segment(3);
  $this->load->model('MConsume','',TRUE);
  $data['row'] = $this->MConsume->getConsume($id)->result();

  // display information for the view
  $data['title'] = "記帳簿：修改消費記錄";
  $data['headline'] = "修改消費記錄";
  $data['include'] = 'consume_edit';

  $this->load->view('template', $data);
  }

  function update()
  {
  $this->load->model('MConsume','',TRUE);
  $this->MConsume->updateConsume($_POST['id'], $_POST);
  redirect('consume/listing','refresh');
  }

  function delete()
  {
  $id = $this->uri->segment(3);

  $this->load->model('MConsume','',TRUE);
  $this->MConsume->deleteConsume($id);
  redirect('consume/listing','refresh');
  }

}
/* End of file consume.php */
/* Location: ./system/application/controllers/consume.php */
