<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Завод в Санкт-Петербурге");
CModule::IncludeModule("iblock");
$arSelect = Array("ID", "IBLOCK_ID", "NAME", "PREVIEW_TEXT", "PROPERTY_*");
$arFilter = Array("IBLOCK_ID"=>13, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID"=>26);
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
while($ob = $res->GetNextElement())
{
 $arFields = $ob->GetFields();
 $arProps = $ob->GetProperties();
}

?>


<div class="top">
			<div class="container">
			<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"top_slider",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("", ""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "12",
		"IBLOCK_TYPE" => "promo",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("SUBTITLE", ""),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	)
);?>




			</div>
		</div>

<?
$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"breadcrumb",
	array(
		"START_FROM" => "0",
		"PATH" => "",
		"SITE_ID" => "s1"
	)
);
?>
<div class="section plant">
	<div class="container">
		<div class="plant__row row">
			<div class="col-lg-6">
				<div class="plant__title title"><?=$arProps['TITLE']['VALUE']?></div>
			</div>
			<div class="col-lg-6">
				<div class="plant__text text">
					<?=$arFields['PREVIEW_TEXT']?>
				</div>
			</div>
		</div>


		<? if($arProps['NUMS']){?>
			<div class="company__nums nums">
				<div class="nums__row row g-0">
					<?foreach ($arProps['NUMS']['VALUE'] as $key => $item) {?>
						<div class="col-6 col-md-6 col-lg-3">
							<div class="nums__item">
								<div class="nums__title"><?=$arProps['NUMS']['DESCRIPTION'][$key]?></div>
								<div class="nums__text"><?=$item?></div>
							</div>
						</div>
					<?}?>
				</div>
			</div>
			<?}?>

		<div class="plant__subtitle"><?=$arProps['SUBTITLE']['VALUE']?></div>
		<div class="plant__row row">
			<div class="col-lg-6">
				<div class="plant__text text">
				<?=$arProps['TEXT_LEFT']['~VALUE']['TEXT']?>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="plant__text text">
				<?=$arProps['TEXT_RIGHT']['~VALUE']['TEXT']?>
				</div>
			</div>
		</div>

		
		
		
	</div>
</div>


<?$APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
	"AREA_FILE_SHOW" => "file",
	"PATH" => SITE_TEMPLATE_PATH . "/inc/profit_full.php",
	"EDIT_TEMPLATE" => "include_areas_template.php"
	), false
);?>

<?$APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
	"AREA_FILE_SHOW" => "file",
	"PATH" => SITE_TEMPLATE_PATH . "/inc/news_slider.php",
	"EDIT_TEMPLATE" => "include_areas_template.php"
	), false
);?>
<?$APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
	"AREA_FILE_SHOW" => "file",
	"PATH" => SITE_TEMPLATE_PATH . "/inc/feedback.php",
	"EDIT_TEMPLATE" => "include_areas_template.php"
	), false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>