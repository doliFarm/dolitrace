<?php
 /* Copyright (C) 2022 	Luigi Grillo - luigi.grillo@gmail.com (http://luigigrillo.com)
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
 * \file        class/plots.class.php
 * \ingroup     dolitrace
 * \brief       This file is a CRUD class file for Plots (Create/Read/Update/Delete)
 */

    require_once DOL_DOCUMENT_ROOT.'/categories/class/categorie.class.php';

    require_once DOL_DOCUMENT_ROOT.'/core/lib/functions.lib.php';

class Dolitrace

{

	public function __construct($db)

	{
		require_once DOL_DOCUMENT_ROOT."/main.inc.php";
		global $langs;		
		$this->db = $db;
		$langs->loadLangs(array("dolitrace@dolitrace"));
	}

	

	public function farms_list()

	{
		$sql = "SELECT nom, rowid";
		$sql .= " FROM ".MAIN_DB_PREFIX."societe";
		$sql .= " WHERE fk_typent=234";   // TODO CRITICAL: parametrage type of societe. See extrafield
		$sql .= " ORDER BY nom ASC";
		$resql = $this->db->query($sql);
		if ($resql) {
			$html = '';
			$i = 0;
			$farm = array();
			while ($rec = $this->db->fetch_array($resql)) {
				$farm[$i]["nom"]= $rec["nom"];
				$farm[$i]["rowid"]= $rec["rowid"];
				$i++;
			}
			return $farm;
		} else return NULL;
		
	}

	public function plots_list($farm)

	{
        global $langs;
		$langs->load('dolitrace');
		$sql = "SELECT *";
		$sql .= " FROM ".MAIN_DB_PREFIX."dolifarm_plots";
		$sql .= " WHERE fk_farm = ".((int) $farm);
		
		$html  = '<div class="div-table-responsive-no-min">';
		$html .= '<table class="centpercent noborder"><tbody>';
		$html .= '<tr class="liste_titre">';
		$html .= '<th class="wrapcolumntitle liste_titre">'.$langs->trans('Ref').'</th><th class="wrapcolumntitle liste_titre">'.$langs->trans('Label').'</th><th class="wrapcolumntitle liste_titre">'.$langs->trans('OrganicStatus').'</th>';
        $html .= '</tr>';
        
		$result = $this->db->query($sql);
		if ($result) {
			$i=0;
			while ($i < $this->db->num_rows($result)) {
				$obj = $this->db->fetch_object($result);
				$html .= '<tr  class="oddeven">';
				$html .= '<td><a href="'.DOL_URL_ROOT.'/custom/dolitrace/plots_card.php?id='.$farm.'">'.$obj->ref."</a></td>";
				$html .= "<td>".$obj->label."</td>";
				// $html .= "<td>".$obj->def_organicstatus."</td>";
				$html .= "<td>".$langs->trans(getDictionaryValue(MAIN_DB_PREFIX."dolifarm_dictionary",'label',$obj->def_organicstatus))."</td>";
				$html .= "<tr>";
				$i++;
			}
		}
		$html .= "</tbody></table></div>";
        return $html;	

	}

	public function crop_list($farm, $plot='')

	{
		$html .= "cropList";
        return $html;	
	}
	
	public function cropplans_list($farm, $plot = NULL)
	{
		require_once DOL_DOCUMENT_ROOT.'/custom/dolitrace/class/cropplans.class.php';
		global $langs;
	
		$sql = "SELECT *";
		$sql .= " FROM ".MAIN_DB_PREFIX."dolifarm_cropplans";
		$sql .= " WHERE fk_farm = ".((int) $farm);
		$result = $this->db->query($sql);
		
		$html  = '<div class="div-table-responsive-no-min">';
		$html .= '<table class="centpercent noborder"><tbody>';
		$html .= '<tr class="liste_titre">';
		$html .= '<th class="wrapcolumntitle liste_titre"> '.$langs->trans('Ref').'</th><th class="wrapcolumntitle liste_titre">'.$langs->trans('Label').'</th><th class="wrapcolumntitle liste_titre">'.$langs->trans('StartDate').'</th><th class="wrapcolumntitle liste_titre">'.$langs->trans('EndDate').'</th>';
        $html .= '</tr>';

		if ($result) {
			$i=0;
			while ($i < $this->db->num_rows($result)) {
				$obj = $this->db->fetch_object($result);
				$html .= '<tr class="oddeven">';
				$html .= '<td><a href="'.DOL_URL_ROOT.'/custom/dolitrace/cropplans_card.php?id='.$obj->rowid.'">'.$obj->ref."</a></td>";
				$html .= "<td>".$obj->label."</td>";
				$html .= "<td>".$obj->startdate."</td>";
				$html .= "<td>".$obj->finishdate."</td>";

				$html .= "<tr>";
				$i++;
			}
		}
		$html .= "</tbody></table></div>";
        return $html;
	}		
	
	public function harvests_list($farm, $plot = NULL)
	{
		require_once DOL_DOCUMENT_ROOT.'/custom/dolitrace/class/harvests.class.php';
		global $langs;
	
		$sql = "SELECT *";
		$sql .= " FROM ".MAIN_DB_PREFIX."dolifarm_harvests";
		$sql .= " WHERE fk_farm = ".((int) $farm);
		$result = $this->db->query($sql);
		
		$html  = '<div class="div-table-responsive-no-min">';
		$html .= '<table class="centpercent noborder"><tbody>';
		$html .= '<tr class="liste_titre">';
		$html .= '<th class="wrapcolumntitle liste_titre"> '.$langs->trans('Ref').'</th><th class="wrapcolumntitle liste_titre">'.$langs->trans('Label').'</th><th class="wrapcolumntitle liste_titre">'.$langs->trans('Date').'</th><th class="wrapcolumntitle liste_titre">'.$langs->trans('Tracecode').'</th>';
        $html .= '</tr>';

		if ($result) {
			$i=0;
			while ($i < $this->db->num_rows($result)) {
				$obj = $this->db->fetch_object($result);
				$html .= '<tr class="oddeven">';
				$html .= '<td><a href="'.DOL_URL_ROOT.'/custom/dolitrace/harvests_card.php?id='.$farm.'">'.$obj->ref."</a></td>";
				$html .= "<td>".$obj->label."</td>";
				$html .= "<td>".$obj->date."</td>";
				$html .= "<td>".$obj->tracecode."</td>";

				$html .= "<tr>";
				$i++;
			}
		}
		$html .= "</tbody></table></div>";
        return $html;
	}		
	
	
	public function isfarm($societe,$tcode='TE_FARM'){
		global $db;
		// TODO setting permission for the tab EX: $user->rights->dolitrace->read && sociecte->FARM
		  $sqlfarmtype = "SELECT t.id, t.libelle, t.code FROM ".MAIN_DB_PREFIX."c_typent as t";
		  $sqlfarmtype .= " WHERE t.code = '".$tcode."'";
		  $resqlfarmtype = $db->query($sqlfarmtype);
		  if ($resqlfarmtype) {
			  if ($db->num_rows($resqlfarmtype)) {
						 $farmtype = $db->fetch_object($resqlfarmtype);
				 }
		  }
		return 1; // ====================== NON FUNZIONA TODO 
		if ($societe->fk_typent == $farmtype->id) 
			 return 1; 
		else return 0;
		
	}
	
	public function farmInfo($socid)
	{
		require_once DOL_DOCUMENT_ROOT . '/societe/class/societe.class.php';
		require_once DOL_DOCUMENT_ROOT.'/core/class/extrafields.class.php';
        global $langs;
		
        $societe = new Societe($this->db);
		$societe->fetch($socid);
				
		// $form = new Form($db);
		// $formfile = new FormFile($db);
		// $formadmin = new FormAdmin($db);
		// $formcompany = new FormCompany($db);
		
		if (!$this->isfarm($societe)) {
			$html = '<div class="">'.$langs->trans("IsNotFarm")."</div>";
		} else {
		
				$extrafields = new ExtraFields($db);
				if (!empty($societe->id)) {
					$res = $societe->fetch_optionals();
				}
				
				$html = '<div class="">';
				// 	Farm Ref
					$html .= '<tr><td>';
					$html .= $langs->trans('FarmName').'</td><td>'.$societe->getNomUrl(); 
					$html .= '</td>';
					$html .= '</tr>';
				// Barcode
				if (!empty($conf->barcode->enabled)) {
					$html .= '<tr><td>';
					$html .= $this->langs->trans('Barcode').'</td><td>'.showValueWithClipboardCPButton(dol_escape_htmltag($societe->barcode));
					$html .= '</td>';
					$html .= '</tr>';
				}
				// 	BodyCA
					$html .= '<tr><td>';
					$html .= $langs->trans('BodyCA').'</td><td>'.$societe->array_options['options_bodyca']; // .$extrafields->showOutputField('options_bodyca',$societe->array_options['options_bodyca']);
					$html .= '</tr>';
				// LicenseNumber
					$html .= '<tr><td>';
					$html .= $langs->trans('LicenseNumber').'</td><td>'.$societe->array_options['options_licensenumber'];
					$html .= '</td>';
					$html .= '</tr>';
				// FarmTraceCode
					$html .= '<tr><td>';
					$html .= $langs->trans('FarmTraceCode').'</td><td>'.$societe->array_options['options_farmtracecode'];
					$html .= '</td>';
					$html .= '</tr>';
				// CertificateExpirationData
					$html .= '<tr><td>';
					$html .= $langs->trans('CertificateExpirationData').'</td><td>'.$societe->array_options['options_certificateexpirationdata'];
					$html .= '</td>';
					$html .= '</tr>';
				// Agronomist
					$html .= '<tr><td>';
					$html .= $langs->trans('Agronomist').'</td><td>'.$societe->array_options['options_agronomist'];
					$html .= '</td>';
					$html .= '</tr>';
				$html .= "</div>";
		}
		
        return $html;
	}
	/* traceprod()
	*/   
	public function traceprod($tracecode,$output='0')
	{
		
		require_once DOL_DOCUMENT_ROOT.'/custom/dolitrace/class/harvests.class.php';
		require_once DOL_DOCUMENT_ROOT.'/custom/dolitrace/class/plots.class.php';
		require_once DOL_DOCUMENT_ROOT.'/custom/dolitrace/class/cropplans.class.php';
		require_once DOL_DOCUMENT_ROOT.'/custom/dolitrace/class/crops.class.php';


		global $langs, $db;
	
		$sql = "SELECT *";
		$sql .= " FROM ".MAIN_DB_PREFIX."dolifarm_harvests";
		$sql .= " WHERE tracecode = ".((int) $tracecode);
		$result = $this->db->query($sql);
		
		if ($result) {  // I am supposing here that we have univoque tracecode
			$harv = $this->db->fetch_object($result);
			
		    $harvest = New Harvests($db);
			$harvest->fetch($harv->rowid);
		    
			$soc = New Societe($db);
			$soc->fetch($harvest->fk_farm);
			
			$cropplan = New Cropplans($db);
			$cropplan->fetch($harvest->fk_cropplan);
			
			$crop = New Crops($db);
			$crop->fetch($harvest->fk_product);
			
			$plot = New Plots($db);
			$plot->fetch($cropplan->fk_plot);
			
			
			
			$traceabilty["FarmInfo"]["id"] = $soc->nom;
			$traceabilty["PlotInfo"]["id"] = $plot->getNomUrl();
			$traceabilty["HarvestInfo"]["id"]= $harvest->getNomUrl();
			$traceabilty["CropInfo"]["id"]= $crop->label;
		}
	
        return $traceabilty;
	}
	
	
	// Check if  exist a plot for a given societe
	public function plotsExist($socid)
	{
		global $db;
		$sql = "SELECT t.rowid FROM ".MAIN_DB_PREFIX."dolifarm_plots as t";
		$sql .= " WHERE t.fk_farm =".$socid;
		$resql = $db->query($sql);
		$numplot = 0;
		if ($resql) {
			$numplot = $db->num_rows($resql);
		    $db->free($resql);		
		}
		return $numplot;
	}
	
	// Check if exist a cropplans for a given societe
	// TODO(3) check if cropplan exist linked to plot ot croptype
	public function cropplansExist($socid,$plot='',$croptype='')
	{
		global $db;
		$sql = "SELECT t.rowid FROM ".MAIN_DB_PREFIX."dolifarm_cropplans as t";
		if (!is_null($socid)) $sql .= " WHERE t.fk_farm =".$socid." ";
		$resql = $db->query($sql);
		$numcroplans = 0;
		if ($resql) {
			$numcroplans = $db->num_rows($resql);
		    $db->free($resql);		
		}
		return $numcroplans;
	}
	// Check if the exist an harvest for a given societe
	public function harvestsExist($socid,$cropplan='')
	{
		global $db;
		$sql = "SELECT t.rowid FROM ".MAIN_DB_PREFIX."dolifarm_harvests as t";
		$sql .= " WHERE t.fk_farm =".$socid;
		$resql = $db->query($sql);
		$numcroplans = 0;
		if ($resql) {
			$numcroplans = $db->num_rows($resql);
		    $db->free($resql);		
		}
		return $numcroplans;
	}
	
		/**
	 *  Generate a univoque code for the harvesting traceability.
 	 *  Author LG: 29.05.2022
	 *  @param	    int			$fk_farm		The code could be linked to the farm ID
	 *  @return     string         				NULL if KO, code if OK
	 */
	public function generate_tracecode($fk_farm = '')
	{
		$code = random_int ( 9999  , 99999) ; // dol_now();
		return $code;
	}
	
	/**
	 *  Generate the order of the supplier.
 	 *  Author LG: 29.05.2022
	 *  @param	    int			$fk_farm		The code could be linked to the farm ID
	 *  @return     string         				NULL if KO, code if OK
	 */
	public function generate_ordersupplier($fk_farm = '')
	{
		$code = dol_now();
		return $code;
	}
	
	/**
	 *  Generate raw product from the harvest.
 	 *  Author LG: 29.05.2022
	 *  @param	    int			$fk_farm		The code could be linked to the farm ID
	 *  @return     string         				NULL if KO, code if OK
	 */
	public function generate_product($fk_farm = '')
	{
		$code = dol_now();
		return $code;
	}
	
	/**
	 *  Generate the Module to Manage Manufacturing Orders from the harvest.
 	 *  Author LG: 29.05.2022
	 *  @param	    int			$fk_farm		The code could be linked to the farm ID
	 *  @return     string         				NULL if KO, code if OK
	 */
	public function generate_manifacturingOrder($fk_farm = '')
	{
		$code = dol_now();
		return $code;
	}
	
	public function printLabel($fk_farm = '')
	{
		$code = dol_now();
		return $code;
	}
	
	
}

?>
