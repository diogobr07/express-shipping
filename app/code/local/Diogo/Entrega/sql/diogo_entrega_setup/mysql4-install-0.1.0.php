<?php

$installer = $this;
/* @var $installer Mage_Core_Model_Resource_Setup */

$installer->startSetup();

$baseTableName = 'shipping_destiny';

$sql = "
SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `local/Diogo/Entrega`
-- ----------------------------
DROP TABLE IF EXISTS {$this->getTable($baseTableName)};
CREATE TABLE {$this->getTable($baseTableName)} (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zip_code` varchar(8) NOT NULL,
  `address` varchar(255) NOT NULL,
  `neighborhood` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `state` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
";

$installer->run($sql);

$installer->endSetup();