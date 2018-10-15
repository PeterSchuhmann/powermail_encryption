<?php

namespace PS\PowermailEncryption\Finisher;

use In2code\Powermail\Finisher\AbstractFinisher;
use In2code\Powermail\Finisher\FinisherInterface;
use In2code\Powermail\Domain\Model\Mail;
use PS\PowermailEncryption\Encryptor;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class EncryptionFinisher extends AbstractFinisher
{

	/**
	 * @var \TYPO3\CMS\Extbase\Service\TypoScriptService
	 * @inject
	 */
	protected $typoScriptService;

	/**
	 * @var \In2code\Powermail\Domain\Repository\MailRepository
	 * @inject
	 */
	protected $mailRepository;

	/**
	 * @var \TYPO3\CMS\Extbase\Object\ObjectManager
	 * @inject
	 */
	protected $objectManager;

	/**
	 * Inject a complete new content object
	 *
	 * @var \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer
	 * @inject
	 */
	protected $contentObject;

	/**
	 * @var Mail
	 */
	protected $mail;

	/**
	 * @var array
	 */
	protected $configuration;

	/**
	 * @var array
	 */
	protected $settings;


	/**
	 * encryptionFinisher
	 *
	 * @return void
	 */
	public function encryptionFinisher()
	{
		$data = $this->mailRepository->getVariablesWithMarkersFromMail($this->getMail());

		$extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['powermail_encryption']);

		$encryptor = new Encryptor($extConf['encryption_secretKey'], $extConf['encryption_protocol'], $extConf['encryption_vector']);

		$record = array();
		$record['pid'] = intval($this->settings['main']['pid']);
		$record['subject'] = $this->getMail()->getSubject();
		$record['tstamp'] = time();
		$record['crdate'] = time();
		$record['data'] = $encryptor->encrypt(json_encode($data));
		$record['form'] = $this->getMail()->getForm()->getUid();

		$decrypt = json_decode($encryptor->decrypt($record['data']), true);

		$GLOBALS['TYPO3_DB']->exec_INSERTquery('tx_powermailencryption_domain_model_data', $record);
	}

//	/**
//		 * encryptionFinisher
//		 *
//		 * @return void
//		 */
//		public function encryptionFinisher()
//		{
//			$data = $this->mailRepository->getVariablesWithMarkersFromMail($this->getMail());
//
//			$extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['powermail_encryption']);
//
//			$encryptor = new Encryptor($extConf['encryption_secretKey'], $extConf['encryption_protocol'], $extConf['encryption_vector']);
//
//			$record = new Data();
//			$record->setPid(intval($this->settings['main']['pid']));
//			$record->setSubject($this->getMail()->getSubject());
//			$record->setData($encryptor->encrypt(json_encode($data)));
//			$record->setForm($this->getMail()->getForm()->getUid());
//
//
//			var_dump($record);
//
//			/** @var \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager $persistenceManager */
//			$persistenceManager = $this->objectManager->get("TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager");
//
//			$persistenceManager->add($record);
//			$persistenceManager->persistAll();
//
//		}

}

