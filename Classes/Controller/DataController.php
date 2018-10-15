<?php
namespace PS\PowermailEncryption\Controller;

use TYPO3\CMS\Core\Utility\GeneralUtility;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2018 Peter Schuhmann <mail@peterschuhmann.de>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * DataController
 */
class DataController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * @var \PS\PowermailEncryption\Domain\Repository\DataRepository
	 * @inject
	 */
    protected $dataRepository;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$pid = GeneralUtility::_GP('id');
		$items = $this->dataRepository->findForPage($pid);
		$this->view->assign('datas', $items);
		$this->view->assign('pid', $pid);
	}

	/**
	 * action export
	 *
	 * @return void
	 */
	public function exportAction() {
		$pid = GeneralUtility::_GP('id');
		$items = $this->dataRepository->findForPage($pid);

		var_dump("needs implementation");
		exit;

	}

	/**
	 * action show
	 *
	 * @param \PS\PowermailEncryption\Domain\Model\Data $data
	 * @return void
	 */
	public function showAction(\PS\PowermailEncryption\Domain\Model\Data $data) {
		$this->view->assign('data', $data);
	}

}