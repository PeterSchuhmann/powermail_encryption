<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

if (TYPO3_MODE === 'BE') {

	/**
	 * Registers a Backend Module
	 */
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'PS.' . $_EXTKEY,
		'web',	 // Make module a submodule of 'web'
		'powermaildecryptbackend',	// Submodule key
		'',						// Position
		array(
			'Data' => 'list, show, export',
		),
		array(
			'access' => 'user,group',
			'icon'   => 'EXT:powermail/Resources/Public/Icons/powermail.svg',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_powermaildecryptbackend.xlf',
		)
	);

}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Powermail Encryption');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_powermailencryption_domain_model_data', 'EXT:powermail_encryption/Resources/Private/Language/locallang_csh_tx_powermailencryption_domain_model_data.xlf');
//\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_powermailencryption_domain_model_data');
//$GLOBALS['TCA']['tx_powermailencryption_domain_model_data'] = array(
//	'ctrl' => array(
//		'title'	=> 'LLL:EXT:powermail_encryption/Resources/Private/Language/locallang_db.xlf:tx_powermailencryption_domain_model_data',
//		'label' => 'subject',
//		'tstamp' => 'tstamp',
//		'crdate' => 'crdate',
//		'cruser_id' => 'cruser_id',
//		'dividers2tabs' => TRUE,
//
//		'versioningWS' => 2,
//		'versioning_followPages' => TRUE,
//
//		'languageField' => 'sys_language_uid',
//		'transOrigPointerField' => 'l10n_parent',
//		'transOrigDiffSourceField' => 'l10n_diffsource',
//		'delete' => 'deleted',
//		'enablecolumns' => array(
//			'disabled' => 'hidden',
//			'starttime' => 'starttime',
//			'endtime' => 'endtime',
//		),
//		'searchFields' => 'subject,data,form,',
////		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Data.php',
//		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_powermailencryption_domain_model_data.gif'
//	),
//);
