<?
if(!defined("B_PROLOG_INCLUDED")  || B_PROLOG_INCLUDED!==true)die();
 

global $APPLICATION;
$aMenuLinksExt = $APPLICATION->IncludeComponent(
	"bitrix:menu.sections",
	"",
	Array(
		"ID" => $_REQUEST["ELEMENT_ID"], 
		"IBLOCK_TYPE" => "documents", 
		"IBLOCK_ID" => "10", 
		"SECTION_URL" => "/support/#SECTION_CODE#/", 
		"CACHE_TIME" => "3600" 
	)
);

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);

?>