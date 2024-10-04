<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("О компании");
CModule::IncludeModule("iblock");
$arSelect = Array("ID", "IBLOCK_ID", "NAME", "PREVIEW_TEXT", "PREVIEW_PICTURE", "PROPERTY_*");
$arFilter = Array("IBLOCK_ID"=>5, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID"=>6);
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
while($ob = $res->GetNextElement())
{
 $arFields = $ob->GetFields();
 $arProps = $ob->GetProperties();
}

$bg = CFile::ResizeImageGet($arFields['PREVIEW_PICTURE'], array('width'=>1360, 'height'=>340), BX_RESIZE_IMAGE_EXACT, true);
?>
<div class="top">
	<div class="container">
		<div class="top__wrapper" style="background: url(<?=$bg['src']?>) no-repeat;">
			<div class="top__info">
				<div class="top__subtitle subtitle"><?=$arProps['SUBTITLE']['~VALUE']?></div>
				<div class="top__title title"><?=$arFields['NAME']?></div>
			</div>
		</div>
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
<div class="section company">
	<div class="container">
		<div class="company__title title"><?=$arProps['TITLE']['~VALUE']?></div>
		<div class="company__text text">

		<?=$arFields['~PREVIEW_TEXT']?>

		</div>
		<div class="company__btn">
			<a href="/company/spb/" class="btn btn-primary">Подробнее о производстве</a>
		</div>
		<div class="company__nums nums">
			<div class="nums__row row g-0">
				<? foreach ($arProps['NUMS']['~VALUE'] as $key => $num) {?>
					<div class="col-6 col-md-6 col-lg-3">
						<div class="nums__item">
							<div class="nums__title"><?=$arProps['NUMS']['DESCRIPTION'][$key]?></div>
							<div class="nums__text"><?=$num?></div>
						</div>
					</div>
				<?}?>
			</div>
		</div>
	</div>
</div>
<?$APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
	"AREA_FILE_SHOW" => "file",
	"PATH" => SITE_TEMPLATE_PATH . "/inc/history.php",
	"EDIT_TEMPLATE" => "include_areas_template.php"
	), false
);?>

<?$APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
	"AREA_FILE_SHOW" => "file",
	"PATH" => SITE_TEMPLATE_PATH . "/inc/projects.php",
	"EDIT_TEMPLATE" => "include_areas_template.php"
	), false
);?>
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