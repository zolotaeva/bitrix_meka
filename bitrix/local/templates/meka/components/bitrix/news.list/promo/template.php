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
<div class="promo">
	<div class="promo__slider swiper">
		<div class="promo__slider-pagination swiper-pagination"></div>
		<div class="swiper-wrapper">

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	if($arItem["PROPERTIES"]["BACKGROUND"]["VALUE"]){
		$bgFull = CFile::ResizeImageGet($arItem["PROPERTIES"]["BACKGROUND"]["VALUE"], array('width'=>1920, 'height'=>1440), BX_RESIZE_IMAGE_EXACT, true);
		$bgFull = $bgFull['src'];
	}else{
		$bgFull = '/local/templates/meka/i/bg-promo.png';
	}
	if($arItem["PROPERTIES"]["BACKGROUND_RIGHT"]["VALUE"]){
		$bgRight = CFile::ResizeImageGet($arItem["PROPERTIES"]["BACKGROUND_RIGHT"]["VALUE"], array('width'=>482, 'height'=>650), BX_RESIZE_IMAGE_EXACT, true);
		$bgRight = $bgRight['src'];
	}else{
		$bgRight = '/local/templates/meka/i/bg-promo2.png';
	}
	if($arItem["PROPERTIES"]["IMAGE"]["VALUE"]){
		$image = CFile::ResizeImageGet($arItem["PROPERTIES"]["IMAGE"]["VALUE"], array('width'=>624, 'height'=>306), BX_RESIZE_IMAGE_PROPORTIONAL, true);
		$image = $image['src'];
	}else{
		$image = '/local/templates/meka/i/promo.png';
	}
	?>

	<div class="swiper-slide"  id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="promo__item" style="background: url(<?=$bgFull?>) no-repeat;">
			<div class="promo__container container">
				<div class="promo__row row">
					<div class="promo__col-info col-md-8">
						<div class="promo__item-top">
							<?echo $arItem["DISPLAY_PROPERTIES"]["SUBTITLE"]["DISPLAY_VALUE"]?>
						</div>
						<div class="promo__item-title">
							<?echo $arItem["NAME"]?>
						</div>
						<div class="promo__item-text">
							<?echo $arItem["DISPLAY_PROPERTIES"]["TEXT"]["DISPLAY_VALUE"]?>
						</div>
						<a href="<?echo $arItem["DISPLAY_PROPERTIES"]["LINK"]["VALUE"]?>" class="promo__item-btn btn btn-primary">
							<?echo $arItem["DISPLAY_PROPERTIES"]["ANKOR"]["DISPLAY_VALUE"]?>
						</a>
					</div>
					<div class="promo__col-img col-4">
						<div class="promo__img" style="background: url(<?=$bgRight?>) no-repeat;">
							<img src="<?=$image?>" alt="<?=$arItem["NAME"]?>">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?endforeach;?>
		</div>
		<div class="promo__slider-nav">
			<div class="swiper-button-prev"></div>
			<div class="swiper-button-next"></div>
		</div>
	</div>
</div>