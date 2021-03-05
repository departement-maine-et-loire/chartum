<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Dept49.Chartum',
            'Visuelgraph',
            [
                'VisuelGraph' => 'list'
            ],
            // non-cacheable actions
            [
                'VisuelGraph' => 'list'
            ]
        );

        // wizards
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            'mod {
                wizards.newContentElement.wizardItems.plugins {
                    elements {
                        visuelgraph {
                            iconIdentifier = chartum-plugin-visuelgraph
                            title = LLL:EXT:chartum/Resources/Private/Language/locallang_db.xlf:tx_chartum_visuelgraph.name
                            description = LLL:EXT:chartum/Resources/Private/Language/locallang_db.xlf:tx_chartum_visuelgraph.description
                            tt_content_defValues {
                                CType = list
                                list_type = chartum_visuelgraph
                            }
                        }
                    }
                    show = *
                }
           }'
        );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'chartum-plugin-visuelgraph',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:chartum/Resources/Public/Icons/user_plugin_visuelgraph.svg']
			);
		
    }
);
