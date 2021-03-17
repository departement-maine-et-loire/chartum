<?php

namespace Dept49\Chartum\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class VisuelGraphController extends ActionController {

    public function listAction() {

        $settings = $this->settings;
        $this->view->assign('Text', $settings['text']);
        $this->view->assign('Select', $settings['form']);
        $this->view->assign('Input', $settings['input']);

    }

}

?>