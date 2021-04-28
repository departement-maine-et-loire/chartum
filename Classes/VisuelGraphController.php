<?php

namespace Dept49\Chartum\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class VisuelGraphController extends ActionController {
  
  private $datas = [];
  private $legends = [];
  private $labels = [];
  private $colors = [];
  private $opacities = [];
  
  public function listAction() {
    $settings = $this->settings;
    
    $this->view->assign('Text', $settings['text']);
    $this->view->assign('Select', $settings['form']);
    
    // Output FILE
    $idPlugin = $this->configurationManager->getContentObject()->data['uid'];
    $outfile = hash('sha1', $idPlugin);
    $outputPath = "fileadmin/user_upload/$outfile.csv";
    $this->createCsvWithoutColor($settings['input_2'], $outputPath);
    $this->view->assign('downloadURL', $outputPath);
    $this->view->assign('idPlugin', $idPlugin);
    $this->getSplittedDatas($settings['input_2']);
    
    $this->view->assign('csvdata', json_encode($this->datas) );
    $this->view->assign('csvlabel', json_encode($this->legends) );
    $this->view->assign('csvlabels', json_encode($this->labels) );
    $this->view->assign('csvcolors', json_encode($this->colors) );
    $this->view->assign('csvopacity', json_encode($this->opacities) );


  
    $this->view->assign('filesize', $this->fileSizeConvert(filesize($outputPath)));

  }
  
  private function getSplittedDatas ($path) {
    $file = fopen($path, 'r');
    
    $this->labels = array_slice(fgetcsv($file), 1, -2);
    
    while($row = fgetcsv($file)) {
      $rl = count($row);
      array_push($this->legends, $row[0]);
      array_push($this->datas, array_slice($row, 1, -2));
      array_push($this->colors, $row[$rl-2]);
      array_push($this->opacities, $row[$rl-1]);
    }    
  }
  
  protected function createCsvFile($inputPath, $outputPath) {
    if (($handle = fopen($inputPath, "r")) !==  FALSE) {
      $newcsv = fopen($outputPath, "w");
      while (($data = fgetcsv($handle)) !== FALSE) {
        
        fputcsv($newcsv, array_slice($data, 0, -2));
      }
      fclose($handle);
      fclose($newcsv);   
    }
  }
  
  public function createCsvWithoutColor($inputPath, $outputPath) {
    
    if (file_exists($outputPath) !== TRUE)  {
      $this->createCsvFile($inputPath, $outputPath);    
    }
    
    $inputfile1 = filemtime($inputPath);
    $outputfile2 = filemtime($outputPath);
    
    $inputModifiedDate = date("d M Y H:i:s", $inputfile1);
    $outputModifiedDate = date("d M Y H:i:s", $outputfile2);
    
    if ($inputModifiedDate > $outputModifiedDate) {
      $this->createCsvFile($inputPath, $outputPath);
    }
  }

  public function fileSizeConvert($outfile) {

    $outfile = floatval($outfile);

    $arrayUnit = array(
      0 => array (
        "UNIT" => "To",
        "VALUE" => pow(1024, 4) 
      ),
      1 => array(
        "UNIT" => "Go",
        "VALUE" => pow(1024, 3)
      ),
      2 => array(
        "UNIT" => "Mo",
        "VALUE" => pow(1024, 2)
      ),
      3 => array(
        "UNIT" => "Ko",
        "VALUE" => 1024
      ),
      4 => array(
        "UNIT" => " octet",
        "VALUE" => 1
      ),
    );
    foreach($arrayUnit as $arrayItem) {
      if($outfile >= $arrayItem["VALUE"]) {
        $result = $outfile / $arrayItem["VALUE"];
        $result = str_replace(".", "," , strval(round($result, 2))).$arrayItem["UNIT"];
        break;
      }
    }

    return $result;
  }
  
}
?>