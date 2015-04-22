<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

// Build extension name vars - used for plugin registration, flexforms and similar
$extensionName = t3lib_div::underscoredToUpperCamelCase($_EXTKEY);
$pluginSignature = strtolower($extensionName) . '_pi1';

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'WebSE.'.$_EXTKEY,
	'Pi1',
	'FreeWall Responsive Gallery'
);

#TypoScript Konfiguration aus dem Ordner freewall\Configuration/TypoScript
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Freewall');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_freewall_domain_model_images', 'EXT:freewall/Resources/Private/Language/locallang_csh_tx_freewall_domain_model_images.xml');


$TCA['tx_freewall_domain_model_images'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:freewall/Resources/Private/Language/locallang_db.xml:tx_freewall_domain_model_images',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'imagessorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title,description,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Images.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/picture.png'
	),
);

$tempColumns = array(
	'tx_freewall_images' => array(
		'exclude' => 0,
		'label' => 'Images',
		'config' => array(
			'type' => 'inline',
			'foreign_table' => 'tx_freewall_domain_model_images',
			'foreign_field' => 'content_uid',
			'foreign_label' => 'title',
			'foreign_sortby' => 'imagessorting',
			'maxitems' => '100',
			'appearance' => array(
				'expandSingle' => true,
				'newRecordLinkAddTitle' => 1,
				'newRecordLinkPosition' => "both",
				'showAllLocalizationLink' => TRUE,
				'showPossibleLocalizationRecords' => TRUE,
			),
			'behaviour' => array(
				'localizationMode' => 'select',
				'localizeChildrenAtParentLocalization' => TRUE,
			),
		)
	),
);

# Damit teilen wir TYPO3 mit, wie mit diesem neuen Feld zu verfahren ist.
\TYPO3\CMS\Core\Utility\GeneralUtility::loadTCA('tt_content');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $tempColumns, 1);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages,recursive';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'tx_freewall_images';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_freewall_domain_model_images');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'WebSE.'.$_EXTKEY,
	'Pi1',
	'FreeWall Responsive Gallery'
);

?>