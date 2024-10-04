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

<div class="section objects">

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>


			<div class="objects__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="objects__row row">
					<div class="col-md-6">
						<div class="objects__slider swiper">
							<div class="swiper-wrapper">
								<?
								foreach ($arItem['PROPERTIES']['GALLERY']['VALUE'] as $key => $item) {
									$img = CFile::ResizeImageGet($item, array('width'=>660, 'height'=>415), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>

									<div class="swiper-slide">
										<div class="objects__img">
											<img src="<?=$img['src']?>" alt="<?echo $arItem["NAME"]?>">
										</div>
									</div>

								<?}?>
								
							</div>
							<div class="objects__pagination swiper-pagination"></div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="objects__info">
							<div class="objects__subtitle subtitle"><? echo $arItem['PROPERTIES']['SUBTITLE']['~VALUE']?></div>
							<div class="objects__title title"><?echo $arItem["NAME"]?></div>
							<div class="objects__text"><?echo $arItem["PREVIEW_TEXT"];?></div>
							<div class="objects__nav">
								<div class="objects__nav-prev btn btn-prev swiper-button-prev"></div>
								<div class="objects__nav-next btn btn-next swiper-button-next"></div>
							</div>
							
						</div>
					</div>
				</div>
			</div>

	
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
