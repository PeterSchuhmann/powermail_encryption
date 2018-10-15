<?php

namespace PS\PowermailEncryption\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2018 
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \PS\PowermailEncryption\Domain\Model\Data.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class DataTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \PS\PowermailEncryption\Domain\Model\Data
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \PS\PowermailEncryption\Domain\Model\Data();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getSubjectReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getSubject()
		);
	}

	/**
	 * @test
	 */
	public function setSubjectForStringSetsSubject() {
		$this->subject->setSubject('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'subject',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDataReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getData()
		);
	}

	/**
	 * @test
	 */
	public function setDataForStringSetsData() {
		$this->subject->setData('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'data',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getFormReturnsInitialValueForInteger() {
		$this->assertSame(
			0,
			$this->subject->getForm()
		);
	}

	/**
	 * @test
	 */
	public function setFormForIntegerSetsForm() {
		$this->subject->setForm(12);

		$this->assertAttributeEquals(
			12,
			'form',
			$this->subject
		);
	}
}
