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
<div class="answer__row row">

	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		$bg = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>320, 'height'=>340), BX_RESIZE_IMAGE_EXACT, true);
		?>

			<div class="answer__col col-sm-6 col-md-6 col-lg-4 col-xl-3" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<a class="answer__item" href="<?=$arItem["DETAIL_PAGE_URL"]?>" style="background: url(<?=$bg['src']?>);">
					<span class="answer__item-title"><?echo $arItem["NAME"]?></span>
					<span class="answer__item-arrow"></span>
				</a>
			</div>







	<?endforeach;?>

</div>
