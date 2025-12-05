<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>{pboot:sitetitle}</title>
<meta name="Keywords" content="{pboot:sitekeywords}" />
<meta name="Description" content="{pboot:sitedescription}" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5, viewport-fit=cover" />
<meta name="format-detection" content="telephone=no" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link href="{pboot:sitetplpath}/css/en011.css" rel="stylesheet" />
<link href="{pboot:sitetplpath}/css/style.css" rel="stylesheet" type="text/css" />
<link href="{pboot:sitetplpath}/css/home.css" rel="stylesheet" type="text/css" />
<link href="{pboot:sitetplpath}/css/swiper.css" rel="stylesheet" type="text/css" />
<link href="{pboot:sitetplpath}/css/aos.css" rel="stylesheet" type="text/css" media="(min-width:1025px)" />

</head>
<body class="index">
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
	<section class="home-banner">
		<div class="swiper" id="indexbanner">
			<div class="swiper-wrapper">
				{pboot:slide gid=1}
				<div class="swiper-slide">
					<a href="[slide:link]" class="pcimg" title="[slide:title]"><img src="[slide:src]" width="1920" height="750" alt="[slide:title]" /></a>
					<a href="[slide:link]" class="mobimg" title="[slide:title]"><img src="[slide:src]" width="750" height="293" alt="[slide:title]" /></a>
					<div class="banner-animote">
						<div class="title">[slide:title]</div>
						<div class="text">[slide:subtitle]</div>
					</div>
				</div>
				{/pboot:slide}
			</div>
			<div class="swiper-pagination"></div>
			<div class="banner-button-next"><em class="iconfont icon-xiangyoujiantou"></em></div>
			<div class="banner-button-prev"><em class="iconfont icon-xiangzuojiantou"></em></div>
		</div>
	</section>

	<section class="home-choose">
		<div class="l-wrap">
			<div data-aos="zoom-in">
				<div class="home-des">Cutting-edge technology to the highest quality</div>
				<h4 class="home-title">Why customers choose us</h4>
			</div>
			<div class="choose-ul" data-aos="zoom-in">
				{pboot:list scode=30 num=4 order=sorting}
				<div class="choose-item">
					<div class="title">[list:title]</div>
					<div class="icon"><em class="iconfont icon-[list:subtitle]"></em></div>
					<div class="info">[list:content drophtml=1 len=350]</div>
				</div>
				{/pboot:list}
			</div>
		</div>
	</section>
	
	<section class="home-about">
		<div class="l-wrap">
			<div class="about-wrap">
				<div class="about-img" data-aos="fade-up">
					{pboot:content id=1}<img class="lazy" data-src="[content:ico]" width="700" height="500" alt="about">{/pboot:content}
					<div class="about-icon">
					  <img src="{pboot:sitetplpath}/images/about-icon.png" alt="about">
					  <span>1500m <sup>2</sup>+</span>
					  <p>Cover Area</p>
					</div>
				</div>
				<div class="about-info" data-aos="fade-down">
					<h1 class="home-title">{pboot:companyname}</h1>
					<div class="about-content">
						<p>{pboot:content id=1}[content:content drophtml=1 len=350]{/pboot:content}</p>
						<p class="color"><span>20 +</span> Employees</p>
					</div>
					{pboot:sort scode=1}<a class="home-more" href="[sort:link]">View more</a>{/pboot:sort}
				</div>
			</div>
			<div class="about-contact">
				<p>Looking for properate products?</p>
				{pboot:sort scode=11}<a href="[sort:link]" class="home-more">Contact us</a>{/pboot:sort}
			</div>
		</div>
	</section>

	<section class="home-project">
		<div data-aos="zoom-in">
			<div class="home-des">Group private customization project</div>
			<h4 class="home-title">Successful Projects</h4>
		</div>
		<div class="swiper swiper-no-swiping" id="homeproject" data-aos="fade-up">
			<div class="swiper-wrapper">
				{pboot:list scode=18 num=6 order=sorting}
				<div class="swiper-slide">
					<a href="[list:link]" class="lazy-wrap" title="[list:title]">
						<img data-src="[list:ico]" width="300" height="300" class="lazy" alt="[list:title]">
						<span class="lazy-load"></span>
					</a>
				</div>
				{/pboot:list}
			</div>
			<div class="project-button-next"><em class="iconfont icon-jiantou_xiangyou"></em></div>
			<div class="project-button-prev"><em class="iconfont icon-jiantou_xiangzuo"></em></div>
		</div>
	</section>
	
	<section class="home-product">
		<div class="l-wrap"> 
			<div data-aos="zoom-in">
				<div class="home-des">Best Selling Products</div>
				<h4 class="home-title">Hot Products</h4>
			</div>
			<div class="index-pro" data-aos="zoom-in">
				{pboot:list scode=9 num=8 order=sorting}
				<div class="pro-item">
					<div class="pro-img">
						<a href="[list:link]" class="lazy-wrap" title="[list:title]">
							<img data-src="[list:ico]" data-sizes="369x0 768w,248x0 1024w,312x0 1280w,334x0 1366w,352x0 1440w,392x0 1600w" width="400" height="400" class="lazy" alt="[list:title]" />
							<span class="lazy-load"></span>
						</a>
					</div>
					<div class="pro-info">
						<p class="pro-title"><a href="[list:link]" class="line2">[list:title]</a></p>
						<a class="pro-btn" href="[list:link]" title="More">view more <em>>></em></a>
					</div>
				</div>
				{/pboot:list}
			</div>
		</div>
	</section>
	
	<section class="home-activity" style="background-image:url({pboot:sitetplpath}/images/activity-bg.png);">
		<div class="l-wrap">
			<div class="activity-wrap" data-aos="fade-up">
				<div class="text">Favourable activity</div>
				<div class="title">Big discounts on new <br>winter products</div>
				<div class="content">
					<p>Brighten 12.3 is one of the Naturehike cotton series tents, it is perfect for glamping with family or friends, or you can choose to set it up in one of the city parks or your home patio, then you must be the coolest person in the eyes of passers-by. Join us as a leader of glamping!</p>
				</div>
				<div class="img">
					<div class="lazy-wrap"><img data-src="{pboot:sitetplpath}/images/activity-2.png" class="lazy" alt="Favourable activity"></div>
					<div class="lazy-wrap"><img data-src="{pboot:sitetplpath}/images/activity-1.png" class="lazy" alt="Favourable activity"></div>
				</div>
				{pboot:sort scode=18}<a href="[sort:link]" class="home-more" title="products">More Project</a>{/pboot:sort}
			</div>
		</div>
	</section>
	
	<section class="home-news" style="display: none;">
		<div class="l-wrap"> 
			<div data-aos="zoom-in">
				<div class="home-des">What's Going on in Our Blog?</div>
				<h4 class="home-title">Latest News</h4>
			</div>
			<div class="news-list" data-aos="fade-up">
				{pboot:list scode=2 num=4 order=sorting}
				<div class="news-item">
					<div class="news-img">
						<a href="[list:link]" class="lazy-wrap" title="[list:title len=20]">
							<img class="lazy" data-src="[list:ico]" data-sizes="354x0 768w,238x0 1024w,300x0 1280w,293x0 1366w,310x0 1440w,361x0 1600w" width="345" height="215" alt="[list:title len=20]" />
							<span class="lazy-load"></span>
						</a>
						<div class="news-date">[list:date style=M-d], [list:date style=Y]</div>
					</div>
					<div class="news-info">
						<div class="news-title line2"><a href="[list:link]" title="[list:title len=20]">[list:title len=24]</a></div>
						<div class="news-text line3">[list:description len=150]</div>
						<a href="[list:link]" class="news-btn" title="[list:title len=20]" rel="nofollow">Details</a>
					</div>
				</div>
				{/pboot:list}
			</div>
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