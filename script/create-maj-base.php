<?php
/*
 * Script créant et vérifiant que les champs requis s'ajoutent bien
 */

if(!defined('INC_FROM_DOLIBARR')) {
	define('INC_FROM_CRON_SCRIPT', true);

	require('../config.php');

}


dol_include_once('/enzomuhlinghaus/class/enzomuhlinghaus.class.php');

$PDOdb=new TPDOdb;

global $db;

$o=new Tenzomuhlinghaus208218($db);
$o->init_db_by_vars($PDOdb);


$extrafield = new ExtraFields($db);

$extrafield->addExtraField("risque", "Risque", "int", 0, 10, 'societe');

$extrafield->delete("categsociopro", 'contact');


$extrafield->addExtraField("categsociopro", "Catégorie socio-professionnelle", "select", 0, 255, 'contact', 0, 0, '', array('options'=>array(
	'Artisan / Commerçant',
	'Ouvrier',
	'Retraité',
	'Prof.Intermédiaire',
	'Employé',
	'Cadre / Chef d\'ent.',
	'Etudiant',
	'Autre',
	)), 0, '', 1, 0);

