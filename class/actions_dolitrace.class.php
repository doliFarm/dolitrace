<?php
/* Copyright (C) 2017  Laurent Destailleur <eldy@users.sourceforge.net>
 * Copyright (C) 2022 	Luigi Grillo - luigi.grillo@gmail.com (http://luigigrillo.com)
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

/**
 * \file    class/actions_mymodule.class.php
 * \ingroup Dolitrace
 * \brief   Dolitrace hook overload.
 *
 * Put detailed description here.
 */

/**
 * Class ActionsMyModule
 */
class ActionsDoliTrace
{
	/**
	 * @var DoliDB Database handler.
	 */
	public $db;

	/**
	 * @var string Error code (or message)
	 */
	public $error = '';

	/**
	 * @var array Errors
	 */
	public $errors = array();


	/**
	 * @var array Hook results. Propagated to $hookmanager->resArray for later reuse
	 */
	public $results = array();

	/**
	 * @var string String displayed by executeHook() immediately after return
	 */
	public $resprints;


	/**
	 * Constructor
	 *
	 *  @param		DoliDB		$db      Database handler
	 */
	public function __construct($db)
	{
		$this->db = $db;
	}


	/**
	 * Execute action
	 *
	 * @param	array			$parameters		Array of parameters
	 * @param	CommonObject    $object         The object to process (an invoice if you are in invoice module, a propale in propale's module, etc...)
	 * @param	string			$action      	'add', 'update', 'view'
	 * @return	int         					<0 if KO,
	 *                           				=0 if OK but we want to process standard actions too,
	 *                            				>0 if OK and we want to replace standard actions.
	 */
	public function getNomUrl($parameters, &$object, &$action)
	{
		global $db, $langs, $conf, $user;
		$this->resprints = '';
		return 0;
	}

	/**
	 * Overloading the doActions function : replacing the parent's function with the one below
	 *
	 * @param   array           $parameters     Hook metadatas (context, etc...)
	 * @param   CommonObject    $object         The object to process (an invoice if you are in invoice module, a propale in propale's module, etc...)
	 * @param   string          $action         Current action (if set). Generally create or edit or null
	 * @param   HookManager     $hookmanager    Hook manager propagated to allow calling another hook
	 * @return  int                             < 0 on error, 0 on success, 1 to replace standard code
	 */
	public function doActions($parameters, &$object, &$action, $hookmanager)
	{
		global $conf, $user, $langs;

		$error = 0; // Error counter

		/* print_r($parameters); print_r($object); echo "action: " . $action; */
		if (in_array($parameters['currentcontext'], array('somecontext1', 'somecontext2'))) {	    // do something only for the context 'somecontext1' or 'somecontext2'
			// Do what you want here...
			// You can for example call global vars like $fieldstosearchall to overwrite them, or update database depending on $action and $_POST values.
		}
		if (!$error) {
			$this->results = array('myreturn' => 999);
			$this->resprints = 'A text to show';
			return 0; // or return 1 to replace standard code
		} else {
			$this->errors[] = 'Error message';
			return -1;
		}
	}


	/**
	 * Overloading the doMassActions function : replacing the parent's function with the one below
	 *
	 * @param   array           $parameters     Hook metadatas (context, etc...)
	 * @param   CommonObject    $object         The object to process (an invoice if you are in invoice module, a propale in propale's module, etc...)
	 * @param   string          $action         Current action (if set). Generally create or edit or null
	 * @param   HookManager     $hookmanager    Hook manager propagated to allow calling another hook
	 * @return  int                             < 0 on error, 0 on success, 1 to replace standard code
	 */
	public function doMassActions($parameters, &$object, &$action, $hookmanager)
	{
		global $conf, $user, $langs;

		$error = 0; // Error counter

		/* print_r($parameters); print_r($object); echo "action: " . $action; */
		if (in_array($parameters['currentcontext'], array('somecontext1', 'somecontext2'))) {		// do something only for the context 'somecontext1' or 'somecontext2'
			foreach ($parameters['toselect'] as $objectid) {
				// Do action on each object id
			}
		}

		if (!$error) {
			$this->results = array('myreturn' => 999);
			$this->resprints = 'A text to show';
			return 0; // or return 1 to replace standard code
		} else {
			$this->errors[] = 'Error message';
			return -1;
		}
	}


	/**
	 * Overloading the addMoreMassActions function : replacing the parent's function with the one below
	 *
	 * @param   array           $parameters     Hook metadatas (context, etc...)
	 * @param   CommonObject    $object         The object to process (an invoice if you are in invoice module, a propale in propale's module, etc...)
	 * @param   string          $action         Current action (if set). Generally create or edit or null
	 * @param   HookManager     $hookmanager    Hook manager propagated to allow calling another hook
	 * @return  int                             < 0 on error, 0 on success, 1 to replace standard code
	 */
	public function addMoreMassActions($parameters, &$object, &$action, $hookmanager)
	{
		global $conf, $user, $langs;

		$error = 0; // Error counter
		$disabled = 1;

		/* print_r($parameters); print_r($object); echo "action: " . $action; */
		if (in_array($parameters['currentcontext'], array('somecontext1', 'somecontext2'))) {		// do something only for the context 'somecontext1' or 'somecontext2'
			$this->resprints = '<option value="0"'.($disabled ? ' disabled="disabled"' : '').'>'.$langs->trans("DoliTraceMassAction").'</option>';
		}

		if (!$error) {
			return 0; // or return 1 to replace standard code
		} else {
			$this->errors[] = 'Error message';
			return -1;
		}
	}



	/**
	 * Execute action
	 *
	 * @param	array	$parameters     Array of parameters
	 * @param   Object	$object		   	Object output on PDF
	 * @param   string	$action     	'add', 'update', 'view'
	 * @return  int 		        	<0 if KO,
	 *                          		=0 if OK but we want to process standard actions too,
	 *  	                            >0 if OK and we want to replace standard actions.
	 */
	public function beforePDFCreation($parameters, &$object, &$action)
	{
		global $conf, $user, $langs;
		global $hookmanager;

		$outputlangs = $langs;

		$ret = 0; $deltemp = array();
		dol_syslog(get_class($this).'::executeHooks action='.$action);

		/* print_r($parameters); print_r($object); echo "action: " . $action; */
		if (in_array($parameters['currentcontext'], array('somecontext1', 'somecontext2'))) {		// do something only for the context 'somecontext1' or 'somecontext2'
		}

		return $ret;
	}

	/**
	 * Execute action
	 *
	 * @param	array	$parameters     Array of parameters
	 * @param   Object	$pdfhandler     PDF builder handler
	 * @param   string	$action         'add', 'update', 'view'
	 * @return  int 		            <0 if KO,
	 *                                  =0 if OK but we want to process standard actions too,
	 *                                  >0 if OK and we want to replace standard actions.
	 */
	public function afterPDFCreation($parameters, &$pdfhandler, &$action)
	{
		global $conf, $user, $langs;
		global $hookmanager;

		$outputlangs = $langs;

		$ret = 0; $deltemp = array();
		dol_syslog(get_class($this).'::executeHooks action='.$action);

		/* print_r($parameters); print_r($object); echo "action: " . $action; */
		if (in_array($parameters['currentcontext'], array('somecontext1', 'somecontext2'))) {
			// do something only for the context 'somecontext1' or 'somecontext2'
		}

		return $ret;
	}



	/**
	 * Overloading the loadDataForCustomReports function : returns data to complete the customreport tool
	 *
	 * @param   array           $parameters     Hook metadatas (context, etc...)
	 * @param   string          $action         Current action (if set). Generally create or edit or null
	 * @param   HookManager     $hookmanager    Hook manager propagated to allow calling another hook
	 * @return  int                             < 0 on error, 0 on success, 1 to replace standard code
	 */
	public function loadDataForCustomReports($parameters, &$action, $hookmanager)
	{
		global $conf, $user, $langs;

		$langs->load("dolitrace@dolitrace");

		$this->results = array();

		$head = array();
		$h = 0;

		if ($parameters['tabfamily'] == 'dolitrace') {
			$head[$h][0] = dol_buildpath('/module/index.php', 1);
			$head[$h][1] = $langs->trans("Home");
			$head[$h][2] = 'home';
			$h++;

			$this->results['title'] = $langs->trans("DoliTrace");
			$this->results['picto'] = 'dolitrace@dolitrace';
		}

		$head[$h][0] = 'customreports.php?objecttype='.$parameters['objecttype'].(empty($parameters['tabfamily']) ? '' : '&tabfamily='.$parameters['tabfamily']);
		$head[$h][1] = $langs->trans("CustomReports");
		$head[$h][2] = 'customreports';

		$this->results['head'] = $head;

		return 1;
	}



	/**
	 * Overloading the restrictedArea function : check permission on an object
	 *
	 * @param   array           $parameters     Hook metadatas (context, etc...)
	 * @param   string          $action         Current action (if set). Generally create or edit or null
	 * @param   HookManager     $hookmanager    Hook manager propagated to allow calling another hook
	 * @return  int 		      			  	<0 if KO,
	 *                          				=0 if OK but we want to process standard actions too,
	 *  	                            		>0 if OK and we want to replace standard actions.
	 */
	public function restrictedArea($parameters, &$action, $hookmanager)
	{
		global $user;

		if ($parameters['features'] == 'myobject') {
			if ($user->rights->dolitrace->myobject->read) {
				$this->results['result'] = 1;
				return 1;
			} else {
				$this->results['result'] = 0;
				return 1;
			}
		}

		return 0;
	}

	/**
	 * Execute action completeTabsHead
	 *
	 * @param   array           $parameters     Array of parameters
	 * @param   CommonObject    $object         The object to process (an invoice if you are in invoice module, a propale in propale's module, etc...)
	 * @param   string          $action         'add', 'update', 'view'
	 * @param   Hookmanager     $hookmanager    hookmanager
	 * @return  int                             <0 if KO,
	 *                                          =0 if OK but we want to process standard actions too,
	 *                                          >0 if OK and we want to replace standard actions.
	 */
	public function completeTabsHead(&$parameters, &$object, &$action, $hookmanager)
	{
		global $langs, $conf, $user;

		if (!isset($parameters['object']->element)) {
			return 0;
		}
		if ($parameters['mode'] == 'remove') {
			// utilisé si on veut faire disparaitre des onglets.
			return 0;
		} elseif ($parameters['mode'] == 'add') {
			$langs->load('dolitrace@dolitrace');
			// utilisé si on veut ajouter des onglets.
			$counter = count($parameters['head']);
			$element = $parameters['object']->element;
			$id = $parameters['object']->id;
			// verifier le type d'onglet comme member_stats où ça ne doit pas apparaitre
			// if (in_array($element, ['societe', 'member', 'contrat', 'fichinter', 'project', 'propal', 'commande', 'facture', 'order_supplier', 'invoice_supplier'])) {
			if (in_array($element, ['context1', 'context2'])) {
				$datacount = 0;

				$parameters['head'][$counter][0] = dol_buildpath('/dolitrace/dolitrace_tab.php', 1) . '?id=' . $id . '&amp;module='.$element;
				$parameters['head'][$counter][1] = $langs->trans('DoliTraceTab');
				if ($datacount > 0) {
					$parameters['head'][$counter][1] .= '<span class="badge marginleftonlyshort">' . $datacount . '</span>';
				}
				$parameters['head'][$counter][2] = 'dolitraceemails';
				$counter++;
			}
			if ($counter > 0 && (int) DOL_VERSION < 14) {
				$this->results = $parameters['head'];
				// return 1 to replace standard code
				return 1;
			} else {
				// en V14 et + $parameters['head'] est modifiable par référence
				return 0;
			}
		}
	}

	/* Add here any other hooked methods... */
	/**
	 * addMoreActionsButtons
	 *
	 * @param array 		$parameters		array of parameters
	 * @param Object	 	$object			Object
	 * @param string		$action			Actions
	 * @param HookManager	$hookmanager	Hook manager
	 * @return void
	 */
	public function addMoreActionsButtons($parameters, &$object, &$action, $hookmanager)
	{
		global $conf, $user, $langs;
		$langs->load('datapolicy@datapolicy');
		include_once DOL_DOCUMENT_ROOT.'/custom/dolitrace/class/dolitrace.class.php';
		include_once DOL_DOCUMENT_ROOT.'/custom/dolitrace/class/harvests.class.php';
		include_once DOL_DOCUMENT_ROOT.'/custom/dolitrace/class/cropplans.class.php';

		$dolitrace = new Dolitrace($db);
		
		// echo '<div class="inline-block divButAction"><a class="butAction" href="'.DOL_URL_ROOT."/custom/dolitrace/cropplans_card?action=create&fk_farm=".$object->id.'" title="'.$langs->trans('NewCropPlan').'">'.$langs->trans("NewCropPlan").'</a></div>';
		// CROPPLANS CARD CONTEXT
		if (in_array($parameters['currentcontext'], array('cropplanscard'))) {
		   if (!$conf->global->DOLITRACE_SIMPLIFIED && ($object->status == Harvests::STATUS_VALIDATED) ) {
			   echo '<div class="inline-block divButAction"><a class="butAction" href="#" title="'.$langs->trans('NewTreatment').'">'.$langs->trans("NewTreatment").'</a></div>';
		   }
		   if ($object->status == Harvests::STATUS_VALIDATED)  {
				print dolGetButtonAction($langs->trans('NewHarvest'), '', 'default', DOL_URL_ROOT.'/custom/dolitrace/harvests_card.php?action=create&fk_farm='.$object->fk_farm.'&fk_cropplan='.$object->id);
		   } else {
		   	    print dolGetButtonAction($langs->trans('NewHarvest'), '', 'default', '','',1,array("attr"=>array("class"=>"butActionRefused classfortooltip", "title"=>$langs->trans('CropPlansToBeValidated'))));		    
		   }
		}
		// THIRDPARTY/SOCIETE CARD CONTEXT
		if (in_array($parameters['currentcontext'], array('thirdpartycard'))  && $dolitrace->isFarm($object) ) { // 
			print dolGetButtonAction($langs->trans('NewPlot'), '', 'default', DOL_URL_ROOT.'/custom/dolitrace/plots_card.php?action=create&fk_farm='.$object->id);
			if ($dolitrace->plotsExist($object->id)) {
				print dolGetButtonAction($langs->trans('NewCropPlan'), '', 'default', DOL_URL_ROOT.'/custom/dolitrace/cropplans_card.php?action=create&fk_farm='.$object->id);
			} else {
				print dolGetButtonAction($langs->trans('NewCropPlan'), '', 'default', '','',1,array("attr"=>array("class"=>"butActionRefused classfortooltip", "title"=>$langs->trans('NoPlot'))));		    
			}
			if ($dolitrace->cropplansExist($object->id)) {
				print dolGetButtonAction($langs->trans('NewHarvest'), '', 'default', DOL_URL_ROOT.'/custom/dolitrace/harvests_card.php?action=create&fk_farm='.$object->id);
			} else {
			    print dolGetButtonAction($langs->trans('NewHarvest'), '', 'default', '','',1,array("attr"=>array("class"=>"butActionRefused classfortooltip", "title"=>$langs->trans('NoCropPlans'))));		    

			}
		}
		// HARVESTS CARD CONTEXT
		if (in_array($parameters['currentcontext'], array('harvestscard')) && ($object->status == Harvests::STATUS_VALIDATED) ) {
			 print dolGetButtonAction($langs->trans('PrintLabelHarvest'), '', 'default', $_SERVER["PHP_SELF"].'?id='.$object->id.'&action=printlabel');
			 print dolGetButtonAction($langs->trans('OrderSupplier'), '', 'default', $_SERVER["PHP_SELF"].'?id='.$object->id.'&action=order_supplier');
 			 print dolGetButtonAction($langs->trans('OnStock'), '', 'default', $_SERVER["PHP_SELF"].'?id='.$object->id.'&action=on_stock');
 			 print dolGetButtonAction($langs->trans('ManifacturingOrder'), '', 'default', $_SERVER["PHP_SELF"].'?id='.$object->id.'&action=manifacturing_order');
		}
		// PLOT CARD CONTEXT
		if (in_array($parameters['currentcontext'], array('plotscard'))) {
			if ( $object->status == Cropplans::STATUS_VALIDATED )  {
				print dolGetButtonAction($langs->trans('NewCropPlan'), '', 'default', DOL_URL_ROOT.'/custom/dolitrace/cropplans_card.php?action=create&fk_plot='.$object->id.'&fk_farm='.$object->fk_farm,'',1,array("attr"=>array("class"=>"", "title"=>"")));		    
			} else {
				print dolGetButtonAction($langs->trans('NewCropPlan'), '', 'default', '','',1,array("attr"=>array("class"=>"butActionRefused classfortooltip", "title"=>$langs->trans('PlotToBeValidated'))));		    
			}
			if ($dolitrace->cropplansExist($object->id)) {
				print dolGetButtonAction($langs->trans('NewHarvest'), '', 'default', DOL_URL_ROOT.'/custom/dolitrace/harvests_card.php?action=create&fk_farm='.$object->id);
			}	
		}	
		// 	PRODUCTION ORDER
		if (in_array($parameters['currentcontext'], array('mocard'))) {
			print dolGetButtonAction($langs->trans('TESTMIO TEST'), '', 'default', DOL_URL_ROOT.'#'.$object->id);
		}		
	}
	
	
	/* Add here any other hooked methods... */
	/**
	 * addMoreActionsButtons
	 *
	 * @param array 		$parameters		array of parameters
	 * @param Object	 	$object			Object
	 * @param string		$action			Actions
	 * @param HookManager	$hookmanager	Hook manager
	 * @return void
	 */
	public function formAddObjectLine($parameters, &$object, &$action, $hookmanager)
	{
			// 	PRODUCTION ORDER
		/*
		if (in_array($parameters['currentcontext'], array('ordercard'))) {
			print "<hr>";
			print '<tr><td>ciao formAddObjectLine <input type="textarea" name="prova"></td><td> </td></tr>';
		}	*/
	}
	public function createFrom($parameters, &$object, &$action, $hookmanager)
	{
			// 	PRODUCTION ORDER
		/*if (in_array($parameters['currentcontext'], array('ordercard'))) {
			print '<tr><td>ciao createFrom</td></tr>';
		}	*/
	}
	public function formObjectOptions($parameters, &$object, &$action, $hookmanager)
	{
			// 	PRODUCTION ORDER
		/*if (in_array($parameters['currentcontext'], array('ordercard'))) {
			print '<tr><td>ciao formObjectOptions</td></tr>';
		}	*/
	}
	public function formConfirm($parameters, &$object, &$action, $hookmanager)
	{
			// 	PRODUCTION ORDER
		/*if (in_array($parameters['currentcontext'], array('ordercard'))) {
			print '<tr><td>ciao formConfirm</td></tr>';
		}	*/
	}
	
}
