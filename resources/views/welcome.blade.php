<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="description" content="Personal home budget software built, reach your financial goals!">
	<meta name="ynab-version" content="24.69.2-hotfix">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<title>YNAB</title>
	
	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	
	<!-- Styles / Scripts -->
	<link rel="shortcut icon" href="{{ asset('images/shared/brand/ynab-tree-logo.svg') }}">
	<link rel="stylesheet" href="{{ asset('css/front/home.css') }}">
	
	@livewireStyles
	@stack('stylesheets')

</head>
<body class="body" data-track-page-view="true" data-track-page-name="Home">
<div class="page-wrapper">
	<div>
		<div class="design-system--global-styles w-embed">
			<style>
				.w-webflow-badge {
					display: none !important;
				}
				
				/* Make text look crisper and more legible in all browsers */
				body {
					-webkit-font-smoothing: subpixel-antialiased;
					-moz-osx-font-smoothing: grayscale;
					text-rendering: optimizeLegibility;
				}
				
				/* Focus state style for keyboard navigation for the focusable elements */
				*[tabindex]:focus-visible,
				input[type="file"]:focus-visible {
					outline: 0.125rem solid #4d65ff;
					outline-offset: 0.125rem;
				}
				
				/* Get rid of top margin on first element in any rich text element */
				.w-richtext > :not(div):first-child, .w-richtext > div:first-child > :first-child {
					margin-top: 0 !important;
				}
				
				/* Get rid of bottom margin on last element in any rich text element */
				.w-richtext > :last-child, .w-richtext ol li:last-child, .w-richtext ul li:last-child {
					margin-bottom: 0 !important;
				}
				
				/* Prevent all click and hover interaction with an element */
				.pointer-events-off {
					pointer-events: none;
				}
				
				/* Enables all click and hover interaction with an element */
				.pointer-events-on {
					pointer-events: auto;
				}
				
				/* Create a class of .div-square which maintains a 1:1 dimension of a div */
				.div-square::after {
					content: "";
					display: block;
					padding-bottom: 100%;
				}
				
				/* Make sure containers never lose their center alignment */
				.container-medium, .container-small, .container-large {
					margin-right: auto !important;
					margin-left: auto !important;
				}
				
				/*
				Make the following elements inherit typography styles from the parent and not have hardcoded values.
				Important: You will not be able to style for example "All Links" in Designer with this CSS applied.
				Uncomment this CSS to use it in the project. Leave this message for future hand-off.
				*/
				/*
				a,
				.w-input,
				.w-select,
				.w-tab-link,
				.w-nav-link,
				.w-dropdown-btn,
				.w-dropdown-toggle,
				.w-dropdown-link {
					color: inherit;
					text-decoration: inherit;
					font-size: inherit;
				}
				*/
				
				/* Apply "..." after 3 lines of text */
				.text-style-3lines {
					display: -webkit-box;
					overflow: hidden;
					-webkit-line-clamp: 3;
					-webkit-box-orient: vertical;
				}
				
				/* Apply "..." after 2 lines of text */
				.text-style-2lines {
					display: -webkit-box;
					overflow: hidden;
					-webkit-line-clamp: 2;
					-webkit-box-orient: vertical;
				}
				
				/* Adds inline flex display */
				.display-inlineflex {
					display: inline-flex;
				}
				
				/* These classes are never overwritten */
				.hide {
					display: none !important;
				}
				
				@media screen and (max-width: 991px) {
					.hide, .hide-tablet {
						display: none !important;
					}
				}
				@media screen and (max-width: 767px) {
					.hide-mobile-landscape {
						display: none !important;
					}
				}
				@media screen and (max-width: 479px) {
					.hide-mobile {
						display: none !important;
					}
				}
				
				.margin-0 {
					margin: 0rem !important;
				}
				
				.padding-0 {
					padding: 0rem !important;
				}
				
				.spacing-clean {
					padding: 0rem !important;
					margin: 0rem !important;
				}
				
				.margin-top {
					margin-right: 0rem !important;
					margin-bottom: 0rem !important;
					margin-left: 0rem !important;
				}
				
				.padding-top {
					padding-right: 0rem !important;
					padding-bottom: 0rem !important;
					padding-left: 0rem !important;
				}
				
				.margin-right {
					margin-top: 0rem !important;
					margin-bottom: 0rem !important;
					margin-left: 0rem !important;
				}
				
				.padding-right {
					padding-top: 0rem !important;
					padding-bottom: 0rem !important;
					padding-left: 0rem !important;
				}
				
				.margin-bottom {
					margin-top: 0rem !important;
					margin-right: 0rem !important;
					margin-left: 0rem !important;
				}
				
				.padding-bottom {
					padding-top: 0rem !important;
					padding-right: 0rem !important;
					padding-left: 0rem !important;
				}
				
				.margin-left {
					margin-top: 0rem !important;
					margin-right: 0rem !important;
					margin-bottom: 0rem !important;
				}
				
				.padding-left {
					padding-top: 0rem !important;
					padding-right: 0rem !important;
					padding-bottom: 0rem !important;
				}
				
				.margin-horizontal {
					margin-top: 0rem !important;
					margin-bottom: 0rem !important;
				}
				
				.padding-horizontal {
					padding-top: 0rem !important;
					padding-bottom: 0rem !important;
				}
				
				.margin-vertical {
					margin-right: 0rem !important;
					margin-left: 0rem !important;
				}
				
				.padding-vertical {
					padding-right: 0rem !important;
					padding-left: 0rem !important;
				}
				
				html.js-template-isolated,
				html.js-template-mobile_help {
					.section_navbar,
					section.footer,
					.footer_universal-cta_section,
					[class*='hero-section'],
					.js-signup {
						display: none;
					}
				}
				
				html.js-template-mobile_help,
				html.js-template-isolated .hide-consent-ui-in-isolated {
					#onetrust-consent-sdk {
						display: none;
					}
				}
				
				.scroll-margin [id] {
					scroll-margin-top: 4.75rem;
				}
				
				body.js-modal-open {
					overflow: hidden;
				}
				
				body.js-modal-open #ot-sdk-btn-floating.ot-floating-button,
				body.js-modal-open #onetrust-banner-sdk.otFloatingRounded {
					z-index: 1000; /* below modal mask */
				}
				
				body.js-modal-open .au_modal_mask,
				body.js-modal-open .design-system--au_modal_mask {
					animation: fade-to-muted 200ms ease-in forwards;
				}
				
				body.js-modal-open .referral_modal_mask {
					animation: fade-to-blurple 200ms ease-in forwards;
				}
				
				/* multiple modals after one has been dismissed */
				body:has(.referral_modal_mask:not(.hide),.au_modal_mask:not(.hide),.design-system--au_modal_mask:not(.design-system--hide)) {
					overflow: hidden;
				}
				body:has(.referral_modal_mask:not(.hide),.au_modal_mask:not(.hide),.design-system--au_modal_mask:not(.design-system--hide)) #ot-sdk-btn-floating.ot-floating-button,
				body:has(.referral_modal_mask:not(.hide),.au_modal_mask:not(.hide),.design-system--au_modal_mask:not(.design-system--hide)) #onetrust-banner-sdk.otFloatingRounded {
					z-index: 1000; /* below modal mask */
				}
				.au_modal_mask:not(.hide),
				.design-system--au_modal_mask:not(.design-system--hide) {
					animation: fade-to-muted 200ms ease-in forwards;
				}
				.referral_modal_mask:not(.hide) {
					animation: fade-to-blurple 200ms ease-in forwards;
				}
				
				@keyframes fade-to-muted {
					from {
						background-color: rgba(0, 0, 0, 0);
						-webkit-backdrop-filter: grayscale(0) blur(0);
						backdrop-filter: grayscale(0) blur(0);
					}
					to {
						background-color: rgba(0, 0, 0, 0.5);
						-webkit-backdrop-filter: grayscale(1) blur(5px);
						backdrop-filter: grayscale(1) blur(5px);
					}
				}
				
				@keyframes fade-to-blurple {
					from {
						background-color: rgba(55, 77, 155, 0);
					}
					to {
						background-color: rgba(55, 77, 155, 0.77);
					}
				}
			</style>
		</div>
		<div data-au-modal-trigger-class-value="js-au-modal-trigger,.design-system--js-au-modal-trigger" data-controller="au-modal" data-au-modal-hide-class-value="design-system--hide"
			class="design-system--au_modal_mask design-system--hide">
			<div class="design-system--hide"></div>
			<div class="design-system--au_modal_content"><img loading="lazy"
					src="https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/6758a5396561162bbe65ae5c_Tree%20Logo%20Blurple%20(2).svg" alt="YNAB tree logo"
					class="design-system--hide"><img loading="lazy" src="https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/6758a6c2e8c0f58105ed4f60_flag%20(2).png"
					alt="Australian flag" class="design-system--au_modal-flag">
				<div>It looks like you're located in Australia.<br>We have an Australian version of our website.<br><br>Please confirm your location and we’ll send you to the appropriate
					site!
				</div>
				<div class="design-system--button-group">
					<div class="design-system--button-wrapper"><a data-au-modal-target="yesButton" href="#" class="design-system--button-primary w-button"
							data-action=" click->au-modal#confirmInAustralia:prevent">I'm in Australia</a></div>
					<div class="design-system--button-wrapper"><a data-au-modal-target="noButton" href="#" class="design-system--button-secondary w-button"
							data-action=" click->au-modal#confirmNotInAustralia:prevent">No, I'm not in Australia</a></div>
				</div>
			</div>
		</div>
		<div data-referral-modal-target="background" data-controller="referral-modal" class="referral_modal_mask hide"
			data-action=" click->referral-modal#close:self transitionend->referral-modal#toggled animationend->referral-modal#toggled keydown.esc@document->referral-modal#close keydown.tab@document->referral-modal#moveFocusForward keydown.shift+tab@document->referral-modal#moveFocusBackward">
			<div aria-describedby="referral_modal_description" data-referral-modal-target="content" role="dialog" aria-modal="true" aria-labelledby="referral_modal_label"
				class="referral_modal_content"><img class="referral_modal_close" src="https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/66cc892582cc0cb8c1782479_x%20icon.svg"
					alt="Dismiss modal icon" title="Close" tabindex="0" data-referral-modal-target="closeButton firstFocusable" data-action=" click->referral-modal#close:prevent"><img
					src="https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/675f9022e4ca9512ef776e4f_Referrals-Card-Sparks.svg" alt="Card showing 'One free month of YNAB.'"
					class="referral_modal_image">
				<div class="referral_modal_text">
					<div class="w-richtext"><h2 data-referral-modal-target="sponsorName" class="display-inline referral_modal_title">A friend</h2>
						<h2 class="display-inline referral_modal_title"> sent you a free month of YNAB!</h2>
						<p>‍</p></div>
					<div class="text-align-left w-richtext"><p>Join the movement of&nbsp;YNABers who spend guilt-free thanks to our simple set of life-changing habits.</p>
						<p>Start with our 34-day free trial and you'll both get an <strong>additional free month</strong> when you subscribe.</p></div>
				</div>
				<div class="button-group is-centered">
					<div class="button-wrapper is-left"><a data-referral-modal-target="lastFocusable" href="/sign-up" class="button-primary-dark w-button">Start Your Free Trial</a></div>
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
							<!-- navbar_left -->
							<div class="navbar_left">
								<a href="/" aria-current="page" class="navbar_brand w-nav-brand w--current"
									aria-label="home"><img
										src="{{ asset('/images/front/brand/Logotype-Buttermilk.svg') }}"
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
													class="nav_dropdown-link w-dropdown-link" tabindex="0">Blog</a><a
													href="/guides"
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
													class="nav_dropdown-link w-dropdown-link" tabindex="0">Refer A Friend</a><a href="/give-ynab"
													class="nav_dropdown-link w-dropdown-link" tabindex="0">Gift a YNAB
													Subscription</a><a
													href="/wellness/share" class="nav_dropdown-link w-dropdown-link" tabindex="0">Refer Your
													Employer</a><a href="/affiliate-program" class="nav_dropdown-link w-dropdown-link"
													tabindex="0">Affiliate Program</a>
											</nav>
										</div>
									</li>
									<li class="nav_list-item hide-tablet"><a href="/pricing" class="nav_link">Pricing</a></li>
									<li class="nav_list-item hide-tablet is-wellness"><a href="/wellness" class="nav_link">For Employers</a>
									</li>
								</ul>
							</div>
							<!-- navbar_right -->
							<div class="navbar_right">
								<nav role="navigation" class="nav_list-wrapper w-nav-menu">
									<div class="nav_list-scroll-container">
										<div class="nav_list-scroll-wrap">
											<ul role="list" class="nav_list w-list-unstyled">
												<li class="nav_list-item hide-tablet">
													<a href="{{ route('users.login') }}"
														class="nav_link is-login js-login">Log In</a>
												</li>
												<li data-controller="referral-content" class="nav_list-item is-cta hide-tablet">
													<a data-referral-content-target="defaultContent" data-controller="signup-button"
														data-signup-button-is-category-wizard-active-value="false" href="{{ route('users.register') }}"
														class="button-primary-dark is-green js-signup is-nav w-button"
														data-action=" click->signup-button#beginSignup">Start Your Free Trial</a>
													<a
														data-referral-content-target="referralContent" data-controller="signup-button"
														data-signup-button-is-category-wizard-active-value="false" href="{{ route('users.register') }}"
														class="button-primary-dark is-green js-signup is-nav hide w-button"
														data-action=" click->signup-button#beginSignup">Accept Your Invite</a>
												</li>
												<li class="nav_list-item-mobile-highlight">
													<div class="nav_list-item-mobile-highlight-container"><a href="/ynab-method" class="nav_link_highlight w-inline-block"><img
																src="https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/6706d2a70c6755ef7adea2ed_open_book_firefly.svg" loading="lazy" alt=""
																class="nav_link_highlight_image">
															<div class="nav_link_highlight_text">The Method</div>
														</a><a href="/features" class="nav_link_highlight w-inline-block"><img
																src="https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/6706d2a799240c3f3cf186cc_Cellphone_firefly.svg" loading="lazy" alt=""
																class="nav_link_highlight_image">
															<div class="nav_link_highlight_text">The App</div>
														</a><a href="/pricing" class="nav_link_highlight w-inline-block"><img
																src="https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/6706c8ac7c819ed21dd5c1f3_dollar_firefly.svg" loading="lazy" alt=""
																class="nav_link_highlight_image">
															<div class="nav_link_highlight_text">Pricing</div>
														</a></div>
												</li>
												<li class="nav_list-item-mobile">
													<div data-delay="5" data-hover="true" class="nav_dropdown-mobile w-dropdown">
														<div class="nav_dropdown-toggle w-dropdown-toggle" id="w-dropdown-toggle-3" aria-controls="w-dropdown-list-3" aria-haspopup="menu" aria-expanded="false"
															role="button" tabindex="0">
															<div class="nav_dropdown-label is-mobile">What is YNAB?</div>
														</div>
														<nav class="nav_dropdown-list-mobile w-dropdown-list" id="w-dropdown-list-3" aria-labelledby="w-dropdown-toggle-3"><a href="/features"
																class="nav_dropdown-link is-mobile w-dropdown-link" tabindex="0">The App</a><a href="/ynab-method"
																class="nav_dropdown-link is-mobile dropdown-link w-dropdown-link" tabindex="0">The Method</a><a href="/why-ynab-is-different"
																class="nav_dropdown-link is-mobile w-dropdown-link" tabindex="0">Why YNAB&nbsp;Is Different</a><a href="/our-free-34-day-trial"
																class="nav_dropdown-link is-mobile w-dropdown-link" tabindex="0">Our 34-Day Trial</a><a href="/guide/the-ultimate-get-started-guide"
																class="nav_dropdown-link is-mobile w-dropdown-link" tabindex="0">The Ultimate Get Started Guide</a></nav>
													</div>
												</li>
												<li class="nav_list-item-mobile">
													<div data-delay="5" data-hover="false" class="nav_dropdown-mobile w-dropdown">
														<div class="nav_dropdown-toggle w-dropdown-toggle" id="w-dropdown-toggle-4" aria-controls="w-dropdown-list-4" aria-haspopup="menu" aria-expanded="false"
															role="button" tabindex="0">
															<div class="nav_dropdown-label is-mobile">Learn</div>
														</div>
														<nav class="nav_dropdown-list-mobile w-dropdown-list" id="w-dropdown-list-4" aria-labelledby="w-dropdown-toggle-4"><a href="/free-workshops"
																class="nav_dropdown-link is-mobile w-dropdown-link" tabindex="0">Free Workshops</a><a href="/blog"
																class="nav_dropdown-link is-mobile w-dropdown-link" tabindex="0">Blog</a><a href="/guides" class="nav_dropdown-link is-mobile w-dropdown-link"
																tabindex="0">Guides</a><a href="/help-center" class="nav_dropdown-link is-mobile w-dropdown-link" tabindex="0">Help Center</a></nav>
													</div>
												</li>
												<li class="nav_list-item-mobile is-login hide-mobile-landscape"><a href="https://app.ynab.com/users/sign_in" class="nav_link-login js-login">Log In</a>
													<div class="button-icon-video w-embed">
														<svg aria-hidden="true" fill="currentColor" role="img" viewBox="0 0 20 21" xmlns="http://www.w3.org/2000/svg"><title>Arrow Right</title>
															<polygon points="16.172 9 10.101 2.929 11.515 1.515 20 10 19.293 10.707 11.515 18.485 10.101 17.071 16.172 11 0 11 0 9"></polygon>
														</svg>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</nav>
							</div>
						</div>
					</div>
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
								<div class="home_hero-copy"><h1>How will you spend your <span class="text-span-3">money</span> life?</h1>
									<p class="hero_subhead">Create a friendly, flexible plan and spend it well with YNAB.</p>
									<div><a data-controller="signup-button" href="/sign-up" class="button-primary-dark is-green js-signup w-button" data-action=" click->signup-button#beginSignup">Start
											Your Free Month</a>
										<div class="padding-bottom padding-xsmall"></div>
										<div class="div-block-43">
											<div class="text-size-small">It’s easy! No credit card required.</div>
										</div>
									</div>
								</div>
							</div>
							<div class="home_hero-right">
								<div class="floating-hero-wrapper"><img
										src="https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/672188c512264aa81f920114_flying_money_narrow_firefly_hero.svg" loading="eager" alt=""
										class="hero-dollars"><img class="floating-hero" src="https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/6502e96f8b7ff92feac8c8ab_hero-phone.png"
										alt="An illustrated version of the YNAB app on a mobile device"
										style="transform: translate3d(0px, -5.2874px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg); transform-style: preserve-3d; will-change: transform;"
										sizes="(max-width: 479px) 90vw, (max-width: 767px) 70vw, (max-width: 991px) 68vw, (max-width: 1439px) 44vw, 640px"
										data-w-id="dc59ae38-0e3f-b73b-ddac-58f49ab4a50f" loading="eager"
										srcset="https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/6502e96f8b7ff92feac8c8ab_hero-phone-p-500.png 500w, https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/6502e96f8b7ff92feac8c8ab_hero-phone-p-800.png 800w, https://cdn.prod.website-files.com/640f69143ec11b21d42015c6/6502e96f8b7ff92feac8c8ab_hero-phone.png 1538w">
									<div data-w-id="dc59ae38-0e3f-b73b-ddac-58f49ab4a510"
										style="opacity: 0.120101; transform: translate3d(0px, 0px, 0px) scale3d(0.894252, 0.894252, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg); transform-style: preserve-3d; will-change: transform, opacity;"
										class="floating-shadow"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
</div>


{{-- footer --}}

@livewireScripts
<!--JQUERY-->

@stack('scripts')

</body>
</html>

