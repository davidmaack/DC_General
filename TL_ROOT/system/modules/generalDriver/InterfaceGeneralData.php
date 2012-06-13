<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  MEN AT WORK 2012
 * @package    generalDriver
 * @license    GNU/LGPL
 * @filesource
 */
interface InterfaceGeneralData
{
    
    /**
     * 
     */
    public function __construct(array $arrConfig);

    /**
     * Fetch a single record by id.
     * 
     * @param int ID
     */
    public function fetch($id);

    /**
     * Fetch multiple records by ids.
     * 
     * @param array A list of id's
     */
    public function fetchEach(array $ids);

    /**
     * Fetch all records (optional limited).
     * 
     * @param bool $blnIdOnly if true, only the ids are returned, if false real models are returned.
     * @param int $intStart optional offset to start retrival from
     * @param int $intAmount optional limit to limit the amount of retrieved items
     * @param array $arrFilter a list with filter options
     */
    public function fetchAll($blnIdOnly = false, $intStart = 0, $intAmount = 0, array $arrFilter = array());

    /**
     * Return the amount of total items.
     *
     * @param array $arrFilter a list with filter options
     * 
     * @return int
     */
    public function getCount(array $arrFilter = array());

    /**
     * save back an item
     *
     * @param bool $recursive
     * Save child records, for each property a child provider is registered.
     */
    public function save($item, bool $recursive = false);

    /**
     * Save a collection of items.
     *
     * @param Collection $items a list with all items
     */
    public function saveEach(Collection $items, bool $recursive = false);

    /**
     * Delete an item.
     * 
     * @param int|Module Id or the object itself, to delete
     */
    public function delete($item);

    /**
     * Set the values of current row back to another
     * Version.
     * 
     * @param type $strVersion
     * @return type 
     */
    public function setVersion($intID, $strVersion);

    /**
     * Return a list with all versions for this row
     * 
     * @return array 
     */
    public function getVersions($intID);

    /**
     * Reste the fallback field 
     * 
     * Documentation: 
     *      Evaluation - fallback => If true the field can only be assigned once per table.
     */
    public function resetFallback($strField);

    /**
     * Check if the value is unique in table
     * 
     * Documentation: 
     *      Evaluation - unique => If true the field value cannot be saved if it exists already.
     */
    public function isUniqueValue($strField, $varNew);
}

?>