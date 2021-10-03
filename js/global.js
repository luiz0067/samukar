jQuery(document).ready(
function(){
document.getElementById("wrapper").style.display="none";
jQuery(".link").attr("href","#");
jQuery('a[rel="lightbox[1]"]').colorbox();
jQuery.scrollTo(0);
jQuery("#aktionen").css("margin-top","0px");
jQuery("#preise").css("margin-top","0px");
jQuery("#contact").css("margin-top","0px");
jQuery("h1#branding").css("position","fixed");
jQuery("h1#branding").css("left","54%");
jQuery("h1#branding").css("margin-left","-196px");
jQuery("a#homeLink").parent().addClass("aktiv");
jQuery(".ajax").colorbox({iframe:true,innerWidth:"660px",innerHeight:"660px"});if(jQuery.browser.msie){ieversion=jQuery.browser.version}
else{ieversion="none"}});
	jQuery(
	function(){
		var d;var c;var e;var a;if(typeof window.innerWidth!="undefined"){d=window.innerWidth,c=window.innerHeight;e=(d-900)/2}
		else{
			if(typeof document.documentElement!="undefined"&&typeof document.documentElement.clientWidth!="undefined"&&document.documentElement.clientWidth!=0){d=document.documentElement.clientWidth,c=document.documentElement.clientHeight;e=(d-900)/2}
		else{
			d=document.getElementsByTagName("body")[0].clientWidth,c=document.getElementsByTagName("body")[0].clientHeight;e=(d-900)/2}}
		if
			(c<900){footerTopPos=c-0+"px";footernaviTopPos=c-0+"px"}
		else{
			footerTopPos=0+"px";footernaviTopPos="831px"}a=0-e;extrawidth=e+"px";wrapperwidth=2800+(e*2)+"px";
			jQuery("#footerContainer").css("position","fixed");
			jQuery("#footerContainer").css("top",footerTopPos);
			jQuery("#footerContainer").css("left",0);
			jQuery("#footerContainer").css("width",d+"px");
				document.getElementById("footernavi").style.position="fixed";
				document.getElementById("footernavi").style.width="980px";
				document.getElementById("footernavi").style.left=e+"px";
				document.getElementById("footernavi").style.top=footernaviTopPos;
				document.getElementById("footernavi").style.paddingLeft="315px";if(ieversion=="7.0"){
			jQuery("#footerContainer").css("background","none");
			jQuery("#footerContainer").css("background-image","url(images/bg-footernavi.png)");
			jQuery("#footerContainer").css("overflow-x","hidden");
			jQuery("#footerContainer").css("background-position","center top");
			jQuery("#footerContainer").css("background-repeat","no-repeat")}
		else{
			if(ieversion=="8.0"){
			jQuery("#footerContainer").css("width",d+18+"px");
			jQuery("#footerContainer").css("background-image","url(images/bg-footernavi.png)");
			jQuery("#footerContainer").css("background-position","center top");
			jQuery("#footerContainer").css("background-repeat","no-repeat")}
		else{
			jQuery("#footerContainer").css("background","transparent url(images/bg-footernavi.png) center top no-repeat")}}
			jQuery("#footerContainer").css("height","76px");
			jQuery("#footerContainer").css("overflow","hidden");
				document.getElementById("footer").style.backgroundImage="none";
				document.getElementById("footer").style.width=d+"px";
				document.getElementById("footer").style.marginLeft="0px";
				document.getElementById("extraContainer").style.position="fixed";
				document.getElementById("extraContainer").style.height="1px";
				document.getElementById("extraContainer").style.overflow="auto";
			jQuery(".footerbutton").click(
			function(){
			if(document.getElementById("footerContainer").style.top==="270px"){b()}
		else{
			jQuery("#footerContainer").css("display","block");
			jQuery("#footerContainer").css("top",footerTopPos);
			jQuery("#footerContainer").css("left","0px");
			jQuery("#footernavi").css("display","block");
			jQuery("#footernavi").css("left",e);
			jQuery("#footerContainer").stop().animate({top:"270px",height:"800px"},500,function(){});
				document.getElementById("footerContainer").style.overflow="auto";document.getElementById("extraContainer").style.display="block";
				document.getElementById("extraContainer").style.position="fixed";document.getElementById("extraContainer").style.top="345px";
				document.getElementById("extraContainer").style.marginLeft="0px";
			jQuery("#extraContainer").css("left",e);
			jQuery("#extraContainer").css("width","998px");extraheight=c-400;
			jQuery("#extraContainer").stop().animate({height:extraheight},1500,function(){});
			jQuery("#footernavi").stop().animate(
				{top:"289px"},550,
		function(){});jQuery("#footer a.close").css("display","block");
			jQuery("#footernavi").css("display","none")}});
			document.getElementById("leftsection").style.width=extrawidth;document.getElementById("rightsection").style.width=extrawidth;document.getElementById("wrapper").style.width=wrapperwidth;document.getElementById("wrapper").style.display="block";
			jQuery(document).stop().scrollTo({top:"0px",left:980},0,{easing:"easeOutQuint"});
			jQuery("#footer a.close").click(
		
		/******************************************         CALENDÁRIO E EVENTOS   *********************************************************/
		
		function(){b()});
		jQuery("a#museumLink").click(
			function(){a=500;b();jQuery("a.link").removeClass("aktiv");
			jQuery("#navigation li").removeClass("aktiv");
			jQuery("a#museumLink").addClass("aktiv");
			jQuery("a#museumLink").parent().addClass("aktiv");
			jQuery.scrollTo.window().queue([]).stop();
			jQuery(document).stop(true,true).scrollTo({top:"250px",left:a},3000,{easing:"easeOutQuint"})});
			
			
		/******************************************         CALENDÁRIO E EVENTOS   *********************************************************/
			
		/******************************************         HOME   *********************************************************/
			
			jQuery("a#homeLink").click(
			function(){
					a=50;b();
					jQuery("a.link").removeClass("aktiv");
					jQuery("#navigation li").removeClass("aktiv");
					jQuery("a#homeLink").addClass("aktiv");
					jQuery("a#homeLink").parent().addClass("aktiv");
					jQuery.scrollTo.window().queue([]).stop();
					jQuery(document).stop().scrollTo
					({top:"260px",left:a},3000,{easing:"easeOutQuint"})
			});
			
			/******************************************         HOME   *********************************************************/
			
			/******************************************      Contato   *********************************************************/
			
				jQuery("a#zauberhaftLink").click(
				function(){
				a=1960;b();
				jQuery("a.link").removeClass("aktiv");
				jQuery("#navigation li").removeClass("aktiv");
				jQuery("a#zauberhaftLink").addClass("aktiv");
				jQuery("a#zauberhaftLink").parent().addClass("aktiv");
				jQuery.scrollTo.window().queue([]).stop();
				jQuery(document).stop().scrollTo({top:"150px",left:a},3000,{easing:"easeOutQuint"})
			});
			
			
			/******************************************      contato  *********************************************************/
			
			/******************************************     Promoções               *********************************************************/
			
			
			jQuery("a#zaubershowsLink").click(
			function(){
				a=0;b();
				jQuery("a.link").removeClass("aktiv");jQuery("#navigation li").removeClass("aktiv");
				jQuery("a#zaubershowsLink").addClass("aktiv");jQuery("a#zaubershowsLink").parent().addClass("aktiv");
				jQuery.scrollTo.window().queue([]).stop();
				jQuery(document).stop().scrollTo({top:"0px",left:a},3000,{easing:"easeOutQuint"})
			});
			
			
			/******************************************     Promoções               *********************************************************/
			
			
			/******************************************     MENU DA CERVEJA              *********************************************************/
			
			jQuery("a#ostalgieLink").click(
			function(){
				a=700;b();
				jQuery("a.link").removeClass("aktiv");jQuery("#navigation li").removeClass("aktiv");
				jQuery("a#ostalgieLink").addClass("aktiv");
				jQuery("a#ostalgieLink").parent().addClass("aktiv");
				jQuery.scrollTo.window().queue([]).stop();
				jQuery(document).stop().scrollTo({top:"0px",left:a},3000,{easing:"easeOutQuint"})
			});
			
			
			/******************************************     MENU DA CERVEJA              *********************************************************/
			/******************************************     HISTÓRIA DO ABBEY              *********************************************************/
			
			jQuery("a#traumweltLink").click(
					function(){
					a=1300;b();
					jQuery("a.link").removeClass("aktiv");
					jQuery("#navigation li").removeClass("aktiv");jQuery("a#traumweltLink").addClass("aktiv");
					jQuery("a#traumweltLink").parent().addClass("aktiv");
					jQuery.scrollTo.window().queue([]).stop();
				jQuery(document).stop().scrollTo({top:"200px",left:a},3000,{easing:"easeOutQuint"})
			});
			
			
			/******************************************     HISTÓRIA DO ABBEY              *********************************************************/
			
			
			function b(){
				jQuery("#footer a.close").css("display","none");
				jQuery("#footernavi").css("display","block");
				jQuery("#footerContainer").stop().animate(
					{top:footerTopPos,height:"76px"},800,
				function(){});
				jQuery("#extraContainer").stop().animate(
					{height:"1px",marginTop:"200px"},200,
				function(){});
					jQuery("#footernavi").stop().animate({top:footernaviTopPos},480,
			function(){})}
		}	);
	var spamSpanMainClass="spamspan";
	var spamSpanUserClass="u";
	var spamSpanDomainClass="d";
	var spamSpanAnchorTextClass="t";
	var spamSpanParams=new Array("subject","body");addEvent(window,"load",spamSpan);
	function spamSpan(){
	var c=getElementsByClass(spamSpanMainClass,document,"span");
	for(var k=0;k<c.length;k++){
	var h=getSpanValue(spamSpanUserClass,c[k]);
	var f=getSpanValue(spamSpanDomainClass,c[k]);
	var m=getSpanValue(spamSpanAnchorTextClass,c[k]);
	var o=new Array();
	for(var g=0;g<spamSpanParams.length;g++){
	var p=getSpanValue(spamSpanParams[g],c[k]);
	if(p){o.push(spamSpanParams[g]+"="+encodeURIComponent(p))}}var b=String.fromCharCode(32*2);
	var n=cleanSpan(h)+b+cleanSpan(f);var e=document.createTextNode(m?m:n);
	var l=String.fromCharCode(109,97,105,108,116,111,58);
	var a=l+n;a+=o.length?"?"+o.join("&"):"";
	var d=document.createElement("a");d.className=spamSpanMainClass;d.setAttribute("href",a);d.appendChild(e);c[k].parentNode.replaceChild(d,c[k])}}
	function getElementsByClass(e,h,k){
	var g=new Array();if(h==null){node=document}if(k==null){k="*"}
	var c=h.getElementsByTagName(k);
	var a=c.length;
	var f=new RegExp("(^|s)"+e+"(s|$)");
	for(var d=0,b=0;d<a;d++){if(f.test(c[d].className)){g[b]=c[d];b++}}
	return g}
	function getSpanValue(c,b){var a=getElementsByClass(c,b,"span");if(a[0]){
	return a[0].firstChild.nodeValue}
	else{return false}}
	function cleanSpan(a){a=a.replace(/[\[\(\{]?[dD][oO0][tT][\}\)\]]?/g,".");a=a.replace(/\s+/g,"");
	return a}
	function addEvent(c,b,a){if(c.addEventListener){c.addEventListener(b,a,false)}
	else{if(c.attachEvent){c["e"+b+a]=a;c[b+a]=function(){c["e"+b+a](window.event)};c.attachEvent("on"+b,c[b+a])}}};

