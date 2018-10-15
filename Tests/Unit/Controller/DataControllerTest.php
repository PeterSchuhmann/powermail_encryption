<?php
namespace PS\PowermailEncryption\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2018 
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
 * Test case for class PS\PowermailEncryption\Controller\DataController.
 *
 */
class DataControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \PS\PowermailEncryption\Controller\DataController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('PS\\PowermailEncryption\\Controller\\DataController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllDatasFromRepositoryAndAssignsThemToView() {

		$allDatas = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$dataRepository = $this->getMock('', array('findAll'), array(), '', FALSE);
		$dataRepository->expects($this->once())->method('findAll')->will($this->returnValue($allDatas));
		$this->inject($this->subject, 'dataRepository', $dataRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('datas', $allDatas);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenDataToView() {
		$data = new \PS\PowermailEncryption\Domain\Model\Data();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('data', $data);

		$this->subject->showAction($data);
	}
}
