<?php
//Written By Jifeng Sun at 29 July 2014
//Modifed By Jifeng Sun at 09 Jan 2015 for m1 website
function CreateInfusionsoftUser($firstname, $email, $password, $throughPromotions = FALSE){
	//this is used for creating a infusionsoft api link and store the infusionsoft id to the database, $throughPromotions is false for normal register
	//auth.php will access this function
	require_once ('isdk.php');
	$app = new iSDK();
	if ($app->cfgCon("mps")){
		//Check if the email is existing in infusionsoft
		$returnFields = array('Id');
		$data = $app->findByEmail($email, $returnFields);
		if (isset($data[0])){
			//If Existing, update it.
			//And to the following Custom Merge Fields:
			//Email -->MPS/Pretastyler Email (Infusionsoft database name:  MyPrivateStylistPretastylerEmail )  
			//Password --> MPS & Pretastyler Password (Infusionsoft database name: MPSPretastylerPassword)
			$contactId = $data[0]['Id'];
			$conDat = array('FirstName' => $firstname, '_MyPrivateStylistPretastylerEmail' => $email, '_MPSPretastylerPassword' => $password);
			$conID = $app->updateCon($contactId, $conDat);
		}
		else {
			//If not existing, Start Inserting Contact database		
			//And to the following Custom Merge Fields:
			//Email -->MPS/Pretastyler Email (Infusionsoft database name:  MyPrivateStylistPretastylerEmail )  
			//Password --> MPS & Pretastyler Password (Infusionsoft database name: MPSPretastylerPassword)
			$conDat = array('FirstName' => $firstname, 'Email' => $email, '_MyPrivateStylistPretastylerEmail' => $email, '_MPSPretastylerPassword' => $password);
			$contactId = $app->addCon($conDat);
		}
		
		/* //Tag them as Prospect Tags-> Pretastyler Subscriber (268), PS Customers -> New Entry (148),  332 (don't know the name),  PS Customers -> Setup Portfolio (314), if this is coming from promotion website, 148, 332 and 314 wouldn't apply.
		$app->grpAssign($contactId, 268);
		if (!$throughPromotions){
			//this is for creating tags for the user from promotions, they do not need to be assign the tags below.
			$app->grpAssign($contactId, 148);
			$app->grpAssign($contactId, 332);
			$app->grpAssign($contactId, 314);
		} */
		$app->grpAssign($contactId, 400);
		//Call Back Newly Created Infusionsoft ID to stylefin_db
		return $contactId;
	}
}

function UpdateInfusionsoftUser($infusionsoft_id){
	//this is used for update the user activity info to infusionsoft and categories them into 4 levels.
	//auth.php will access this funciton.
	
	//fistly, use user id to find the infusionsoft id
	$contactId = $infusionsoft_id;
	//check the infusionsoft id, 
	//0 -> no infusionsoft id, 
	//-1 -> do not need infusionsoft id, 
	//others are correct infusionsoft id.
	if ($contactId >0) {
		require_once ('isdk.php');
		$app = new iSDK();
		if ($app->cfgCon("mps")){
			//remove all tags level 5 is (316) level 4 is (318) Lvel 3 is (320) level 2 is (322)
			$result = $app->grpRemove($contactId, 316);
			$result = $app->grpRemove($contactId, 318);
			$result = $app->grpRemove($contactId, 320);
			$result = $app->grpRemove($contactId, 322);
			//Get the last login time
			$returnFields = array('_LastLogin');
			$data = $app->loadCon($contactId, $returnFields);
			$current_date = date("Ymd\T00:00:00");
			if (!empty($data)){
				//existing last login time, get the last login date
				$last_login_date = $data['_LastLogin'];
				//calc the day difference between current_time and last login
				$current_date_time = mktime(0,0,0,substr($current_date,4,2),substr($current_date,6,2),substr($current_date,0,4));
				//echo "full:".$current_date."\nM:".substr($current_date,4,2)."\nD:".substr($current_date,6,2)."\nY:".substr($current_date,0,4)."\n";
				$last_login_date_time = mktime(0,0,0,substr($last_login_date,4,2),substr($last_login_date,6,2),substr($last_login_date,0,4));
				//echo "full:".$last_login_date."\nM:".substr($last_login_date,4,2)."\nD:".substr($last_login_date,6,2)."\nY:".substr($last_login_date,0,4)."\n";
				$datediff = floor(($current_date_time - $last_login_date_time)/(60*60*24));
				//echo $datediff;
				if ($datediff<=7){
					//within 7 days assign level 5 tag
					$app->grpAssign($contactId, 316);
					//$app->achieveGoal("om185", "TriggerSizzling", $contactId);
				} else if ($datediff >= 8 and $datediff <= 14){
					//within 8-14 days assign level 4 tag
					$app->grpAssign($contactId, 318);
				} else if ($datediff >= 15 and $datediff <= 21){
					//within 15-21 days assign level 3 tag
					$app->grpAssign($contactId, 320);
				} else {
					//over 22 days assign level 2 tag
					$app->grpAssign($contactId, 322);
				}
			} else {
				//last login time not existed, assign to level 5 tag
				$app->grpAssign($contactId, 316);
			}
			//update last login
			$conDat = array('_LastLogin' => $current_date);
			$conID = $app->updateCon($contactId, $conDat);
			return TRUE;
		}
	} else {
		return FALSE;
	}
}

function NotifyCompleteProfile($email){
	//this is used for appylying a infusionsoft group (tag) for customers who complete their profile.
	//auth.php will access this function
	require_once ('isdk.php');
	$app = new iSDK();
	if ($app->cfgCon("mps")){
		//Check if the email is existing in infusionsoft
		$returnFields = array('Id');
		$data = $app->findByEmail($email, $returnFields);
		if (isset($data[0])){
			//If Existing, update it.
			$contactId = $data[0]['Id'];
			$app->grpAssign($contactId, 314);
			return true;
		}
		else {
			//do nothing
			return false;
		}
	}
}
function NotifyCompleteProfileByInfusionsoftID($infusionsoft_id){
	//this is used for appylying a infusionsoft group (tag) for customers who complete their profile.
	//auth.php will access this function
	require_once ('isdk.php');
	$app = new iSDK();
	if ($app->cfgCon("mps")){
		$app->grpAssign($infusionsoft_id, 314);
	}
}

?>