<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>
<div class="mfeedback">

	<div class="txt_head_name">
		<h2>Ваш комментарий:</h2>
	</div>

<form action="<?=POST_FORM_ACTION_URI?>" method="POST">
<?=bitrix_sessid_post()?>

	<input type="hidden" name="timestamp"/>



	<textarea id="mfeedbacktar" name="MESSAGE" rows="5" cols="40"><?=$arResult["MESSAGE"]?></textarea>
	<div>
		<a onclick="$('#mfeedbacktar').val($('#mfeedbacktar').val()+':)')"> :) </a>
		<a onclick="$('#mfeedbacktar').val($('#mfeedbacktar').val()+':(')"> :( </a>
		<a onclick="$('#mfeedbacktar').val($('#mfeedbacktar').val()+':-o')"> :-o </a>
		<a onclick="$('#mfeedbacktar').val($('#mfeedbacktar').val()+';)')"> ;) </a>
		<a onclick="$('#mfeedbacktar').val($('#mfeedbacktar').val()+':-x')"> :-x </a>
		<a onclick="$('#mfeedbacktar').val($('#mfeedbacktar').val()+'x-d')"> x-d </a>
		<a onclick="$('#mfeedbacktar').val($('#mfeedbacktar').val()+':-p')"> :-p </a>
	</div>
	<input type="submit" name="submit" class="bl_reg_butt" value="<?=GetMessage("MFT_SUBMIT")?>">
	<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">

</form>
</div>