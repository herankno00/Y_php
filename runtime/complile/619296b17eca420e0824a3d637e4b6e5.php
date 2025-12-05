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
    <img src="{sort:pic}" width="1919" height="350" class="innerbanners" alt="{sort:name}" />
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
			<div class="team-member">
				{pboot:sort scode=23}
				<div>
					<div class="home-des">[sort:name]</div>
					<div class="home-title">[sort:subname]</div>
				</div>
				{/pboot:sort}

				<div class="team-member-list">
					{pboot:list num=10 order=sorting}
					<div class="team-member-item">
						<img loading="lazy" alt="[list:title]" title="[list:title]" src="[list:ico]" />
						<div class="info">
							<p>[list:title]</p>
						</div>
					</div>
					{/pboot:list}
				</div>
			</div>

			<div class="team-number" style="display: none;">
				<div class="team-number-item">
					<p>7986</p>
					<p>HAPPY CLIENT</p>
				</div>
				<div class="team-number-item">
					<p>5685</p>
					<p>manufacturing worker</p>
				</div>
				<div class="team-number-item">
					<p>287</p>
					<p>researcher</p>
				</div>
				<div class="team-number-item">
					<p>497</p>
					<p>Master and PHD</p>
				</div>
			</div>

			<div class="team-took" style="display: none;">
				<div style="background-image:url({pboot:sitetplpath}/images/team-took-bg.png)" class="bg">&nbsp;</div>
				{pboot:sort scode=34}
				<div>
					<div class="home-des">[sort:name]</div>
					<div class="home-title">[sort:subname]</div>
				</div>
				{/pboot:sort}

				<div id="teamTookSwiper" class="mySwiper swiper">
					<div class="swiper-wrapper">
						{pboot:list scode=34 num=6 order=sorting}
						<div class="swiper-slide">
							<img alt="[list:title]" loading="lazy" src="[list:ico]" />
							<div class="name">[list:title]</div>
						</div>
						{/pboot:list}
					</div>
					<div class="swiper-pagination took-pagination">&nbsp;</div>
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
<!-- script -->
<script src="{pboot:sitetplpath}/js/jquery-3.6.0.js"></script>
<script src="{pboot:sitetplpath}/js/sitescript.js"></script>
<script src="{pboot:sitetplpath}/js/swiper.js"></script>
<script src="{pboot:sitetplpath}/js/style.js"></script>
<script src="{pboot:sitetplpath}/js/page.js"></script>
</body>
</html>


<?php return array (
  0 => '/data/user/htdocs/skin/en/html/head.html',
  1 => '/data/user/htdocs/skin/en/html/foot.html',
); ?>