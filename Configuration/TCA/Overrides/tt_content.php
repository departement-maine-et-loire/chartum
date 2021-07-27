<?php

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['chartum_visuelgraph'] = 'pi_flexform';


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(

    'chartum_visuelgraph',
    'FILE:EXT:chartum/Configuration/FlexForms/chartum.xml'
    
    );
?>
