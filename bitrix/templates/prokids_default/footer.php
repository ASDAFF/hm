<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

use \Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && isset($_SERVER['HTTP_X_FANCYBOX']) || isset($_REQUEST['AJAX_CALL']) && 'Y' == $_REQUEST['AJAX_CALL'];

if ($isAjax) {
	die();
}

?>

				</div>
			</div>
		</div><!-- /content -->
	</div><!-- /body -->
	<script type="text/javascript">RSGoPro_SetSet();</script>
	<div id="footer" class="footer"><!-- footer -->
		<div class="centering">
			<div class="centeringin line1 clearfix">
				<div class="block one">
					<div class="logo">
						<a href="<?=SITE_DIR?>">
							<?$APPLICATION->IncludeFile(
								SITE_DIR."include/company_logo.php",
								Array(),
								Array("MODE"=>"html")
							);?>
						</a>
					</div>
					<div class="contacts clearfix">
						<?/*<div class="phone1">
							<a class="fancyajax fancybox.ajax recall" href="<?=SITE_DIR?>include/popup/recall/?AJAX_CALL=Y" title="<?=Loc::getMessage('RSGOPRO.RECALL')?>"><i class="icon pngicons"></i><?=Loc::getMessage('RSGOPRO.RECALL')?></a>
							<div class="phone">
								<?$APPLICATION->IncludeFile(
									SITE_DIR."include/footer/phone1.php",
									Array(),
									Array("MODE"=>"html")
								);?>
							</div>
                       </div>*/?>
						<div class="phone2">
<a class="fancyajax fancybox.ajax recall" href="<?=SITE_DIR?>include/popup/recall/?AJAX_CALL=Y" title="<?=Loc::getMessage('RSGOPRO.RECALL')?>"><i class="icon pngicons"></i><?=Loc::getMessage('RSGOPRO.RECALL')?></a>
							<a class="fancyajax fancybox.ajax feedback" href="<?=SITE_DIR?>include/popup/feedback/?AJAX_CALL=Y" title="<?=Loc::getMessage('RSGOPRO.FEEDBACK')?>"><i class="icon pngicons"></i><?=Loc::getMessage('RSGOPRO.FEEDBACK')?></a>
							<div class="phone">
								<?$APPLICATION->IncludeFile(
									SITE_DIR."include/footer/phone2.php",
									Array(),
									Array("MODE"=>"html")
								);?>
							</div>
						</div>
					</div>
				</div>
				<div class="block two">
					<?$APPLICATION->IncludeFile(
						SITE_DIR."include/footer/catalog_menu.php",
						Array(),
						Array("MODE"=>"html")
					);?>
				</div>
				<div class="block three">
					<?$APPLICATION->IncludeFile(
						SITE_DIR."include/footer/menu.php",
						Array(),
						Array("MODE"=>"html")
					);?>
				</div>
				<div class="block four"><?/*
					<div class="sovservice">
						<?$APPLICATION->IncludeFile(
							SITE_DIR."include/footer/socservice.php",
							Array(),
							Array("MODE"=>"html")
						);?>
					</div>
					<div class="subscribe">
						<?$APPLICATION->IncludeFile(
							SITE_DIR."include/footer/subscribe.php",
							Array(),
							Array("MODE"=>"html")
						);?>
					</div>
					*/?>
				</div>
			</div>
		</div>

		<div class="line2">
			<div class="centering">
				<div class="centeringin clearfix">
					<div class="sitecopy">
						<?/*$APPLICATION->IncludeFile(
							SITE_DIR."include/footer/law.php",
							Array(),
							Array("MODE"=>"html")
);*/?>
					</div>
					<div class="developercopy">
						<?php
						/****************************************************************************************/
						/* #REDSIGN_COPYRIGHT# */
						/****************************************************************************************/
						?>
						Разработка сайта <a href="http://lema.agency" target="_blank">Lema.agency</a>
					</div>
				</div>
			</div>
		</div>
	</div><!-- /footer -->
    
	<div id="fixedcomparelist">
		<?$APPLICATION->IncludeFile(
			SITE_DIR."include/footer/compare.php",
			Array(),
			Array("MODE"=>"html")
		);?>
	</div>

	<?$APPLICATION->IncludeFile(
		SITE_DIR."include/footer/easycart.php",
		Array(),
		Array("MODE"=>"html")
	);?>

    <script>$('#svg-icons').setHtmlByUrl({url:SITE_TEMPLATE_PATH + '/assets/img/icons.svg?v280'});</script>
    
    <?$APPLICATION->IncludeFile(
        SITE_DIR."include/footer/body_end.php",
        Array(),
        Array("MODE"=>"html")
    );?>
    
</body>
</html>
