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
<div class="section projects">
	<div class="container-fluid">
		<div class="projects__row row">
			<div class="projects__col col-lg-4">
				<div class="projects__info">
					<div class="projects__info-top">
						<div class="projects__subtitle subtitle">ПРОЕКТЫ</div>
						<div class="projects__title title">Наши решения в реальных проектах</div>
					</div>
				</div>
				<div class="projects__nav">
					<div class="btn btn-prev swiper-button-prev projects__prev"></div>
					<div class="btn btn-next swiper-button-next projects__next"></div>
				</div>
			</div>
			<div class="projects__col col-lg-auto projects__slider-wrapper">
				<div class="projects__slider swiper">
					<div class="swiper-wrapper">

						<?foreach($arResult["ITEMS"] as $arItem):?>
							<?
								$this->AddEditAction( $arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID( $arItem["IBLOCK_ID"], "ELEMENT_EDIT" ) );
								$this->AddDeleteAction( $arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID( $arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')) );
								$img = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>440, 'height'=>220), BX_RESIZE_IMAGE_EXACT, true); 

							?>
							<div class="swiper-slide" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
								<? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])){
									$link = $arItem["DETAIL_PAGE_URL"];
								}else{
									$link = "#";
								}?>



								<a class="projects__item" href="<?=$link?>">
									<span class="projects__item-image">
										<img src="<?=$img['src']?>" alt="<?echo $arItem["NAME"]?>">
									</span>
									<span class="projects__item-info">
										<span class="projects__item-title"><?echo $arItem["NAME"]?></span>
										<span class="projects__item-arrow"></span>
									</span>
								</a>
							</div>
						<?endforeach;?>
					

					</div>
				</div>
			</div>
		</div>
	</div>
</div>