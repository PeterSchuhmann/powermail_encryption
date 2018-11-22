<?php

namespace PS\PowermailEncryption\Hooks;

use PS\PowermailEncryption\Encryptor;
use TYPO3\CMS\Backend\Form\FormDataProvider\AbstractDatabaseRecordProvider;
use TYPO3\CMS\Backend\Form\FormDataProviderInterface;
use TYPO3\CMS\Backend\Utility\BackendUtility;

class DatabaseEditRow extends AbstractDatabaseRecordProvider implements FormDataProviderInterface
{

	/**
	 * Fetch existing record from database
	 *
	 * @param array $result
	 * @return array
	 * @throws \UnexpectedValueException
	 */
	public function addData(array $result)
	{

		if (isSet($result['databaseRow']) && count($result['databaseRow']) > 0 &&
			isSet($result['tableName']) && $result['tableName'] == 'tx_powermailencryption_domain_model_data') {

			$extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['powermail_encryption']);
			$encryptor = new Encryptor($extConf['encryption_secretKey'], $extConf['encryption_protocol'], $extConf['encryption_vector']);

			foreach($result['databaseRow'] as $key => $value) {
				if (is_string($value)) {
					try {
						$result['databaseRow'][$key] = $encryptor->decrypt($value);
					} catch(\Exception $e) {
						$result['databaseRow'][$key] = $value;
					}
				}
			}
		}

		return $result;
	}

}