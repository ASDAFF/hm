<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Статьи");
?><div class="content_width clear_fix">
	 <?
$APPLICATION->IncludeFile(
	SITE_DIR."/bitrix/templates/.default/inc/r_column.php",
	Array(),
	Array("MODE"=>"html")
);
?>

    <div class="s_left_column">


<?$APPLICATION->IncludeComponent(
    "bitrix:breadcrumb",
    "",
    Array(
        "START_FROM" => "0",
        "PATH" => "",
        "SITE_ID" => "-"
    )
);?><br>
        <?$APPLICATION->IncludeComponent(
	"bitrix:forum",
	".default",
	array(
		"THEME" => "gray",
		"SHOW_TAGS" => "Y",
		"SHOW_AUTH_FORM" => "Y",
		"TMPLT_SHOW_ADDITIONAL_MARKER" => "",
		"RESTART" => "N",
		"NO_WORD_LOGIC" => "N",
		"USE_LIGHT_VIEW" => "Y",
		"FID" => array(
			0 => "1",
		),
		"SEF_MODE" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_TIME_USER_STAT" => "60",
		"CACHE_TIME_FOR_FORUM_STAT" => "3600",
		"FORUMS_PER_PAGE" => "10",
		"TOPICS_PER_PAGE" => "10",
		"MESSAGES_PER_PAGE" => "10",
		"IMAGE_SIZE" => "500",
		"ATTACH_MODE" => array(
		),
		"SET_TITLE" => "Y",
		"USE_RSS" => "Y",
		"SHOW_VOTE" => "N",
		"SHOW_RATING" => "",
		"RATING_ID" => array(
		),
		"RATING_TYPE" => "",
		"COMPONENT_TEMPLATE" => ".default",
		"SEO_USER" => "",
		"SEO_USE_AN_EXTERNAL_SERVICE" => "N",
		"SHOW_FORUM_USERS" => "N",
		"SHOW_SUBSCRIBE_LINK" => "N",
		"SHOW_NAVIGATION" => "N",
		"SHOW_LEGEND" => "N",
		"SHOW_STATISTIC_BLOCK" => array(
		),
		"SHOW_FORUMS" => "N",
		"SHOW_FIRST_POST" => "N",
		"SHOW_AUTHOR_COLUMN" => "N",
		"PATH_TO_SMILE" => "",
		"PAGE_NAVIGATION_TEMPLATE" => "",
		"PAGE_NAVIGATION_WINDOW" => "",
		"AJAX_POST" => "N",
		"WORD_WRAP_CUT" => "",
		"WORD_LENGTH" => "",
		"USER_PROPERTY" => array(
		),
		"USER_FIELDS" => array(
		),
		"HELP_CONTENT" => "",
		"RULES_CONTENT" => "",
		"CHECK_CORRECT_TEMPLATES" => "N",
		"RSS_CACHE" => "",
		"PATH_TO_AUTH_FORM" => "",
		"TIME_INTERVAL_FOR_USER_STAT" => "",
		"DATE_FORMAT" => "",
		"DATE_TIME_FORMAT" => "",
		"USE_NAME_TEMPLATE" => "N",
		"NAME_TEMPLATE" => "",
		"ATTACH_SIZE" => "500",
		"EDITOR_CODE_DEFAULT" => "N",
		"SEND_MAIL" => "",
		"SEND_ICQ" => "",
		"SET_NAVIGATION" => "N",
		"SET_DESCRIPTION" => "N",
		"SET_PAGE_PROPERTY" => "N",
		"RSS_TYPE_RANGE" => array(
		),
		"RSS_COUNT" => "30",
		"RSS_TN_TITLE" => "",
		"RSS_TN_DESCRIPTION" => "",
		"VARIABLE_ALIASES" => array(
			"FID" => "FID",
			"TID" => "TID",
			"MID" => "MID",
			"UID" => "UID",
		)
	),
	false
);?>


		
	</div>
</div>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>