<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Сравнение");?>
<div class="section compare pt-0">
	<div class="container">
	<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.compare.result", 
	".default", 
	array(
		"AJAX_MODE" => "Y",
		"NAME" => "CATALOG_COMPARE_LIST",
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "2",
		"FIELD_CODE" => array(
		),
		"PROPERTY_CODE" => "",
		"OFFERS_FIELD_CODE" => "",
		"OFFERS_PROPERTY_CODE" => "",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_ORDER" => "asc",
		"DETAIL_URL" => "",
		"BASKET_URL" => "/personal/basket.php",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"PRICE_CODE" => array(
		),
		"USE_PRICE_COUNT" => "Y",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"DISPLAY_ELEMENT_SELECT_BOX" => "Y",
		"ELEMENT_SORT_FIELD_BOX" => "name",
		"ELEMENT_SORT_ORDER_BOX" => "asc",
		"ELEMENT_SORT_FIELD_BOX2" => "id",
		"ELEMENT_SORT_ORDER_BOX2" => "desc",
		"HIDE_NOT_AVAILABLE" => "N",
		"AJAX_OPTION_SHADOW" => "Y",
		"AJAX_OPTION_JUMP" => "Y",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "Y",
		"CONVERT_CURRENCY" => "Y",
		"CURRENCY_ID" => "RUB",
		"TEMPLATE_THEME" => "blue",
		"COMPONENT_TEMPLATE" => ".default",
		"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?>
	</div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>