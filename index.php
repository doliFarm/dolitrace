<?php
/* Copyright (C) 2001-2005 Rodolphe Quiedeville <rodolphe@quiedeville.org>
 * Copyright (C) 2004-2015 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2005-2012 Regis Houssin        <regis.houssin@inodbox.com>
 * Copyright (C) 2015      Jean-François Ferry	<jfefe@aternatik.fr>
 * Copyright (C) 2022 		Luigi Grillo - luigi.grillo@gmail.com (http://luigigrillo.com)
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */

/**
 *	\file       dolitrace/dolitraceindex.php
 *	\ingroup    dolitrace
 *	\brief      Home page of dolitrace top menu
 */

// Load Dolibarr environment
$res = 0;
// Try main.inc.php into web root known defined into CONTEXT_DOCUMENT_ROOT (not always defined)
if (!$res && !empty($_SERVER["CONTEXT_DOCUMENT_ROOT"])) {
	$res = @include $_SERVER["CONTEXT_DOCUMENT_ROOT"]."/main.inc.php";
}
// Try main.inc.php into web root detected using web root calculated from SCRIPT_FILENAME
$tmp = empty($_SERVER['SCRIPT_FILENAME']) ? '' : $_SERVER['SCRIPT_FILENAME']; $tmp2 = realpath(__FILE__); $i = strlen($tmp) - 1; $j = strlen($tmp2) - 1;
while ($i > 0 && $j > 0 && isset($tmp[$i]) && isset($tmp2[$j]) && $tmp[$i] == $tmp2[$j]) {
	$i--; $j--;
}
if (!$res && $i > 0 && file_exists(substr($tmp, 0, ($i + 1))."/main.inc.php")) {
	$res = @include substr($tmp, 0, ($i + 1))."/main.inc.php";
}
if (!$res && $i > 0 && file_exists(dirname(substr($tmp, 0, ($i + 1)))."/main.inc.php")) {
	$res = @include dirname(substr($tmp, 0, ($i + 1)))."/main.inc.php";
}
// Try main.inc.php using relative path
if (!$res && file_exists("../main.inc.php")) {
	$res = @include "../main.inc.php";
}
if (!$res && file_exists("../../main.inc.php")) {
	$res = @include "../../main.inc.php";
}
if (!$res && file_exists("../../../main.inc.php")) {
	$res = @include "../../../main.inc.php";
}
if (!$res) {
	die("Include of main fails");
}

require_once DOL_DOCUMENT_ROOT.'/core/class/html.formfile.class.php';
require_once DOL_DOCUMENT_ROOT.'/core/class/html.formother.class.php';
require_once DOL_DOCUMENT_ROOT.'/custom/dolitrace/class/dolitrace.class.php';
require_once DOL_DOCUMENT_ROOT.'/custom/dolitrace/lib/dolitrace.lib.php';
require_once DOL_DOCUMENT_ROOT.'/core/lib/company.lib.php';


// Load translation files required by the page
$langs->loadLangs(array("dolitrace@dolitrace"));

$action = GETPOST('action', 'aZ09');
$socid = GETPOST('socid', 'int');
$tracecode = GETPOST('tracecode', 'aZ09');
$origin = GETPOST('origin', 'aZ09');


// Security check
// if (! $user->rights->dolitrace->myobject->read) {
// 	accessforbidden();
// }

$max = 5;
$now = dol_now();
$form = new Form($db);
$formfile = new FormFile($db);
$dolitrace = new Dolitrace($db);
$soc = new Societe($db);


/*
 * Actions
 */

if ( ($action == 'searchFarm') && !empty($tracecode)  ){
	$traceabilty = $dolitrace->traceprod($tracecode);
	if ($traceabilty) {
		$farmid = $traceabilty["FarmInfo"]["id"];
		$plotid = $traceabilty["PlotInfo"]["id"];
		$harvestid = $traceabilty["HarvestInfo"]["id"];
	}
}

// None



/*
 * View
 */


llxHeader("", $langs->trans("DoliTraceArea"));

print load_fiche_titre($langs->trans("DoliTraceArea"), '', 'dolitrace.png@dolitrace');

print '<div class="div-table-responsive-no-min"><div class="fichecenter">';

        print '<form id="searchTraceForm" method="GET" action="'.$_SERVER['PHP_SELF'].'?idmenu=1499&mainmenu=dolifarm">';
		print '<input type="hidden" name="action" id="action" value="searchFarm">';
		print '<table class="noborder centpercent">';
		print '<tr class="liste_titre">';
		if ($conf->global->DOLIFARM_MULTIFARMS) { 
			print '<th>'.$langs->trans("Farm").$form->select_thirdparty_list('',"socid","fk_typent in (234)",'SelectFarm').'</th>';
		} 
		print '<th>'.$langs->trans("Tracecode").'<input name="tracecode" id="tracecode" type="textarea"></th>';
		print '<th>'.$form->showFilterButtons().'</tr></tr>';
		print '</table>';
        print '</form>';
		
		if (!empty($tracecode)) {
			$trace = $dolitrace->traceprod($tracecode);
			print '<div class="fichesecondleft">';
			print '<div class="div-table-responsive-no-min">';
			print '<table class="noborder centpercent">';	
			print '<tr class="liste_titre"><th>'.$langs->trans("ProductTrace").': <b>'.$trace["CropInfo"]["id"].'</b></th><th>'.$langs->trans("TraceCode").': <b>'.$tracecode.'</b></th><th></th></tr>';
			print '<tr class="liste_titre"><th>'.$langs->trans("HarvestInfo").'</th><th>'.$langs->trans("PlotsInfo").'</th><th>'.$langs->trans("CropplanInfo").'</th></tr>';
			print '<tr ><td>'.$trace["HarvestInfo"]["id"].'<br>'.$langs->trans("HarvestDate").': '.dol_print_date($trace["HarvestDate"]["id"]).'<br>'.$langs->trans("HarvestQty").': '.$trace["HarvestQty"]["id"].'</td>
			            <td>'.$trace["PlotInfo"]["id"].'<br>'.$langs->trans("PlotSize").': '.$trace["PlotSize"]["id"].'</td>
			            <td>'.$trace["CropplanInfo"]["id"].'<br>'.$langs->trans("CropplanEstimatedqty").': '.$trace["CropplanEstimatedqty"]["id"].'</td>
			        </tr>';
			
			print "</table>";
			print '</div>';
			$farmid = $trace["FarmId"]["id"];
		}
		
		if ($action == 'searchFarm') {
			print '<div class="fichesecondleft">';
			print '<div class="div-table-responsive-no-min">';
			print '<table class="noborder centpercent">';	
			print '<tr class="liste_titre"><th>'.$langs->trans("FarmInfo").'</th><td></td></tr>';
			print '<tr ><td>'.$dolitrace->farmInfo($socid>0?$socid:$farmid).'</td></tr>';
			print "</table>";
			print '</div>';
		}
		
		if ($socid > 0) {    
			print '<div class="fichesecondleft">';
			print '<div class="div-table-responsive-no-min">';
			print '<table class="noborder centpercent" >';	
			print '<tr class="liste_titre"><th>'.$langs->trans("CropsPlan").'</th><th style=" background-color: white;border:0px;"></th><th>'.$langs->trans("Plots").'</th></tr>';
			print '<tr><td width="50%">'.$dolitrace->cropplans_list($socid).'</td><td></td><td>'.$dolitrace->plots_list($socid).'</td></tr>';		
			print '<tr class="liste_titre"><th>'.$langs->trans("Harvests").'</th></tr>';
			print '<tr><td width="50%">'.$dolitrace->harvests_list($socid).'</td></tr>';			
			print "</table>";
			print '</div>';
		}

print '</div></div>';



print dol_get_fiche_end();

// End of page
llxFooter();
$db->close();
