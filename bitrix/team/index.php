<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Команда");
CModule::IncludeModule("iblock");

$dbSection = CIBlockSection::GetList(Array(), array("ACTIVE" => "Y", "IBLOCK_ID" => 15, "ID" => 8), false,Array("UF_*"));
if($arSection = $dbSection->GetNext())?>


<div class="section page">
	<div class="container">
		<div class="page__row row pb-100">
			<div class="col-lg-6">
				<div class="page__title title pb-40"><?$APPLICATION->ShowTitle(false)?></div>
			</div>
			<div class="col-lg-6">
				<div class="text">
				<?=$arSection['~DESCRIPTION']?>
					
				</div>
			</div>
		</div>
		
		<?if($arSection['UF_NUM_TITLE'] && $arSection['UF_NUM_TEXT']){?>
			<div class="company__nums nums">
				<div class="nums__row row g-0">
					<?foreach ($arSection['UF_NUM_TITLE'] as $key => $title) {?>
						
					
						<div class="col-6 col-md-6 col-lg-3">
							<div class="nums__item">
								<div class="nums__title"><?=$title?></div>
								<div class="nums__text"><?=$arSection['UF_NUM_TEXT'][$key]?></div>
							</div>
						</div>
					<?}?>
				</div>
			</div>
		<?}?>
	</div>
</div>
<?$APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
	"AREA_FILE_SHOW" => "file",
	"PATH" => SITE_TEMPLATE_PATH . "/inc/profit_full.php",
	"EDIT_TEMPLATE" => "include_areas_template.php"
	), false
);?>
<div class="section team">
	<div class="container">
		<div class="team__title title center"><?=$arSection['UF_SUBTITLE']?></div>
		<?$APPLICATION->IncludeComponent(
			"bitrix:news.list",
			"team",
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
				"DISPLAY_NAME" => "Y",
				"DISPLAY_PICTURE" => "Y",
				"DISPLAY_PREVIEW_TEXT" => "N",
				"DISPLAY_TOP_PAGER" => "N",
				"FIELD_CODE" => array("", ""),
				"FILTER_NAME" => "",
				"HIDE_LINK_WHEN_NO_DETAIL" => "N",
				"IBLOCK_ID" => "15",
				"IBLOCK_TYPE" => "info",
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
				"PROPERTY_CODE" => array("POST", "EMAIL", ""),
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
<?$APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
	"AREA_FILE_SHOW" => "file",
	"PATH" => SITE_TEMPLATE_PATH . "/inc/feedback.php",
	"EDIT_TEMPLATE" => "include_areas_template.php"
	), false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>