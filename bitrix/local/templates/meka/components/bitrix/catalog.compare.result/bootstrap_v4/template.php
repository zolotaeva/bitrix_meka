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

$isAjax = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$isAjax = (
		(isset($_POST['ajax_action']) && $_POST['ajax_action'] == 'Y')
		|| (isset($_POST['compare_result_reload']) && $_POST['compare_result_reload'] == 'Y')
	);
}

$templateData = array(
	'TEMPLATE_THEME' => $this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/style.css',
	'TEMPLATE_CLASS' => $arParams['TEMPLATE_THEME']
);

?>
<h1>Сравнение</h1>
<div class="catalog-compare mb-4 bx-<? echo $templateData['TEMPLATE_CLASS']; ?>" id="bx_catalog_compare_block"><?
	if ($isAjax)
	{
		$APPLICATION->RestartBuffer();
	}
	?>
	<div class="mb-3 d-flex align-items-center compare-top">
		<div class="pr-2">
			<div class="text-muted"><?= GetMessage("CATALOG_SHOWN_CHARACTERISTICS") ?>:</div>
		</div>
		<div class="pr-2">
			<a
				class="btn <? echo (!$arResult["DIFFERENT"] ? 'btn-primary' : 'btn-secondary'); ?>"
				href="<? echo $arResult['COMPARE_URL_TEMPLATE'].'DIFFERENT=N'; ?>"
				rel="nofollow"><?=GetMessage("CATALOG_ALL_CHARACTERISTICS")?></a>
		</div>
		<div class="pr-2">
			<a
				class="btn <? echo ($arResult["DIFFERENT"] ? 'btn-primary' : 'btn-secondary'); ?>"
				href="<? echo $arResult['COMPARE_URL_TEMPLATE'].'DIFFERENT=Y'; ?>"
				rel="nofollow"><?=GetMessage("CATALOG_ONLY_DIFFERENT")?></a>
		</div>
	</div>
	<? if (!empty($arResult["ALL_FIELDS"]) || !empty($arResult["ALL_PROPERTIES"]) || !empty($arResult["ALL_OFFER_FIELDS"]) || !empty($arResult["ALL_OFFER_PROPERTIES"]))
	{
		?>
		<div class="catalog-compare-filter p-3 mb-3">
			<div class="catalog-compare-filter-title"><?=GetMessage("CATALOG_COMPARE_PARAMS")?></div>
			<div class="row">
				<? if (!empty($arResult["ALL_FIELDS"]))
				{
					foreach ($arResult["ALL_FIELDS"] as $propCode => $arProp)
					{
						if (!isset($arResult['FIELDS_REQUIRED'][$propCode]))
						{
							?>
							<div class="col-12 col-lg-3 col-md-4">
								<span class="form-check" onclick="CatalogCompareObj.MakeAjaxAction('<?=CUtil::JSEscape($arProp["ACTION_LINK"])?>')">
									<input type="checkbox" class="form-check-input custom-checkbox" id="PF_<?=$propCode?>"<? echo ($arProp["IS_DELETED"] == "N" ? ' checked="checked"' : ''); ?>>
									<label class="form-check-label" for="PF_<?=$propCode?>"><?=GetMessage("IBLOCK_FIELD_".$propCode)?></label>
								</span>
							</div>
							<?
						}
					}
				}

				if (!empty($arResult["ALL_OFFER_FIELDS"]))
				{
					foreach($arResult["ALL_OFFER_FIELDS"] as $propCode => $arProp)
					{
						?>
						<div class="col-12 col-lg-3 col-md-4">
							<span class="form-check" onclick="CatalogCompareObj.MakeAjaxAction('<?=CUtil::JSEscape($arProp["ACTION_LINK"])?>')">
								<input type="checkbox" class="form-check-input custom-checkbox" id="OF_<?=$propCode?>"<? echo ($arProp["IS_DELETED"] == "N" ? ' checked="checked"' : ''); ?>>
								<label class="form-check-label" for="OF_<?=$propCode?>"><?=GetMessage("IBLOCK_OFFER_FIELD_".$propCode)?></label>
							</span>
						</div>
						<?
					}
				}

				if (!empty($arResult["ALL_PROPERTIES"]))
				{
					foreach($arResult["ALL_PROPERTIES"] as $propCode => $arProp)
					{
						?>
						<div class="col-12 col-lg-3 col-md-4">
							<span class="form-check" onclick="CatalogCompareObj.MakeAjaxAction('<?=CUtil::JSEscape($arProp["ACTION_LINK"])?>')">
								<input type="checkbox" class="form-check-input custom-checkbox" id="PP_<?=$propCode?>"<?echo ($arProp["IS_DELETED"] == "N" ? ' checked="checked"' : '');?>>
								<label class="form-check-label" for="PP_<?=$propCode?>"><?=$arProp["NAME"]?></label>
							</span>
						</div>
						<?
					}
				}

				if (!empty($arResult["ALL_OFFER_PROPERTIES"]))
				{
					foreach($arResult["ALL_OFFER_PROPERTIES"] as $propCode => $arProp)
					{
						?>
						<div class="col-12 col-lg-3 col-md-4">
							<span class="form-check" onclick="CatalogCompareObj.MakeAjaxAction('<?=CUtil::JSEscape($arProp["ACTION_LINK"])?>')">
								<input type="checkbox" class="form-check-input custom-checkbox" id="OP_<?=$propCode?>"<? echo ($arProp["IS_DELETED"] == "N" ? ' checked="checked"' : ''); ?>>
								<label class="form-check-label" for="OP_<?=$propCode?>"><?=$arProp["NAME"]?></label>
							</span>
						</div>
						<?
					}
				}
				?>
			</div>
		</div>
		<?
	}
	?>
	<div class="catalog-compare-table table-responsive">
		<table class="table">
			<? if (!empty($arResult["SHOW_FIELDS"]))
			{


				foreach ($arResult["SHOW_FIELDS"] as $code => $arProp)
				{
					if($code != "PREVIEW_PICTURE" && $code != "DETAIL_PICTURE"){
					$showRow = true;
					if ((!isset($arResult['FIELDS_REQUIRED'][$code]) || $arResult['DIFFERENT']) && count($arResult["ITEMS"]) > 1)
					{
						$arCompare = array();
						foreach($arResult["ITEMS"] as $arElement)
						{
							$arPropertyValue = $arElement["FIELDS"][$code];
							

							if (is_array($arPropertyValue))
							{

								sort($arPropertyValue);


								$arPropertyValue = implode(" / ", $arPropertyValue);
							}
							$arCompare[] = $arPropertyValue;
						}
						unset($arElement);
						$showRow = (count(array_unique($arCompare)) > 1);
					}
					
					if ($showRow)
					{
						?>
						<tr>
							<th>

								<?
		
								if($code == "NAME"){

								}else{
									echo GetMessage("IBLOCK_FIELD_".$code);
								}?>
								</th>
								<? foreach($arResult["ITEMS"] as $arElement){?>
									<td>
									<? 
									if (!empty($arElement["FIELDS"]['PREVIEW_PICTURE']) && is_array($arElement["FIELDS"]['PREVIEW_PICTURE'])):?>
										<a href="<?=$arElement["DETAIL_PAGE_URL"]?>" class="compare-img">
											<img
												src="<?=$arElement["FIELDS"]['PREVIEW_PICTURE']["SRC"]?>"
												class="catalog-compare-item-image"
												alt="<?=$arElement["FIELDS"]['PREVIEW_PICTURE']["ALT"]?>"
												title="<?=$arElement["FIELDS"]['PREVIEW_PICTURE']["TITLE"]?>"
											/>
										</a>
									<?endif;?>
									</td>
								<?}?>
						</tr>


							<tr>
							<th>
								<?
								if($code == "NAME"){

								}else{
									echo GetMessage("IBLOCK_FIELD_".$code);
								}?>
							</th>
							<? foreach($arResult["ITEMS"] as $arElement)
							{ 
								
								?>
								<td>
									<?
									switch($code)
									{
										case "NAME":
											?>
											<div class="catalog-compare-item-top">
												<a class="catalog-compare-item-title" href="<?=$arElement["DETAIL_PAGE_URL"]?>"><?=$arElement[$code]?></a>
												<? if($arElement["CAN_BUY"]): ?>
													<div class="pt-2">
														<a class="btn btn-primary btn-buy" href="<?=$arElement["BUY_URL"]?>" rel="nofollow"><?=GetMessage("CATALOG_COMPARE_BUY"); ?></a>
													</div>
												<? elseif(!empty($arResult["PRICES"]) || is_array($arElement["PRICE_MATRIX"])): ?>
													<div class="pt-2"><?//=GetMessage("CATALOG_NOT_AVAILABLE")?>
													<a class="btn btn-buy btn-compare w-100" href="#" rel="nofollow" data-bs-toggle="modal" data-bs-target="#order" data-name="<?=$arElement[$code]?>" data-link="<?=$arElement["DETAIL_PAGE_URL"]?>">Узнать о поступлении</a>
												</div>
											</div>
											<?endif;
											break;
										case "PREVIEW_PICTURE":
										case "DETAIL_PICTURE":
											
											break;
										default:
											echo $arElement["FIELDS"][$code];
											break;
									}
									?>
								</td>
								<?
							}
							unset($arElement);
							?>
						</tr>
		
						<?
					}
				}
			}
			}

			if (!empty($arResult["SHOW_OFFER_FIELDS"]))
			{
				foreach ($arResult["SHOW_OFFER_FIELDS"] as $code => $arProp)
				{
					$showRow = true;
					if ($arResult['DIFFERENT'])
					{
						$arCompare = array();
						foreach($arResult["ITEMS"] as $arElement)
						{
							$Value = $arElement["OFFER_FIELDS"][$code];
							if(is_array($Value))
							{
								sort($Value);
								$Value = implode(" / ", $Value);
							}
							$arCompare[] = $Value;
						}
						unset($arElement);
						$showRow = (count(array_unique($arCompare)) > 1);
					}
					if ($showRow)
					{
						?>
						<tr>
							<th><?=GetMessage("IBLOCK_OFFER_FIELD_".$code)?></th>
							<?foreach($arResult["ITEMS"] as $arElement)
							{
								?>
								<td>
									<? switch ($code)
									{
										case 'PREVIEW_PICTURE':
										case 'DETAIL_PICTURE':
											if (!empty($arElement["OFFER_FIELDS"][$code]) && is_array($arElement["OFFER_FIELDS"][$code]))
											{
												?>
												<img
													border="0"
													src="<?= $arElement["OFFER_FIELDS"][$code]["SRC"] ?>"
													width="auto"
													height="150"
													alt="<?= $arElement["OFFER_FIELDS"][$code]["ALT"] ?>" title="<?= $arElement["OFFER_FIELDS"][$code]["TITLE"] ?>"
												/><?
											}
											break;
										default:
											?><?=(is_array($arElement["OFFER_FIELDS"][$code])? implode("/ ", $arElement["OFFER_FIELDS"][$code]): $arElement["OFFER_FIELDS"][$code]);
											break;
									}
									?>
								</td>
								<?
							}
							unset($arElement);
							?>
						</tr>
						<?
					}
				}
			}
			?>

			<tr>
				<th><?=GetMessage('CATALOG_COMPARE_PRICE');?></th>
				<? foreach ($arResult["ITEMS"] as $arElement)
				{
					if (isset($arElement['MIN_PRICE']) && is_array($arElement['MIN_PRICE']))
					{
						?>
						<td><? echo $arElement['MIN_PRICE']['PRINT_DISCOUNT_VALUE']; ?></td>
						<?
					}
					elseif (!empty($arElement['PRICE_MATRIX']) && is_array($arElement['PRICE_MATRIX']))
					{
						?>
						<td><?
						$matrix = $arElement['PRICE_MATRIX'];
						$rows = $matrix['ROWS'];
						$rowsCount = count($rows);
						if ($rowsCount > 0)
						{
							?><table class="compare-price"><?
							if (count($rows) > 1)
							{
								foreach ($rows as $index => $rowData)
								{
									if (empty($matrix['MIN_PRICES'][$index]))
										continue;
									if ($rowData['QUANTITY_FROM'] == 0)
										$rowTitle = GetMessage('CP_TPL_CCR_RANGE_TO', array('#TO#' => $rowData['QUANTITY_TO']));
									elseif ($rowData['QUANTITY_TO'] == 0)
										$rowTitle = GetMessage('CP_TPL_CCR_RANGE_FROM', array('#FROM#' => $rowData['QUANTITY_FROM']));
									else
										$rowTitle = GetMessage(
											'CP_TPL_CCR_RANGE_FULL',
											array('#FROM#' => $rowData['QUANTITY_FROM'], '#TO#' => $rowData['QUANTITY_TO'])
										);
									echo '<tr><td>'.$rowTitle.'</td><td>';
									echo \CCurrencyLang::CurrencyFormat($matrix['MIN_PRICES'][$index]['PRICE'], $matrix['MIN_PRICES'][$index]['CURRENCY']);
									echo '</td></tr>';
									unset($rowTitle);
								}
								unset($index, $rowData);
							}
							else
							{
								$currentPrice = current($matrix['MIN_PRICES']);
								echo '<tr><td class="simple">'.\CCurrencyLang::CurrencyFormat($currentPrice['PRICE'], $currentPrice['CURRENCY']).'</td></tr>';
								unset($currentPrice);
							}
							?></table><?
						}
						unset($rowsCount, $rows, $matrix);
						?></td><?
					}
					else
					{
						?><td>&nbsp;</td><?
					}
				}
				unset($arElement);
				?>
			</tr>

			<? if (!empty($arResult["SHOW_PROPERTIES"]))
			{
				foreach ($arResult["SHOW_PROPERTIES"] as $code => $arProperty)
				{
					$showRow = true;
					if ($arResult['DIFFERENT'])
					{
						$arCompare = array();
						foreach($arResult["ITEMS"] as $arElement)
						{
							if (!isset($arElement["DISPLAY_PROPERTIES"][$code]))
							{
								continue;
							}
							$arPropertyValue = $arElement["DISPLAY_PROPERTIES"][$code]["VALUE"];
							if (is_array($arPropertyValue))
							{
								sort($arPropertyValue);
								$arPropertyValue = implode(" / ", $arPropertyValue);
							}
							$arCompare[] = $arPropertyValue;
						}
						unset($arElement);
						$showRow = (count(array_unique($arCompare)) > 1);
					}

					if ($showRow)
					{
						?>
						<tr>
							<th><?=$arProperty["NAME"]?></th>
							<?foreach($arResult["ITEMS"] as $arElement)
							{
								?>
								<td>
									<?php
									if (isset($arElement["DISPLAY_PROPERTIES"][$code]))
									{
										echo
											is_array($arElement["DISPLAY_PROPERTIES"][$code]["DISPLAY_VALUE"])
												? implode("/ ", $arElement["DISPLAY_PROPERTIES"][$code]["DISPLAY_VALUE"])
												: (string)$arElement["DISPLAY_PROPERTIES"][$code]["DISPLAY_VALUE"]
										;
									}
									?>
								</td>
							<?
							}
							unset($arElement);
							?>
						</tr>
					<?
					}
				}
			}

			if (!empty($arResult["SHOW_OFFER_PROPERTIES"]))
			{
				foreach($arResult["SHOW_OFFER_PROPERTIES"] as $code=>$arProperty)
				{
					$showRow = true;
					if ($arResult['DIFFERENT'])
					{
						$arCompare = array();
						foreach($arResult["ITEMS"] as $arElement)
						{
							if (!isset($arElement["OFFER_DISPLAY_PROPERTIES"][$code]))
							{
								continue;
							}
							$arPropertyValue = $arElement["OFFER_DISPLAY_PROPERTIES"][$code]["VALUE"];
							if(is_array($arPropertyValue))
							{
								sort($arPropertyValue);
								$arPropertyValue = implode(" / ", $arPropertyValue);
							}
							$arCompare[] = $arPropertyValue;
						}
						unset($arElement);
						$showRow = (count(array_unique($arCompare)) > 1);
					}
					if ($showRow)
					{
						?>
						<tr>
							<th><?=$arProperty["NAME"]?></th>
							<? foreach($arResult["ITEMS"] as $arElement)
							{
								?>
								<td>
									<?php
									if (isset($arElement["OFFER_DISPLAY_PROPERTIES"][$code]))
									{
										echo
											is_array($arElement["OFFER_DISPLAY_PROPERTIES"][$code]["DISPLAY_VALUE"])
												? implode("/ ", $arElement["OFFER_DISPLAY_PROPERTIES"][$code]["DISPLAY_VALUE"])
												: (string)$arElement["OFFER_DISPLAY_PROPERTIES"][$code]["DISPLAY_VALUE"]
										;
									}
									?>
								</td>
								<?
							}
							unset($arElement);
							?>
						</tr>
						<?
					}
				}
			}
			?>
			<tr>
				<th></th>
				<?foreach($arResult["ITEMS"] as $arElement)
				{
					?>
					<td>
						<a class="text-danger btn btn-del" onclick="CatalogCompareObj.delete('<?=CUtil::JSEscape($arElement['~DELETE_URL'])?>');" href="javascript:void(0)"><?=GetMessage("CATALOG_REMOVE_PRODUCT")?></a>
					</td>
					<?
				}
				unset($arElement);
				?>
			</tr>
		</table>
</div>
<?
if ($isAjax)
{
	die();
}
?>
<script type="text/javascript">
	var CatalogCompareObj = new BX.Iblock.Catalog.CompareClass("bx_catalog_compare_block", '<?=CUtil::JSEscape($arResult['~COMPARE_URL_TEMPLATE']); ?>');
</script>