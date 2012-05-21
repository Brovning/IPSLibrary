<?
	/*
	 * This file is part of the IPSLibrary.
	 *
	 * The IPSLibrary is free software: you can redistribute it and/or modify
	 * it under the terms of the GNU General Public License as published
	 * by the Free Software Foundation, either version 3 of the License, or
	 * (at your option) any later version.
	 *
	 * The IPSLibrary is distributed in the hope that it will be useful,
	 * but WITHOUT ANY WARRANTY; without even the implied warranty of
	 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
	 * GNU General Public License for more details.
	 *
	 * You should have received a copy of the GNU General Public License
	 * along with the IPSLibrary. If not, see http://www.gnu.org/licenses/gpl.txt.
	 */    

	/**@addtogroup ipsshadowing
	 * @{
	 *
	 * @file          IPSShadowing_ProgramTimer.ips.php
	 * @author        Andreas Brauneis
	 * @version
	 * Version 2.50.1, 21.03.2012<br/>
	 *
	 * Program Timer Script - Kontrolliert zyklisch, ob auf Grund der Programm Einstellung eine �nderung der 
	 * Beschattung erforderlich ist
	 */

	 include_once "IPSShadowing.inc.php";

	$_IPS['ABORT_ON_ERROR'] = true;

	$profileManager = new IPSShadowing_ProfileManager();
	$profileManager->UpdateProfileInfos();

	$categoryIdDevices      = IPSUtil_ObjectIDByPath('Program.IPSLibrary.data.modules.IPSShadowing.Devices');
	$deviceIds              = IPS_GetChildrenIds($categoryIdDevices);
	
	foreach($deviceIds as $deviceId) {
		$device = new IPSShadowing_Device($deviceId);
		$device->CheckPrograms($profileManager);
	}

	/** @}*/
?>