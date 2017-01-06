<?php
/*
 * Script créant et vérifiant que les champs requis s'ajoutent bien
 */

if(!defined('INC_FROM_DOLIBARR')) {
	define('INC_FROM_CRON_SCRIPT', true);

	require('../config.php');

}


dol_include_once('/simple/class/simple.class.php');

$PDOdb=new TPDOdb;

global $db;

$o=new TSimple208000($db);
$o->init_db_by_vars($PDOdb);


$extrafield = new ExtraFields($db);

$extrafield->addExtraField("risque", "Risque", "int", 0, 10, 'societe');