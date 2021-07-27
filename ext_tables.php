<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Dept49.Chartum',
            'Visuelgraph',
            'Visuel Graphique'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('chartum', 'Configuration/TypoScript', 'Visualisation CSV');

    }
);
