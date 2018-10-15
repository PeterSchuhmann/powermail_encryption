<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

$tca = array(
	'ctrl' => array(
		'title' => 'LLL:EXT:powermail_encryption/Resources/Private/Language/locallang_db.xlf:tx_powermailencryption_domain_model_data',
		'label' => 'subject',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'subject,data,form,',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('powermail_encryption') . 'Resources/Public/Icons/tx_powermailencryption_domain_model_data.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, subject, data, form, crdate',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, subject, data, form, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(

		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_powermailencryption_domain_model_data',
				'foreign_table_where' => 'AND tx_powermailencryption_domain_model_data.pid=###CURRENT_PID### AND tx_powermailencryption_domain_model_data.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
		'crdate' => [
			'exclude' => 1,
			'label' => 'LLL:EXT:powermail_encryption/Resources/Private/Language/locallang_db.xlf:tx_powermailencryption_domain_model_data.crdate',
			'config' => [
				'type' => 'input',
				'renderType' => 'inputDateTime',
				'eval' => 'datetime',
				'size' => 30,
				'readOnly' => 1
			],
		],
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'renderType' => 'inputDateTime',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'renderType' => 'inputDateTime',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),

		'subject' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:powermail_encryption/Resources/Private/Language/locallang_db.xlf:tx_powermailencryption_domain_model_data.subject',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'readOnly' => true,
				'eval' => 'trim'
			),
		),
		'data' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:powermail_encryption/Resources/Private/Language/locallang_db.xlf:tx_powermailencryption_domain_model_data.data',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'readOnly' => true,
				'eval' => 'trim'
			)
		),
		'form' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:powermail_encryption/Resources/Private/Language/locallang_db.xlf:tx_powermailencryption_domain_model_data.form',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'readOnly' => true,
				'eval' => 'int'
			)
		),

	),
);

// Todo: Can be removed with 7.6 support drop
if (\In2code\Powermail\Utility\ConfigurationUtility::isOlderThan8Lts()) {
	unset($tca['columns']['starttime']['config']['renderType']);
	unset($tca['columns']['endtime']['config']['renderType']);
}

return $tca;
