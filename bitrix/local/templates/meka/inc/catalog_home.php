
<div class="section catalog">
	<div class="container">
		<div class="catalog__top">
			<div class="catalog__title title">Каталог решений</div>
			<a class="catalog__btn btn btn-primary" href="/catalog/">Посмотреть каталог</a>
		</div>

<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list", 
	"bootstrap_v4", 
	array(
		"ADDITIONAL_COUNT_ELEMENTS_FILTER" => "additionalCountFilter",
		"VIEW_MODE" => "TILE",
		"SHOW_PARENT_NAME" => "Y",
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "2",
		"SECTION_ID" => "",
		"SECTION_CODE" => "",
		"SECTION_URL" => "",
		"COUNT_ELEMENTS" => "N",
		"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
		"HIDE_SECTIONS_WITH_ZERO_COUNT_ELEMENTS" => "N",
		"TOP_DEPTH" => "1",
		"SECTION_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"ADD_SECTIONS_CHAIN" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_NOTES" => "",
		"CACHE_GROUPS" => "Y",
		"COMPONENT_TEMPLATE" => "bootstrap_v4",
		"FILTER_NAME" => "sectionsFilter",
		"HIDE_SECTION_NAME" => "N",
		"LIST_COLUMNS_COUNT" => "6",
		"CACHE_FILTER" => "N"
	),
	false
);?>

	</div>
</div>