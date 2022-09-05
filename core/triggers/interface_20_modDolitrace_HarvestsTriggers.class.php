<?php
/* Copyright (C) ---Put here your own copyright and developer email---
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
 * \file    core/triggers/interface_20_modDolitrace_HarvestTriggers.class.php
 * \ingroup dolitrace
 * \brief   Trigger management.
 *
 * Put detailed description here.
 *
 * \remarks You can create other triggers by copying this one.
 * - File name should be either:
 *      - interface_99_modMyModule_MyTrigger.class.php
 *      - interface_99_all_MyTrigger.class.php
 * - The file must stay in core/triggers
 * - The class name must be InterfaceMytrigger
 */

require_once DOL_DOCUMENT_ROOT.'/core/triggers/dolibarrtriggers.class.php';
dol_include_once('/dolitrace/class/cropplans.class.php');


/**
 *  Class of triggers for Dolitrace module
 */
class InterfaceHarvestsTriggers extends DolibarrTriggers
{
	/**
	 * Constructor
	 *
	 * @param DoliDB $db Database handler
	 */
	public function __construct($db)
	{
		$this->db = $db;

		$this->name = preg_replace('/^Interface/i', '', get_class($this));
		$this->family = "dolifarm";
		$this->description = "We update the croplans according to the harvest movement (quantities collected & costs)";
		// 'development', 'experimental', 'dolibarr' or version
		$this->version = 'development';
		$this->picto = 'dolitrace@dolitrace';
	}

	/**
	 * Trigger name
	 *
	 * @return string Name of trigger file
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Trigger description
	 *
	 * @return string Description of trigger file
	 */
	public function getDesc()
	{
		return $this->description;
	}


	/**
	 * Function called when a Dolibarrr business event is done.
	 * All functions "runTrigger" are triggered if file
	 * is inside directory core/triggers
	 *
	 * @param string 		$action 	Event action code
	 * @param CommonObject 	$object 	Object
	 * @param User 			$user 		Object user
	 * @param Translate 	$langs 		Object langs
	 * @param Conf 			$conf 		Object conf
	 * @return int              		<0 if KO, 0 if no triggered ran, >0 if OK
	 */
	public function runTrigger($action, $object, User $user, Translate $langs, Conf $conf)
	{
		if (empty($conf->dolitrace) || empty($conf->dolitrace->enabled)) {
			return 0; // If module is not enabled, we do nothing
		}

		// Put here code you want to execute when a Dolibarr business events occurs.
		// Data and type of action are stored into $object and $action
        
		// We have to update the croplans according to the harvest movement
        $cropplan = new Cropplans($object->db);
		$cropplan->fetch($object->fk_cropplan);


		// You can isolate code for each action in a separate method: this method should be named like the trigger in camelCase.
		// For example : COMPANY_CREATE => public function companyCreate($action, $object, User $user, Translate $langs, Conf $conf)
		$methodName = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', strtolower($action)))));
		$callback = array($this, $methodName);
		if (is_callable($callback)) {
			dol_syslog(
				"Trigger '".$this->name."' for action '$action' launched by ".__FILE__.". id=".$object->id
			);

			return call_user_func($callback, $action, $object, $user, $langs, $conf);
		};

		// Or you can execute some code here
		switch ($action) {
			case 'HARVESTS_MODIFY':
				dol_syslog("Trigger HARVESTS_MODIFY WARNING cropplans ".$cropplan->ref.' has been modified');
				echo "WARNING cropplans ".$cropplan->ref.' has been modified';
				break;
			case 'HARVESTS_DELETE':
				$cropplan->actualcost = $cropplan->actualcost - ( $object->costmaterial + $object->costmanpower + $object->costenergy ) ;
			    $cropplan->yieldtodate = $cropplan->yieldtodate - $object->yield;
				$cropplan->costmaterial = $cropplan->costmaterial - $object->costmaterial ;
				$cropplan->costmanpower = $cropplan->costmanpower - $object->costmanpower;
				$cropplan->costenergy = $cropplan->costenergy - $object->costenergy;
				$cropplan->update($user);
				dol_syslog("Trigger HARVESTS cropplans ".$cropplan->ref.' has been update');
				break;
			case 'HARVESTS_CREATE':
				$cropplan->actualcost = $cropplan->actualcost + ( $object->costmaterial + $object->costmanpower + $object->costenergy ) ;
				$cropplan->yieldtodate = $cropplan->yieldtodate + $object->yield;
				$cropplan->costmaterial = $cropplan->costmaterial + $object->costmaterial ;
				$cropplan->costmanpower = $cropplan->costmanpower + $object->costmanpower;
				$cropplan->costenergy = $cropplan->costenergy + $object->costenergy;
				$cropplan->update($user);
				dol_syslog("Trigger HARVESTS  cropplans ".$cropplan->ref.' has been update');
				break;
			default:
				dol_syslog("Trigger HARVESTS  cropplans ".$cropplan->ref.' has been update');
				break;
		}

		return 0;
	}
}
