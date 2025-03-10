<!DOCTYPE html>
<html data-wf-domain="https://ynab.test" data-wf-page="640f69143ec11b6bdb2015c7" data-wf-site="640f69143ec11b21d42015c6"
	lang="en" class="w-mod-js w-mod-ix wf-inconsolata-n4-active wf-inconsolata-n7-active wf-active">

<head>
	<style>
		.wf-force-outline-none[tabindex="-1"]:focus {
			outline: none;
		}
	</style>
	<meta charset="utf-8">
	<title>YNAB</title>
	<meta content="Working hard with nothing to show for it? Use your money more efficiently and control your spending and saving with the YNAB app." name="description">
	<meta content="YNAB" property="og:title">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	
	<link href="{{ asset('images/front/brand/TreeLogoBlurple.png') }}" rel="shortcut icon" type="image/x-icon">
	<link rel="stylesheet" href="{{ asset('css/front/home.css') }}">
	{{--	 Fonts --}}
	<link href="https://fonts.googleapis.com" rel="preconnect">
	<link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata:400,700" media="all">
	
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
	<script type="text/javascript">WebFont.load({google: {families: ["Inconsolata:400,700"]}});</script>
	<script
		type="text/javascript">!function (o, c) {
			var n = c.documentElement, t = " w-mod-";
			n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
		}(window, document);</script>

</head>

<body data-track-page-view="true" data-track-page-name="Home" class="body">
<div class="page-wrapper">
	<div>
		<div class="design-system--global-styles w-embed">
		</div>
		<div data-au-modal-trigger-class-value="js-au-modal-trigger,.design-system--js-au-modal-trigger"
			data-controller="au-modal" data-au-modal-hide-class-value="design-system--hide"
			class="design-system--au_modal_mask design-system--hide">
			<div class="design-system--hide"></div>
			<div class="design-system--au_modal_content"><img loading="lazy"
					src="/images/front/brand/TreeLogoBlurple.png"
					alt="YNAB tree logo" class="design-system--hide"><img loading="lazy"
					src="/images/shared/brand/flag.png"
					alt="Australian flag" class="design-system--au_modal-flag">
				<div>It looks like you're located in Australia.<br>We have an Australian version of our website.<br><br>Please
					confirm your location and we’ll send you to the appropriate site!
				</div>
				<div class="design-system--button-group">
					<div class="design-system--button-wrapper"><a data-au-modal-target="yesButton" href="#"
							class="design-system--button-primary w-button"
							data-action=" click->au-modal#confirmInAustralia:prevent">I'm in Australia</a></div>
					<div class="design-system--button-wrapper"><a data-au-modal-target="noButton" href="#"
							class="design-system--button-secondary w-button"
							data-action=" click->au-modal#confirmNotInAustralia:prevent">No, I'm not in Australia</a></div>
				</div>
			</div>
		</div>
	</div>
	<nav class="section_navbar">
		<div class="padding-global">
			<div class="container-large">
				<div data-w-id="c27afad4-372d-7bd1-46bd-44bb24cf757a" data-animation="default" data-collapse="medium"
					data-duration="300" data-easing="ease" data-easing2="ease" role="banner" class="navbar w-nav">
					<div class="margin-vertical margin-xsmall margin-nav">
						<div class="navbar_wrapper">
							<div class="navbar_left"><a href="/" aria-current="page" class="navbar_brand w-nav-brand w--current"
									aria-label="home"><img
										src="/images/shared/brand/Logotype-Buttermilk.svg"
										loading="lazy" alt="It's pronounced Why-NAB" class="navbar-brand-image">
									<div class="navbar-brand-tooltip-container">
										<div class="navbar-brand-tooltip">
											<div class="navbar-brand-tooltip-text">It's pronounced ”why-nab”</div>
										</div>
									</div>
								</a>
								<ul role="list" class="nav_list w-list-unstyled">
									<li class="nav_list-item hide-tablet">
										<div data-hover="false" data-delay="0" class="nav_dropdown w-dropdown">
											<div class="nav_dropdown-toggle w-dropdown-toggle" id="w-dropdown-toggle-0"
												aria-controls="w-dropdown-list-0" aria-haspopup="menu" aria-expanded="false" role="button"
												tabindex="0">
												<div class="nav_dropdown-label">What is YNAB?</div>
												<div class="icon-1x1-small w-embed">
													<svg viewBox="0 0 17 11" fill="currentColor"
														xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd"
															d="M7.93181 7.66557V7.66557C7.62746 7.9862 7.13373 7.98652 6.82902 7.66627C6.82879 7.66604 6.82857 7.6658 6.82835 7.66557L0.975827 1.50411V1.50411C0.666959 1.18775 0.660297 0.667826 0.960945 0.342822C1.26159 0.0178169 1.75571 0.0108066 2.06457 0.327163C2.06953 0.332238 2.07442 0.337382 2.07924 0.342594L7.38004 5.92313L12.6808 0.342594V0.342594C12.9813 0.0173491 13.4754 0.00997042 13.7845 0.326113C14.0936 0.642257 14.1006 1.16221 13.8002 1.48745C13.795 1.49308 13.7897 1.49864 13.7843 1.50411L7.93181 7.66557Z"
															fill="currentColor"></path>
													</svg>
												</div>
											</div>
											<nav class="nav_dropdown-list w-dropdown-list" id="w-dropdown-list-0"
												aria-labelledby="w-dropdown-toggle-0">
												<div class="nav_dropdown-shadow elevation-four hide-tablet"></div>
												<a href="/features"
													class="nav_dropdown-link w-dropdown-link" tabindex="0">The App</a><a href="/ynab-method"
													class="nav_dropdown-link w-dropdown-link" tabindex="0">The Method</a><a
													href="/why-ynab-is-different" class="nav_dropdown-link w-dropdown-link" tabindex="0">Why
													YNAB&nbsp;Is Different</a><a href="/our-free-34-day-trial"
													class="nav_dropdown-link w-dropdown-link" tabindex="0">Our 34-Day Trial</a><a
													href="/guide/the-ultimate-get-started-guide"
													class="nav_dropdown-link is-last-item w-dropdown-link" tabindex="0">The Ultimate Get Started
													Guide</a>
											</nav>
										</div>
									</li>
									<li class="nav_list-item hide-tablet">
										<div data-hover="false" data-delay="0" class="nav_dropdown w-dropdown">
											<div class="nav_dropdown-toggle w-dropdown-toggle" id="w-dropdown-toggle-1"
												aria-controls="w-dropdown-list-1" aria-haspopup="menu" aria-expanded="false" role="button"
												tabindex="0">
												<div class="nav_dropdown-label">Learn</div>
												<div class="icon-1x1-small w-embed">
													<svg viewBox="0 0 17 11" fill="currentColor"
														xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd"
															d="M7.93181 7.66557V7.66557C7.62746 7.9862 7.13373 7.98652 6.82902 7.66627C6.82879 7.66604 6.82857 7.6658 6.82835 7.66557L0.975827 1.50411V1.50411C0.666959 1.18775 0.660297 0.667826 0.960945 0.342822C1.26159 0.0178169 1.75571 0.0108066 2.06457 0.327163C2.06953 0.332238 2.07442 0.337382 2.07924 0.342594L7.38004 5.92313L12.6808 0.342594V0.342594C12.9813 0.0173491 13.4754 0.00997042 13.7845 0.326113C14.0936 0.642257 14.1006 1.16221 13.8002 1.48745C13.795 1.49308 13.7897 1.49864 13.7843 1.50411L7.93181 7.66557Z"
															fill="currentColor"></path>
													</svg>
												</div>
											</div>
											<nav class="nav_dropdown-list w-dropdown-list" id="w-dropdown-list-1"
												aria-labelledby="w-dropdown-toggle-1">
												<div class="nav_dropdown-shadow elevation-four hide-tablet"></div>
												<a href="/free-workshops"
													class="nav_dropdown-link w-dropdown-link" tabindex="0">Free Workshops</a><a href="/blog"
													class="nav_dropdown-link w-dropdown-link" tabindex="0">Blog</a><a href="/guides"
													class="nav_dropdown-link w-dropdown-link" tabindex="0">Guides</a><a href="/help-center"
													class="nav_dropdown-link w-dropdown-link" tabindex="0">Help Center</a>
											</nav>
										</div>
									</li>
									<li class="nav_list-item hide-tablet">
										<div data-hover="false" data-delay="0" class="nav_dropdown w-dropdown">
											<div class="nav_dropdown-toggle w-dropdown-toggle" id="w-dropdown-toggle-2"
												aria-controls="w-dropdown-list-2" aria-haspopup="menu" aria-expanded="false" role="button"
												tabindex="0">
												<div class="nav_dropdown-label">Share YNAB</div>
												<div class="icon-1x1-small w-embed">
													<svg viewBox="0 0 17 11" fill="currentColor"
														xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd"
															d="M7.93181 7.66557V7.66557C7.62746 7.9862 7.13373 7.98652 6.82902 7.66627C6.82879 7.66604 6.82857 7.6658 6.82835 7.66557L0.975827 1.50411V1.50411C0.666959 1.18775 0.660297 0.667826 0.960945 0.342822C1.26159 0.0178169 1.75571 0.0108066 2.06457 0.327163C2.06953 0.332238 2.07442 0.337382 2.07924 0.342594L7.38004 5.92313L12.6808 0.342594V0.342594C12.9813 0.0173491 13.4754 0.00997042 13.7845 0.326113C14.0936 0.642257 14.1006 1.16221 13.8002 1.48745C13.795 1.49308 13.7897 1.49864 13.7843 1.50411L7.93181 7.66557Z"
															fill="currentColor"></path>
													</svg>
												</div>
											</div>
											<nav class="nav_dropdown-list w-dropdown-list" id="w-dropdown-list-2"
												aria-labelledby="w-dropdown-toggle-2">
												<div class="nav_dropdown-shadow elevation-four hide-tablet"></div>
												<a href="/referral-program"
													class="nav_dropdown-link w-dropdown-link" tabindex="0">Refer A Friend</a><a
													href="/give-ynab" class="nav_dropdown-link w-dropdown-link" tabindex="0">Gift a YNAB
													Subscription</a><a href="/wellness/share" class="nav_dropdown-link w-dropdown-link"
													tabindex="0">Refer Your Employer</a><a href="/affiliate-program"
													class="nav_dropdown-link w-dropdown-link" tabindex="0">Affiliate Program</a>
											</nav>
										</div>
									</li>
									<li class="nav_list-item hide-tablet"><a href="/" onclick="return false;" class="nav_link">Pricing</a></li>
									<li class="nav_list-item hide-tablet is-wellness"><a href="/" onclick="return false;" class="nav_link">For
											Employers</a></li>
								</ul>
							</div>
							<div class="navbar_right">
								<nav role="navigation" class="nav_list-wrapper w-nav-menu">
									<div class="nav_list-scroll-container">
										<div class="nav_list-scroll-wrap">
											<ul role="list" class="nav_list w-list-unstyled">
												<li class="nav_list-item hide-tablet"><a href="{{ route('users.login') }}"
														class="nav_link is-login js-login">Log In</a></li>
												<li data-controller="referral-content" class="nav_list-item is-cta hide-tablet"><a
														data-referral-content-target="defaultContent" data-controller="signup-button"
														data-signup-button-is-category-wizard-active-value="false" href="{{ route('users.register') }}"
														class="button-primary-dark is-green js-signup is-nav w-button"
														data-action=" click->signup-button#beginSignup">Start Your Free Trial</a>
												</li>
												<li class="nav_list-item-mobile-highlight">
													<div class="nav_list-item-mobile-highlight-container"><a href="/ynab-method"
															class="nav_link_highlight w-inline-block"><img
																src="https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/6706d2a70c6755ef7adea2ed_open_book_firefly.svg"
																loading="lazy" alt="" class="nav_link_highlight_image">
															<div class="nav_link_highlight_text">The Method</div>
														</a><a href="/features" class="nav_link_highlight w-inline-block"><img
																src="https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/6706d2a799240c3f3cf186cc_Cellphone_firefly.svg"
																loading="lazy" alt="" class="nav_link_highlight_image">
															<div class="nav_link_highlight_text">The App</div>
														</a><a href="/pricing" class="nav_link_highlight w-inline-block"><img
																src="https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/6706c8ac7c819ed21dd5c1f3_dollar_firefly.svg"
																loading="lazy" alt="" class="nav_link_highlight_image">
															<div class="nav_link_highlight_text">Pricing</div>
														</a></div>
												</li>
												<li class="nav_list-item-mobile">
													<div data-delay="5" data-hover="true" class="nav_dropdown-mobile w-dropdown">
														<div class="nav_dropdown-toggle w-dropdown-toggle" id="w-dropdown-toggle-3"
															aria-controls="w-dropdown-list-3" aria-haspopup="menu" aria-expanded="false"
															role="button" tabindex="0">
															<div class="nav_dropdown-label is-mobile">What is YNAB?</div>
														</div>
														<nav class="nav_dropdown-list-mobile w-dropdown-list" id="w-dropdown-list-3"
															aria-labelledby="w-dropdown-toggle-3"><a href="/features"
																class="nav_dropdown-link is-mobile w-dropdown-link" tabindex="0">The App</a><a
																href="/ynab-method" class="nav_dropdown-link is-mobile dropdown-link w-dropdown-link"
																tabindex="0">The Method</a><a href="/why-ynab-is-different"
																class="nav_dropdown-link is-mobile w-dropdown-link" tabindex="0">Why YNAB&nbsp;Is
																Different</a><a href="/our-free-34-day-trial"
																class="nav_dropdown-link is-mobile w-dropdown-link" tabindex="0">Our 34-Day
																Trial</a><a href="/guide/the-ultimate-get-started-guide"
																class="nav_dropdown-link is-mobile w-dropdown-link" tabindex="0">The Ultimate Get
																Started Guide</a></nav>
													</div>
												</li>
												<li class="nav_list-item-mobile">
													<div data-delay="5" data-hover="false" class="nav_dropdown-mobile w-dropdown">
														<div class="nav_dropdown-toggle w-dropdown-toggle" id="w-dropdown-toggle-4"
															aria-controls="w-dropdown-list-4" aria-haspopup="menu" aria-expanded="false"
															role="button" tabindex="0">
															<div class="nav_dropdown-label is-mobile">Learn</div>
														</div>
														<nav class="nav_dropdown-list-mobile w-dropdown-list" id="w-dropdown-list-4"
															aria-labelledby="w-dropdown-toggle-4"><a href="/free-workshops"
																class="nav_dropdown-link is-mobile w-dropdown-link" tabindex="0">Free Workshops</a><a
																href="/blog" class="nav_dropdown-link is-mobile w-dropdown-link"
																tabindex="0">Blog</a><a href="/guides"
																class="nav_dropdown-link is-mobile w-dropdown-link" tabindex="0">Guides</a><a
																href="/help-center" class="nav_dropdown-link is-mobile w-dropdown-link"
																tabindex="0">Help Center</a></nav>
													</div>
												</li>
												<li class="nav_list-item-mobile">
													<div data-delay="5" data-hover="false" class="nav_dropdown-mobile w-dropdown">
														<div class="nav_dropdown-toggle w-dropdown-toggle" id="w-dropdown-toggle-5"
															aria-controls="w-dropdown-list-5" aria-haspopup="menu" aria-expanded="false"
															role="button" tabindex="0">
															<div class="nav_dropdown-label is-mobile">Share YNAB</div>
														</div>
														<nav class="nav_dropdown-list-mobile w-dropdown-list" id="w-dropdown-list-5"
															aria-labelledby="w-dropdown-toggle-5"><a href="/referral-program"
																class="nav_dropdown-link is-mobile w-dropdown-link" tabindex="0">Refer a Friend</a><a
																href="/give-ynab" class="nav_dropdown-link is-mobile w-dropdown-link"
																tabindex="0">Gift a YNAB Subscription</a><a href="/wellness/share"
																class="nav_dropdown-link is-mobile w-dropdown-link" tabindex="0">Refer Your
																Employer</a><a href="/affiliate-program"
																class="nav_dropdown-link is-mobile w-dropdown-link" tabindex="0">Affiliate Program</a>
														</nav>
													</div>
												</li>
												<li class="nav_list-item-mobile is-login hide-mobile-landscape"><a
														href="https://app.ynab.com/users/sign_in" class="nav_link-login js-login">Log In</a>
													<div class="button-icon-video w-embed">
														<svg aria-hidden="true" fill="currentColor"
															role="img" viewBox="0 0 20 21" xmlns="http://www.w3.org/2000/svg">
															<title>Arrow Right</title>
															<polygon
																points="16.172 9 10.101 2.929 11.515 1.515 20 10 19.293 10.707 11.515 18.485 10.101 17.071 16.172 11 0 11 0 9">
															</polygon>
														</svg>
													</div>
												</li>
											</ul>
										</div>
										<div data-controller="referral-content" fs-scrolldisable-element="when-visible"
											class="nav_list-sticky">
											<div data-referral-content-target="defaultContent"><a data-controller="signup-button"
													href="/sign-up" class="button-primary-dark is-green js-signup w-button"
													data-action=" click->signup-button#beginSignup">Start Your Free Trial</a></div>
											<div data-referral-content-target="referralContent" class="hide"><a
													data-controller="signup-button" href="/sign-up"
													class="button-primary-dark is-green js-signup w-button"
													data-action=" click->signup-button#beginSignup">Accept Your Invite</a></div>
										</div>
									</div>
								</nav>
							</div>
							<div class="menu_button w-nav-button" style="-webkit-user-select: text;" aria-label="menu" role="button"
								tabindex="0" aria-controls="w-nav-overlay-0" aria-haspopup="menu" aria-expanded="false">
								<div class="menu-bar-1"></div>
								<div class="menu-bar-2"></div>
								<div class="menu-bar-3"></div>
							</div>
						</div>
					</div>
					<div class="w-nav-overlay" data-wf-ignore="" id="w-nav-overlay-0"></div>
				</div>
			</div>
		</div>
	</nav>
	<main class="main-wrapper">
		<section class="home_hero-section background-color-blurple">
			<div class="padding-global is-hero">
				<div class="container-large">
					<div class="home_hero-padding">
						<div class="home_hero-split">
							<div class="home_hero-left">
								<div class="home_hero-copy">
									<h1>How will you spend your <span class="text-span-3">money</span> life?</h1>
									<p class="hero_subhead">Create a friendly, flexible plan and spend it well with YNAB.</p>
								
								</div>
							</div>
							<div class="home_hero-right">
								<div class="floating-hero-wrapper"><img
										src="https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/672188c512264aa81f920114_flying_money_narrow_firefly_hero.svg"
										loading="eager" alt="" class="hero-dollars"><img class="floating-hero"
										src="https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/6502e96f8b7ff92feac8c8ab_hero-phone.png"
										alt="An illustrated version of the YNAB app on a mobile device"
										style="transform: translate3d(0px, -1.3812px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg); transform-style: preserve-3d; will-change: transform;"
										sizes="(max-width: 479px) 90vw, (max-width: 767px) 70vw, (max-width: 991px) 68vw, (max-width: 1439px) 44vw, 640px"
										data-w-id="dc59ae38-0e3f-b73b-ddac-58f49ab4a50f" loading="eager"
										srcset="https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/6502e96f8b7ff92feac8c8ab_hero-phone-p-500.png 500w, https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/6502e96f8b7ff92feac8c8ab_hero-phone-p-800.png 800w, https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/6502e96f8b7ff92feac8c8ab_hero-phone.png 1538w">
									<div data-w-id="dc59ae38-0e3f-b73b-ddac-58f49ab4a510"
										style="opacity: 0.161257; transform: translate3d(0px, 0px, 0px) scale3d(0.972376, 0.972376, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg); transform-style: preserve-3d; will-change: transform, opacity;"
										class="floating-shadow"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="background-color-buttermilk">
			<div>
				<div class="padding-section-small">
					<div class="container-large">
						<div class="featured-quote-wrapper is-home">
							<div class="featured-quote-heading is-home"><span class="text-style-highlight-blurple">“YNAB isn’t just
                    a tool for money management. It’s a tool for self-actualization. Who do you want to be, and how can
                    the money you earn help you get there?”</span></div>
							<div class="testimonial-featured_attribution is-home">
								<div class="testimonial-featured_name text-size-small">Adrienne So,</div>
								<div class="card-testimonial_name-detail text-size-small">Senior Associate Reviews Editor for
									<em>WIRED</em></div>
							</div>
						</div>
						<div class="div-block-42">
							<div class="w-layout-grid socialproof_grid">
								<div class="laurel_wrapper"><img
										sizes="(max-width: 479px) 67vw, (max-width: 1279px) 80px, (max-width: 1439px) 6vw, 80px"
										srcset="https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/66da1cea0a8e8f19b28c756b_real-simple-logo_alpha-p-500.png 500w, https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/66da1cea0a8e8f19b28c756b_real-simple-logo_alpha.png 863w"
										alt="" loading="lazy"
										src="https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/66da1cea0a8e8f19b28c756b_real-simple-logo_alpha.png"
										class="realsimple-logo no-corner-radius">
									<div class="socialproof_text is-large">Best Budgeting App</div>
									<div class="socialproof_text">2024</div>
								</div>
								<div class="socialproof_wrapper"><img
										src="https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/662abf67548b4eebcfb03e0d_Trustpilot_brandmark.svg"
										loading="lazy" alt="" class="trustpilot_logo"><img
										src="https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/662abf67f92e5dc8fa6b80e0_Trustpilot_stars.svg"
										loading="lazy" alt="" class="socialproof_stars">
									<div class="socialproof_text-wrapper">
										<div class="socialproof_text">TrustScore 4.7</div>
										<div class="socialproof_text">2,200 Reviews</div>
									</div>
								</div>
								<div class="laurel_wrapper"><img
										src="https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/662ac2560981d8b13499996b_Apple%20logo.svg"
										loading="lazy" alt="" class="apple-logo no-corner-radius">
									<div class="socialproof_text is-large">App of the Day</div>
									<div class="socialproof_text">January 2025</div>
								</div>
								<div class="socialproof_wrapper">
									<div class="socialproof_text is-large">App Reviews</div>
									<img
										src="https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/662ac1403f633d35dad9723b_app-reviews_stars.svg"
										loading="lazy" alt="" class="socialproof_stars">
									<div class="socialproof_text-wrapper">
										<div class="socialproof_text">4.6 Average</div>
										<div class="socialproof_text">74K Reviews</div>
									</div>
								</div>
								<div class="laurel_wrapper"><img
										sizes="(max-width: 991px) 24px, (max-width: 1439px) 2vw, (max-width: 1919px) 24px, 1vw"
										srcset="https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/66da1cf99ff9cb8e115e1e23_CNBC_opacity-p-500.png 500w, https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/66da1cf99ff9cb8e115e1e23_CNBC_opacity-p-800.png 800w, https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/66da1cf99ff9cb8e115e1e23_CNBC_opacity-p-1080.png 1080w, https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/66da1cf99ff9cb8e115e1e23_CNBC_opacity-p-1600.png 1600w, https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/66da1cf99ff9cb8e115e1e23_CNBC_opacity.png 1666w"
										alt="" loading="lazy"
										src="https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/66da1cf99ff9cb8e115e1e23_CNBC_opacity.png"
										class="cnbc-logo no-corner-radius">
									<div class="socialproof_text is-large">World's Top 250 Fintechs</div>
									<div class="socialproof_text">2024</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="design-system--footer_universal-cta_section design-system--background-color-blurple">
			<div class="design-system--padding-global">
				<div class="design-system--container-large">
					<div class="design-system--layout_2column_wrapper">
						<div class="design-system--layout_2column_column1-50">
							<div class="design-system--ratio-box-1x1">
								<div class="design-system--ratio-box-content"><img loading="lazy"
										src="https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/6754de565af65477ffcabd04_img_app_blob_firefly_realsimple%20(1).avif"
										alt="A phone with the YNAB app coming out of a squiggly shaped-portal surrounded by sparks and bubbles"
										sizes="(max-width: 767px) 90vw, (max-width: 991px) 44vw, (max-width: 1279px) 42vw, (max-width: 1439px) 43vw, 620px"
										srcset="https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/6754de565af65477ffcabd04_img_app_blob_firefly_realsimple%20(1)-p-500.avif 500w, https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/6754de565af65477ffcabd04_img_app_blob_firefly_realsimple%20(1)-p-800.avif 800w, https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/6754de565af65477ffcabd04_img_app_blob_firefly_realsimple%20(1)-p-1080.avif 1080w, https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/6754de565af65477ffcabd04_img_app_blob_firefly_realsimple%20(1)-p-1600.avif 1600w, https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/6754de565af65477ffcabd04_img_app_blob_firefly_realsimple%20(1)-p-2000.avif 2000w, https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/6754de565af65477ffcabd04_img_app_blob_firefly_realsimple%20(1)-p-2600.avif 2600w, https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/6754de565af65477ffcabd04_img_app_blob_firefly_realsimple%20(1).avif 4640w">
								</div>
							</div>
						</div>
						<div class="design-system--layout_2column_column2-50">
							<h2>Your money is your life. Spend it well with YNAB.</h2>
							<p>You put so much effort into making money, shouldn’t you invest the same time, attention, and care
								into spending it? Make your money more meaningful through intentional spending.</p>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
	<div class="background-color-blurple">
		<!--footer-->
		<section class="footer">
			<div class="footer_wave"></div>
			<div class="footer_background background-color-midnight">
				<div class="padding-global">
					<div class="footer_wrapper container-large">
						<div class="w-layout-grid footer_content">
							<div id="w-node-_4c86a1b8-cf44-390f-d9bc-000aad16a581-ad16a579" class="footer_block">
								<form action="/search" class="text-field_search is-footer w-form"><input class="text-field is-icon is-search w-input" maxlength="256" name="query"
										placeholder="Search…" type="search" id="search" required=""><input type="submit" class="button_search w-button" value=""></form>
								<div class="footer_social_links"><a href="https://www.facebook.com/ynabofficial" target="_blank" class="w-inline-block">
										<div class="footer_social_icon w-embed">
											<svg aria-hidden="true" role="img" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>Facebook Icon</title>
												<path
													d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"></path>
											</svg>
										</div>
									</a><a href="https://twitter.com/ynab" target="_blank" class="w-inline-block">
										<div class="footer_social_icon w-embed">
											<svg aria-hidden="true" role="img" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25"><title>The artist formerly known as
													Twitter</title>
												<path
													d="M 13.6875 9.734375 L 22.25 0 L 20.222656 0 L 12.785156 8.453125 L 6.847656 0 L 0 0 L 8.980469 12.78125 L 0 22.988281 L 2.027344 22.988281 L 9.878906 14.0625 L 16.152344 22.988281 L 23 22.988281 Z M 10.910156 12.894531 L 10 11.621094 L 2.761719 1.492188 L 5.875 1.492188 L 11.71875 9.667969 L 12.628906 10.9375 L 20.222656 21.5625 L 17.105469 21.5625 Z M 10.910156 12.894531"></path>
											</svg>
										</div>
									</a><a href="https://www.instagram.com/ynab.official/" target="_blank" class="w-inline-block">
										<div class="footer_social_icon w-embed">
											<svg aria-hidden="true" role="img" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Instagram Icon</title>
												<path
													d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"></path>
											</svg>
										</div>
									</a><a href="https://www.pinterest.com/ynabofficial/" target="_blank" class="w-inline-block">
										<div class="footer_social_icon w-embed">
											<svg aria-hidden="true" role="img" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25"><title>Pinterest Icon</title>
												<path
													d="M12 0.5C5.37188 0.5 0 5.87188 0 12.5C0 17.5859 3.16406 21.9266 7.62656 23.675C7.52344 22.7234 7.425 21.2703 7.66875 20.2344C7.88906 19.2969 9.075 14.2719 9.075 14.2719C9.075 14.2719 8.71406 13.5547 8.71406 12.4906C8.71406 10.8219 9.67969 9.575 10.8844 9.575C11.9062 9.575 12.4031 10.3438 12.4031 11.2672C12.4031 12.2984 11.7469 13.8359 11.4094 15.2609C11.1281 16.4562 12.0094 17.4313 13.1859 17.4313C15.3187 17.4313 16.9594 15.1812 16.9594 11.9375C16.9594 9.06406 14.8969 7.05313 11.9484 7.05313C8.53594 7.05313 6.52969 9.6125 6.52969 12.2609C6.52969 13.2922 6.92812 14.3984 7.425 14.9984C7.52344 15.1156 7.5375 15.2234 7.50937 15.3406C7.42031 15.7203 7.21406 16.5359 7.17656 16.7C7.125 16.9203 7.00313 16.9672 6.77344 16.8594C5.27344 16.1609 4.33594 13.9719 4.33594 12.2094C4.33594 8.42188 7.0875 4.94844 12.2625 4.94844C16.425 4.94844 19.6594 7.91563 19.6594 11.8813C19.6594 16.0156 17.0531 19.3438 13.4344 19.3438C12.2203 19.3438 11.0766 18.7109 10.6828 17.9656C10.6828 17.9656 10.0828 20.2578 9.9375 20.8203C9.66562 21.8609 8.93437 23.1688 8.44687 23.9656C9.57187 24.3125 10.7625 24.5 12 24.5C18.6281 24.5 24 19.1281 24 12.5C24 5.87188 18.6281 0.5 12 0.5Z"></path>
											</svg>
										</div>
									</a><a href="https://www.tiktok.com/@ynabofficial" target="_blank" class="w-inline-block">
										<div class="footer_social_icon w-embed">
											<svg aria-hidden="true" role="img" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25
"><title>TikTok Icon</title>
												<path
													d="M17.0725 0.5H13.0278V16.8478C13.0278 18.7957 11.4722 20.3957 9.53626 20.3957C7.60034 20.3957 6.04469 18.7957 6.04469 16.8478C6.04469 14.9348 7.56577 13.3695 9.43257 13.3V9.19567C5.31872 9.2652 2 12.6391 2 16.8478C2 21.0913 5.38786 24.5 9.57085 24.5C13.7538 24.5 17.1416 21.0565 17.1416 16.8478V8.4652C18.6627 9.57827 20.5295 10.2391 22.5 10.2739V6.16957C19.4579 6.06522 17.0725 3.56087 17.0725 0.5Z"></path>
											</svg>
										</div>
									</a><a href="https://www.youtube.com/@YNABofficial" target="_blank" class="w-inline-block">
										<div class="footer_social_icon w-embed">
											<svg aria-hidden="true" role="img" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>YouTube Icon</title>
												<path
													d="M23.499 6.203a3.008 3.008 0 00-2.089-2.089c-1.87-.501-9.4-.501-9.4-.501s-7.509-.01-9.399.501a3.008 3.008 0 00-2.088 2.09A31.258 31.26 0 000 12.01a31.258 31.26 0 00.523 5.785 3.008 3.008 0 002.088 2.089c1.869.502 9.4.502 9.4.502s7.508 0 9.399-.502a3.008 3.008 0 002.089-2.09 31.258 31.26 0 00.5-5.784 31.258 31.26 0 00-.5-5.808zm-13.891 9.4V8.407l6.266 3.604z"></path>
											</svg>
										</div>
									</a><a href="https://podcasts.apple.com/ca/podcast/you-need-a-budget-ynab/id477248343" target="_blank" class="w-inline-block">
										<div class="footer_social_icon w-embed">
											<svg aria-hidden="true" role="img" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25"><title>Apple Podcasts Icon</title>
												<path fill-rule="evenodd" clip-rule="evenodd"
													d="M24 12.0023V12.0014C23.9981 17.1513 20.4211 21.6714 15.2459 23.0636C15.0373 23.1162 14.8237 22.9968 14.7688 22.797C14.7583 22.7588 14.7542 22.7192 14.7566 22.6798L14.7918 22.0479C14.8087 21.7893 14.9892 21.567 15.2466 21.4877C20.5713 19.7698 23.4342 14.2416 21.6412 9.14025C19.8481 4.03887 14.0779 1.29603 8.75321 3.01387C3.4285 4.73176 0.565588 10.2599 2.35863 15.3613C3.37512 18.2532 5.74663 20.5221 8.76657 21.492C9.02449 21.5711 9.2054 21.7936 9.22232 22.0525L9.2576 22.6843C9.27019 22.8907 9.10577 23.0678 8.89034 23.0798C8.84944 23.0821 8.80841 23.0782 8.76876 23.0683C2.38723 21.3578 -1.33865 15.0149 0.446772 8.90099C2.23218 2.78711 8.85278 -0.78251 15.2343 0.928034C20.4184 2.31759 24.0019 6.84495 24 12.0023V12.0023ZM19.8288 11.4963V11.4965C19.8288 14.2962 18.1996 16.8623 15.6047 18.1499C15.4115 18.2466 15.173 18.1749 15.0721 17.9898C15.0396 17.9302 15.0243 17.8634 15.0277 17.7962L15.0626 17.1684C15.0748 16.8743 15.2258 16.6014 15.473 16.4267C18.1752 14.5879 18.8098 10.9987 16.8906 8.40989C14.9713 5.82109 11.225 5.21306 8.52281 7.05182C5.82068 8.89057 5.18603 12.4798 7.10528 15.0686C7.49831 15.5987 7.98235 16.0612 8.53681 16.4362C8.78542 16.6107 8.93738 16.8844 8.94956 17.1794L8.98426 17.8033C8.99488 18.012 8.82697 18.1893 8.60921 18.1995C8.5394 18.2028 8.46994 18.1882 8.40792 18.1573H8.40792C4.56863 16.2552 3.06573 11.7315 5.05108 8.05319C7.03644 4.37493 11.7582 2.93506 15.5976 4.83714C18.1963 6.12464 19.8285 8.69335 19.8289 11.4963L19.8288 11.4963ZM11.9984 8.50204C13.4393 8.50204 14.6074 9.62117 14.6074 11.0017C14.6074 12.3822 13.4393 13.5013 11.9984 13.5013C10.5574 13.5013 9.3893 12.3822 9.3893 11.0017V11.0017C9.3893 9.62117 10.5574 8.50205 11.9984 8.50205V8.50204ZM12.005 14.4998C13.877 14.4998 14.1139 15.3183 14.0874 15.796L13.67 23.2962C13.6455 23.7378 13.345 24.5 12.005 24.5C10.665 24.5 10.3576 23.7378 10.3329 23.2962L9.91549 15.796C9.88894 15.3183 10.1332 14.4998 12.0051 14.4998H12.005Z"></path>
											</svg>
										</div>
									</a><a href="/blog/rss.xml" target="_blank" class="w-inline-block">
										<div class="footer_social_icon w-embed">
											<svg aria-hidden="true" role="img" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25"><title>RSS Icon</title>
												<path
													d="M12 0.5C5.373 0.5 0 5.873 0 12.5C0 19.127 5.373 24.5 12 24.5C18.627 24.5 24 19.127 24 12.5C24 5.873 18.627 0.5 12 0.5ZM8.626 17.5C7.729 17.5 7 16.773 7 15.876C7 14.979 7.729 14.252 8.626 14.252C9.523 14.252 10.252 14.979 10.252 15.876C10.252 16.773 9.523 17.5 8.626 17.5ZM12.511 17.5C12.481 14.478 10.026 12.026 7 11.996V9.59C11.361 9.62 14.889 13.145 14.92 17.5H12.511ZM16.592 17.5C16.576 12.203 12.289 7.929 7 7.906V5.5C13.623 5.523 18.985 10.884 19 17.5H16.592Z"></path>
											</svg>
										</div>
									</a></div>
								<div class="text-style-muted text-size-tiny">Copyright © 2025, YNAB. All Rights Reserved.</div>
							</div>
							<div data-delay="5" data-hover="false" id="w-node-_4c86a1b8-cf44-390f-d9bc-000aad16a590-ad16a579" class="footer_dropdown w-dropdown">
								<div class="footer_dropdown_toggle w-dropdown-toggle" id="w-dropdown-toggle-6" aria-controls="w-dropdown-list-6" aria-haspopup="menu" aria-expanded="false"
									role="button" tabindex="0">
									<div class="footer_dropdown-label">What Is YNAB?</div>
									<div class="button-icon-video is-accordion w-embed">
										<svg viewBox="0 0 17 11" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd"
												d="M7.93181 7.66557V7.66557C7.62746 7.9862 7.13373 7.98652 6.82902 7.66627C6.82879 7.66604 6.82857 7.6658 6.82835 7.66557L0.975827 1.50411V1.50411C0.666959 1.18775 0.660297 0.667826 0.960945 0.342822C1.26159 0.0178169 1.75571 0.0108066 2.06457 0.327163C2.06953 0.332238 2.07442 0.337382 2.07924 0.342594L7.38004 5.92313L12.6808 0.342594V0.342594C12.9813 0.0173491 13.4754 0.00997042 13.7845 0.326113C14.0936 0.642257 14.1006 1.16221 13.8002 1.48745C13.795 1.49308 13.7897 1.49864 13.7843 1.50411L7.93181 7.66557Z"></path>
										</svg>
									</div>
								</div>
								<nav class="footer_dropdown_list w-dropdown-list" id="w-dropdown-list-6" aria-labelledby="w-dropdown-toggle-6"><a href="/features"
										class="footer_text_link is-mobile w-dropdown-link" tabindex="0">The App</a><a href="/ynab-method" class="footer_text_link is-mobile w-dropdown-link"
										tabindex="0">The Method</a><a href="/why-ynab-is-different" class="footer_text_link is-mobile w-dropdown-link" tabindex="0">Why YNAB&nbsp;Is Different</a><a
										href="/our-free-34-day-trial" class="footer_text_link is-mobile w-dropdown-link" tabindex="0">Our 34 Day Trial</a><a
										href="/guide/the-ultimate-get-started-guide" class="footer_text_link is-mobile w-dropdown-link" tabindex="0">The Ultimate Get Started Guide</a></nav>
							</div>
							<div data-delay="5" data-hover="false" id="w-node-_4c86a1b8-cf44-390f-d9bc-000aad16a5a0-ad16a579" class="footer_dropdown w-dropdown">
								<div class="footer_dropdown_toggle w-dropdown-toggle" id="w-dropdown-toggle-7" aria-controls="w-dropdown-list-7" aria-haspopup="menu" aria-expanded="false"
									role="button" tabindex="0">
									<div class="footer_dropdown-label">Learn</div>
									<div class="button-icon-video is-accordion w-embed">
										<svg viewBox="0 0 17 11" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd"
												d="M7.93181 7.66557V7.66557C7.62746 7.9862 7.13373 7.98652 6.82902 7.66627C6.82879 7.66604 6.82857 7.6658 6.82835 7.66557L0.975827 1.50411V1.50411C0.666959 1.18775 0.660297 0.667826 0.960945 0.342822C1.26159 0.0178169 1.75571 0.0108066 2.06457 0.327163C2.06953 0.332238 2.07442 0.337382 2.07924 0.342594L7.38004 5.92313L12.6808 0.342594V0.342594C12.9813 0.0173491 13.4754 0.00997042 13.7845 0.326113C14.0936 0.642257 14.1006 1.16221 13.8002 1.48745C13.795 1.49308 13.7897 1.49864 13.7843 1.50411L7.93181 7.66557Z"></path>
										</svg>
									</div>
								</div>
								<nav class="footer_dropdown_list w-dropdown-list" id="w-dropdown-list-7" aria-labelledby="w-dropdown-toggle-7"><a href="/free-workshops"
										class="footer_text_link is-mobile w-dropdown-link" tabindex="0">Free Workshops</a><a href="/blog" class="footer_text_link is-mobile w-dropdown-link"
										tabindex="0">Blog</a><a href="/guides" class="footer_text_link is-mobile w-dropdown-link" tabindex="0">Guides</a><a href="/help-center"
										class="footer_text_link is-mobile w-dropdown-link" tabindex="0">Help Center</a></nav>
							</div>
							<div data-delay="5" data-hover="false" id="w-node-_8a539b1e-f42b-3c05-4803-9d0878e1ac18-ad16a579" class="footer_dropdown w-dropdown">
								<div class="footer_dropdown_toggle w-dropdown-toggle" id="w-dropdown-toggle-8" aria-controls="w-dropdown-list-8" aria-haspopup="menu" aria-expanded="false"
									role="button" tabindex="0">
									<div class="footer_dropdown-label">Share YNAB</div>
									<div class="button-icon-video is-accordion w-embed">
										<svg viewBox="0 0 17 11" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd"
												d="M7.93181 7.66557V7.66557C7.62746 7.9862 7.13373 7.98652 6.82902 7.66627C6.82879 7.66604 6.82857 7.6658 6.82835 7.66557L0.975827 1.50411V1.50411C0.666959 1.18775 0.660297 0.667826 0.960945 0.342822C1.26159 0.0178169 1.75571 0.0108066 2.06457 0.327163C2.06953 0.332238 2.07442 0.337382 2.07924 0.342594L7.38004 5.92313L12.6808 0.342594V0.342594C12.9813 0.0173491 13.4754 0.00997042 13.7845 0.326113C14.0936 0.642257 14.1006 1.16221 13.8002 1.48745C13.795 1.49308 13.7897 1.49864 13.7843 1.50411L7.93181 7.66557Z"></path>
										</svg>
									</div>
								</div>
								<nav class="footer_dropdown_list w-dropdown-list" id="w-dropdown-list-8" aria-labelledby="w-dropdown-toggle-8"><a href="/referral-program"
										class="footer_text_link is-mobile w-dropdown-link" tabindex="0">Refer a Friend</a><a href="/give-ynab" class="footer_text_link is-mobile w-dropdown-link"
										tabindex="0">Gift a YNAB Subscription</a><a href="/wellness/share" class="footer_text_link is-mobile w-dropdown-link" tabindex="0">Refer Your Employer</a><a
										href="/affiliate-program" class="footer_text_link is-mobile w-dropdown-link" tabindex="0">Affiliate Program</a></nav>
							</div>
							<div class="footer_link_mobile"><a href="/" onclick="return false;" class="footer_text_link">Pricing</a>
								<div class="padding-bottom padding-small"></div>
								<div class="footer-divider-mobile"></div>
							</div>
							<div data-delay="5" data-hover="false" id="w-node-_4c86a1b8-cf44-390f-d9bc-000aad16a5b8-ad16a579" class="footer_dropdown w-dropdown">
								<div class="footer_dropdown_toggle w-dropdown-toggle" id="w-dropdown-toggle-9" aria-controls="w-dropdown-list-9" aria-haspopup="menu" aria-expanded="false"
									role="button" tabindex="0">
									<div class="footer_dropdown-label">Company</div>
									<div class="button-icon-video is-accordion w-embed">
										<svg viewBox="0 0 17 11" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd"
												d="M7.93181 7.66557V7.66557C7.62746 7.9862 7.13373 7.98652 6.82902 7.66627C6.82879 7.66604 6.82857 7.6658 6.82835 7.66557L0.975827 1.50411V1.50411C0.666959 1.18775 0.660297 0.667826 0.960945 0.342822C1.26159 0.0178169 1.75571 0.0108066 2.06457 0.327163C2.06953 0.332238 2.07442 0.337382 2.07924 0.342594L7.38004 5.92313L12.6808 0.342594V0.342594C12.9813 0.0173491 13.4754 0.00997042 13.7845 0.326113C14.0936 0.642257 14.1006 1.16221 13.8002 1.48745C13.795 1.49308 13.7897 1.49864 13.7843 1.50411L7.93181 7.66557Z"></path>
										</svg>
									</div>
								</div>
								<nav class="footer_dropdown_list w-dropdown-list" id="w-dropdown-list-9" aria-labelledby="w-dropdown-toggle-9"><a href="/about-us"
										class="footer_text_link is-mobile w-dropdown-link" tabindex="0">About</a><a href="/careers" class="footer_text_link is-mobile w-dropdown-link" tabindex="0">Careers</a><a
										href="/press" class="footer_text_link is-mobile w-dropdown-link" tabindex="0">Press</a><a href="/ynab-the-book"
										class="footer_text_link is-mobile w-dropdown-link" tabindex="0">YNAB: The Book</a></nav>
							</div>
							<div data-delay="5" data-hover="false" id="w-node-_4c86a1b8-cf44-390f-d9bc-000aad16a5e2-ad16a579" class="footer_dropdown w-dropdown">
								<div class="footer_dropdown_toggle w-dropdown-toggle" id="w-dropdown-toggle-10" aria-controls="w-dropdown-list-10" aria-haspopup="menu" aria-expanded="false"
									role="button" tabindex="0">
									<div class="footer_dropdown-label">Programs</div>
									<div class="button-icon-video is-accordion w-embed">
										<svg viewBox="0 0 17 11" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd"
												d="M7.93181 7.66557V7.66557C7.62746 7.9862 7.13373 7.98652 6.82902 7.66627C6.82879 7.66604 6.82857 7.6658 6.82835 7.66557L0.975827 1.50411V1.50411C0.666959 1.18775 0.660297 0.667826 0.960945 0.342822C1.26159 0.0178169 1.75571 0.0108066 2.06457 0.327163C2.06953 0.332238 2.07442 0.337382 2.07924 0.342594L7.38004 5.92313L12.6808 0.342594V0.342594C12.9813 0.0173491 13.4754 0.00997042 13.7845 0.326113C14.0936 0.642257 14.1006 1.16221 13.8002 1.48745C13.795 1.49308 13.7897 1.49864 13.7843 1.50411L7.93181 7.66557Z"></path>
										</svg>
									</div>
								</div>
								<nav class="footer_dropdown_list w-dropdown-list" id="w-dropdown-list-10" aria-labelledby="w-dropdown-toggle-10"><a href="/wellness"
										class="footer_text_link is-mobile w-dropdown-link" tabindex="0">YNAB for the Workplace</a><a href="/college" class="footer_text_link is-mobile w-dropdown-link"
										tabindex="0">YNAB for College Students</a><a href="/coaching" class="footer_text_link is-mobile w-dropdown-link" tabindex="0">Certified Coaching</a><a
										href="/ynab-for-good" class="footer_text_link is-mobile w-dropdown-link" tabindex="0">YNAB For Good</a></nav>
							</div>
							<div data-delay="5" data-hover="false" id="w-node-_4c86a1b8-cf44-390f-d9bc-000aad16a5d4-ad16a579" class="footer_dropdown w-dropdown">
								<div class="footer_dropdown_toggle w-dropdown-toggle" id="w-dropdown-toggle-11" aria-controls="w-dropdown-list-11" aria-haspopup="menu" aria-expanded="false"
									role="button" tabindex="0">
									<div class="footer_dropdown-label">App</div>
									<div class="button-icon-video is-accordion w-embed">
										<svg viewBox="0 0 17 11" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd"
												d="M7.93181 7.66557V7.66557C7.62746 7.9862 7.13373 7.98652 6.82902 7.66627C6.82879 7.66604 6.82857 7.6658 6.82835 7.66557L0.975827 1.50411V1.50411C0.666959 1.18775 0.660297 0.667826 0.960945 0.342822C1.26159 0.0178169 1.75571 0.0108066 2.06457 0.327163C2.06953 0.332238 2.07442 0.337382 2.07924 0.342594L7.38004 5.92313L12.6808 0.342594V0.342594C12.9813 0.0173491 13.4754 0.00997042 13.7845 0.326113C14.0936 0.642257 14.1006 1.16221 13.8002 1.48745C13.795 1.49308 13.7897 1.49864 13.7843 1.50411L7.93181 7.66557Z"></path>
										</svg>
									</div>
								</div>
								<nav class="footer_dropdown_list w-dropdown-list" id="w-dropdown-list-11" aria-labelledby="w-dropdown-toggle-11"><a href="https://ynabstatus.com/" target="_blank"
										class="footer_text_link is-mobile w-dropdown-link" tabindex="0">Status</a><a href="/whats-new" class="footer_text_link is-mobile w-dropdown-link" tabindex="0">What's
										New</a><a href="https://api.ynab.com/" target="_blank" class="footer_text_link is-mobile w-dropdown-link" tabindex="0">API</a><a href="/cancellation"
										class="footer_text_link is-mobile w-dropdown-link" tabindex="0">Cancellation</a></nav>
							</div>
							<div data-delay="5" data-hover="false" id="w-node-_4c86a1b8-cf44-390f-d9bc-000aad16a5c6-ad16a579" class="footer_dropdown w-dropdown">
								<div class="footer_dropdown_toggle w-dropdown-toggle" id="w-dropdown-toggle-12" aria-controls="w-dropdown-list-12" aria-haspopup="menu" aria-expanded="false"
									role="button" tabindex="0">
									<div class="footer_dropdown-label">Legal</div>
									<div class="button-icon-video is-accordion w-embed">
										<svg viewBox="0 0 17 11" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd"
												d="M7.93181 7.66557V7.66557C7.62746 7.9862 7.13373 7.98652 6.82902 7.66627C6.82879 7.66604 6.82857 7.6658 6.82835 7.66557L0.975827 1.50411V1.50411C0.666959 1.18775 0.660297 0.667826 0.960945 0.342822C1.26159 0.0178169 1.75571 0.0108066 2.06457 0.327163C2.06953 0.332238 2.07442 0.337382 2.07924 0.342594L7.38004 5.92313L12.6808 0.342594V0.342594C12.9813 0.0173491 13.4754 0.00997042 13.7845 0.326113C14.0936 0.642257 14.1006 1.16221 13.8002 1.48745C13.795 1.49308 13.7897 1.49864 13.7843 1.50411L7.93181 7.66557Z"></path>
										</svg>
									</div>
								</div>
								<nav class="footer_dropdown_list w-dropdown-list" id="w-dropdown-list-12" aria-labelledby="w-dropdown-toggle-12"><a href="/terms"
										class="footer_text_link is-mobile w-dropdown-link" tabindex="0">Terms</a><a href="/security" class="footer_text_link is-mobile w-dropdown-link" tabindex="0">Security</a><a
										href="/privacy-policy" class="footer_text_link is-mobile w-dropdown-link" tabindex="0">Privacy Policy</a><a href="/privacy-policy/california-privacy-disclosure"
										class="footer_text_link is-mobile" tabindex="0">California Privacy Policy</a>
									<div data-controller="privacy-choices-button" class="footer_privacy-choices-link is-mobile"
										data-action=" click->privacy-choices-button#openPrivacyChoicesDialog:prevent">
										<div class="text-weight-medium text-size-small">Your Privacy Choices</div>
										<div class="w-embed">
											<svg width="22" height="11" viewBox="0 0 22 11" fill="currentColor" alt="California Consumer Privacy Act (CCPA) Opt-Out Icon"
												xmlns="http://www.w3.org/2000/svg">
												<g clip-path="url(#clip0_399_255)">
													<path fill-rule="evenodd" clip-rule="evenodd"
														d="M5.28569 9.64283H10.1428L12.3571 1.35712H5.28569C2.99998 1.35712 1.14284 3.21426 1.14284 5.49997C1.14284 7.78569 2.99998 9.64283 5.28569 9.64283Z"
														fill="#19223C"></path>
													<path fill-rule="evenodd" clip-rule="evenodd"
														d="M16.1429 0.5H5.28574C2.50002 0.5 0.285736 2.71429 0.285736 5.5C0.285736 8.28571 2.50002 10.5 5.28574 10.5H16.1429C18.9286 10.5 21.1429 8.28571 21.1429 5.5C21.1429 2.71429 18.8572 0.5 16.1429 0.5ZM1.14288 5.5C1.14288 3.21429 3.00002 1.35714 5.28574 1.35714H12.3572L10.1429 9.64286H5.28574C3.00002 9.64286 1.14288 7.78571 1.14288 5.5Z"
														fill="currentColor"></path>
													<path
														d="M17.5714 3.35714C17.7143 3.5 17.7143 3.78571 17.5714 3.92857L16.0714 5.5L17.6429 7.07143C17.7857 7.21429 17.7857 7.5 17.6429 7.64286C17.5 7.78571 17.2143 7.78571 17.0714 7.64286L15.5 6.07143L13.9286 7.64286C13.7857 7.78571 13.5 7.78571 13.3572 7.64286C13.2143 7.5 13.2143 7.21429 13.3572 7.07143L14.8572 5.5L13.2857 3.92857C13.1429 3.78571 13.1429 3.5 13.2857 3.35714C13.4286 3.21429 13.7143 3.21429 13.8572 3.35714L15.4286 4.92857L17 3.35714C17.1429 3.21429 17.4286 3.21429 17.5714 3.35714Z"
														fill="#19223C"></path>
													<path
														d="M9.07144 3.42855C9.2143 3.57141 9.28573 3.85713 9.14287 3.99998L6.14287 7.49998C6.07144 7.57141 6.00002 7.64284 5.92859 7.64284C5.78573 7.71427 5.57144 7.71427 5.42859 7.57141L3.85716 5.99998C3.7143 5.85713 3.7143 5.57141 3.85716 5.42855C4.00002 5.2857 4.28573 5.2857 4.42859 5.42855L5.7143 6.64284L8.42859 3.42855C8.57144 3.2857 8.85716 3.2857 9.07144 3.42855Z"
														fill="currentColor"></path>
												</g>
												<defs>
													<clipPath id="clip0_399_255">
														<rect width="21.4286" height="10" transform="translate(0 0.5)"></rect>
													</clipPath>
												</defs>
											</svg>
										</div>
									</div>
									<a href="/terms/uk-switzerland-eea#truelayer-agent-disclosure" class="footer_text_link is-mobile" tabindex="0">TrueLayer Agent Disclosure</a></nav>
							</div>
							<div class="footer_block_list hide-tablet">
								<div class="footer_header">Company</div>
								<a id="w-node-_4c86a1b8-cf44-390f-d9bc-000aad16a5f3-ad16a579" href="/about-us" class="footer_text_link">About</a><a href="/careers"
									class="footer_text_link">Careers</a><a href="/press" class="footer_text_link">Press</a><a href="/ynab-the-book" class="footer_text_link">YNAB: The Book</a></div>
							<div class="footer_block_list hide-tablet">
								<div class="footer_header">Programs</div>
								<a href="/wellness" class="footer_text_link">YNAB for the Workplace</a><a href="/college" class="footer_text_link">YNAB for College Students</a><a href="/coaching"
									class="footer_text_link">Certified Coaching</a><a href="/ynab-for-good" class="footer_text_link">YNAB For Good</a></div>
							<div class="footer_block_list hide-tablet">
								<div class="footer_header">App</div>
								<a href="https://ynabstatus.com/" target="_blank" class="footer_text_link">Status</a><a href="/whats-new" class="footer_text_link">What's New</a><a
									href="https://api.ynab.com/" target="_blank" class="footer_text_link">API</a><a href="/cancellation" class="footer_text_link">Cancellation</a></div>
							<div class="footer_block_list hide-tablet">
								<div class="footer_header">Legal</div>
								<a href="/terms" class="footer_text_link">Terms</a><a href="/security" class="footer_text_link">Security</a><a href="/privacy-policy" class="footer_text_link">Privacy
									Policy</a><a href="/privacy-policy/california-privacy-disclosure" class="footer_text_link">California Privacy Policy</a>
								<div data-controller="privacy-choices-button" class="footer_privacy-choices-link" data-action=" click->privacy-choices-button#openPrivacyChoicesDialog:prevent">
									<div class="footer_text_link">Your Privacy Choices</div>
									<div class="code-embed w-embed">
										<svg width="22" height="11" viewBox="0 0 22 11" fill="currentColor" alt="California Consumer Privacy Act (CCPA) Opt-Out Icon"
											xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_399_255)">
												<path fill-rule="evenodd" clip-rule="evenodd"
													d="M5.28569 9.64283H10.1428L12.3571 1.35712H5.28569C2.99998 1.35712 1.14284 3.21426 1.14284 5.49997C1.14284 7.78569 2.99998 9.64283 5.28569 9.64283Z"
													fill="#19223C"></path>
												<path fill-rule="evenodd" clip-rule="evenodd"
													d="M16.1429 0.5H5.28574C2.50002 0.5 0.285736 2.71429 0.285736 5.5C0.285736 8.28571 2.50002 10.5 5.28574 10.5H16.1429C18.9286 10.5 21.1429 8.28571 21.1429 5.5C21.1429 2.71429 18.8572 0.5 16.1429 0.5ZM1.14288 5.5C1.14288 3.21429 3.00002 1.35714 5.28574 1.35714H12.3572L10.1429 9.64286H5.28574C3.00002 9.64286 1.14288 7.78571 1.14288 5.5Z"
													fill="currentColor"></path>
												<path
													d="M17.5714 3.35714C17.7143 3.5 17.7143 3.78571 17.5714 3.92857L16.0714 5.5L17.6429 7.07143C17.7857 7.21429 17.7857 7.5 17.6429 7.64286C17.5 7.78571 17.2143 7.78571 17.0714 7.64286L15.5 6.07143L13.9286 7.64286C13.7857 7.78571 13.5 7.78571 13.3572 7.64286C13.2143 7.5 13.2143 7.21429 13.3572 7.07143L14.8572 5.5L13.2857 3.92857C13.1429 3.78571 13.1429 3.5 13.2857 3.35714C13.4286 3.21429 13.7143 3.21429 13.8572 3.35714L15.4286 4.92857L17 3.35714C17.1429 3.21429 17.4286 3.21429 17.5714 3.35714Z"
													fill="#19223C"></path>
												<path
													d="M9.07144 3.42855C9.2143 3.57141 9.28573 3.85713 9.14287 3.99998L6.14287 7.49998C6.07144 7.57141 6.00002 7.64284 5.92859 7.64284C5.78573 7.71427 5.57144 7.71427 5.42859 7.57141L3.85716 5.99998C3.7143 5.85713 3.7143 5.57141 3.85716 5.42855C4.00002 5.2857 4.28573 5.2857 4.42859 5.42855L5.7143 6.64284L8.42859 3.42855C8.57144 3.2857 8.85716 3.2857 9.07144 3.42855Z"
													fill="currentColor"></path>
											</g>
											<defs>
												<clipPath id="clip0_399_255">
													<rect width="21.4286" height="10" transform="translate(0 0.5)"></rect>
												</clipPath>
											</defs>
										</svg>
									</div>
								</div>
								<a href="/terms/uk-switzerland-eea#truelayer-agent-disclosure" class="footer_text_link">TrueLayer Agent Disclosure</a><a href="/terms#plaid-agent-disclosure"
									class="footer_text_link">Plaid Agent Disclosure</a></div>
						</div>
					</div>
				</div>
			</div>
		</section>
	
	</div>
</div>
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=640f69143ec11b21d42015c6"
	type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
	crossorigin="anonymous"></script>
<script src="https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/js/staging-www.c5ba78aa.f8bee29c3bf19b15.js"
	type="text/javascript"></script>

</body>

</html>