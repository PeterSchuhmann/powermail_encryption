<?php
namespace PS\PowermailEncryption\ViewHelpers;

use PS\PowermailEncryption\Encryptor;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * View helper to explode a list
 *
 * @package TYPO3
 * @subpackage Fluid
 */
class DecryptViewHelper extends AbstractViewHelper
{

    /**
	 * Viewhelper to decrypt data
	 * @param mixed $content
	 * @param boolean $dump
     * @return array
     */
    public function render($content = null, $dump = false)
    {
    	if ($content == null) {
    		$content = $this->renderChildren();
		}

		if ($content == null) {
    		return '';
		}

		$extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['powermail_encryption']);
		$encryptor = new Encryptor($extConf['encryption_secretKey'], $extConf['encryption_protocol'], $extConf['encryption_vector']);

		$data = json_decode($encryptor->decrypt($content), true);

		if ($dump) {
			return print_r($data, true);
		}
		else {
			return $data;
		}

    }
}
