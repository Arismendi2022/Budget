<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>YNAB</title>
	
	<link href="{{ asset('images/front/brand/TreeLogoBlurple.png') }}" rel="shortcut icon" type="image/x-icon">
	<link rel="stylesheet" href="{{ asset('css/front/home.css') }}">
	{{--	 Fonts --}}
	<link href="https://fonts.googleapis.com" rel="preconnect">
	<link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet"/>

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
						</div>
					</div>
					<div class="w-nav-overlay" data-wf-ignore="" id="w-nav-overlay-0"></div>
				</div>
			</div>
		</div>
	</nav>
</div>

<script src="/js/shared/jquery-3.7.1.min.js" type="text/javascript" crossorigin="anonymous"></script>
<script src="/js/shared/staging.js" type="text/javascript"></script>

</body>
</html>