<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
{
	die();
}
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);?>



<div class="page support">
	<div class="container">
		<div class="page__title title pb-40"><?$APPLICATION->ShowTitle(false)?></div>

<?
if($arParams["USE_RSS"]=="Y"):
	if(method_exists($APPLICATION, 'addheadstring'))
		$APPLICATION->AddHeadString('<link rel="alternate" type="application/rss+xml" title="'.$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["rss"].'" href="'.$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["rss"].'" />');
	?>
	<a href="<?=$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["rss"]?>" title="rss" target="_self"><img alt="RSS" src="<?=$templateFolder?>/images/gif-light/feed-icon-16x16.gif" border="0" align="right" /></a>
<?
endif;

if($arParams["USE_SEARCH"]=="Y"):?>
<?=GetMessage("SEARCH_LABEL")?><?php
	$APPLICATION->IncludeComponent(
	"bitrix:search.form",
	"flat",
	[
		"PAGE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["search"]
	],
	$component,
		['HIDE_ICONS' => 'Y']
);?>
<br />
<?php
endif;
if($arParams["USE_FILTER"]=="Y"):
$APPLICATION->IncludeComponent(
	"bitrix:catalog.filter",
	"",
	[
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"FILTER_NAME" => $arParams["FILTER_NAME"],
		"FIELD_CODE" => $arParams["FILTER_FIELD_CODE"],
		"PROPERTY_CODE" => $arParams["FILTER_PROPERTY_CODE"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
	],
	$component,
	['HIDE_ICONS' => 'Y']
);
?>
<br />
<?php
endif;
$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list", 
	"support", 
	array(
		"ADDITIONAL_COUNT_ELEMENTS_FILTER" => "additionalCountFilter",
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COUNT_ELEMENTS" => "N",
		"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
		"FILTER_NAME" => "",
		"HIDE_SECTIONS_WITH_ZERO_COUNT_ELEMENTS" => "N",
		"HIDE_SECTION_NAME" => "N",
		"IBLOCK_ID" => "10",
		"IBLOCK_TYPE" => "info",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_URL" => "#SECTION_CODE#/",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "1",
		"VIEW_MODE" => "TILE",
		"COMPONENT_TEMPLATE" => "support"
	),
	false
);




$APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
	"AREA_FILE_SHOW" => "file",
	"PATH" => SITE_TEMPLATE_PATH . "/inc/profit.php",
	"EDIT_TEMPLATE" => "include_areas_template.php"
	), false
);?>
</div>
			</div>
		</div>
