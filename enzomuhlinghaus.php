<?php

	require 'config.php';
	
	dol_include_once('/contact/class/contact.class.php');
	dol_include_once('/enzomuhlinghaus/class/enzomuhlinghaus.class.php');
	
	$object = new Contact($db);
	$object->fetch(GETPOST('fk_contact'));
	
	$action = GETPOST('action');
	
	$PDOdb = new TPDOdb;
	
	$enzomuhlinghaus = new Tenzomuhlinghaus208218;
	$enzomuhlinghaus->loadBy($PDOdb, $object->id, 'fk_contact');
	
	
	switch ($action) {
		case 'save':
			
			$enzomuhlinghaus->set_values($_POST);
			$enzomuhlinghaus->save($PDOdb);
			
			setEventMessage('Element enzomuhlinghaus sauvegardé');
			
			_card($object,$enzomuhlinghaus);
			break;
		default:
			_card($object,$enzomuhlinghaus);
			break;
	}
	
	
	
function _card(&$object,&$enzomuhlinghaus) {
	
	dol_include_once('/core/lib/contact.lib.php');
	
	llxHeader();
	$head = contact_prepare_head($object);
	dol_fiche_head($head, 'tab208218', '', 0, '');
	
	$formCore=new TFormCore('enzomuhlinghaus.php', 'formenzomuhlinghaus');
	echo $formCore->hidden('fk_contact', $object->id);
	echo $formCore->hidden('action', 'save');
	
	echo '<h2>Ceci est une gestion d\'un objet enzomuhlinghaus lié au contact</h2>';
	
	echo $formCore->texte('Titre','title',$enzomuhlinghaus->title,80,255).'<br />';
	
	echo $formCore->btsubmit('Sauvegarder', 'bt_save');
	
	$formCore->end();
	
	dol_fiche_end();
	llxFooter();	  
		 	
}

