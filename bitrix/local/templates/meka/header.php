<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID ?>">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link rel="shortcut icon" href="<?=SITE_TEMPLATE_PATH?>/i/favicon.ico" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="theme-color" content="#222E6A">
<title><? $APPLICATION->ShowTitle(); ?></title>
<?$APPLICATION->ShowHead();?>
<?
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/libs/bootstrap/bootstrap.min.css');
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/libs/swiper/swiper-bundle.min.css');
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/libs/fancybox/fancybox.css');
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/common.css');
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/media.css');
?>
<?
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/libs/bootstrap/bootstrap.min.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/libs/swiper/swiper-bundle.min.js');
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/libs/fancybox/fancybox.umd.js');
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/imask.js');
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/common.js');
?>
</head>
<body>
	<div class="preload-wrapper">
		<div class="preload"></div>
	</div>
	<div id="panel"><?$APPLICATION->ShowPanel();?></div>
	<header class="header">
		<div class="container">
			<div class="header__top">
				<div class="header__row row">
					<div class="header__col-logo col-auto">
						<a href="/" class="header__logo">
							<img src="<?=SITE_TEMPLATE_PATH?>/i/logo.png" alt="logotype">
						</a>
					</div>
					<div class="header__col-navbar col-auto col-md-5 col-xl-auto">
						<?php
						$APPLICATION->IncludeComponent("bitrix:menu", "top", Array(
							"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
							"MAX_LEVEL" => "2",	// Уровень вложенности меню
							"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
							"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
							"DELAY" => "N",	// Откладывать выполнение шаблона меню
							"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
							"MENU_CACHE_TYPE" => "N",	// Тип кеширования
							"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
							"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
							"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
						),
						false
						); ?>
					</div>
					<div class="header__col-search col-auto">
						
						<div class="header__search">
							<?
							$APPLICATION->IncludeComponent("bitrix:search.form","search",
							Array(
								"USE_SUGGEST" => "N",
								"PAGE" => "#SITE_DIR#search/index.php"
							));?> 

						</div>
					</div>
					<div class="header__col-actions col-lg-auto col-md-auto col-sm-4 col-auto">
						<div class="header__actions">
							<a class="header__action-item header__compare" href="/catalog/compare.php?action=#ACTION_CODE#">
								
								<?
								if($_SESSION['CATALOG_COMPARE_LIST'][2]['ITEMS']){
									$countCompare = count($_SESSION['CATALOG_COMPARE_LIST'][2]['ITEMS']);
									if($countCompare > 0){?>
										<span class="header__amount"><?=$countCompare?></span>
									<?}
								}?>
								
								
							</a>
							<a class="header__action-item header__favorite" href="#">
								<?
								$favorites = isset($_COOKIE['favorites']) ? json_decode($_COOKIE['favorites'], true) : [];
								$countFavrite = count($favorites);
								if($countFavrite > 0){?>
									<span class="header__amount"><?=$countFavrite?></span>
								<?}?>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<main class="main">
<? $page = $APPLICATION->GetCurPage(false);
	 if ($page !== '/' && $page !== '/company/' && $page !== '/company/spb/' ){
			$APPLICATION->IncludeComponent(
				"bitrix:breadcrumb",
				"breadcrumb",
				array(
					"START_FROM" => "0",
					"PATH" => "",
					"SITE_ID" => "s1"
				)
			); 
		}?>
		

