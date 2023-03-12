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
/*
if ( ($action == 'searchFarm') && !empty($tracecode)  ){
	$traceabilty = $dolitrace->traceprod($tracecode);
	if ($traceabilty) {
		$farmid = $traceabilty["FarmInfo"]["id"];
		$plotid = $traceabilty["PlotInfo"]["id"];
		$harvestid = $traceabilty["HarvestInfo"]["id"];
	}
}
*/
// None



/*
 * View
 */


llxHeader("", $langs->trans("DoliTraceArea"));

// print load_fiche_titre($langs->trans("DoliTraceArea"), '', 'dolitrace.png@dolitrace');

$soc->fetch($socid);
$head = societe_prepare_head($soc);
print dol_get_fiche_head($head, 'dolitrace', $langs->trans("ThirdParty"), 0, 'company');

dol_banner_tab($soc, 'socid', $linkback, ($user->socid ? 0 : 1), 'rowid', 'nom');


print '<div class="fichecenter">';
        
		if ($socid > 0) {    
			
			print '<div class="div-table-responsive-no-min">';
			print '<table class="centpercent notopnoleftnoright table-fiche-title">
			          <tbody><tr class="titre ">
			                   <td class="nobordernopadding valignmiddle col-title"> <div class="titre inline-block">'.$langs->trans("CropsPlan").'</div></td>
			                   <td class="nobordernopadding center valignmiddle"><a class="btnTitle" href="/dolibarr/custom/dolitrace/cropplans.php" title="'.$langs->trans("SeeAll").'"><span class="fa fa-list-alt imgforviewmode valignmiddle btnTitle-icon"></span></a></td>
			                   <td class="nobordernopadding titre_right wordbreakimp right valignmiddle"><a class="btnTitle btnTitlePlus" href="/dolibarr/custom/dolitrace/cropplans_card.php?action=create&fk_farm='.$socid.'" title="'.$langs->trans("NewPlot").'"><span class="fa fa-plus-circle valignmiddle btnTitle-icon"></span></a></td>
			                   </tr>
			          </tbody></table>';
			print $dolitrace->cropplans_list($socid);	
			print '</div>';
					
			print '<div class="">';
			print '<table class="centpercent notopnoleftnoright table-fiche-title">
			          <tbody><tr class="titre">
			                   <td class="nobordernopadding valignmiddle col-title"> <div class="titre inline-block">'.$langs->trans("Plots").'</div></td>
			                   <td class="nobordernopadding center valignmiddle"><a class="btnTitle" href="/dolibarr/custom/dolitrace/cropplans.php" title="'.$langs->trans("SeeAll").'"><span class="fa fa-list-alt imgforviewmode valignmiddle btnTitle-icon"></span></a></td>
			                   <td class="nobordernopadding titre_right wordbreakimp right valignmiddle"><a class="btnTitle btnTitlePlus" href="/dolibarr/custom/dolitrace/plots_card.php?action=create&fk_farm='.$socid.'" title="'.$langs->trans("NewPlot").'"><span class="fa fa-plus-circle valignmiddle btnTitle-icon"></span></a></td>
			                   </tr>
			          </tbody></table>';
			print $dolitrace->plots_list($socid);	
			print '</div>';
			
			print '<div class="">';
			print '<table class="centpercent notopnoleftnoright table-fiche-title">
			          <tbody><tr class="titre">
			                   <td class="nobordernopadding valignmiddle col-title"> <div class="titre inline-block">'.$langs->trans("Harvests").'</div></td>
			                   <td class="nobordernopadding center valignmiddle"><a class="btnTitle" href="/dolibarr/custom/dolitrace/harvests.php" title="'.$langs->trans("SeeAll").'"><span class="fa fa-list-alt imgforviewmode valignmiddle btnTitle-icon"></span></a></td>
			                   <td class="nobordernopadding titre_right wordbreakimp right valignmiddle"><a class="btnTitle btnTitlePlus" href="/dolibarr/custom/dolitrace/harvests_card.php?action=create&fk_farm='.$socid.'" title="'.$langs->trans("NewHarvest").'"><span class="fa fa-plus-circle valignmiddle btnTitle-icon"></span></a></td>
			                   </tr>
			          </tbody></table>';
			print $dolitrace->harvests_list($socid);	
			print '</div>';
		}

print '</div>';



print dol_get_fiche_end();

// End of page
llxFooter();
$db->close();
