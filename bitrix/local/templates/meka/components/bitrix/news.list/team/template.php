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

<div class="team__slider swiper">
	<div class="swiper-wrapper">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			$photo = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>320, 'height'=>320), BX_RESIZE_IMAGE_EXACT, true);  
			?>

			<div class="swiper-slide" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="team__item">
					<img class="team__item-image" src="<?=$photo['src']?>" alt="<?echo $arItem["NAME"]?>">
					<div class="team__item-info">
						<div class="team__item-post"><?=$arItem["DISPLAY_PROPERTIES"]["POST"]["VALUE"]?></div>
						<div class="team__item-title"><?echo $arItem["NAME"]?></div>
						<?if($arItem["DISPLAY_PROPERTIES"]["EMAIL"]["VALUE"]){?>
							<a href="mailto:<?=$arItem["DISPLAY_PROPERTIES"]["EMAIL"]["VALUE"]?>" class="team__item-email">
								<?=$arItem["DISPLAY_PROPERTIES"]["EMAIL"]["VALUE"]?>
							</a>
						<?}?>
					</div>
				</div>
			</div>
		<?endforeach;?>
	</div>
</div>