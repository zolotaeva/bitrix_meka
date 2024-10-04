<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Поиск");
?>
<div class="section search pt-0">
	<div class="container">
		<div class="search__title title"><?=$APPLICATION->ShowTitle();?></div>
<?$APPLICATION->IncludeComponent(
	"bitrix:search.page", 
	".default", 
	array(
		"RESTART" => "N",
		"CHECK_DATES" => "N",
		"USE_TITLE_RANK" => "N",
		"DEFAULT_SORT" => "rank",
		"arrFILTER" => array(
			0 => "main",
			1 => "iblock_catalog",
			2 => "iblock_news",
		),
		"SHOW_WHERE" => "N",
		"SHOW_WHEN" => "N",
		"PAGE_RESULT_COUNT" => "5",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_SHADOW" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Результаты поиска",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "bootstrap_v4",
		"USE_SUGGEST" => "N",
		"SHOW_ITEM_TAGS" => "N",
		"SHOW_ITEM_DATE_CHANGE" => "N",
		"SHOW_ORDER_BY" => "N",
		"SHOW_TAGS_CLOUD" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => ".default",
		"NO_WORD_LOGIC" => "N",
		"FILTER_NAME" => "",
		"USE_LANGUAGE_GUESS" => "Y",
		"SHOW_RATING" => "",
		"RATING_TYPE" => "",
		"PATH_TO_USER_PROFILE" => "",
		"STRUCTURE_FILTER" => "structure",
		"NAME_TEMPLATE" => "",
		"SHOW_LOGIN" => "Y",
		"arrFILTER_main" => array(
		),
		"arrFILTER_iblock_catalog" => array(
			0 => "2",
		),
		"arrFILTER_iblock_info" => array(
			0 => "all",
		),
		"arrFILTER_iblock_news" => array(
			0 => "all",
		)
	),
	false
);?>
	</div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>