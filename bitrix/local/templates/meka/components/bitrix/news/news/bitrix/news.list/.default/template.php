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


<div class="news-list">
	<div class="news-list__row row">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			$img = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>320, 'height'=>200), BX_RESIZE_IMAGE_EXACT, true);
			$anons = $arItem["PREVIEW_TEXT"];
			$count_words = 110;
	
			if(strlen($anons) > 147){
				$anons = mb_substr($anons, 0, $count_words, 'utf-8')."..."; 
			}
			?>

			<div class="col-lg-3 col-md-4 col-sm-6 news-list__col">
				<div class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<a class="news-item__image" href="<?=$arItem["DETAIL_PAGE_URL"]?>">
						<img src="<?=$img['src']?>" alt="<?echo $arItem["NAME"]?>">
					</a>
					<div class="news-item__info">
						<div class="news-item__date"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></div>
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="news-item__title"><?echo $arItem["NAME"]?></a>
						<div class="news-item__text"><?echo $anons;?></div>
						<a class="news-item__link" href="<?=$arItem["DETAIL_PAGE_URL"]?>">
							<span class="more-link">Читать подробнее</span>
							<span class="link-arrow"></span>
						</a>
					</div>
				</div>
			</div>


		<?endforeach;?>
		<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
			<?=$arResult["NAV_STRING"]?>
		<?endif;?>
	</div>
</div>