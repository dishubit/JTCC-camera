<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class ExportExcel extends CI_Controller {
    
        public function index()
        {
            $this->load->model("Keluhanmav_model");

            $data["jeniskeluhan"] = $this->Keluhanmav_model->getJenisKeluhan();
            $data["camera"] = $this->Keluhanmav_model->getCamera();
            $data["terminal"] = $this->Keluhanmav_model->getTerminal();
            $data['data_keluhan'] = $this->Keluhanmav_model->showKeluhan();
            
            $this->load->view("keluhan/keluhanmav", $data);
        }

        public function Action()
        {
            $this->load->model("Keluhanmav_model");
            $this->load->library("excel");
            $object = new PHPExcel();

            $object->setActiveSheetIndex(0);

            $table_columns = array("Tanggal Keluhan", "Terminal", "Jenis Keluhan", "Isi Keluhan", "Tanggal Penanganan", "Penanggung Jawab");

            $column = 0;

            foreach($table_columns as $field)
            {
                $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
                $column++;
            }

            $data_keluhan = $this->Keluhanmav_model->fetch_data();

            $excel_row = 2;
        

            foreach($data_keluhan as $row)
            {
                $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->tgl_keluhan);
                $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->address);
                $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->gender);
                $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->designation);
                $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->age);
                $excel_row++;
            }

            $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="keluhan".xls"');
            $object_writer->save('php://output');
        
        }
    }
    
    /* End of file ExportExcel.php */
    
?>