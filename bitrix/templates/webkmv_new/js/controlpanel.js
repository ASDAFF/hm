$patterns = "";
for(var i=1; i<= 15; i++){
	$img = 	"images/style-picker/pattern"+i+".jpg";	
	$patterns += '<li>';
	$patterns += '<a id="pattern'+i+'"  href="" title="">';
	$patterns += '<img src="'+ $img +'" alt="pattern'+i+'" title="pattern'+i+'"/>'
	$patterns += '</a>';
	$patterns += '</li>'; 
}

$color = ["skyblue", "blue", "avocado", "chocolate", "blueiris", "blueturquoise", "brown", "burntsienna", "chillipepper", "eggplant", "electricblue", "graasgreen", "gray", "green", "orange", "palebrown", "pink", "radiantorchid", "red", "yellow"];
$colors = "";
for(var i=0; i<$color.length; i++){
	$img = 	"images/style-picker/"+$color[i]+".jpg";	
	$colors += '<li>';
	$colors += '<a id="'+$color[i]+'" href="" title="">';
	$colors += '<img src="'+ $img +'" alt="color-'+$color[i]+'" title="color-'+$color[i]+'"/>'
	$colors += '</a>';
	$colors += '</li>'; 
}


$str = '<!-- **DT Style Picker Wrapper** -->';
$str += '<div class="dt-style-picker-wrapper">';
$str += '	<a href="" title="" class="style-picker-ico"> <img src="images/style-picker/picker-icon.png" alt="" title="" /> </a>';
$str += '	<div id="dt-style-picker">';
$str += '       <h3> Choose your layout </h3>';
$str += '		<ul class="layout-picker">';
$str += '       	<li> <a id="fullwidth" href="" title="" class="selected"> <img src="images/style-picker/fullwidth.jpg" alt="" title="" /> </a> </li>';
$str += '       	<li> <a id="boxed" href="" title=""> <img src="images/style-picker/boxed.jpg" alt="" title="" /> </a> </li>';
$str += '		</ul>';
$str += '		<div id="pattern-holder" style="display:none;">';
$str +='			<h3> Backgrounds for Boxed Layout </h3>';
$str += '			<ul class="pattern-picker">';
$str += 				$patterns;
$str += '			</ul>';
$str += '		</div>';
$str += '		<h3> Color scheme </h3>';
$str += '		<ul class="color-picker">';
$str += 		$colors;
$str += '		</ul>';
$str += '	</div>';
$str += '</div><!-- **DT Style Picker Wrapper - End** -->';
jQuery(document).ready(function($){
	$("body > div.wrapper").before($str);
	$picker_container = $("div.dt-style-picker-wrapper");
	
	//Applying Cookies
	if ( $.cookie('control-open') == 1 ) { 
		$picker_container.animate( { left: -247 } );
		$('a.style-picker-ico').addClass('control-open');
	}

	//Check Cookies in diffent pages and do the following things
	if($.cookie("mountcool_skin")!= null){
		$href = $("link[id='skin-css']").attr("href");
		$href = $href.substr(0,$href.lastIndexOf("/"));
		$href = $href.substr(0,$href.lastIndexOf("/"))+"/"+$.cookie("mountcool_skin")+"/style.css";
		$("link[id='skin-css']").attr("href",$href);
		$("ul.color-picker a[id='"+$.cookie("mountcool_skin")+"']").addClass("selected");
	}else{
		$("ul.color-picker a:first").addClass("selected");
	}

	//Apply Layout
	if($.cookie("mountcool_layout") == "boxed"){
		$("ul.layout-picker li a").removeAttr("class");
		$("ul.layout-picker li a[id='"+$.cookie("mountcool_layout")+"']").addClass("selected");
		$("div#pattern-holder").removeAttr("style");

		$i = ($.cookie("mountcool_pattern")) ? $.cookie("mountcool_pattern")  : 'pattern1';
		$img = 	"images/patterns/"+$i+".jpg";
		$('body').css('background-image', 'url('+$img+')').addClass('boxed');;
		$("ul.pattern-picker a[id="+$.cookie("mountcool_pattern")+"]").addClass('selected');
	}
	//Applying Cookies End

	//Picker On/Off
	$("a.style-picker-ico").click(function(e){
		$this = $(this);	
		if($this.hasClass('control-open')){
			$picker_container.animate({left: 0},function(){$this.removeClass('control-open');});
			$.cookie('control-open', 0);	
		}else{
			$picker_container.animate({left: -247},function(){$this.addClass('control-open');});
			$.cookie('control-open', 1);
		}
		e.preventDefault();
	});//Picker On/Off end

	//Layout Picker
	$("ul.layout-picker a").click(function(e){
		$this = $(this);
		$("ul.layout-picker a").removeAttr("class");
		$this.addClass("selected");
		$.cookie("mountcool_layout", $this.attr("id"));

		if( $.cookie("mountcool_layout") === "boxed") {
			$("body").addClass("boxed");
			$("div#pattern-holder").slideDown();
			
			if( $.cookie("mountcool_pattern") == null ){
				$("ul.pattern-picker a:first").addClass('selected');
				$.cookie("mountcool_pattern","pattern1",{ path: '/' });
			}else{
				$("ul.pattern-picker a[id="+$.cookie("mountcool_pattern")+"]").addClass('selected');
				$img = 	"images/patterns/"+$.cookie("mountcool_pattern")+".jpg";
				$('body').css('background-image', 'url('+$img+')');
			}
		} else {
			$("body").removeAttr("style").removeClass("boxed");
			$("div#pattern-holder").slideUp();
			$("ul.pattern-picker a").removeAttr("class");
		}
		window.location.href = location.href;
	e.preventDefault();
	});//Layout Picker End
	

	//Pattern Picker
	$("ul.pattern-picker a").click(function(e){
		if($.cookie("mountcool_layout") == "boxed"){
			$this = $(this);
			$("ul.pattern-picker a").removeAttr("class");
			$this.addClass("selected");
			$.cookie("mountcool_pattern", $this.attr("id"), { path: '/' });
			$img = 	"images/patterns/"+$.cookie("mountcool_pattern")+".jpg";
			//$('body').css('background-image', 'url('+$img+')');
			$('body').css({
				'background-image' : 'url('+$img+')',
				'background-repeat' : 'repeat',
				'background-attachment': 'fixed'
			});
		}
		e.preventDefault();
	});//Pattern Picker End
	

	//Color Picker
	$("ul.color-picker a").click(function(e){
		$this = $(this);
		$("ul.color-picker a").removeAttr("class");
		$this.addClass("selected");
		$.cookie("mountcool_skin", $this.attr("id"), { path: '/' });
		$href = $("link[id='skin-css']").attr("href");
		$href = $href.substr(0,$href.lastIndexOf("/"));
		$href = $href.substr(0,$href.lastIndexOf("/"))+"/"+$this.attr("id")+"/style.css";
		console.log($href);
        $("link[id='skin-css']").attr("href",$href);
		e.preventDefault();
	});//Color Picker End

});