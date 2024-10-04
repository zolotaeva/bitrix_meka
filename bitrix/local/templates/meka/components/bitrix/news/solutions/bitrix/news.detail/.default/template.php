<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$this->setFrameMode(true);
?>

				<div class="page__content">
					<?
					if($arResult["DETAIL_PICTURE"]){
						$img = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], array('width'=>920, 'height'=>300), BX_RESIZE_IMAGE_PROPORTIONAL, true); ?>
					<img class="pb-30" src="<?=$img['src']?>" alt="<?=$arResult["NAME"]?>">
						<?
					}?>
					
					<div class="page__text">
						<?if($arResult["PREVIEW_TEXT"] <> ''):?>
							<?echo $arResult["PREVIEW_TEXT"];?>
						<?endif?>
						<?if($arResult["DETAIL_TEXT"] <> ''):?>
							<?echo $arResult["DETAIL_TEXT"];?>
						<?endif?>
					</div>

				</div>
			
