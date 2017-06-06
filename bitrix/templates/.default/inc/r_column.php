<div class="s_right_column">





	<div class="clear_fix inr_banners">
		<?
		$APPLICATION->IncludeFile(
			SITE_DIR."include/banner1.php",
			Array(),
			Array("MODE"=>"html")
		);
		?>
	</div>

    <div class="clear_fix">
        <br/>
        <script type="text/javascript" src="//vk.com/js/api/openapi.js?116"></script>

        <!-- VK Widget -->
        <div id="vk_groups"></div>
        <script type="text/javascript">
            VK.Widgets.Group("vk_groups", {mode: 0, width: "220", height: "300", color1: 'FFFFFF', color2: '2B587A', color3: '5B7FA6'}, 22158541);
        </script>

        <br/>
        <div id="ok_group_widget"></div>
        <script>
            !function (d, id, did, st) {
                var js = d.createElement("script");
                js.src = "http://connect.ok.ru/connect.js";
                js.onload = js.onreadystatechange = function () {
                    if (!this.readyState || this.readyState == "loaded" || this.readyState == "complete") {
                        if (!this.executed) {
                            this.executed = true;
                            setTimeout(function () {
                                OK.CONNECT.insertGroupWidget(id,did,st);
                            }, 0);
                        }
                    }}
                d.documentElement.appendChild(js);
            }(document,"ok_group_widget","53391355019516","{width:220,height:300}");
        </script>
        <br/>





        <div class="fb-follow" data-href="https://www.facebook.com/groups/mamakmv/" data-width="220" data-colorscheme="light" data-layout="standard" data-show-faces="true"></div>
    </div>




</div>