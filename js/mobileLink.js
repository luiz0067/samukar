/**
 * Adds a link to the mobile version of the site if a mobile device user
 * hits the page with a nomobile cookie set to 'yes'
 */

function deletecookie()
{
    var dateNow = new Date();
    document.cookie = "nomobile=no;expires=" + dateNow.toGMTString() + ";" + "path=/;domain=." + document.domain + ";";    
}

function addDesktopLink() {
	if(document.getElementById('mobile-link') != null) {
		document.getElementById('mobile-link').style.display="block";
		var mobileURL = document.location.href;
		mobileURL = document.location.protocol + "//m." + mobileURL.replace(/(http(s)?:\/\/)(www\.){0,1}/i, "");		
		document.getElementById('mobile-link').innerHTML = '<a href="' + mobileURL + '" onclick="deletecookie()" class="btn-mobile">Mobile version<span>&nbsp;</span></a>';
	}
}

if(document.cookie.indexOf('nomobile')!= -1) {
	if (window.addEventListener) {
		window.addEventListener('load', addDesktopLink, false);
	} 
	else if (window.attachEvent) {
		window.attachEvent('onload', addDesktopLink);
	}
}
