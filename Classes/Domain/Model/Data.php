<?php
namespace PS\PowermailEncryption\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2018
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
 * Data
 */
class Data extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * subject
	 *
	 * @var string
	 */
	protected $subject = '';

	/**
	 * data
	 *
	 * @var string
	 */
	protected $data = '';

	/**
	 * form
	 *
	 * @var integer
	 */
	protected $form = 0;

	/**
	 * @var \DateTime
	 */
	protected $crdate;

	/**
	 * Returns the subject
	 *
	 * @return string $subject
	 */
	public function getSubject() {
		return $this->subject;
	}

	/**
	 * Sets the subject
	 *
	 * @param string $subject
	 * @return void
	 */
	public function setSubject($subject) {
		$this->subject = $subject;
	}

	/**
	 * Returns the data
	 *
	 * @return string $data
	 */
	public function getData() {
		return $this->data;
	}

	/**
	 * Sets the data
	 *
	 * @param string $data
	 * @return void
	 */
	public function setData($data) {
		$this->data = $data;
	}

	/**
	 * Returns the form
	 *
	 * @return integer $form
	 */
	public function getForm() {
		return $this->form;
	}

	/**
	 * Sets the form
	 *
	 * @param integer $form
	 * @return void
	 */
	public function setForm($form) {
		$this->form = $form;
	}

	/**
	 * @return \DateTime
	 */
	public function getCrdate()
	{
		return $this->crdate;
	}

	/**
	 * @param \DateTime $crdate
	 */
	public function setCrdate($crdate)
	{
		$this->crdate = $crdate;
	}
	
}