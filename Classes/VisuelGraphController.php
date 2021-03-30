<?php

namespace Dept49\Chartum\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class VisuelGraphController extends ActionController {

    public function listAction() {

        $settings = $this->settings;
        $this->view->assign('Text', $settings['text']);
        $this->view->assign('Select', $settings['form']);
        $this->view->assign('Input', $settings['input']);
        //$this->view->assign('Input_2', $settings['input_2']);
        $csv = $this->getcsvdata($settings['input_2']);
        $this->view->assign('csvdata', $csv);
        $this->view->assign('Legende1', $settings['text_2']);
        $this->view->assign('Legende2', $settings['text_3']);
        $outputPath = "fileadmin/user_upload/downloadfile.csv";
        $this->createCsvWithoutColor($settings['input_2'], $outputPath);
    }



    public function getcsvdata ($path) {
        $file = fopen($path, 'r');
        $array = [];
        
        while ($row = fgetcsv($file)) {
            array_push($array, $row); 
        }
        
        $json = json_encode($array);
        
        return $json;
    }

    public function createCsvWithoutColor($inputPath, $outputPath) {

        

        if (($handle = fopen($inputPath, "r")) !==  FALSE) {
            $newcsv = fopen($outputPath, "w");
            while (($data = fgetcsv($handle)) !== FALSE) {

                fputcsv($newcsv, array_slice($data, 0, -2));
            }
            fclose($handle);
            fclose($newcsv);


        }

    }

        

}

?>