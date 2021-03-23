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
    }



    public function getcsvdata ($path) {
        $file = fopen($path, 'r');
        $array = [];
        
        while ($row = fgetcsv($file)) {
            array_push($array, $row); 
        }
        
        $json = json_encode($array);
        var_dump($array);
        return $json;
    }

}

?>