<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @param array $arParams
 * @param array $arResult
 * @param CBitrixComponentTemplate $this
 */

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();
?>

<?
if (count($arResult["ERRORS"]) > 0){
	foreach ($arResult["ERRORS"] as $key => $error)
		if (intval($key) == 0 && $key !== 0)
			$arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;".GetMessage("REGISTER_FIELD_".$key)."&quot;", $error);

	ShowError(implode("<br />", $arResult["ERRORS"]));
}
elseif($arResult["USE_EMAIL_CONFIRMATION"] === "Y"){
?>
<p><?echo GetMessage("REGISTER_EMAIL_WILL_BE_SENT")?></p>
<?}?>

<form method="post" action="<?=POST_FORM_ACTION_URI?>" name="regform" enctype="multipart/form-data">

	<input type="text" placeholder="Имя*" class="reg_frm_name" name="REGISTER[LOGIN]">
	<input type="password" placeholder="Пароль*" class="reg_frm_pas" name="REGISTER[PASSWORD]">
	<input type="password" placeholder="Пароль повторно*" class="reg_frm_pas" name="REGISTER[CONFIRM_PASSWORD]">
	<input type="text" placeholder="e-mail*" class="reg_frm_mail" name="REGISTER[EMAIL]">

	<input type="submit" name="register_submit_button" class="bl_reg_butt" value="Регистрация">



</form>




