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
function convert_bytes($size)
{
	$i = 0;
	while (floor($size / 1024) > 0) {
		++$i;
		$size /= 1024;
	}

	$size = str_replace('.', ',', round($size, 1));
	switch ($i) {
		case 0: return $size .= ' байт';
		case 1: return $size .= ' кб';
		case 2: return $size .= ' мб';
	}
}
?>

<div class="page page">
	<div class="container">
		<div class="page__title title pb-40"><?echo $arResult["SECTION"]["PATH"][0]["NAME"]?></div>

			<?
			if($arResult["SECTION"]["PATH"][0]["ID"] == 5){
				$class = '';
			}else{
				$class = ' documents-extended';
			}?>

		<div class="documents<?=$class?>">
			<div class="documents__row row">
				<?foreach($arResult["ITEMS"] as $arItem):?>
					<?
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

					
					$arrFile = CFile::GetFileArray($arItem["PROPERTIES"]["DOCUMENT"]["VALUE"]);
					$file = CFile::CheckImageFile($arrFile);
					$fileType = explode('/', $arrFile["CONTENT_TYPE"])[1];
					$fileType = strtoupper($fileType);
					if(strpos($fileType, 'EXCEL') !== false ){
						$fileType = 'XLS';
					}
					$fileSize = convert_bytes($arrFile['FILE_SIZE']);

					$fileLink = $arrFile['SRC'];

					?>
					<?if ($arResult["SECTION"]["PATH"][0]["ID"] == 5){?>

						<div class="documents__col col-md-6">
							<a href="<?=$fileLink?>" target="_blank" class="document">
								<span class="document__icon"></span>
								<span class="document__title"><?echo $arItem["NAME"]?></span>
								<span class="document__type"><?=$fileType?></span>
							</a>
						</div>

					<?}else{?>

					
					<div class="documents__col col-md-6" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
						<a href="<?=$fileLink?>" target="_blank" class="document">
							
							<span class="document__icon"></span>
							<span class="document__info">
								<span class="document__title"><?echo $arItem["NAME"]?></span>
								<?if($arItem["PREVIEW_TEXT"]){?>
									<span class="document__text"><?=$arItem["PREVIEW_TEXT"]?></span>
								<?}?>
							</span>
							<span class="document__file">
								<span class="document__type"><?=$fileType?></span>
								<span class="document__size"><?=$fileSize?></span>
							</span>
							
						</a>
					</div>
				<?}?>

				<?endforeach;?>
			</div>
		</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
</div>
</div>