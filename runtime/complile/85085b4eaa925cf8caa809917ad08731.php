<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>{sort:name}-{sort:title}</title>
<meta name="Keywords" content="{sort:keywords}" />
<meta name="Description" content="{sort:description}" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5, viewport-fit=cover" />
<meta name="format-detection" content="telephone=no" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link href="{pboot:sitetplpath}/css/en011.css" rel="stylesheet" />
<link href="{pboot:sitetplpath}/css/swiper.css" rel="stylesheet" type="text/css" />
<link href="{pboot:sitetplpath}/css/style.css" rel="stylesheet" type="text/css" />
<link href="{pboot:sitetplpath}/css/page.css" rel="stylesheet" type="text/css" />
<link href="{pboot:sitetplpath}/css/pagemob.css" rel="stylesheet" type="text/css" media="(max-width:1024px)" />
<script src="{pboot:sitetplpath}/js/jquery-3.6.0.js"></script>
<link href="{pboot:sitetplpath}/css/templates.css" rel="stylesheet" type="text/css" />

</head>
<body>
<!-- header -->
<header>
	<div class="head-top">
		<div class="l-wrap"> 
			<p class="text">{pboot:companyname}</p>
<!-- 			<div class="lang">
				<div title="language" class="lang-icon"><img src="{pboot:sitetplpath}/images/en.png" width="24" height="16" loading="lazy" alt="en" /><span>Language</span></div>
				<div class="lang-drop">
					<span class="lang-arrow"></span>
					<ul class="lang-wrap">
						<li class="lang-active"><a href="{pboot:sitepath}/"><img src="{pboot:sitetplpath}/images/en.png" width="24" height="16" loading="lazy" alt="English" /> English</a></li>
					</ul>
				</div>
			</div> -->
		</div>
	</div>
	
	<div class="head-info">
		<div class="l-wrap">
			<div class="head-logo">
				<a href="{pboot:sitepath}/" title="{pboot:companyname}"><img src="{pboot:sitelogo}" alt="{pboot:companyname}" /><span></span></a>
			</div>
			<div class="head-list">
				<div class="item">
					<div class="icon"><em class="iconfont icon-email"></em></div>
					<div class="info"><span>Email</span><p>{pboot:companyemail}</p></div>
				</div>
				<div class="item">
					<div class="icon"><em class="iconfont icon-telephone"></em></div>
					<div class="info"><span>Tel</span><p><a href="tel:{pboot:companymobile}">{pboot:companymobile}</a></p></div>
				</div>
				<div class="item">
					<div class="icon"><em class="iconfont icon-whatsapp"></em></div>
					<div class="info"><span>WhatsApp</span><p><a href="https://web.whatsapp.com/send?l=en&phone={label:whatsapp}" id="T8" rel="nofollow" target="_blank">{label:whatsapp}</a></p></div>
				</div>
			</div>
			<div class="head-share">
				<ul>
					<li><a href="https://www.facebook.com/" class="social-item fb" rel="nofollow" target="_blank" title="facebook"><i class="iconfont icon-facebook"></i></a></li>
					<li><a href="https://twitter.com/" class="social-item tw" rel="nofollow" target="_blank" title="twitter"><i class="iconfont icon-twitter"></i></a></li>
					<li><a href="https://www.linkedin.com/" class="social-item lk" rel="nofollow" target="_blank" title="linkedin"><i class="iconfont icon-linkedin"></i></a></li>
					<li><a href="https://www.instagram.com/" class="social-item ins" rel="nofollow" target="_blank" title="instagram"><i class="iconfont icon-instagram"></i></a></li>
				</ul>
			</div>
			<div class="m-menu"><span></span><span></span><span></span></div>
		</div>
	</div>
	
	<div class="head-nav">
		<div class="l-wrap">
			<ul class="nav-ul">
				<li id="liHome"> <a href="{pboot:sitepath}/" {pboot:if(0=='{sort:scode}')}class="inmenu_1"{/pboot:if}>Home</a></li>
				{pboot:nav num=10 parent=0}
				<li id="liabout-us">
					<a href="[nav:link]" {pboot:if('[nav:scode]'=='{sort:tcode}')}class="inmenu_1"{/pboot:if}>[nav:name]</a>
					{pboot:if([nav:soncount]>0)}
					<ul class="submenu">
					{pboot:2nav num=10 parent=[nav:scode]}
						<li class="menu-item LiLevel1">
							<a href="[2nav:link]">[2nav:name]</a>
							<ul>
							{pboot:3nav num=10 parent=[2nav:scode]}
								<li class="LiLevel2"> <a href="[3nav:link]">[3nav:name]</a> </li>
							{/pboot:3nav}
							</ul>
						</li>
					{/pboot:2nav}
					</ul>
					{/pboot:if}
				</li>
				{/pboot:nav}
			</ul>
			<div class="search-box">
				<form action="{pboot:scaction}"  method="get">
					<div class="head-search"><button type="button" title="Search"><em class="iconfont icon-search"></em></button></div>
					<div class="search-input">
						<input id="txtSearch" placeholder="Keyword" name="keyword">
						<button class="search-btn" onclick="PSearchTop()" title="Search"><em class="iconfont icon-search" aria-hidden="true"></em></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</header>
<!-- main -->
<main>
	<div class="banner-inner">
		<img src="{sort:pic}" width="1919" height="350" class="innerbanners" alt="Banner" />
		<div class="banner-content">
			<div class="container">
				<h1 class="banner-title-h1">{sort:name}</h1>
				<div class="banner-breadcrumbs">{pboot:position separator=>> indextext=Home}</div>
			</div>
		</div>
	</div>
	<section class="common-main single-main">
		<div class="l-wrap">
			<article>
				<div class="contact-list">
					<div class="contact-item">
						<em class="icon-adress iconfont"></em>
						<p class="contact-item-title">Company Location</p>
						<p class="contact-item-text">{pboot:companyaddress}</p>
					</div>

					<div class="contact-item">
						<em class="icon-tel iconfont"></em>
						<p class="contact-item-title">Company Telephone</p>
						<p class="contact-item-text"><a href="tel:{pboot:companyphone}">{pboot:companyphone}</a>Or<br />
						<a href="tel:{pboot:companymobile}">{pboot:companymobile}</a></p>
					</div>

					<div class="contact-item">
						<em class="icon-email iconfont"></em>
						<p class="contact-item-title">E-mail Address</p>
						<p class="contact-item-text"><a href="mailto:{pboot:companyemail}">{pboot:companyemail}</a></p>
					</div>
				</div>

				<div class="contact-box">
					<div class="contact-img">
						<script type="text/javascript" src="http://api.map.baidu.com/api?v=3.0&ak=U3T9fNEyhNGBuMrsb9FymGlDg2RsAhDF"></script>
						<style type="text/css">
							#allmap {width: 100%;height: 350px;margin-top:20px;overflow: hidden;font-family:"微软雅黑";}
							#allmap b{color: #CC5522;font-size: 14px; }
							#allmap img{max-width: none;}
						</style>
						<div id="allmap"></div>
						<script type="text/javascript">
						  var map = new BMap.Map("allmap");
						  map.centerAndZoom(new BMap.Point({label:zuobiao}), 18);
						  var marker1 = new BMap.Marker(new BMap.Point({label:zuobiao}));  // 创建标注
						  map.addOverlay(marker1);              // 将标注添加到地图中
						  //marker1.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画				
						  //创建信息窗口 
						  var infoWindow1 = new BMap.InfoWindow("<b>{pboot:companyname}</b><br>ADD:{pboot:companyaddress}<br>TEL:{pboot:companyphone}");
						  marker1.openInfoWindow(infoWindow1);
						  //marker1.addEventListener("click", function(){this.openInfoWindow(infoWindow1);});	
						  //向地图中添加缩放控件
						 var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
						 map.addControl(ctrl_nav);
						  //向地图中添加缩略图控件
							 var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});
							 map.addControl(ctrl_ove);
								  //向地图中添加比例尺控件
							 var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
							 map.addControl(ctrl_sca);
							 map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
							map.enableScrollWheelZoom();//启用地图滚轮放大缩小
							map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
							map.enableKeyboard();//启用键盘上下左右键移动地				
						</script>
					</div>
					<div class="contact-main">
						<div class="title">leave a message</div>

						<div id="feedbackForm">&nbsp;
							<div class="send-inquiry default">
								<form class="inquiry-form" action="{pboot:msgaction}"  method="post">
									<input type="text" placeholder="Your Name:" name="contacts">
									<input type="text" class="require" placeholder="E-mail:*" name="mail">
									<textarea cols="30" rows="10" class="require" placeholder="Content*" name="content"></textarea>

									<button class="send-btn hvr-icon-wobble-horizontal hvr-bounce-to-right-y">
										<div class="span" type="submit">Send</div>
										<div class="span"><i class="iconfont icon-angle-right hvr-icon" aria-hidden="true"></i></div>
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</article>
		</div>
	</section>
</main>
<!-- footer -->
<footer>
	<div class="l-wrap">
		<div class="foot-main">
			<div class="foot-info">
				<a href="{pboot:sitepath}/" class="foot-logo" title="{pboot:companyname}"><img class="lazy" data-src="{pboot:sitelogo}" loading="lazy" alt="{pboot:companyname}" /></a>
				<div class="foot-tel">Request Call: {pboot:companyphone}<br>E-mail: <a href="mailto:{pboot:companyemail}" target="_blank" id="A_1">{pboot:companyemail}</a></div>
				<div class="foot-share">
					<ul>
						<li><a href="https://www.facebook.com/" class="social-item fb" rel="nofollow" target="_blank" title="facebook"><i class="iconfont icon-facebook"></i></a></li>
						<li><a href="https://twitter.com/" class="social-item tw" rel="nofollow" target="_blank" title="twitter"><i class="iconfont icon-twitter"></i></a></li>
						<li><a href="https://www.linkedin.com/" class="social-item lk" rel="nofollow" target="_blank" title="linkedin"><i class="iconfont icon-linkedin"></i></a></li>
						<li><a href="https://www.instagram.com/" class="social-item ins" rel="nofollow" target="_blank" title="instagram"><i class="iconfont icon-instagram"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="foot-nav">
				<div class="foot-item foot-quick">
					<div class="foot-title">Quick Navigation</div>
					<ul class="foot-list">
						<li id="li_Menu101_MainHome"> <a href="{pboot:sitepath}/">Home</a></li>
						{pboot:nav num=10 parent=0}
							<li><a href="[nav:link]" class="inmenu">[nav:name]</a></li>
						{/pboot:nav}
					</ul>
				</div>
				<div class="foot-item foot-cate">
					<div class="foot-title">Categories</div>
					<ul class="foot-list">
						{pboot:nav num=10 parent=9}
						<li class="LiProCateOne" id="LiProCate[nav:id]"><a href="[nav:link]">[nav:name]</a></li>
						{/pboot:nav}
					</ul>
				</div>
				<div class="foot-item foot-code">
					<div class="foot-title">QR Code</div>
					<div class="foot-qrimg"><img src="{pboot:companyweixin}" width="180" height="180" loading="lazy" class="ErWeiImg" alt="QR Code"/></div>
				</div>
			</div>
		</div>
		
		<div class="copyright">
			<p>{pboot:sitecopyright}</p>
			<div class="gotop"><em class="iconfont icon-xiangshang"></em></div>
		</div>
	</div>
	
	<div class="rfixed">
		<div class="rfixed-sc"><span class="rfixed-scnum"></span><em class="iconfont icon-cart"></em></div>
		<p class="gotop"><em class="iconfont icon-arrow-t"></em></p>
	</div>
	
	<!-- mobile display -->
	<div class="bottom-btn">
		<div class="btn-item"><a href="https://api.whatsapp.com/send?l=en&phone={label:whatsapp}" id="M8" rel="nofollow" target="_blank" title="whatsapp"><em class="iconfont icon-whatsapp"></em><p>whatsapp</p></a></div>
		<div class="btn-item"><a href="skype:{label:skype}?chat" id="M7" rel="nofollow" target="_blank" title="skype"><em class="iconfont icon-skype"></em><p>skype</p></a></div>
		<div class="btn-item"><a href="mailto:{pboot:companyemail}" id="M9" rel="nofollow" title="Email"><em class="iconfont icon-email"></em><p>Email</p></a></div>
		<div class="btn-item inquiry">{pboot:sort scode=11}<a href="[sort:link]" title="Inquiry"><em class="iconfont icon-message"></em><p>Inquiry</p></a>{/pboot:sort}</div>
		<div class="btn-item mobile-bottom-bag"><div><em class="iconfont icon-cart"></em>Bag</div><span class="rfixed-scnum">0</span></div>
	</div>
</footer>
<!-- script --> 


<div id='wmkc'>
	<ul class='wmkc-list'>
		<li class='wmkc-whatsapp'><a href='https://web.whatsapp.com/send?l=en&phone={label:whatsapp}' target='_blank' title='Mike:{pboot:companymobile}' id='F8'><i class='wmkc-icon'></i><p>{label:whatsapp}</p></a></li>
		<li class='wmkc-skype'><a href='https://join.skype.com/{label:skype}' target='_blank' title='skype' id='F7'><i class='wmkc-icon'></i><p>{label:skype}</p></a></li>
		<li class='wmkc-email'><a href='mailto:{pboot:companyemail}' target='_blank' title='mailto:{pboot:companyemail}' id='F9'><i class='wmkc-icon'></i><p>E-Mail</p></a></li>
		<li class='wmkc-wechat'><a href='javascript:;' title='WeChat:{pboot:companymobile}'><i class='wmkc-icon'></i><p>WeChat</p></a><div class='wmkc-wechat-img'><img src='{pboot:companyweixin}' width='100' height='100' alt='WeChat:{pboot:companymobile}'><p><em></em>WeChat: {pboot:companymobile}</p></div></li>
	</ul>
</div>
<script src="{pboot:sitetplpath}/js/jquery-3.6.0.js"></script>
<script src="{pboot:sitetplpath}/js/sitescript.js"></script>
<script src="{pboot:sitetplpath}/js/swiper.js"></script>
<script src="{pboot:sitetplpath}/js/style.js"></script>
<script src="{pboot:sitetplpath}/js/home.js"></script>
<script src="{pboot:sitetplpath}/js/count.js"></script>
</body>
</html><?php return array (
  0 => '/data/user/htdocs/skin/en/html/head.html',
  1 => '/data/user/htdocs/skin/en/html/foot.html',
); ?>