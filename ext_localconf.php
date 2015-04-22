<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'WebSE.'.$_EXTKEY,
    'Pi1',
    array(
        'Images' => 'list,show',
    ),
    array(
        'Images' => 'list,show',
    )
);
?>