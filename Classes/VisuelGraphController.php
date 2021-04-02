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
        $this->view->assign('Input3', $settings['input_3']);
        $downloadfile = 
        $this->configurationManager->getContentObject()->data['uid'];
        $outfile = hash('sha1', $downloadfile);
        $this->view->assign('download', $outfile);
        $outputPath = "fileadmin/user_upload/$outfile.csv";
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

        if (file_exists($outputPath) !== TRUE)  {

        if (($handle = fopen($inputPath, "r")) !==  FALSE) {
            $newcsv = fopen($outputPath, "w");
            while (($data = fgetcsv($handle)) !== FALSE) {

                fputcsv($newcsv, array_slice($data, 0, -2));
            }
            fclose($handle);
            fclose($newcsv);   
        }
        return $outputPath;
    }
    
    $inputfile1 = filemtime($inputPath);
    $outputfile2 = filemtime($outputPath);

    $inputModifiedDate = date("d M Y H:i:s", $inputfile1);
    $outputModifiedDate = date("d M Y H:i:s", $outputfile2);

    if ($inputModifiedDate > $outputModifiedDate) {

        if (($handle = fopen($inputPath, "r")) !==  FALSE) {
            $newcsv = fopen($outputPath, "w");
            while (($data = fgetcsv($handle)) !== FALSE) {

                fputcsv($newcsv, array_slice($data, 0, -2));
            }
            fclose($handle);
            fclose($newcsv);   
        }
        return $outputPath;
    }

    if ($inputModifiedDate < $outputModifiedDate) {
        return $outputPath;
    }
    
   
    }

}
?>