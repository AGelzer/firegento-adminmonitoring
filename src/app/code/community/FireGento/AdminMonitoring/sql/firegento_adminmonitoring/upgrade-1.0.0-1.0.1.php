<?php
/**
 * This file is part of a FireGento e.V. module.
 *
 * This FireGento e.V. module is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License version 3 as
 * published by the Free Software Foundation.
 *
 * This script is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * PHP version 5
 *
 * @category  FireGento
 * @package   FireGento_AdminMonitoring
 * @author    FireGento Team <team@firegento.com>
 * @copyright 2014 FireGento Team (http://www.firegento.com)
 * @license   http://opensource.org/licenses/gpl-3.0 GNU General Public License, version 3 (GPLv3)
 */
/**
 * Displays the logging history
 *
 * @category FireGento
 * @package  FireGento_AdminMonitoring
 * @author   FireGento Team <team@firegento.com>
 */

/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;
$installer->startSetup();

$installer->getConnection()->addIndex(
    $installer->getTable('firegento_adminmonitoring/history'),
    $installer->getConnection()->getIndexName(
        $installer->getTable('firegento_adminmonitoring/history'),
        array(
             'object_type', 'object_id'
        ),
        Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX
    ),
    array(
         'object_type', 'object_id'
    ),
    Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX
);

$installer->getConnection()->changeColumn(
    $installer->getTable('firegento_adminmonitoring/history'),
    'data',
    'content',
    array(
         'type'    => Varien_Db_Ddl_Table::TYPE_TEXT,
         'size'    => null,
         'comment' => 'data of changed entity'
    )
);

$installer->getConnection()->addColumn(
    $installer->getTable('firegento_adminmonitoring/history'),
    'content_diff',
    array(
         'type'    => Varien_Db_Ddl_Table::TYPE_TEXT,
         'size'    => null,
         'comment' => 'changed data of entity'
    )
);

$installer->endSetup();
