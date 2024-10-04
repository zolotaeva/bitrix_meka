<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="contacts__form feedback">
	<div class="feedback__info center">
		<div class="feedback__subtitle subtitle"><?=$arResult["FORM_TITLE"]?></div>
		<?=$arResult["FORM_DESCRIPTION"]?>
	</div>

			<?/*if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;*/?>

				<? if ($arResult["FORM_NOTE"] == "Y" || $arResult["FORM_NOTE"]){?>
					<div class="feedback__thanks">Спасибо! Ваша заявка принята!</div>
				<?}?>



			<?//=$arResult["FORM_NOTE"]?>
			<?if ($arResult["isFormNote"] != "Y")
			{
			?>
			<?=$arResult["FORM_HEADER"]?>
			<div class="feedback__form form">



	<?
	foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
	{
		if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden')
		{
			echo $arQuestion["HTML_CODE"];
		}
		else
		{
			$tmp = $arQuestion["HTML_CODE"];

			$mainclass = 'class="'.$FIELD_SID .' form-control " placeholder="'.$arQuestion["CAPTION"].'"';

			if($FIELD_SID == 'SIMPLE_QUESTION_641'){
				$mainclass = 'class="'.$FIELD_SID .' form-control mask" placeholder="'.$arQuestion["CAPTION"].'"';
			}
			$tmp = str_replace('class="inputtext"', $mainclass, $tmp);

	?>


				<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):
					if($arResult["FORM_ERRORS"][$FIELD_SID] )

					$arResult["FORM_ERRORS"][$FIELD_SID] = str_replace('Не заполнены следующие обязательные поля', 'Заполните, пожалуйста, поле', $arResult["FORM_ERRORS"][$FIELD_SID]);
					?>
				<span class="error-fld" title="<?=htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID])?>">
					<?=htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID])?>
				</span>
				<?endif;?>

				<?=$tmp?>


	<?
		}
	} //endwhile
	?>
<?
if($arResult["isUseCaptcha"] == "Y")
{
?>
<?=GetMessage("FORM_CAPTCHA_TABLE_TITLE")?>
	<input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" /><img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" width="180" height="40" />
	<?=GetMessage("FORM_CAPTCHA_FIELD_TITLE")?><?=$arResult["REQUIRED_SIGN"];?>
	<input type="text" name="captcha_word" size="30" maxlength="50" value="" class="inputtext" />
<?
} // isUseCaptcha
?>
	<div class="form__agree">
		<input type="checkbox" name="" id="agree" class="custom-checkbox">
		<label for="agree">Согласен с <a href="/policy/" target="_blank">политикой обработки персональных данных</a></label>
	</div>
	<div class="form__btn">
		<input class="btn btn-primary w-100" <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(trim($arResult["arForm"]["BUTTON"]) == '' ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" />
	</div>


	<?/*
	if ($arResult["F_RIGHT"] >= 15):?>
	&nbsp;<input type="hidden" name="web_form_apply" value="Y" /><input type="submit" name="web_form_apply" value="<?=GetMessage("FORM_APPLY")?>" />
	<?endif;?>
	&nbsp;<input type="reset" value="<?=GetMessage("FORM_RESET");?>" />
	<?=$arResult["REQUIRED_SIGN"];?> - <?=GetMessage("FORM_REQUIRED_FIELDS")
	*/?>

<?=$arResult["FORM_FOOTER"]?>
<?
} //endif (isFormNote)?>


</div>



</div>
			</div>
<script>
	let agree = document.getElementById('agree');
	if(!agree.checked){
		document.querySelector('.feedback .btn').disabled = true;
	}

	agree.addEventListener('change', ()=>{
		if(!agree.checked){
			document.querySelector('.feedback .btn').disabled = true;
			agree.nextElementSibling.classList.add('error-check');
		}else{
			document.querySelector('.feedback .btn').disabled = false;
			agree.nextElementSibling.classList.remove('error-check');
		}
	})
</script>