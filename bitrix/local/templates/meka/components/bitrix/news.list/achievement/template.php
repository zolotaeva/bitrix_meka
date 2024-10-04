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
<div class="achievements">
	<div class="achievements__row row">
		<div class="col-xl-10">

			<?foreach($arResult["ITEMS"] as $arItem):?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				$img = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>320, 'height'=>320), BX_RESIZE_IMAGE_PROPORTIONAL, true);
				?>

				<div class="achievement" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<div class="achievement__row row">
						<div class="col-md-4 col-lg-auto">
							<div class="achievement__image">
								<img src="<?=$img['src']?>" alt="<?echo $arItem["NAME"]?>">
							</div>
						</div>
						<div class="col-md-8 col-lg-8">
							<div class="achievement__info">
								<div class="achievement__subtitle subtitle"><? echo $arItem['PROPERTIES']['SUBTITLE']['~VALUE']?></div>
								<div class="achievement__title title"><?echo $arItem["NAME"]?></div>
								<div class="achievement__text"><?echo $arItem["PREVIEW_TEXT"];?></div>
							</div>
						</div>
					</div>
				</div>


			<?endforeach;?>
			<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
			<?=$arResult["NAV_STRING"]?>
			<?endif;?>
		</div>
	</div>
</div>