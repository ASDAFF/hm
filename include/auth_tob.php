<div class="soc_ico">
	<a href="http://vk.com/club22158541" target="_blank" class="vkico"></a>
<!--<a href="https://www.facebook.com/groups/510771112395927" target="_blank" class="faceico"></a>-->
	<a href="http://ok.ru/group/53391355019516" target="_blank" class="okico"></a>
</div>


<form class="bl_find clear_fix" action="/find.php" method="get">
	<input class="bl_find_t" name="q" type="text" placeholder="Поиск">
	<input class="bl_find_s" type="submit" value="">
</form>

<?if(!$USER->IsAuthorized()){?>


	<div class="clear_fix">
		<a class="bl_reg_small_r" ></a>
		<a class="bl_log_small_r" ></a>
	</div>

	<div id="bl_reg_forma" class="bl_reg_form bl_reg_forma" style="display: none;">
		<div class="txt_head_name">
			<h2>Регистрация</h2>
		</div>

		<?$APPLICATION->IncludeComponent(
	"bitrix:main.register",
	"register_inner",
	Array(
		"SHOW_FIELDS" => array(),
		"REQUIRED_FIELDS" => array(),
		"AUTH" => "Y",
		"USE_BACKURL" => "Y",
		"SUCCESS_PAGE" => "#",
		"SET_TITLE" => "N",
		"USER_PROPERTY" => array(),
		"USER_PROPERTY_NAME" => "Доп. свойства"
	)
);?>
	</div>




	<div id="bl_log_forma" class="bl_reg_form bl_log_forma" style="display: none;">
		<div class="txt_head_name">
			<h2>Вход</h2>
		</div>


		<?$APPLICATION->IncludeComponent(
	"bitrix:system.auth.form",
	"login_in",
	Array(
		"FORGOT_PASSWORD_URL" => "",
		"PROFILE_URL" => "",
		"SHOW_ERRORS" => "Y"
	)
);?>


	</div>

	<a onclick="$('#authulogin').toggle(100)" class="reg_soc margin_tb_5" >Авторизоваться через социальные сети</a>
	<div id="authulogin" style="display: none">
		<?$APPLICATION->IncludeComponent(
	"ulogin:auth",
	"",
	Array(
		"PROVIDERS" => "vkontakte,odnoklassniki,mailru,facebook,twitter,google,yandex,instagram,livejournal",
		"HIDDEN" => "other",
		"TYPE" => "small",
		"REDIRECT_PAGE" => "",
		"UNIQUE_EMAIL" => "Y",
		"SEND_MAIL" => "N",
		"GROUP_ID" => array("3","4")
	)
);?>

	</div>
<?}else{?>

	<div class="bl_reg_form">
		<?/*
		<div class="txt_head_name">
			<h2>Добро пожаловать</h2>
		</div>
		*/?>
		<a href="/user.php"><h2><?=CUser::GetLogin();?></h2></a>

		<form method="post" style="display: inline-block">
			<input type="hidden" name="logout" value="yes">
			<input type="submit" name="logout_butt" class="bl_reg_butt inliner" value="X">
		</form>
	</div>


<?}?>