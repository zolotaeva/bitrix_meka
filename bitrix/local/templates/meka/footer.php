<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

CModule::IncludeModule("iblock");?>
</main>
<?
$favorites = isset($_COOKIE['favorites']) ? json_decode($_COOKIE['favorites'], true) : [];
//контакты
$arSelect = Array("ID", "IBLOCK_ID", "NAME", "PROPERTY_*");
$arFilter = Array("IBLOCK_ID"=>4, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID"=>5);
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
while($ob = $res->GetNextElement())
{
 $arPropsContacts = $ob->GetProperties();
}?>
<footer class="footer">
	<div class="container">
		<div class="footer__row row">
			<div class="footer__col col-xl-3">
				<div class="footer__column">
					<div class="footer__logotype logotype">
						<img src="<?=SITE_TEMPLATE_PATH?>/i/logo-white.png" alt="logotype">
						<span class="logotype__text">
							<?$APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
                "AREA_FILE_SHOW" => "file",
                "PATH" => SITE_TEMPLATE_PATH . "/inc/logotype_text.php",
                "EDIT_TEMPLATE" => "include_areas_template.php"
                ), false
              );?>
						</span>
					</div>
					<div class="footer__copyright">
						<?$APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
                "AREA_FILE_SHOW" => "file",
                "PATH" => SITE_TEMPLATE_PATH . "/inc/copyright.php",
                "EDIT_TEMPLATE" => "include_areas_template.php"
                ), false
              );?>
					</div>
				</div>
			</div>
			<div class="footer__col col-lg-2 col-md-4 col-sm-6 col-6">
				<?
          $APPLICATION->IncludeComponent(
          "bitrix:menu", 
          "page", 
          array(
						"ROOT_MENU_TYPE" => "page",
						"MAX_LEVEL" => "1",
						"CHILD_MENU_TYPE" => "",
						"USE_EXT" => "N",
						"DELAY" => "N",
						"ALLOW_MULTI_SELECT" => "N",
						"MENU_CACHE_TYPE" => "N",
						"MENU_CACHE_TIME" => "3600",
						"MENU_CACHE_USE_GROUPS" => "Y",
						"MENU_CACHE_GET_VARS" => array(
						)
          ),
          false
      	);?>

			</div>
			<div class="footer__col col-lg-2 col-md-4 col-sm-6 col-6">
			<?
          $APPLICATION->IncludeComponent(
          "bitrix:menu", 
          "catalog", 
          array(
						"ROOT_MENU_TYPE" => "catalog",
						"MAX_LEVEL" => "1",
						"CHILD_MENU_TYPE" => "",
						"USE_EXT" => "N",
						"DELAY" => "N",
						"ALLOW_MULTI_SELECT" => "N",
						"MENU_CACHE_TYPE" => "N",
						"MENU_CACHE_TIME" => "3600",
						"MENU_CACHE_USE_GROUPS" => "Y",
						"MENU_CACHE_GET_VARS" => array(
						)
          ),
          false
      	);?>

				<a href="/policy" class="policy">Политика обработки персональных данных</a>
			</div>

			<div class="footer__col col-lg-auto col-md-4 col-sm-6 offset-sm-6 offset-md-0 col-6 offset-6">
				<div class="footer__subtitle">КОНТАКТЫ</div>
				<div class="footer__phone">
					<?
					$phone = $arPropsContacts['PHONE']['~VALUE'];
					$phoneLink = preg_replace("/[\D]/", "", $phone);
					?>
					<a href="tel:<?=$phoneLink?>"><?=$phone?></a>
					
				</div>
				<div class="footer__email">
					<?
					$email = $arPropsContacts['EMAIL']['~VALUE'];
					$address = $arPropsContacts['ADDRESS']['~VALUE'];
					?>
					<a href="mailto:<?=$email?>"><?=$email?></a>
				</div>
				<div class="footer__text"><?=$address?></div>	
			</div>
			<div class="footer__col col-lg-auto">
				<div class="footer__column">
					<a href="#" class="btn btn-secondary btn-callback" data-bs-toggle="modal" data-bs-target="#callback">Заказать звонок</a>
					<?
					$catalogPDF = CFile::GetPath($arPropsContacts['PDF_CATALOG']['VALUE']);
					$pricePDF = CFile::GetPath($arPropsContacts['PDF_PRICE']['VALUE']);
					?>
					<div class="footer__links">
						<a href="<?=$catalogPDF?>" target="_blank" download class="btn btn-download white">Скачать каталог</a>
						<a href="<?=$pricePDF?>" target="_blank" download class="btn btn-download white">Скачать прайс-лист</a>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<button class="btn btn-top" id='js-top'></button>
</footer>
<div class="modal fade" id="callback" tabindex="-1" aria-labelledby="callback" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title subtitle">Обратная связь</div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
			<?$APPLICATION->IncludeComponent("bitrix:form.result.new","callback",Array( 
        "SEF_MODE" => "N", 
        "WEB_FORM_ID" => "2", 
        "LIST_URL" => "", 
        "EDIT_URL" => "", 
        "SUCCESS_URL" => "", 
        "CHAIN_ITEM_TEXT" => "", 
        "CHAIN_ITEM_LINK" => "", 
        "IGNORE_CUSTOM_TEMPLATE" => "N", 
        "USE_EXTENDED_ERRORS" => "N", 
        "CACHE_TYPE" => "A", 
        "CACHE_TIME" => "3600", 
        "SEF_FOLDER" => "/", 
        "VARIABLE_ALIASES" => Array( 
            "WEB_FORM_ID" => "WEB_FORM_ID",
            "RESULT_ID" => "RESULT_ID",
        ), 
        "AJAX_MODE" => "Y", // режим AJAX 
        "AJAX_OPTION_SHADOW" => "N", // затемнять область 
        "AJAX_OPTION_JUMP" => "Y", // скроллить страницу до компонента 
        "AJAX_OPTION_STYLE" => "Y", // подключать стили 
        "AJAX_OPTION_HISTORY" => "N", 
        
        ) 
        );?>

      </div>
    </div>
  </div>
</div>

<div class="modal favorite">
	<div class="favorite__wrap">
		<div class="favorite__top">
			<div class="modal__title">Избранное</div>
			<div class="modal__close"></div>
		</div>
    <div class="favorites-list"></div>
	</div>
</div>
<div class="modal fade" id="order" tabindex="-1" aria-labelledby="order" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title subtitle">Обратная связь</div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
			<?$APPLICATION->IncludeComponent("bitrix:form.result.new","order",Array( 
        "SEF_MODE" => "N", 
        "WEB_FORM_ID" => "3", 
        "LIST_URL" => "", 
        "EDIT_URL" => "", 
        "SUCCESS_URL" => "", 
        "CHAIN_ITEM_TEXT" => "", 
        "CHAIN_ITEM_LINK" => "", 
        "IGNORE_CUSTOM_TEMPLATE" => "N", 
        "USE_EXTENDED_ERRORS" => "N", 
        "CACHE_TYPE" => "A", 
        "CACHE_TIME" => "3600", 
        "SEF_FOLDER" => "/", 
        "VARIABLE_ALIASES" => Array( 
            "WEB_FORM_ID" => "WEB_FORM_ID",
            "RESULT_ID" => "RESULT_ID",
        ), 
        "AJAX_MODE" => "Y", // режим AJAX 
        "AJAX_OPTION_SHADOW" => "N", // затемнять область 
        "AJAX_OPTION_JUMP" => "Y", // скроллить страницу до компонента 
        "AJAX_OPTION_STYLE" => "Y", // подключать стили 
        "AJAX_OPTION_HISTORY" => "N", 
        
        ) 
        );?>

      </div>
    </div>
  </div>
</div>
</body>
</html>