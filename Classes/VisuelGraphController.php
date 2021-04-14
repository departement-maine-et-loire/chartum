<?php

namespace Dept49\Chartum\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class VisuelGraphController extends ActionController {

    public function listAction() {

        $settings = $this->settings;
        $this->view->assign('Text', $settings['text']);
        $this->view->assign('Select', $settings['form']);
        $csvdata = $this->getcsvdata($settings['input_2']);
        $this->view->assign('csvdata', $csvdata);
        $csvlabel = $this->getcsvlabel($settings['input_2']);
        $this->view->assign('csvlabel', $csvlabel);
        $csvlabels = $this->getcsvlabels($settings['input_2']);
        $this->view->assign('csvlabels', $csvlabels);
        $downloadfile = 
        $this->configurationManager->getContentObject()->data['uid'];
        $outfile = hash('sha1', $downloadfile);
        $this->view->assign('download', $outfile);
        $outputPath = "fileadmin/user_upload/$outfile.csv";
        $this->createCsvWithoutColor($settings['input_2'], $outputPath);
        
        }



    public function getcsvdata ($path) {
        $file = fopen($path, 'r');
        $data = [];
           
        while ($row = fgetcsv($file)) {
             
            array_push($data, array_slice($row, 1, -2));

        }
        array_shift($data);
        $jsondata = json_encode($data);

        return $jsondata;
    }

    public function getcsvlabel($path) {

        $file = fopen($path, 'r');
        $label = [];

        while ($row2 = fgetcsv($file)) {
            array_push($label, $row2[0]);
        }
        array_shift($label);
        var_dump($label);
        $jsonlabel = json_encode($label);

        return $jsonlabel;
    }

    public function getcsvlabels($path) {

        $file = fopen($path, 'r');
        $labels = [];

        while ($row3 = fgetcsv($file)) {
            array_push($labels, array_slice($row3, 1, -2));
        }
        $onlylabels = [];
        array_push($onlylabels, $labels[0]);
        $jsonlabels = json_encode($onlylabels);

        return $jsonlabels;

    }

    public function getcsvcolors($path) {

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

    public function csvPieData ($path) {
        $file = fopen($path, 'r');
        
    }

}
?>