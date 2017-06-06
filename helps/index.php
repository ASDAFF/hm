<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Справка");
?>
	<div class="content_width clear_fix" style="position: relative; margin: 0 80px 0 20px; max-width: 100%; width: auto; min-width: 1200px;">

		<?


		$APPLICATION->IncludeFile(
			SITE_DIR."/bitrix/templates/.default/inc/r_column.php",
			Array(),
			Array("MODE"=>"html")
		);
		?>

		<div class="s_left_column" style="width: auto; position: absolute; left: 20px; right: 200px;">

			<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "main_tsep", Array(

				),
				false
			);?>

		<div>

			<a id="2gis_mini_biglink" title="Организации Пятигорска (КМВ)" href="http://maps.2gis.ru/#/?history=project/minvody/center/43.007463716913,44.067546776528/zoom/10/">Перейти к большой карте</a>
			<noscript id="dg-widget-minigis-place-709a9d28" style="color:#c00;font-size:16px;font-weight:bold;">
				Код для вставки виджета на сайт
			</noscript>
			<script src="http://mini.api.2gis.ru/js/ver_56fce22/loader.js"></script>
			<script type="text/javascript">
				new DG.Widget.Components.Loader({
					wid: '709a9d28',
					params: {"projectSelector":{"id":89,"code":"minvody","name":"Пятигорск (КМВ)","centroid":"POINT(43.070635103632036 44.039911677067067)"},"search":{"rubrics":{"list":[]},"_searchFirmBasePoint":{}},"customBalloon":{},"Map":{"zoom":10,"lon":43.007463716913,"lat":44.067546776528},"resize":{"w":"100%","h":600}} ,"searchByKeyword": "<?=$_REQUEST['togis']?>"   });
			</script>

		</div>



		</div>



	</div>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>