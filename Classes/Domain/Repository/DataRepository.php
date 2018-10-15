<?php
namespace PS\PowermailEncryption\Domain\Repository;

/***************************************************************
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
 *
 * @package powermail_encryption
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 *
 */
class DataRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

	/**
	 * Find single Answer by field uid and mail uid
	 *
	 * @param int $pid
	 * @return Data
	 */
	public function findForPage($pid)
	{
		if ($pid == null) {
			return null;
		}

		$query = $this->createQuery();
		$query->getQuerySettings()->setRespectStoragePage(false);

		$query->matching($query->equals('pid', $pid));

		return $query->execute();
	}

} 

