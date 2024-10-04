<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Эффективные решения для монтажа кабельных систем");?>
<?$APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
	"AREA_FILE_SHOW" => "file",
	"PATH" => SITE_TEMPLATE_PATH . "/inc/promo.php",
	"EDIT_TEMPLATE" => "include_areas_template.php"
	), false
);?>
<?$APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
	"AREA_FILE_SHOW" => "file",
	"PATH" => SITE_TEMPLATE_PATH . "/inc/catalog_home.php",
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
	"PATH" => SITE_TEMPLATE_PATH . "/inc/projects.php",
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

