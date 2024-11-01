@extends('front.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Budget | YNAB')
@section('content')
  {{-- Main content --}}
  <div id="content" class="ynab-u content">
    <div class="content-min-break has-budget-views">
      <!---->
      <header id="ember15" class="budget-header left-to-budget-is-positive">
        <div class="budget-header-flexbox">
          <div class="budget-header-item budget-header-calendar">
            <button id="prev-month" class="budget-header-calendar-prev " aria-label="previous month budget" type="button">
              <svg class="ynab-new-icon " width="30" height="30">
                <!---->
                <use href="#icon_sprite_chevron_left_circle">
                  <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_chevron_left_circle" fill="none" viewBox="0 0 24 24">
                    <path fill="currentColor"
                      d="M12 24a12 12 0 0 0 12-12c0-6.6-5.5-12-12-12A12 12 0 0 0 0 12a12 12 0 0 0 12 12m0-2A10 10 0 0 1 2 12a10 10 0 1 1 10 10m2.3-4.2a1 1 0 0 0 0-1.2L9.5 12l4.8-4.5a1 1 0 0 0 0-1.3 1 1 0 0 0-1.2 0L8 11c-.6.6-.6 1.7 0 2.3l5 4.6c.3.3 1 .3 1.2 0"></path>
                  </symbol>
                </use>
              </svg>
            </button>
            <div class="budget-header-calendar-date">
              <button class="budget-header-calendar-date-button" type="button">
                <span id="current-date">Jun 2024</span>
                <svg class="ynab-new-icon " width="12" height="12">
                  <!---->
                  <use href="#icon_sprite_caret_down">
                    <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_caret_down" fill="none" viewBox="0 0 24 24">
                      <path fill="currentColor" d="M11 19.5.2 6.1C-.4 5.2.3 4 1.3 4h21.4c1 0 1.7 1.2 1 2L13.1 19.6a1.4 1.4 0 0 1-2.2 0"></path>
                    </symbol>
                  </use>
                </svg>
              </button>
              <button class="budget-header-calendar-note user-data" title="" type="button">
                Enter a note...
              </button>
            </div>
            <button id="next-month" class="budget-header-calendar-next" aria-label="next month budget" type="button">
              <svg class="ynab-new-icon " width="30" height="30">
                <!---->
                <use href="#icon_sprite_chevron_right_circle">
                  <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_chevron_right_circle" fill="none" viewBox="0 0 24 24">
                    <path fill="currentColor"
                      d="M12 .4A12 12 0 0 0 0 12.2a12 12 0 0 0 24 0A12 12 0 0 0 12 .4m0 2A9.8 9.8 0 1 1 12 22a10 10 0 0 1-10-9.8c0-5.5 4.5-9.8 10-9.8m-2.3 4a1 1 0 0 0 0 1.3l4.8 4.5-4.8 4.4a1 1 0 0 0 0 1.3c.3.3.9.3 1.2 0l5-4.6c.6-.6.6-1.7 0-2.3l-5-4.5c-.3-.3-1-.3-1.2 0"></path>
                  </symbol>
                </use>
              </svg>
            </button>
            <!---->
          </div>
          <div class="budget-header-item budget-header-totals ">
            <div class="to-be-budgeted is-positive ">
              <div class="to-be-budgeted-heading-wrapper">
                <h1 id="ember17-heading">
                  <div class="to-be-budgeted-amount">
                    <span class="user-data currency positive"><bdi>$</bdi>3,820,000.00</span>
                    <svg class="ynab-new-icon " width="16" height="16" aria-hidden="true">
                      <!---->
                      <use href="#icon_sprite_info_circle_fill">
                        <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_info_circle_fill" fill="none" viewBox="0 0 24 24">
                          <path fill="currentColor" fill-rule="evenodd"
                            d="M12 24a12 12 0 1 1 0-24 12 12 0 0 1 0 24m.8-16A1.6 1.6 0 0 1 11 6.5 1.6 1.6 0 0 1 12.8 5a1.6 1.6 0 0 1 1.7 1.5A1.6 1.6 0 0 1 12.8 8m.7 3.4L12 16.6c-.2.5.1 1 .6 1.3l.3.4v.2l-.5.5H11a1.5 1.5 0 0 1-1.5-1.9L11 12a1 1 0 0 0-.6-1.3l-.3-.4V10l.5-.5H12a1.5 1.5 0 0 1 1.5 1.9"
                            clip-rule="evenodd"></path>
                        </symbol>
                      </use>
                    </svg>
                  </div>
                  <div class="to-be-budgeted-label">
                    Ready to Assign
                  </div>
                </h1>
                <button class="to-be-budgeted-view-breakdown" aria-label="View Ready to Assign Breakdown" type="button"></button>
              </div>
              <button class="to-be-budgeted-auto-assign to-be-budgeted-button" aria-label="Assign" aria-describedby="ember17-heading" type="button">
                <span class="label">Assign</span>
                <svg class="ynab-new-icon " width="16" height="16" aria-hidden="true">
                  <!---->
                  <use href="#icon_sprite_caret_down">
                    <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_caret_down" fill="none" viewBox="0 0 24 24">
                      <path fill="currentColor" d="M11 19.5.2 6.1C-.4 5.2.3 4 1.3 4h21.4c1 0 1.7 1.2 1 2L13.1 19.6a1.4 1.4 0 0 1-2.2 0"></path>
                    </symbol>
                  </use>
                </svg>
              </button>
            </div>
          </div>
          <div class="budget-header-item budget-header-days budget-header-days">
            <div>
              <div class="budget-header-days-age">8 days</div>
              <div class="budget-header-days-label" title="Keep Age of Money above 30 and congrats, you're following Rule Four!">Age of Money</div>
            </div>
          </div>
        </div>
      </header>
      <section class="budget-view-row">
        <ul class="budget-view-buttons">
          <li class="view-button-item index-0 selected condensed" title="All">
            <button title="All" class="view-button view-button-all selected" type="button">
              <!---->
              All
            </button>
          </li>
          <li class="view-button-item index-1 condensed" title="Underfunded">
            <button title="Underfunded" class="view-button  " type="button">
              <!---->
              Underfunded
            </button>
          </li>
          <li class="view-button-item index-2 condensed" title="Overfunded">
            <button title="Overfunded" class="view-button  " type="button">
              <!---->
              Overfunded
            </button>
          </li>
          <li class="view-button-item index-3 condensed" title="Money Available">
            <button title="Money Available" class="view-button  " type="button">
              <!---->
              Money Available
            </button>
          </li>
          <li class="view-button-item index-4 condensed" title="Snoozed">
            <button title="Snoozed" class="view-button  " type="button">
              <!---->
              Snoozed
            </button>
          </li>
          <li aria-describedby="ember18" class="view-button views-menu-button">
            <button id="miBoton" aria-haspopup="true" aria-label="Views Menu" type="button">
              <svg class="ynab-new-icon views-menu-icon" width="16" height="16">
                <!---->
                <use href="#icon_sprite_filter_circle">
                  <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_filter_circle" fill="none" viewBox="0 0 24 24">
                    <path fill="currentColor"
                      d="M6 8a1 1 0 1 0 0 2h12a1 1 0 1 0 0-2zm1 5c0-.6.5-1 1-1h8c.5 0 1 .4 1 1s-.5 1-1 1H8a1 1 0 0 1-1-1m3 3a1 1 0 0 0-1 .9v.1c0 .5.5 1 1 1h4c.6 0 1-.5 1-1a1 1 0 0 0-1-1z"></path>
                    <path fill="currentColor" fill-rule="evenodd" d="M24 12a12 12 0 1 1-24 0 12 12 0 0 1 24 0m-2 0a10 10 0 1 1-20 0 10 10 0 0 1 20 0"
                      clip-rule="evenodd"></path>
                  </symbol>
                </use>
              </svg>
              <!---->
            </button>
          </li>
        </ul>
      </section>
      <div class="budget-table-and-inspector js-budget-table-and-inspector">
        <section class="budget-table-container is-expanded" role="main">
          <div id="ember19" class="budget-table" role="treegrid">
            <div class="budget-table-header" role="rowgroup">
              <div class="budget-toolbar" role="row">
                <div role="cell">
                  <button class="ghost-button primary type-body budget-toolbar-add-category" aria-describedby="ember20" type="button">
                    <svg class="ynab-new-icon " width="16" height="16">
                      <!---->
                      <use href="#icon_sprite_plus_circle_fill">
                        <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_plus_circle_fill" fill="none" viewBox="0 0 24 24">
                          <path fill="currentColor"
                            d="M12 0a12 12 0 1 0 0 24 12 12 0 0 0 0-24m4.8 13.2h-3.6v3.6c0 .7-.5 1.2-1.2 1.2s-1.2-.5-1.2-1.2v-3.6H7.2c-.7 0-1.2-.5-1.2-1.2s.5-1.2 1.2-1.2h3.6V7.2c0-.7.5-1.2 1.2-1.2s1.2.5 1.2 1.2v3.6h3.6c.7 0 1.2.5 1.2 1.2s-.5 1.2-1.2 1.2"></path>
                        </symbol>
                      </use>
                    </svg>
                    Category Group
                  </button>
                </div>
                <div role="cell">
								<span class="undo-redo-container js-undo-redo-container">
									<button disabled="" class="ghost-button primary type-body undo-button" type="button">
										<svg class="ynab-new-icon " width="12" height="12">
											<!---->
											<use href="#icon_sprite_undo">
												<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_undo" fill="none" viewBox="0 0 24 24">
													<path fill="currentColor" fill-rule="evenodd"
                            d="M12.6 24H3.4a1.1 1.1 0 1 1 0-2.3h9.2a8 8 0 1 0 0-16H6.9v2.9a.6.6 0 0 1-1 .4L.2 5a1 1 0 0 1 0-.9L6 .1a.6.6 0 0 1 1 .5v2.8h5.7a10.3 10.3 0 1 1 0 20.6"
                            clip-rule="evenodd"></path>
												</symbol>
											</use>
										</svg>Undo
									</button>
									<button disabled="" class="ghost-button primary type-body redo-button" type="button">
										<svg class="ynab-new-icon " width="12" height="12">
											<!---->
											<use href="#icon_sprite_redo">
												<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_redo" fill="none" viewBox="0 0 24 24">
													<path fill="currentColor" fill-rule="evenodd"
                            d="M11 21.7h9.2a1.1 1.1 0 1 1 0 2.3H11a10.3 10.3 0 1 1 0-20.6h5.8V.6a.6.6 0 0 1 .9-.5l5.7 4a.6.6 0 0 1 0 1l-5.7 4a.6.6 0 0 1-1-.5V5.7H11a8 8 0 0 0-8 8 8 8 0 0 0 8 8"
                            clip-rule="evenodd"></path>
												</symbol>
											</use>
										</svg>Redo
									</button>
								</span>
                </div>
                <div role="cell">
								<span class="recent-moves-open-modal-container">
									<button class="ghost-button primary type-body budget-toolbar-open-recent-moves" aria-describedby="ember23" type="button">
										<svg class="ynab-new-icon " width="16" height="16">
											<!---->
											<use href="#icon_sprite_clock_arrow_back">
												<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_clock_arrow_back" fill="none" viewBox="0 0 24 24">
													<path fill="currentColor" fill-rule="evenodd"
                            d="m17.2 15.3-4.5-2.1A1 1 0 0 1 12 12l.7-7a1 1 0 0 1 .8-.6 1 1 0 0 1 .7.6l.6 6.3L18 14a1 1 0 0 1 0 1l-.8.2M.5 12h2.4A10.5 10.5 0 0 1 24 12c0 5.8-4.7 10.5-10.6 10.5a11 11 0 0 1-6.7-2.4 1 1 0 0 1 0-1.3 1 1 0 0 1 1.3-.1c3.7 3 9.1 2.4 12.1-1.3a8.6 8.6 0 0 0-1.2-12 8.6 8.6 0 0 0-14 6.7h2.3a.5.5 0 0 1 .4.7l-3.4 4.7a.5.5 0 0 1-.8 0L.1 12.8a.5.5 0 0 1 .4-.8"
                            clip-rule="evenodd"></path>
												</symbol>
											</use>
										</svg>
										<div id="js-recent-moves-title">Recent Moves</div>
									</button>
								</span>
                </div>
                <!---->
                <div role="cell">
                  <div class="segmented-control iconOnlyOption progress-bars-toggle" role="tablist" tabindex="0">
                    <button class="segmented-control-button selected" aria-selected="true" role="tab" tabindex="-1" title="Progress Bars On" aria-label="Progress Bars On"
                      aria-describedby="ember24" type="button">
                      <svg class="ynab-new-icon " width="12" height="12">
                        <!---->
                        <use href="#icon_sprite_progress_bars_on">
                          <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_progress_bars_on" fill="none" viewBox="0 0 24 24">
                            <path fill="currentColor"
                              d="M0 2a2 2 0 0 1 2-2h20a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm0 14a2 2 0 0 1 2-2h20a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2z"></path>
                          </symbol>
                        </use>
                      </svg>
                    </button>
                    <button class="segmented-control-button " aria-selected="false" role="tab" tabindex="-1" title="Progress Bars Off" aria-label="Progress Bars Off"
                      aria-describedby="ember25" type="button">
                      <svg class="ynab-new-icon " width="12" height="12">
                        <!---->
                        <use href="#icon_sprite_progress_bars_off">
                          <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_progress_bars_off" fill="none" viewBox="0 0 24 24">
                            <path fill="currentColor"
                              d="M0 1a1 1 0 0 1 1-1h22a1 1 0 0 1 1 1v3.3a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm0 9.3a1 1 0 0 1 1-1h22a1 1 0 0 1 1 1v3.4a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm0 9.4a1 1 0 0 1 1-1h22a1 1 0 0 1 1 1V23a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1z"></path>
                          </symbol>
                        </use>
                      </svg>
                    </button>
                  </div>
                  <div id="icon_sprite" style="display:block;width:0;height:0;position:absolute;top:0;right:0;overflow:hidden" tabindex="-1">
                    <svg xmlns="http://www.w3.org/2000/svg">
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_archive" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M22 6H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h20a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1m-1 1 .5.5v13A1.5 1.5 0 0 1 20 22H4a1.5 1.5 0 0 1-1.5-1.5v-13L3 7zM9 12h6a1 1 0 0 0 0-2H9a1 1 0 0 0 0 2"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_arrow_down" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M12.8 23.7a1 1 0 0 1-1.6 0L3 15.5a1 1 0 0 1 0-1.6 1 1 0 0 1 1.6 0l6.4 6.4V1c0-.5.4-1 1-1s1.1.5 1.1 1v19.3l6.4-6.4a1 1 0 0 1 1.6 0 1 1 0 0 1 0 1.6z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_arrow_down_to_surface" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M18.9 24H4.2A3 3 0 0 1 1 20.9v-2.1c0-.6.5-1 1-1s1.1.4 1.1 1v2c0 .6.5 1.1 1 1.1H19c.5 0 1-.5 1-1v-2.1c0-.6.5-1 1-1s1.1.4 1.1 1v2A3 3 0 0 1 19 24M11.5 0c.6 0 1 .5 1 1v10.5h2.7a.5.5 0 0 1 .4.8l-3.7 5.2a.5.5 0 0 1-.8 0l-3.7-5.2a.5.5 0 0 1 .4-.8h2.7V1c0-.5.4-1 1-1"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_arrow_from_cloud" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M18.5 16.6h-2.8a1 1 0 1 1 0-1.8h2.7a3.7 3.7 0 0 0 3.8-3.7c0-2.5-2-3.3-3-3.7a1 1 0 0 1-.7-.8v-.5a5 5 0 0 0-4.6-4.3c-2.1 0-3.3 1.3-4 2.2a1 1 0 0 1-1 .3l-1.1-.1A3 3 0 0 0 5 6.9v.6a1 1 0 0 1-.6.8c-1.2.5-2.7 1.2-2.7 3.4a3 3 0 0 0 3.3 3h3.2a1 1 0 1 1 0 2H5.1a5 5 0 0 1-1.9-9.9 4.6 4.6 0 0 1 5.6-4.4 6.5 6.5 0 0 1 11.5 3.4 5.5 5.5 0 0 1-1.8 10.8m-9.7 1.9H11V9.2a1 1 0 0 1 1.8 0v9.3h2.3a.5.5 0 0 1 .4.7l-3.2 4.6a.5.5 0 0 1-.8 0l-3.2-4.6a.5.5 0 0 1 .4-.7"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_arrow_into_rectangle" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M10.3 23.3h10.3a4 4 0 0 0 2.4-1 3 3 0 0 0 1-2.4V4c0-.9-.4-1.7-1-2.4a4 4 0 0 0-2.4-1H10.3a4 4 0 0 0-2.4 1 3 3 0 0 0-1 2.4v3.4l.3.8.8.3.8-.3.4-.8V4.1c0-.3 0-.6.3-.8s.5-.3.8-.3h10.3c.3 0 .6.1.8.3s.3.5.3.8V20c0 .3-.1.6-.3.8s-.5.3-.8.3H10.3c-.3 0-.6-.1-.8-.3l-.3-.8v-3.4l-.4-.8-.8-.3-.8.3-.3.8V20c0 .9.3 1.7 1 2.4a4 4 0 0 0 2.4 1M0 12c0 .3.1.6.3.8s.5.3.8.3h11.5V16l.3.5h.6l5.7-4 .2-.4-.2-.5-5.7-3.9a.6.6 0 0 0-.9.2V11H1l-.8.3z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_arrow_left" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M23 13.2H3.6L10 20c.4.4.4 1.2 0 1.7a1 1 0 0 1-1.6 0L.3 12.8a1 1 0 0 1 0-1.6l8.2-8.8a1 1 0 0 1 1.6 0A1 1 0 0 1 10 4l-6.4 6.8H23c.6 0 1.1.6 1.1 1.2s-.5 1.2-1 1.2"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_arrow_out_of_box" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M23 9.3a1 1 0 0 1-1.2-1.1V3.7l-9 9a1 1 0 0 1-1.6-1.5l9.1-9h-4.5a1 1 0 1 1 0-2.2H23a1 1 0 0 1 1 1v7.2c0 .6-.5 1-1 1M9.7 6.6H3.3a1 1 0 0 0-1.1 1.1v13.1c0 .6.5 1.1 1 1.1h13.2c.6 0 1-.5 1-1v-6.6a1 1 0 0 1 2.2 0v6.5a3.3 3.3 0 0 1-3.2 3.3H3.3A3.3 3.3 0 0 1 0 20.7v-13a3.3 3.3 0 0 1 3.3-3.3h6.5a1 1 0 0 1 0 2.1"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_arrow_right" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M1 10.8h19.3L13.9 4a1.2 1.2 0 0 1 0-1.7 1 1 0 0 1 1.6 0l8.2 8.9a1 1 0 0 1 0 1.6l-8.2 8.9a1 1 0 0 1-1.6 0 1.2 1.2 0 0 1 0-1.7l6.4-6.8H1c-.5 0-1-.6-1-1.2s.5-1.2 1-1.2"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_arrow_right_alt" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M13.8 20.8a1 1 0 0 1-1.2.1l-.4-.4-.2-.6v-4.2H1l-.7-.3-.3-.7V9.4c0-.3.1-.6.3-.8s.5-.3.8-.3H12V4.1a1 1 0 0 1 .6-1 1 1 0 0 1 1.2.1l9.8 8q.2.1.3.4a1 1 0 0 1-.3 1.2z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_arrows_circle_fill" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M10.5 15v-2.5a.5.5 0 0 0-.8-.4l-5 3.5a.5.5 0 0 0 0 .8l5 3.5a.5.5 0 0 0 .8-.4V17h11.8a.4.4 0 0 1 .3.6A12 12 0 0 1 0 12c0-.8.1-1.7.3-2.5L.9 9h12.6v2.5a.5.5 0 0 0 .8.4l5-3.5a.5.5 0 0 0 0-.8l-5-3.5a.5.5 0 0 0-.8.4V7H1.7a.4.4 0 0 1-.3-.6A12 12 0 0 1 24 12l-.3 2.5-.6.5z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_arrows_horizontal" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="M.6 7.3c.3.4.8.6 1.3.6h12.5v2.6c0 .5.3 1 .9 1.3s1.1.3 1.6 0l1.4-1 5-3.5a1.5 1.5 0 0 0 0-2.6L17 .3a2 2 0 0 0-1.6-.1c-.6.2-.9.8-.9 1.3v2.6H2c-.5 0-1 .2-1.3.6a2 2 0 0 0 0 2.6m22.8 12a2 2 0 0 1-1.3.6H9.6v2.6c0 .5-.3 1-.9 1.3a2 2 0 0 1-1.6 0l-2.2-1.6-4.2-3A2 2 0 0 1 0 18c0-.5.3-1 .7-1.3L4.8 14l2.3-1.6a2 2 0 0 1 1.6-.1c.6.2.9.8.9 1.3v2.6H22c.5 0 1 .2 1.3.6s.6.8.6 1.3-.2 1-.6 1.3"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_arrows_split" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M1 10.5v3l.4.3h5.8s2.7 2.7 5.5 4.5c2 1.3 4.3 2.3 4.3 2.3v2.2c0 .2.2.3.4.1l5.5-4c.1 0 .1-.3 0-.4l-5.5-4c-.2-.1-.4 0-.4.2v2.2s-1.6-.5-3.7-1.8c-2-1.3-3.7-3.1-3.7-3.1s1.8-2 3.7-3.1C15.8 7.3 17 7 17 7v2.2c0 .2.2.3.4.2l5.5-4V5l-5.5-4c-.2 0-.4 0-.4.2v2.2s-2.5 1.1-4.3 2.3a47 47 0 0 0-5.5 4.5H1.4z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_arrows_vertical" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="M7.3 23.4c.4-.3.6-.8.6-1.3V9.6h2.6c.5 0 1-.3 1.3-.9a2 2 0 0 0 0-1.6l-1-1.4-3.5-5A2 2 0 0 0 6 0c-.5 0-1 .3-1.3.7L.3 7a2 2 0 0 0-.1 1.6c.2.6.8.9 1.3.9h2.6V22c0 .5.2 1 .6 1.3s.8.6 1.3.6 1-.2 1.3-.6M19.3.6c.4.3.6.8.6 1.3v12.5h2.6c.5 0 1 .3 1.3.9s.3 1.1 0 1.6l-4.5 6.4a1.5 1.5 0 0 1-2.6 0L14 19.2l-1.6-2.3a2 2 0 0 1-.1-1.6c.2-.6.8-.9 1.3-.9h2.6V2c0-.5.2-1 .6-1.3a2 2 0 0 1 2.6 0"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_arrow_up" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="m19.5 10-6.4-6.3V23a1.1 1.1 0 0 1-2.2 0V3.7l-6.4 6.4a1 1 0 0 1-1.6 0 1 1 0 0 1 0-1.6L11.2.3a1 1 0 0 1 1.6 0L21 8.5a1 1 0 0 1 0 1.6 1 1 0 0 1-1.6 0"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_bank" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M11.5.1a1 1 0 0 1 1 0L23.6 7c.3.2.4.4.4.7v.9l-.5.5H22l-.5.5v10l.2.5 2 1.2c.2.1.3.4.3.6v1.7l-.5.5H.5l-.5-.5v-1.7c0-.2.1-.5.4-.6L2.3 20l.2-.4V9.5L2 9H.5L0 8.5v-1c0-.2.1-.4.4-.6zM16 19.5l.5.5h2l.5-.5v-10l-.5-.5h-2l-.5.5zm-5.5 0 .5.5h2l.5-.5v-10L13 9h-2l-.5.5zm1.5-13a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3m-7 13 .5.5h2l.5-.5v-10L7.5 9h-2l-.5.5z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_bar_chart" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="M2.4 9.6a1.2 1.2 0 0 1 1.2-1.2H6a1.2 1.2 0 0 1 1.2 1.2V18A1.2 1.2 0 0 1 6 19.2H3.6A1.2 1.2 0 0 1 2.4 18zm7.2-8.4A1.2 1.2 0 0 1 10.8 0h2.4a1.2 1.2 0 0 1 1.2 1.2V18a1.2 1.2 0 0 1-1.2 1.2h-2.4A1.2 1.2 0 0 1 9.6 18zM16.8 6A1.2 1.2 0 0 1 18 4.8h2.4A1.2 1.2 0 0 1 21.6 6v12a1.2 1.2 0 0 1-1.2 1.2H18a1.2 1.2 0 0 1-1.2-1.2zM0 22.8a1.2 1.2 0 0 1 1.2-1.2h21.6a1.2 1.2 0 0 1 0 2.4H1.2A1.2 1.2 0 0 1 0 22.8"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_book" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M10.5 22a13 13 0 0 0-6.1-1.6 14 14 0 0 0-3.6.5.6.6 0 0 1-.8-.5V3.2c0-.3.2-.5.4-.6A13 13 0 0 1 11.2 4q.3.2.3.6v16.9a.7.7 0 0 1-1 .5M24 3.2v17.2a.6.6 0 0 1-.8.5 14 14 0 0 0-3.6-.5 13 13 0 0 0-6.1 1.5.6.6 0 0 1-.9-.2V4.4l.2-.5A13 13 0 0 1 19.6 2a14 14 0 0 1 4 .6c.2.1.4.3.4.6"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_calculator" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M2 2.5A2.5 2.5 0 0 1 4.5 0h15A2.5 2.5 0 0 1 22 2.5v19a2.5 2.5 0 0 1-2.5 2.5h-15A2.5 2.5 0 0 1 2 21.5zm14 19 .5.5h3l.5-.5v-7l-.5-.5h-3l-.5.5zm0-10 .5.5h3l.5-.5v-2l-.5-.5h-3l-.5.5zm-6 10 .5.5h3l.5-.5v-2l-.5-.5h-3l-.5.5zm0-5 .5.5h3l.5-.5v-2l-.5-.5h-3l-.5.5zm0-5 .5.5h3l.5-.5v-2l-.5-.5h-3l-.5.5zm-6 10 .5.5h3l.5-.5v-2l-.5-.5h-3l-.5.5zm0-5 .5.5h3l.5-.5v-2l-.5-.5h-3l-.5.5zm0-5 .5.5h3l.5-.5v-2L7.5 9h-3l-.5.5zm0-5 .5.5h15l.5-.5v-4l-.5-.5h-15l-.5.5z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_calendar" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M7.6 1v2.1c0 .3 0 .6-.3.8l-.8.3-.7-.3-.3-.9V1c0-.3 0-.6.3-.8l.7-.3c.2 0 .6.1.8.3s.3.5.3.7M24 4.2v17.7q0 .9-.6 1.5c-.6.6-1 .6-1.6.6H2.2c-.6 0-1.2-.2-1.6-.6a2 2 0 0 1-.6-1.5V4.2q0-.9.6-1.5c.6-.6 1-.6 1.6-.6h1.6l.4.1.2.4V3c0 .6.1 1 .5 1.5s.9.6 1.4.7A2 2 0 0 0 8 4.7l.5-.7.2-.9v-.5l.2-.4.4-.1h5.4l.4.1.2.4V3c0 .6.2 1 .5 1.5.4.4.9.6 1.4.7a2 2 0 0 0 1.7-.5 2 2 0 0 0 .7-1.6v-.5l.2-.4.4-.1h1.6c.6 0 1.2.2 1.6.6s.6 1 .6 1.5m-2.7 6.2H2.7l-.4.2-.1.4v10.4l.1.4.4.1h18.6l.4-.1.1-.4V11l-.1-.4zM17.5 0c.2 0 .5.1.7.3s.3.5.3.7v2.1c0 .3 0 .6-.3.8l-.7.3c-.3 0-.6-.1-.8-.3l-.3-.8v-2c0-.3 0-.6.3-.8s.5-.3.8-.3"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_calendar_date" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" d="m12 12.7.1-.2h5.2s.2 0 .2.2v5H12z"></path>
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M21.8 24H2.2c-.6 0-1.2-.2-1.6-.6a2 2 0 0 1-.6-1.5V4.2q0-.9.6-1.5c.6-.6 1-.6 1.6-.6h1.6l.4.1.2.4V3c0 .6.1 1 .5 1.5s.9.6 1.4.7A2 2 0 0 0 8 4.7l.5-.7.2-.9v-.5l.2-.4.4-.1h5.4l.4.1.2.4V3c0 .6.2 1 .5 1.5.4.4.9.6 1.4.7a2 2 0 0 0 1.7-.5l.5-.7.2-.9v-.5l.2-.4.4-.1h1.6c.6 0 1.2.2 1.6.6s.6 1 .6 1.5v17.7a2 2 0 0 1-.6 1.5l-.7.4zm0-15.1-.1-.4-.4-.2H2.7l-.4.2-.1.4v12.5l.1.4.4.1h18.6l.4-.1.1-.4zm-4.3-4.7c-.3 0-.6-.1-.8-.3l-.3-.8v-2c0-.3 0-.6.3-.8s.5-.3.8-.3.5.1.7.3.3.5.3.7v2.1c0 .3 0 .6-.3.8zm-11 0-.7-.3-.3-.9V1c0-.3 0-.6.3-.8l.7-.3c.2 0 .6.1.8.3s.3.5.3.7V3l-.3.8z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_calendar_month" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M21.8 24H2.2c-.6 0-1.2-.2-1.6-.6a2 2 0 0 1-.6-1.5V4.2q0-.9.6-1.5c.6-.6 1-.6 1.6-.6h1.6l.4.1.2.4V3c0 .6.1 1 .5 1.5s.9.6 1.4.7A2 2 0 0 0 8 4.7l.5-.7.2-.9v-.5l.2-.4.4-.1h5.4l.4.1.2.4V3c0 .6.2 1 .5 1.5.4.4.9.6 1.4.7a2 2 0 0 0 1.7-.5l.5-.7.2-.9v-.5l.2-.4.4-.1h1.6c.6 0 1.2.2 1.6.6s.6 1 .6 1.5v17.7a2 2 0 0 1-.6 1.5l-.7.4zm0-15.1-.1-.4-.4-.2H2.7l-.4.2-.1.4v12.5l.1.4.4.1h18.6l.4-.1.1-.4zm-4.3-4.7c-.3 0-.6-.1-.8-.3l-.3-.8v-2c0-.3 0-.6.3-.8s.5-.3.8-.3.5.1.7.3.3.5.3.7v2.1c0 .3 0 .6-.3.8zm-11 0-.7-.3-.3-.9V1c0-.3 0-.6.3-.8l.7-.3c.2 0 .6.1.8.3s.3.5.3.7V3l-.3.8z"
                          clip-rule="evenodd"></path>
                        <path fill="currentColor" d="M3.3 9.5h17.3l.1.1v11.3H3.2z"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_calendar_week" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M3.3 10v-.2h17.3l.1.1V13H3.2z"></path>
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M21.8 24H2.2c-.6 0-1.2-.2-1.6-.6a2 2 0 0 1-.6-1.5V4.2q0-.9.6-1.5c.6-.6 1-.6 1.6-.6h1.6l.4.1.2.4V3c0 .6.1 1 .5 1.5s.9.6 1.4.7A2 2 0 0 0 8 4.7l.5-.7.2-.9v-.5l.2-.4.4-.1h5.4l.4.1.2.4V3c0 .6.2 1 .5 1.5.4.4.9.6 1.4.7a2 2 0 0 0 1.7-.5l.5-.7.2-.9v-.5l.2-.4.4-.1h1.6c.6 0 1.2.2 1.6.6s.6 1 .6 1.5v17.7a2 2 0 0 1-.6 1.5l-.7.4zm0-15.1-.1-.4-.4-.2H2.7l-.4.2-.1.4v12.5l.1.4.4.1h18.6l.4-.1.1-.4zm-4.3-4.7c-.3 0-.6-.1-.8-.3l-.3-.8v-2c0-.3 0-.6.3-.8s.5-.3.8-.3.5.1.7.3.3.5.3.7v2.1c0 .3 0 .6-.3.8zm-11 0-.7-.3-.3-.9V1c0-.3 0-.6.3-.8l.7-.3c.2 0 .6.1.8.3s.3.5.3.7V3l-.3.8z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_caret_down" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M11 19.5.2 6.1C-.4 5.2.3 4 1.3 4h21.4c1 0 1.7 1.2 1 2L13.1 19.6a1.4 1.4 0 0 1-2.2 0"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_caret_left" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M4.5 11 18 .2c.9-.7 2.1 0 2.1 1v21.4c0 1-1.2 1.7-2 1L4.4 13.1a1.4 1.4 0 0 1 0-2.2"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_caret_right" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M19.5 13 6.1 23.8c-.9.7-2.1 0-2.1-1V1.3c0-1 1.2-1.7 2-1l13.5 10.6a1.4 1.4 0 0 1 0 2.2"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_caret_up" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M13 4.5 23.8 18c.7.9 0 2.1-1 2.1H1.3c-1 0-1.7-1.2-1-2L10.9 4.4a1.4 1.4 0 0 1 2.2 0"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_cash" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M23 19H1a1 1 0 0 1-1-1V6c0-.6.4-1 1-1h22c.6 0 1 .4 1 1v12a1 1 0 0 1-1 1m-.8-9.3a3 3 0 0 1-2.8-2.8H4.6c0 1.5-1.2 2.8-2.8 2.8v5.1c1.4 0 2.6 1 2.8 2.3h14.8a3 3 0 0 1 2.8-2.3zm-10.2 6c-1.7 0-2.8-1.4-2.8-3.7s1.1-3.7 2.8-3.7 2.8 1.4 2.8 3.7-1.1 3.7-2.8 3.7"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_cash_in_envelope" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M20.5 10H3V8.4c0-.2 0-.3.2-.4l.6-.3H20c.2 0 .4 0 .6.3l.2.4v1.5zM5 6.5l-.3-.2v-.8l.1-.6.3-.2.3-.1h13.5l.3.3.2.6V6l-.1.3-.3.2zm2-3-.2-.2V2.2l.3-.2h10.3l.2.2.2.5v.4l-.1.2-.2.1zM14.2 15c.2.3.3.7.3 1v1.7l-.2.3-.3.1h-4l-.3-.1-.2-.3V16a2 2 0 0 1 .6-1.4c.5-.4 1.2-.7 1.9-.7a3 3 0 0 1 2.2 1.1"
                          clip-rule="evenodd"></path>
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M21.7 10.4v7l-.3.5-.5.2H20l-.6-.2-.2-.5V14l-.1-.1a2 2 0 0 1-1.5-.6 2 2 0 0 1-.7-1.5.1.1 0 0 0-.2-.1H7.2L7 12a2 2 0 0 1-.8 1.5c-.4.4-1 .6-1.6.6v3.4l-.2.5-.6.2H3l-.5-.2-.3-.5v-7.1l.3-.5.5-.2h17.6l.6.2c.2.1.3.3.4.6M24 20.9v1.7l-.1.3-.3.1H.6l-.4-.2-.2-.4v-2.7l.2-.4.5-.2h1l.5.2.2.5v.6h19.2v-.6l.2-.5.5-.2h1c.2 0 .4 0 .5.2l.2.5z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_cash_in_envelope_alt" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M12 12.7c-1.5 0-2.4-1.3-2.4-3.2v-.8l.1-.3.3-.2h4c.1 0 .2 0 .3.2l.1.3v.8c0 2-1 3.2-2.4 3.2M3.6 8.3h1.1l.1.4v3.2q.9 0 1.5.6c.5.4.8.9.9 1.4h9.6a2 2 0 0 1 .9-1.4 2 2 0 0 1 1.5-.6V8.7l.1-.3.3-.2h.8c.1 0 .2 0 .3.2l.1.3v6l-.2.6-.6.3H4l-.6-.3-.2-.6v-6l.1-.3zm.8 8.2h15.5l.1.4v.4l-.2.6-.6.2H4.8l-.6-.2-.2-.6v-.4l.1-.3z"
                          clip-rule="evenodd"></path>
                        <path fill="currentColor" d="M22.8 9.9h.8l.3-.1.1-.3V5.8l-.2-.6-.6-.2H.8l-.6.2-.2.6v3.7l.1.3h1.4l.1-.3V6.6h20.8v2.9l.1.3z"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_check" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="m7.4 17.6-5-5a1.4 1.4 0 0 0-2 0 1.4 1.4 0 0 0 0 2l6 6a1.4 1.4 0 0 0 2 0L23.6 5.4a1.4 1.4 0 0 0 0-2 1.4 1.4 0 0 0-2 0z"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_check_circle" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd" d="M24 12a12 12 0 1 1-24 0 12 12 0 0 1 24 0m-1.8 0a10.2 10.2 0 1 1-20.4 0 10.2 10.2 0 0 1 20.4 0"
                          clip-rule="evenodd"></path>
                        <path fill="currentColor"
                          d="M8.3 17.5 4 13.2a1.2 1.2 0 0 1 0-1.7 1 1 0 0 1 1.6 0L9.1 15l8-8.3a1 1 0 0 1 1.7 0 1.2 1.2 0 0 1 0 1.7l-8.9 9.1a1 1 0 0 1-1.6 0"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_check_circle_fill" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="M12 0a12 12 0 1 0 0 24 12 12 0 0 0 0-24M8.7 17.1l-4.3-4.3a1.2 1.2 0 0 1 0-1.7 1.2 1.2 0 0 1 1.7 0l3.5 3.5 8.3-8.3a1 1 0 0 1 1.6 0 1.2 1.2 0 0 1 0 1.7l-9 9.1a1.2 1.2 0 0 1-1.8 0"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_checkmark_circle_multiple_fill" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M0 10.5a10.5 10.5 0 1 1 21 0 10.5 10.5 0 0 1-21 0m3.9.7L7.6 15a1 1 0 0 0 1.5 0l8-8a1 1 0 1 0-1.5-1.5l-7.2 7.2-3-3a1 1 0 1 0-1.5 1.5"
                          clip-rule="evenodd"></path>
                        <path fill="currentColor" d="M22.7 10.5c0 6.7-5.5 12.2-12.2 12.2q-1.3 0-2.5-.3A10.5 10.5 0 0 0 22.4 8q.3 1.2.3 2.5"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_checkmark_inbox" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" d="m7.2 11 3.3 3.3q.4.4.8 0l5.5-5.5q.4-.4 0-.9l-.7-.7q-.4-.4-.8 0l-4.4 4.4-2.2-2.2q-.4-.4-.8 0l-.7.8q-.4.4 0 .8"></path>
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M4.3 22h15.4a2.3 2.3 0 0 0 2.3-2.3V15L20.3 4a2.3 2.3 0 0 0-2.2-2H5.8c-1.1 0-2 .8-2.2 2L2 15v4.7A2.3 2.3 0 0 0 4.3 22M18.6 4.2l1.5 11-.5.4h-3.2l-.4.3-.7 2.2-.4.3H9l-.4-.3-.7-2.2-.4-.3H4.4l-.5-.5L5.4 4.2l.4-.4h12.4c.2 0 .4.2.4.4"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_chevron_down" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M13 18.7a1.4 1.4 0 0 1-2 0L.4 7.4a2 2 0 0 1 0-2 1.4 1.4 0 0 1 2 0l9.6 10 9.6-10.2a1.4 1.4 0 0 1 2 0 2 2 0 0 1 0 2.1z" clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_chevron_down_circle_fill" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M0 12a12 12 0 1 1 24 0 12 12 0 0 1-24 0m12.7 4.7 5.5-5.5a1 1 0 0 0-1.4-1.4L12 14.6 7.2 9.8a1 1 0 0 0-1.4 1.4l5.5 5.5a1 1 0 0 0 1.4 0"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_chevron_left" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M18.7 23.6a2 2 0 0 1-2.1 0L5.3 13a1.4 1.4 0 0 1 0-2L16.6.4a2 2 0 0 1 2 0c.7.6.7 1.5 0 2L8.6 12l10.2 9.6c.6.5.6 1.4 0 2"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_chevron_left_circle" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="M12 24a12 12 0 0 0 12-12c0-6.6-5.5-12-12-12A12 12 0 0 0 0 12a12 12 0 0 0 12 12m0-2A10 10 0 0 1 2 12a10 10 0 1 1 10 10m2.3-4.2a1 1 0 0 0 0-1.2L9.5 12l4.8-4.5a1 1 0 0 0 0-1.3 1 1 0 0 0-1.2 0L8 11c-.6.6-.6 1.7 0 2.3l5 4.6c.3.3 1 .3 1.2 0"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_chevron_left_circle_fill" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M12 0a12 12 0 1 1 0 24 12 12 0 0 1 0-24M7.3 12.7l5.5 5.5a1 1 0 1 0 1.4-1.4L9.4 12l4.8-4.8a1 1 0 0 0-1.4-1.4l-5.5 5.5a1 1 0 0 0 0 1.4"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_chevron_right" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M7.4 23.6a1.5 1.5 0 0 1-2 0 1.4 1.4 0 0 1 0-2l10-9.6-10-9.6a1.4 1.4 0 0 1 0-2 1.5 1.5 0 0 1 2 0L18.6 11c.5.6.5 1.4 0 2z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_chevron_right_circle" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="M12 .4A12 12 0 0 0 0 12.2a12 12 0 0 0 24 0A12 12 0 0 0 12 .4m0 2A9.8 9.8 0 1 1 12 22a10 10 0 0 1-10-9.8c0-5.5 4.5-9.8 10-9.8m-2.3 4a1 1 0 0 0 0 1.3l4.8 4.5-4.8 4.4a1 1 0 0 0 0 1.3c.3.3.9.3 1.2 0l5-4.6c.6-.6.6-1.7 0-2.3l-5-4.5c-.3-.3-1-.3-1.2 0"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_chevron_right_circle_fill" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M12 24a12 12 0 1 1 0-24 12 12 0 0 1 0 24m4.7-12.7-5.5-5.5a1 1 0 0 0-1.4 1.4l4.8 4.8-4.8 4.8a1 1 0 1 0 1.4 1.4l5.5-5.5a1 1 0 0 0 0-1.4"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_chevron_up" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M21.6 18.7 12 8.5 2.4 18.7a1.4 1.4 0 0 1-2 0 2 2 0 0 1 0-2.1L11 5.3a1.4 1.4 0 0 1 2 0l10.6 11.3a2 2 0 0 1 0 2.1 1.4 1.4 0 0 1-2 0"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_chevron_up_circle_fill" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M24 12a12 12 0 1 1-24 0 12 12 0 0 1 24 0M11.3 7.3l-5.5 5.5a1 1 0 0 0 1.4 1.4L12 9.4l4.8 4.8a1 1 0 0 0 1.4-1.4l-5.5-5.5a1 1 0 0 0-1.4 0"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_circle" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="M12 24a12 12 0 0 0 12-12c0-6.6-5.5-12-12-12A12 12 0 0 0 0 12a12 12 0 0 0 12 12m0-2A10 10 0 0 1 2 12a10 10 0 1 1 10 10"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_circle_fill" fill="none" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="12" fill="currentColor"></circle>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_circle_small_fill" fill="none" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="9" fill="currentColor"></circle>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_cleared_circle" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="M9.9 14.1q.9.9 2.1.9 1.4 0 2.2-1l1-.5q.6 0 1.1.4t.5 1-.3 1Q14.7 18 12 18q-2.5 0-4.2-1.8T6 12t1.8-4.2T12 6q2.7 0 4.5 2 .4.5.3 1 0 .7-.5 1.1a1 1 0 0 1-1 .4l-1.1-.5q-.8-1-2.2-1-1.2 0-2.1.9T9 12t.9 2.1"></path>
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M12 0q5 0 8.5 3.5T24 12t-3.5 8.5T12 24t-8.5-3.5T0 12t3.5-8.5T12 0m0 2c2.8 0 5.1 1 7 3 2 1.9 3 4.2 3 7s-1 5.1-3 7c-1.9 2-4.2 3-7 3s-5.1-1-7-3c-2-1.9-3-4.2-3-7s1-5.1 3-7c1.9-2 4.2-3 7-3"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_cleared_circle_fill" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M12 0q5 0 8.5 3.5T24 12t-3.5 8.5T12 24t-8.5-3.5T0 12t3.5-8.5T12 0m0 15q-1.2 0-2.1-.9T9 12t.9-2.1T12 9q1.4 0 2.2 1 .4.5 1 .5t1.1-.4.5-1a1 1 0 0 0-.3-1Q14.7 6 12 6 9.5 6 7.8 7.8T6 12t1.8 4.2T12 18q2.7 0 4.5-2 .4-.5.3-1l-.5-1.1a1 1 0 0 0-1-.4q-.7 0-1.1.5-.8 1-2.2 1"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_clock" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M12 24a12 12 0 1 1 0-24 12 12 0 0 1 0 24m4.7-9.8-3.3-3-.6-6.5a.8.8 0 0 0-1.5 0l-.8 7.3a1 1 0 0 0 .7 1.2l4.8 2.2a.7.7 0 0 0 .7-1.2"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_clock_arrow_back" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="m17.2 15.3-4.5-2.1A1 1 0 0 1 12 12l.7-7a1 1 0 0 1 .8-.6 1 1 0 0 1 .7.6l.6 6.3L18 14a1 1 0 0 1 0 1l-.8.2M.5 12h2.4A10.5 10.5 0 0 1 24 12c0 5.8-4.7 10.5-10.6 10.5a11 11 0 0 1-6.7-2.4 1 1 0 0 1 0-1.3 1 1 0 0 1 1.3-.1c3.7 3 9.1 2.4 12.1-1.3a8.6 8.6 0 0 0-1.2-12 8.6 8.6 0 0 0-14 6.7h2.3a.5.5 0 0 1 .4.7l-3.4 4.7a.5.5 0 0 1-.8 0L.1 12.8a.5.5 0 0 1 .4-.8"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_close" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M22.5 22.5a1.4 1.4 0 0 1-2 0L12 13.9l-8.6 8.6a1.4 1.4 0 0 1-1.9-2l8.6-8.5-8.6-8.5a1.4 1.4 0 0 1 2-2l8.5 8.6 8.5-8.6a1.4 1.4 0 1 1 2 2L13.9 12l8.6 8.6a1.4 1.4 0 0 1 0 1.9"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_close_circle" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M12 24a12 12 0 1 1 0-24 12 12 0 0 1 0 24m0-22a10 10 0 1 0 0 20 10 10 0 0 0 0-20m1.4 10 3.8 3.8a1 1 0 0 1-1.4 1.4L12 13.4l-3.8 3.8a1 1 0 0 1-1.4-1.4l3.8-3.8-3.8-3.8a1 1 0 0 1 1.4-1.4l3.8 3.8 3.8-3.8a1 1 0 0 1 1.4 1.4z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_close_circle_fill" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="M12 0a12 12 0 1 0 0 24 12 12 0 0 0 0-24m5.2 17.2a1.2 1.2 0 0 1-1.7 0L12 13.7l-3.5 3.5a1.2 1.2 0 0 1-1.7 0 1.2 1.2 0 0 1 0-1.7l3.5-3.5-3.5-3.5a1.2 1.2 0 0 1 0-1.7 1.2 1.2 0 0 1 1.7 0l3.5 3.5 3.5-3.5a1.2 1.2 0 0 1 1.7 0 1.2 1.2 0 0 1 0 1.7L13.7 12l3.5 3.5c.4.4.4 1.2 0 1.7"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_credit_card" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M22 21H2a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h20a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2M3 16.5l.5.5h2l.5-.5v-1l-.5-.5h-2l-.5.5zm4-7L6.5 9h-4l-.5.5v3l.5.5h4l.5-.5zm4 6-.5-.5h-2l-.5.5v1l.5.5h2l.5-.5zm5 0-.5-.5h-2l-.5.5v1l.5.5h2l.5-.5zm5 0-.5-.5h-2l-.5.5v1l.5.5h2l.5-.5z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_credit_card_exclamation_mark" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="M20.1 20c-.3.1-.7.3-1.1.3a2 2 0 0 1-1.4-.7 2 2 0 0 1-.2-2.7c.2-.3.5-.6.8-.7l1.2-.2c.4.1.7.3 1 .6s.5.7.6 1.1l-.2 1.2c-.1.4-.4.8-.7 1M17.7.4h2.9l.2.2.2.2v.3l-.6 12.1-.2.5-.5.2h-1.4l-.5-.2-.2-.5-.6-12 .2-.6.2-.2z"></path>
                        <path fill="currentColor"
                          d="M16.8 14.7q.1.2.4.3c-.5.3-.9.7-1.1 1.2a4 4 0 0 0 .4 4.5 3.4 3.4 0 0 0 4.5.4 4 4 0 0 0 1.2-1.6 4 4 0 0 0 .2-2 4 4 0 0 0-.9-1.9l-.7-.5.4-.4c.4-.4.7-.9.7-1.4V12l.1-.2v-.7l.3-5.7a2 2 0 0 1 1.7 2v13.9c0 .5-.2 1-.6 1.4a2 2 0 0 1-1.4.6H2a2 2 0 0 1-1.4-.6 2 2 0 0 1-.6-1.4v-14c0-.5.2-1 .6-1.4A2 2 0 0 1 2 5.3h13.7l.2 4H2.5l-.5.5v2l.5.5h13.6v1c0 .5.3 1 .7 1.4"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_credit_card_exclamation_mark_small" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="M15.4 0H19c.5 0 .8.3.8.9L19 15.4c0 .5-.4.9-.7.9h-2c-.4 0-.8-.4-.8-.9L14.6 1c0-.6.3-.9.8-.9m4.3 21.4a2.6 2.6 0 1 1-5.1 0 2.6 2.6 0 0 1 5.1 0M12.5 9.8H3.1c-.7 0-1.4-.7-1.4-1.6 0-.7.7-1.3 1.4-1.3h9V5H1.8C1 5.1 0 6 0 7v10c0 1 .9 2 1.7 2h11l.8-1.2c-.3-.6-.6-1.2-.6-2.1zM22.1 5h.2c.7.1 1.7 1 1.7 2v10c0 .9-.9 1.8-1.7 1.8h-.7c-.3-.6-.7-.9-1-1.2a3 3 0 0 0 .8-2.1l.4-6.3c.3-.2.5-.7.5-1l-.2-.7-.2-.2z"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_document" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="m14.5 7-.5-.5V1.2a.5.5 0 0 1 .9-.3L20 6a.5.5 0 0 1-.3.9zM21 9.5v13a1.5 1.5 0 0 1-1.5 1.5h-15A1.5 1.5 0 0 1 3 22.5v-21A1.5 1.5 0 0 1 4.5 0h7A1.5 1.5 0 0 1 13 1.5v5A1.5 1.5 0 0 0 14.5 8h5A1.5 1.5 0 0 1 21 9.5"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_document_on_document_fill" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M15.5 24h-13A1.5 1.5 0 0 1 1 22.5v-17A1.5 1.5 0 0 1 2.5 4H6v14.5A2.5 2.5 0 0 0 8.5 21H17v1.5a1.5 1.5 0 0 1-1.5 1.5m1-17-.5-.5V1.2a.5.5 0 0 1 .9-.3L22 6a.5.5 0 0 1-.3.9zM23 9.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 7 18.5v-17A1.5 1.5 0 0 1 8.5 0h5A1.5 1.5 0 0 1 15 1.5v5A1.5 1.5 0 0 0 16.5 8h5A1.5 1.5 0 0 1 23 9.5"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_document_with_arrow_down" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M21 9.5A1.5 1.5 0 0 0 19.5 8h-5A1.5 1.5 0 0 1 13 6.5v-5A1.5 1.5 0 0 0 11.5 0h-7A1.5 1.5 0 0 0 3 1.5v21A1.5 1.5 0 0 0 4.5 24h15a1.5 1.5 0 0 0 1.5-1.5zm-9.8 7.2h-2a.4.4 0 0 0-.1.6l2.6 4v.1a.4.4 0 0 0 .6 0l2.6-4 .1-.3c0-.2-.2-.4-.4-.4h-1.9v-6.4c0-.4-.3-.8-.7-.8s-.8.4-.8.8z"
                          clip-rule="evenodd"></path>
                        <path fill="currentColor" d="m14 6.5.5.5h5.3a.5.5 0 0 0 .3-.9L15 1a.5.5 0 0 0-.9.3z"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_document_with_arrow_up" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="M21 9.5A1.5 1.5 0 0 0 19.5 8h-5A1.5 1.5 0 0 1 13 6.5v-5A1.5 1.5 0 0 0 11.5 0h-7A1.5 1.5 0 0 0 3 1.5v21A1.5 1.5 0 0 0 4.5 24h6.8v-7.2h-2c-.1 0-.3-.2-.3-.4v-.2l2.7-4a.4.4 0 0 1 .6 0l2.6 4 .1.2-.2.3-.2.1h-1.8V24h6.7a1.5 1.5 0 0 0 1.5-1.5z"></path>
                        <path fill="currentColor" d="m14 6.5.5.5h5.3a.5.5 0 0 0 .3-.9L15 1a.5.5 0 0 0-.9.3z"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_drag_handle" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="M.9 6.8h22.2c.5 0 .9-.4.9-1a1 1 0 0 0-1-.8H1a1 1 0 0 0-.9.9c0 .5.4.9.9.9m0 5h22.2c.5 0 .9-.3.9-.8a1 1 0 0 0-1-.9H1a1 1 0 0 0-.9.9c0 .5.4.9.9.9M1 17h22.2a1 1 0 0 0 .9-.9c0-.5-.4-.9-1-.9H1a1 1 0 0 0-.9.9c0 .5.4.9.9.9"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_envelope" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M22.5 3h-21A1.5 1.5 0 0 0 0 4.5v1.1c0 .5.2 1 .6 1.2l10.5 7.9c.5.4 1.3.4 1.8 0l10.5-7.9a2 2 0 0 0 .6-1.2V4.5A1.5 1.5 0 0 0 22.5 3m1 5-10 7.5a3 3 0 0 1-3 0L.5 8.1a.4.4 0 0 0-.5.3v11.1A1.5 1.5 0 0 0 1.5 21h21a1.5 1.5 0 0 0 1.5-1.5V8.4a.4.4 0 0 0-.6-.3"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_equals" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="M1.1 7.1c0-.8.7-1.5 1.5-1.5h18.8c.8 0 1.5.7 1.5 1.5s-.7 1.5-1.5 1.5H2.6c-.8 0-1.5-.6-1.5-1.5m0 9.8c0-.9.7-1.5 1.5-1.5h18.8c.8 0 1.5.6 1.5 1.5s-.7 1.5-1.5 1.5H2.6c-.8 0-1.5-.7-1.5-1.5"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_exclamation_mark_circle_fill" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M12 24a12 12 0 1 0 0-24 12 12 0 0 0 0 24m.8-5.3a2 2 0 0 1-1.9-.1 1.5 1.5 0 0 1 .5-2.5 1.5 1.5 0 0 1 2 1.1 2 2 0 0 1-.6 1.5M11 5h2l.5.5L13 14l-.5.5h-1L11 14l-.5-8.5z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_exclamation_mark_triangle_fill" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M22.6 22H1.4A1.4 1.4 0 0 1 0 20.6c0-.2 0-.5.2-.7L10.8 2.7a1.4 1.4 0 0 1 2.4 0l10.6 17.2a1.4 1.4 0 0 1-.5 1.9zM12 20.2c.8 0 1.4-.6 1.4-1.4s-.6-1.3-1.4-1.3-1.4.6-1.4 1.3.6 1.4 1.4 1.4m1-12.7h-2l-.4.4.4 7.8.5.4h1l.5-.4.4-7.8z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_exclamation_octagon_fill" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="m22.8 18-4.4 4.7a4 4 0 0 1-3.1 1.3H9a4 4 0 0 1-3-1.3l-4.7-4.6a4 4 0 0 1-1.3-3V8.7c0-1.2.5-2.4 1.3-3.2L6 1.2A4 4 0 0 1 9 0h6.4c1.2 0 2.3.5 3.1 1.3l4.3 4.3a4 4 0 0 1 1.3 3v6.5a4 4 0 0 1-1.2 3M12 19a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3m1-14h-2l-.5.5.5 8.5.5.5h1l.5-.5.5-8.5z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_eye" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M12 20C4.7 20 1 14.2.1 12.5a1 1 0 0 1 0-1C1.1 9.8 4.7 4 12 4s11 5.8 11.9 7.5a1 1 0 0 1 0 1c-1 1.7-4.6 7.5-11.9 7.5m0-13.5a6 6 0 0 0-5 3.4 5.5 5.5 0 0 0 4 7.5 5.5 5.5 0 0 0 6.5-5.4 6 6 0 0 0-3.4-5zm0 9a3.5 3.5 0 0 1-3.5-4.2 3.5 3.5 0 0 1 4.7-2.5 3.5 3.5 0 0 1 1.2 5.7 4 4 0 0 1-2.5 1"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_eye_slash" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M20.3 16.9h-.6l-2.4-2.5-.1-.5A5.5 5.5 0 0 0 10 7l-.5-.2L8 5.1a.3.3 0 0 1 0-.5 13 13 0 0 1 4-.6c7.3 0 11 5.8 11.9 7.5a1 1 0 0 1 0 1 16 16 0 0 1-3.6 4.4M2.7 1.3l20 20a1 1 0 1 1-1.4 1.4l-20-20a1 1 0 1 1 1.4-1.4m1.6 5.9 2.4 2.4.2.5a5.5 5.5 0 0 0 7 7l.5.2 1.6 1.6a.3.3 0 0 1 0 .5c-1.4.4-2.7.6-4 .6C4.7 20 1 14.2.1 12.5a1 1 0 0 1 0-1 16 16 0 0 1 3.6-4.4z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_filter_circle" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="M6 8a1 1 0 1 0 0 2h12a1 1 0 1 0 0-2zm1 5c0-.6.5-1 1-1h8c.5 0 1 .4 1 1s-.5 1-1 1H8a1 1 0 0 1-1-1m3 3a1 1 0 0 0-1 .9v.1c0 .5.5 1 1 1h4c.6 0 1-.5 1-1a1 1 0 0 0-1-1z"></path>
                        <path fill="currentColor" fill-rule="evenodd" d="M24 12a12 12 0 1 1-24 0 12 12 0 0 1 24 0m-2 0a10 10 0 1 1-20 0 10 10 0 0 1 20 0"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_filter_circle_fill" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M12 24a12 12 0 1 0 0-24 12 12 0 0 0 0 24M6 8a1 1 0 1 0 0 2h12a1 1 0 1 0 0-2zm1 5c0-.6.5-1 1-1h8c.5 0 1 .4 1 1s-.5 1-1 1H8a1 1 0 0 1-1-1m2 3.9c0-.5.5-1 1-1h4c.6 0 1 .5 1 1v.1c0 .5-.4 1-1 1h-4a1 1 0 0 1-1-1z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_flag" fill="none" viewBox="0 0 24 24">
                        <mask id="path-1-inside-1_5064_5725" fill="#fff">
                          <path fill-rule="evenodd" d="M23 19H1.5A1.5 1.5 0 0 1 0 17.5v-12A1.5 1.5 0 0 1 1.5 4H23a1 1 0 0 1 .9 1.5l-3.3 5.8v.4l3.3 5.8A1 1 0 0 1 23 19"
                            clip-rule="evenodd"></path>
                        </mask>
                        <path fill="currentColor"
                          d="M1.5 19v-2zM0 17.5h-2zM23 4v2zm.9 1.5 1.7 1zm-3.3 5.8-1.8-1zm0 .4 1.7-1zm3.3 5.8-1.8 1zM23 19v2zm0-2H1.5v4H23zM1.5 17l.4.1L-1 20a4 4 0 0 0 2.5 1zm.4.1.1.4h-4A4 4 0 0 0-1 20zm.1.4v-12h-4v12zm0-12-.1.4L-1 3a4 4 0 0 0-1 2.5zm-.1.4-.4.1V2A4 4 0 0 0-1 3zm-.4.1H23V2H1.5zM23 6l-.5-.1 2-3.5A3 3 0 0 0 23 2zm-.5-.1-.4-.4 3.5-2a3 3 0 0 0-1.1-1.1zm-.4-.4L22 5h4a3 3 0 0 0-.4-1.5zM22 5l.1-.5 3.5 2c.3-.5.4-1 .4-1.5zm.1-.5-3.3 5.8 3.5 2 3.3-5.8zm-3.3 5.8-.3 1.2h4l-.2.7zm-.3 1.2c0 .4.1.9.3 1.2l3.5-2 .2.8zm.3 1.2 3.3 5.8 3.5-2-3.3-5.7zm3.3 5.8L22 18h4a3 3 0 0 0-.4-1.5zM22 18l.1-.5 3.5 2A3 3 0 0 0 26 18zm.1-.5.4-.4 2 3.5a3 3 0 0 0 1.1-1.1zm.4-.4.5-.1v4c.5 0 1-.1 1.5-.4z"
                          mask="url(#path-1-inside-1_5064_5725)"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_flag_fill" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M23 19.5H1.5A1.5 1.5 0 0 1 0 18V6a1.5 1.5 0 0 1 1.5-1.5H23a1 1 0 0 1 .9 1.5l-3.3 5.8v.4l3.3 5.8a1 1 0 0 1-.9 1.5" clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_folder" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="m24 10-.8 10.6a1.5 1.5 0 0 1-1.5 1.4H2.3a1.5 1.5 0 0 1-1.5-1.4L0 10.1A1 1 0 0 1 1 9h22a1 1 0 0 1 1 1m-1-4v1.5l-.5.5h-21L1 7.5V3a1 1 0 0 1 1-1h5.7a2 2 0 0 1 1.4.6l1.8 1.8a2 2 0 0 0 1.4.6H22a1 1 0 0 1 1 1"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_gear" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="m23.7 13-1.9.5-.3.4-.3 1.2v.5l1.4 1.3v.6l-.5 1-.5.2-1.9-.5-.4.2-1 .9v.4l.4 1.9-.2.5-1 .6H17l-1.4-1.4-.5-.1-1.2.3-.4.3-.5 1.9-.4.3h-1.2l-.4-.3-.5-1.9-.4-.3-1.2-.3h-.5L7 22.7h-.5l-1-.5-.2-.5.5-1.9-.2-.4-.9-1h-.4l-1.9.4-.5-.2-.6-1V17l1.4-1.3.1-.5-.3-1.2-.3-.4L.3 13l-.3-.4v-1.2l.3-.4 1.9-.5.3-.4.3-1.2v-.5L1.3 7v-.5l.5-1 .5-.2 1.9.5.4-.2q.4-.5 1-.9v-.4l-.4-1.9.2-.5 1-.6H7l1.4 1.4.5.1 1.2-.3.4-.3.5-1.9.4-.3h1.2l.4.3.5 1.9.4.3 1.2.3h.5L17 1.3h.5l1 .5.2.5-.5 1.9.2.4q.5.4.9 1h.4l1.9-.4.5.2.6 1V7l-1.4 1.4-.1.5.3 1.2.3.4 1.9.5.3.4v1.2zm-16-6.6a.2.2 0 0 0-.4-.1 7.4 7.4 0 0 0 0 11.4.2.2 0 0 0 .4 0l2.6-4.7a2 2 0 0 0 0-2zM12 4.6a7 7 0 0 0-2.6.5l-.1.3 2.6 4.6a2 2 0 0 0 1.8 1h5.4l.2-.2A7.4 7.4 0 0 0 12 4.6m7 8.3h-5.3a2 2 0 0 0-1.8 1l-2.6 4.7v.3a7.4 7.4 0 0 0 10-5.7.2.2 0 0 0-.2-.3"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_gift" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M22 11.5h-8.5L13 11V8.2l.5-.5H22c.6 0 1 .4 1 1v1.9c0 .5-.4 1-1 1m-3-4.9h-5.1A1 1 0 0 1 13 6c0-.2 0-.4.3-.6l3.6-3.5c1.2-1 3-1 4.2 0a3 3 0 0 1 0 4.1 3 3 0 0 1-2.1.8M19 3l-.7.3-1.7 1.6H19c.6 0 1-.4 1-1s-.4-.9-1-.9m-8.5 20H4a1 1 0 0 1-1-1v-9l.5-.5h7c.3 0 .5.2.5.5v9.5zM2 11.5a1 1 0 0 1-1-1V8.8c0-.6.4-1 1-1h8.5c.3 0 .5.2.5.5V11l-.5.5zm8.1-4.8H5A3 3 0 0 1 2 4a3 3 0 0 1 3-3 3 3 0 0 1 2.1.8l3.6 3.5a1 1 0 0 1 0 1.2zM5.7 3.2a1 1 0 0 0-1.4 0 1 1 0 0 0 0 1.3c.2.2.4.3.7.3h2.4zM21 22c0 .6-.4 1-1 1h-6.5l-.5-.5V13l.5-.5h7c.3 0 .5.2.5.5z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_globe" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M12 24a12 12 0 1 1 0-24 12 12 0 0 1 0 24m-5.2-4L6 18.2l-.2-.2H4.5a.3.3 0 0 0-.2.4 10 10 0 0 0 2.1 1.9.3.3 0 0 0 .4-.3M3 16h2.1a.2.2 0 0 0 .3-.3L5 13.2l-.2-.2H2.3l-.2.2c.1 1 .3 1.8.7 2.7zm-.7-5h2.5l.2-.2.3-2.5a.2.2 0 0 0-.2-.3h-2l-.3.2-.7 2.5zm2.2-5h1.3l.2-.2q.3-.9.8-1.7a.2.2 0 0 0-.4-.4l-2 1.9zm6.1-3.6c-1 .6-1.8 1.7-2.5 3.3l.3.3h2.4l.2-.2V2.6a.3.3 0 0 0-.4-.2m.2 5.6H7.6l-.2.2-.4 2.5.3.3h3.5l.2-.2V8.3zm0 5H7.3l-.3.3q.1 1.3.4 2.5l.2.2h3.2l.2-.2v-2.5zm0 5H8.4a.3.3 0 0 0-.3.4 7 7 0 0 0 2.5 3.2.3.3 0 0 0 .4-.2v-3.1zm10.9-5h-2.5l-.2.2-.3 2.5a.2.2 0 0 0 .2.3h2l.3-.1c.4-.9.6-1.7.7-2.6zm-2.2 5h-1.3l-.2.2-.8 1.8a.2.2 0 0 0 .4.3l2-1.9zm-6.1 3.6c1-.5 1.8-1.7 2.5-3.2a.3.3 0 0 0-.3-.4h-2.3l-.3.3v3.1a.3.3 0 0 0 .4.2m-.2-5.6h3.2l.2-.2q.3-1.2.4-2.5l-.2-.3h-3.6l-.2.3v2.5zM13 2.6v3.2l.3.2h2.3l.3-.3a7 7 0 0 0-2.5-3.3.3.3 0 0 0-.4.2m0 5.7v2.5l.3.2h3.4l.3-.3-.4-2.5-.2-.2h-3.1zM17.2 4q.5.8.8 1.7l.2.2h1.3a.3.3 0 0 0 .2-.4 10 10 0 0 0-2.1-1.9.2.2 0 0 0-.4.4m1.5 4.2.3 2.5.2.2h2.5l.2-.3-.7-2.5L21 8h-2.1a.2.2 0 0 0-.2.3"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_graduation_hat" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M3.6 9.6.3 7.9l-.2-.2.2-.8 11.3-5.8h.8l11.3 5.8.2.2-.2.8-11.3 5.8h-.8l-5-2.6a.2.2 0 0 1 0-.4l5.6-2.9.2-.3v-.3L12 7h-.3l-6 3.1-.4.3-.2.4-.7 5.7a1.4 1.4 0 0 1 0 2l.4 2.7v.2l-.3.2a3 3 0 0 1-3.1-.4l-.1-.5 1-2.5-.2-1a1 1 0 0 1 .6-.9zm7.6 4.9a2 2 0 0 0 1.6 0l6-3h.3l.4 4-.1.4a14 14 0 0 1-7.4 2.4 14 14 0 0 1-6.3-1.7l-.2-.2v-.2l.5-4V12h.3z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_heart" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M6.3 1A6 6 0 0 1 12 4.9 6 6 0 0 1 17.7 1 6.4 6.4 0 0 1 24 7.5C24 15.8 14 23 12 23S0 15.8 0 7.5A6.4 6.4 0 0 1 6.3 1" clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_info_circle_fill" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M12 24a12 12 0 1 1 0-24 12 12 0 0 1 0 24m.8-16A1.6 1.6 0 0 1 11 6.5 1.6 1.6 0 0 1 12.8 5a1.6 1.6 0 0 1 1.7 1.5A1.6 1.6 0 0 1 12.8 8m.7 3.4L12 16.6c-.2.5.1 1 .6 1.3l.3.4v.2l-.5.5H11a1.5 1.5 0 0 1-1.5-1.9L11 12a1 1 0 0 0-.6-1.3l-.3-.4V10l.5-.5H12a1.5 1.5 0 0 1 1.5 1.9"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_key" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M1.9 23.7.3 22l-.3-.7V20c0-.3.1-.6.3-.8L9.7 10l.1-.4V7.3A7 7 0 0 1 17 0a7 7 0 0 1 7 7 7 7 0 0 1-7.3 7.2h-3.4l-.4.1-.7.8-.2.4v1.2l-.2.4-.7.7-.4.2H10l-.3.2-.8.7-.2.4v.7l-.1.3-.8.8-.4.2H6.2l-.4.1-.7.8-.2.4v.6l-.2.4-.2.2-.4.2H2.6zM19 6.5a1.6 1.6 0 1 0 0-3.2 1.6 1.6 0 0 0 0 3.2M2.6 21.1l8.7-8.7a.5.5 0 1 0-.8-.8l-8.7 8.7a.5.5 0 0 0 .8.8"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_keyboard" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M21.8 19.6H2.2A2.2 2.2 0 0 1 0 17.3V6.7c0-1.3 1-2.3 2.2-2.3h19.6c1.2 0 2.2 1 2.2 2.3v10.6a2.2 2.2 0 0 1-2.2 2.3m-16-2.3c0 .3.2.5.4.5h11.6a.4.4 0 0 0 .4-.5V16a.4.4 0 0 0-.4-.4H6.2a.4.4 0 0 0-.4.4zm-4 0c0 .3.2.5.4.5h1.4a.4.4 0 0 0 .4-.5V16a.4.4 0 0 0-.4-.4H2.2a.4.4 0 0 0-.4.4zM4.4 8a.4.4 0 0 0-.4-.4H2.2a.4.4 0 0 0-.4.4v1.3c0 .3.2.5.4.5H4a.4.4 0 0 0 .4-.5zm.5 3.6H2.2a.4.4 0 0 0-.4.4v1.3c0 .3.2.5.4.5H5a.4.4 0 0 0 .4-.5V12a.4.4 0 0 0-.4-.4M8.4 8a.4.4 0 0 0-.4-.4H6.7a.4.4 0 0 0-.5.4v1.3c0 .3.2.5.5.5H8a.4.4 0 0 0 .4-.5zm.5 3.6H7.6a.4.4 0 0 0-.5.4v1.3c0 .3.2.5.5.5h1.3a.4.4 0 0 0 .4-.5V12a.4.4 0 0 0-.4-.4M12.4 8a.4.4 0 0 0-.4-.4h-1.3a.4.4 0 0 0-.5.4v1.3c0 .3.2.5.5.5H12a.4.4 0 0 0 .4-.5zm.5 3.6h-1.3a.4.4 0 0 0-.5.4v1.3c0 .3.2.5.5.5h1.3a.4.4 0 0 0 .4-.5V12a.4.4 0 0 0-.4-.4M16.4 8a.4.4 0 0 0-.4-.4h-1.3a.4.4 0 0 0-.5.4v1.3c0 .3.2.5.5.5H16a.4.4 0 0 0 .4-.5zm.5 3.6h-1.3a.4.4 0 0 0-.5.4v1.3c0 .3.2.5.5.5h1.3a.4.4 0 0 0 .4-.5V12a.4.4 0 0 0-.4-.4M22.2 8a.4.4 0 0 0-.4-.4h-3.1a.4.4 0 0 0-.5.4v1.3c0 .3.2.5.5.5h3a.4.4 0 0 0 .5-.5zm0 4a.4.4 0 0 0-.4-.4h-2.2a.4.4 0 0 0-.5.4v1.3c0 .3.2.5.5.5h2.2a.4.4 0 0 0 .4-.5zm0 4a.4.4 0 0 0-.4-.4h-1.4a.4.4 0 0 0-.4.4v1.3c0 .3.2.5.4.5h1.4a.4.4 0 0 0 .4-.5z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_leaf" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M9 24a8 8 0 0 1-2.7-.5l-.2-.7A140 140 0 0 1 14 10a.3.3 0 0 0-.4-.3A47 47 0 0 0 4 21.3a.5.5 0 0 1-.8 0 8 8 0 0 1-1.7-4.8C1.5 4.7 15.4.9 20.9 0c.4 0 .7.2.8.5.3 1 .8 3 .8 6.5 0 9.3-5.8 17-13.5 17"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_lightning" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M19.8 10a1 1 0 0 1-.2 1.2L8.8 23.7a1 1 0 0 1-1.2.2l-.5-.6v-.6l3-8.2h-5l-.5-.2a1 1 0 0 1-.2-1.5L15.2.3a1 1 0 0 1 1.2-.2 1 1 0 0 1 .5 1.2l-3 8.2h5a1 1 0 0 1 .9.6"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_line_chart" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M2.8 1C1.8 1 1 1.8 1 2.8v18.4c0 1 .8 1.8 1.8 1.8h18.4c1 0 1.8-.8 1.8-1.8V2.8c0-1-.8-1.8-1.8-1.8zm.5 15.1V3.3h17.4v10.6l-4-5.5L11 14l-3.7-2.5z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_line_chart_dot" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M20.4 9.3a3 3 0 1 1-6 0 3 3 0 0 1 6 0"></path>
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M3.4 2.3a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h18a3 3 0 0 0 3-3v-14a3 3 0 0 0-3-3zm-1 16.9a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1v-14a1 1 0 0 0-1-1h-18a1 1 0 0 0-1 1v11.1L6.7 12A1 1 0 0 1 8 12l3.3 2.4 2.8-2.8c.4.5 1 1 1.6 1.3L12 16.5a1 1 0 0 1-1.3 0l-3.3-2.4z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_line_chart_down" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M1 1.5c.5 0 1 .4 1 1v4.4L9.6 14l5.4-3.4a1 1 0 0 1 1.3.2l4.3 6a1 1 0 0 1-.2 1.3A1 1 0 0 1 19 18l-3.8-5.2-5.2 3.3a1 1 0 0 1-1.1 0L2 9.4v11h21a1 1 0 0 1 0 2H0v-20c0-.6.4-1 1-1"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_line_chart_up" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M1 1.5c.5 0 1 .4 1 1v12.8l2.8-3.9a1 1 0 0 1 1.3-.2l5.2 3.3 7.9-10.2a1 1 0 0 1 1.3-.2 1 1 0 0 1 .2 1.4l-8.4 10.9a1 1 0 0 1-1.3.2l-5.2-3.3L2 18.5v2h21a1 1 0 0 1 0 2H0v-20c0-.6.4-1 1-1"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_link" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="m7 15.7 1.4 1.8q.6.5-.2.5H6q-2.5 0-4.2-1.8T0 12t1.8-4.2T6 6h4.5q1 0 1.8.3a6 6 0 0 1 2.5 1.5A5 5 0 0 1 16 9.7l.3.8q.2.7.2 1.5 0 .6-.4 1a1 1 0 0 1-1.1.5q-.6 0-1-.4a1 1 0 0 1-.5-1.1q0-1.2-.9-2.1T10.5 9H6q-1.2 0-2.1.9T3 12t.9 2.1T6 15h.3q.3 0 .6.5zM18 6q2.5 0 4.2 1.8T24 12t-1.8 4.2T18 18h-4.5a6 6 0 0 1-3.3-1l-.4-.3-.5-.4-.4-.5-.4-.5-.3-.4a6 6 0 0 1-.7-2.9q0-.6.4-1a1 1 0 0 1 1.1-.5q.6 0 1 .4t.5 1.1q0 1.2.9 2.1t2.1.9H18q1.2 0 2.1-.9T21 12t-.9-2.1T18 9h-.3q-.3 0-.6-.7l-1.5-1.8q-.6-.5.2-.5z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_link_broken" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="M13 4.7a1.5 1.5 0 0 1 2-.5c.7.4 1 1.4.5 2.1l-1.7 3a1.5 1.5 0 0 1-2.1.5 1.5 1.5 0 0 1-.5-2.1zM5.2 18q-2.2-.1-3.7-2T0 11.8t1.5-4.3 3.8-1.8h5.4s.1.1 0 .2L9.4 8.7H5.2q-1 0-1.8 1t-.8 2.1.8 2.1 1.9 1H8s.1 0 0 .1l-1.4 2.8zm13-12.2q2.4 0 4 1.8t1.7 4.3-1.6 4.3-4 1.8h-5a.1.1 0 0 1-.2-.2l1.4-2.8h3.8q1.1 0 2-1a3 3 0 0 0 .8-2.1q0-1.2-.8-2.1t-2-1h-2.2l1.3-3zm-6 7.9a1.5 1.5 0 0 0-2 .5l-1.5 2.6a1.5 1.5 0 0 0 .5 2c.7.5 1.6.3 2-.4l1.6-2.6a1.5 1.5 0 0 0-.5-2.1"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_lock" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M18.4 9.8h.5C20 9.8 21 11 21 12.2v9.4c0 1.3-.9 2.3-2.1 2.4H5a2.3 2.3 0 0 1-2-2.4v-9.4c0-1.3.9-2.3 2.1-2.4h.6V6c0-2.2.4-3.5 1.4-4.5S9.3 0 11.5 0h1c2.2 0 3.4.5 4.4 1.5s1.5 2.3 1.5 4.5zM16.2 6c0-1.4-.3-2.2-.9-2.9s-1.4-1-2.8-1h-1c-1.4 0-2.2.4-2.8 1s-1 1.5-1 2.9v3.8h8.5z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_logout" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M1 2.8 8.6 1l.8.2.2.3.1.3v1H14l.6.1.4.3a1 1 0 0 1 .5 1v4.1L15 9l-.7.2-.7-.2-.3-.7V4.7H9.6v14.6h3.8v-3.6l.3-.7.7-.2c.3 0 .5 0 .7.2s.3.4.3.7v4l-.1.6-.4.5-.4.3H9.6v1.4l-.3.3-.8.2-7.4-1.8-.8-.5L0 20V4c0-.3.1-.6.3-.8l.8-.5M12.5 12c0-.2 0-.5.3-.6l.6-.3h4.8V8.8l.1-.2.2-.2h.5l4.8 3.2.1.2a.4.4 0 0 1-.1.6L19 15.6l-.7-.1v-2.6h-4.9l-.6-.2z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_more_horizontal" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M23.3 12c0 1.5-1.3 2.6-2.7 2.6s-2.7-1.2-2.7-2.6a2.7 2.7 0 0 1 5.4 0m-8.6 0c0 1.5-1.2 2.6-2.7 2.6S9.3 13.5 9.3 12s1.2-2.6 2.7-2.6 2.7 1.1 2.7 2.6M3.4 9.4c1.5 0 2.7 1.1 2.7 2.6S5 14.6 3.4 14.6.8 13.4.8 12 2 9.4 3.4 9.4"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_new_folder" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M23.2 20.6a1.5 1.5 0 0 1-1.5 1.4H2.3a1.5 1.5 0 0 1-1.5-1.4L0 10.1A1 1 0 0 1 1 9h22a1 1 0 0 1 1 1zm-7.7-6.1H13V12a1 1 0 0 0-2 0v2.5H8.5a1 1 0 1 0 0 2H11V19a1 1 0 0 0 2 0v-2.5h2.5a1 1 0 1 0 0-2m7-6.5h-21L1 7.5V3a1 1 0 0 1 1-1h5.7a2 2 0 0 1 1.4.6l1.8 1.8a2 2 0 0 0 1.4.6H22a1 1 0 0 1 1 1v1.5z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_operators" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="M5.6 0a1 1 0 0 1 .8.8V4h3.4a1 1 0 0 1 .7.8v.7a1 1 0 0 1-.7.8H6.4v3.4a1 1 0 0 1-.8.7H5a1 1 0 0 1-.8-.7V6.4H.8a1 1 0 0 1-.8-.8V5a1 1 0 0 1 .8-1H4V.8A1 1 0 0 1 5 0zm7.9 4.9a1 1 0 0 1 .8-.8h9a1 1 0 0 1 .7.8v.7a1 1 0 0 1-.7.8h-9a1 1 0 0 1-.8-.8zm5.3 11.6a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3m0 7.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3m-5.3-5.6a1 1 0 0 1 .8-.8h9a1 1 0 0 1 .7.8v.7a1 1 0 0 1-.7.8h-9a1 1 0 0 1-.8-.8zm-4.3-3.1a1 1 0 0 1 0 1l-2.4 2.4 2.4 2.4a1 1 0 0 1 0 1.1l-.5.5a1 1 0 0 1-1 0l-2.4-2.4-2.4 2.4a1 1 0 0 1-1.1 0l-.5-.5a1 1 0 0 1 0-1l2.4-2.4-2.4-2.4a1 1 0 0 1 0-1.1l.5-.5a1 1 0 0 1 1 0l2.4 2.4 2.4-2.4a1 1 0 0 1 1.1 0z"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_paint_roller" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="m20.5 11.4-7.6 1.2a2 2 0 0 0-1.2.7 2 2 0 0 0-.5 1.3c.3 0 .6.1.8.3s.3.5.3.8V22c0 .2-.1.5-.3.7l-.8.3H9.1l-.8-.3L8 22v-6.3c0-.3.1-.6.3-.8s.5-.3.8-.3c0-1 .3-2 1-2.7a4 4 0 0 1 2.5-1.4L20 9.3a2 2 0 0 0 1.3-.7c.3-.4.5-.8.5-1.3s-.2-.8-.5-1.1-.7-.5-1.1-.5v.5c0 .6-.3 1.1-.7 1.5s-.9.6-1.5.6H2q-.7 0-1.5-.6A2 2 0 0 1 0 6.2V3.1c0-.6.2-1 .6-1.5s1-.6 1.5-.6h16a2 2 0 0 1 2.1 2v.6c1 0 2 .4 2.7 1S24 6.4 24 7.4s-.3 2-1 2.7a4 4 0 0 1-2.5 1.4"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_paperclip" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M19 11.8a1 1 0 0 1 1.4 0 1 1 0 0 1 0 1.4l-9 9a6 6 0 0 1-8.6 0 6 6 0 0 1 0-8.4L15.3 1.3a4.5 4.5 0 0 1 6.4 0 4.5 4.5 0 0 1 0 6.4l-10 10a3 3 0 0 1-4.3 0 3 3 0 0 1 0-4.3l6.7-6.6a1 1 0 0 1 1.4 0 1 1 0 0 1 0 1.4l-6.7 6.6a1 1 0 0 0 0 1.4c.4.4 1 .4 1.5 0l10-10a2.5 2.5 0 0 0 0-3.5 2.5 2.5 0 0 0-3.6 0L4.2 15.2a4 4 0 0 0 0 5.6 4 4 0 0 0 5.7 0z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_paper_plane" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M22.1 1a.6.6 0 0 1 .9.7l-3.5 18a1 1 0 0 1-.9.5l-5.4-2-2.2 4.6a.4.4 0 0 1-.8-.2v-5c0-.3.1-.7.4-1L19.3 5 7.6 15.6a1.4 1.4 0 0 1-1.4.3l-4.8-1.7a.6.6 0 0 1-.1-1z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_pencil" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="m0 23.5 1.1-3.7A4 4 0 0 1 2.2 18l14-14a.5.5 0 0 1 .8 0l3 3a.5.5 0 0 1 0 .8l-14 14c-.5.5-1.1.9-1.8 1L.5 24a.4.4 0 0 1-.5-.5m22-23L23.5 2a1.6 1.6 0 0 1 0 2.3L21.7 6a.5.5 0 0 1-.8 0l-3-3a.5.5 0 0 1 0-.8L19.7.5a1.6 1.6 0 0 1 2.3 0"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_pencil_with_lines" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="m23.7 7.3-1.3 1.3a.3.3 0 0 1-.5 0l-2-2v-.4l1.4-1.4a1 1 0 0 1 1.4 0l1 1 .3.7zm-2.6 2.6-8 8.2-1.2.7-2.3.7h-.3v-.3l.6-2.4c.2-.5.4-.9.7-1.2l8.1-8.2h.4l2 2zM13 7.3H1L.3 7a1 1 0 0 1 0-1.3l.6-.3h12c.3 0 .5.1.7.3a1 1 0 0 1 0 1.3zM1 11.1h8.3c.3 0 .5 0 .7.2a1 1 0 0 1 0 1.4l-.7.2H1l-.6-.2a1 1 0 0 1 0-1.4zm0 5.6h4.6c.3 0 .5 0 .7.3a1 1 0 0 1 0 1.3l-.7.3H1l-.6-.3a1 1 0 0 1 0-1.3z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_phone" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M4 1.9C4 .9 4.8 0 5.8 0h13.4c1 0 1.8.8 1.8 1.9V22c0 1-.8 1.9-1.8 1.9H5.8c-1 0-1.8-.8-1.8-1.9zm3.4 1.4h10.3v14H7.4zM11.8 19a1 1 0 0 0-1 1v1.5c0 .6.4 1 1 1h1.4c.6 0 1-.4 1-1V20c0-.6-.4-1-1-1z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_pie_chart" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M21.4 13.3A10.7 10.7 0 1 1 10.7 2.6v10.7z"></path>
                        <path fill="currentColor" d="M24 10.7A10.7 10.7 0 0 0 13.3 0v10.7z"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_pie_chart_alt" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd" d="M12 24a12 12 0 1 0 0-24 12 12 0 0 0 0 24m0-1.7a10.3 10.3 0 1 0 0-20.6 10.3 10.3 0 0 0 0 20.6"
                          clip-rule="evenodd"></path>
                        <path fill="currentColor" d="M12 3.4a8.6 8.6 0 1 1-7.2 13.2L12 12z"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_piggy_bank" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M10.3 8.1c2 0 3.4-1.6 3.4-3.5S12.2 1 10.3 1 7 2.6 7 4.6 8.5 8 10.3 8"></path>
                        <path fill="currentColor"
                          d="M21.8 10.7h-.5c-.4-.9-1-1.6-1.7-2.2v-.7c.2-.4.3-1 0-1.5-.1-.4-.4-.8-.9-1l-.9-.1c-1 0-2 .6-2.4 1.5L14 6.6A4 4 0 0 1 12.6 8h.3c1.2 0 2.1.2 3 .3.3 0 .4 0 .5-.2l.2-.6c.2-.5.7-.9 1.2-.9l.4.1V7c-.4.7-.2 1.5 0 2.1 0 .3.2.5.4.7.8.6 1.3 1.4 1.5 2.3l.3.2h1.3c.3 0 .6.3.6.7v2.8l-.6.6h-2l-.2.2-.7.8c-.2.1-.2.3-.2.4l.4.9c.2.7 0 1.5-.7 1.7l-.5.2c-.6 0-1-.4-1.2-.9l-.3-.7-.3-.1a16 16 0 0 1-6.1 0h-.1l-.3.1-.3.7c-.2.5-.6.9-1.2.9-.1 0-.3 0-.5-.2-.6-.2-1-1-.7-1.7l.4-.9-.1-.4a5 5 0 0 1-1.6-3.7c0-2.1 1-4 3.6-4.9-.6-.2-1.2-.5-1.6-1A7 7 0 0 0 4 13.4l-.2.4c-.6.4-1.5.4-2-.2l-.3-.7c0-.3.1-.5.3-.7l.4-.2c.4 0 .7-.4.7-.9s-.4-.7-.8-.7a2 2 0 0 0-1.4.6c-1 1-1 2.8 0 3.8a3 3 0 0 0 3.2.8c.2-.1.4 0 .5.2.3.8.6 1.5 1.2 2v.1A3 3 0 0 0 7 21.8l1 .2c1.1 0 2-.6 2.5-1.5a15 15 0 0 0 4.8 0C16 21.4 17 22 18 22l1.1-.2a3 3 0 0 0 1.5-3.9h1.3c1.3 0 2.2-1 2.2-2.2v-2.8c0-1.2-1-2.2-2.2-2.2"></path>
                        <path fill="currentColor"
                          d="M7.8 10.4a1 1 0 0 0-.3 1l.6.5.4-.1a8 8 0 0 1 2.8-1 8 8 0 0 1 3 0c.5.1.9-.2 1-.6a1 1 0 0 0-.6-1 9 9 0 0 0-3.6 0 10 10 0 0 0-3.3 1.2"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_pin" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="M19.7 7.4a3 3 0 0 0-2.5 1L13.3 13a3 3 0 0 0-.4 3.2c.2.3.5 1 .3 1.9L6 10.8c.8-.2 1.6.1 1.9.3a3 3 0 0 0 3.3-.4l4.4-3.9a3 3 0 0 0 1.1-2.5zm4 1-8-8.1a1 1 0 0 0-1.3 0l-.2.3a5 5 0 0 0 .1 3.5 1 1 0 0 1-.2 1L9.6 9a1 1 0 0 1-.9 0c-1.3-.5-3.6-1-5.3.8l-.2.1a1 1 0 0 0 0 1.2l9.7 9.7a1 1 0 0 0 1.2 0l.2-.2c1.7-1.7 1.2-4 .6-5.3a1 1 0 0 1 .1-1l3.8-4.4a1 1 0 0 1 1-.2 5 5 0 0 0 3.6.1l.3-.2a1 1 0 0 0 0-1.2M8 17.5 6.5 16h-.8l-.7.8a69 69 0 0 0-5 6 1 1 0 0 0 .3 1l.2.1h.7a69 69 0 0 0 6-4.9l.8-.7z"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_pin_fill" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M8 17.5 6.5 16h-.8l-.7.8a70 70 0 0 0-5 6 1 1 0 0 0 1.2 1.1 70 70 0 0 0 6-4.9l.8-.7zm7-2.2a1 1 0 0 1 0-1l3.8-4.4a1 1 0 0 1 1-.2c1.2.4 2.4.5 3.6.1A1 1 0 0 0 24 9l-.3-.6-8-8.1a1 1 0 0 0-1.3 0l-.2.3a5 5 0 0 0 .1 3.5 1 1 0 0 1-.2 1L9.6 9a1 1 0 0 1-.9 0c-1.3-.5-3.6-1-5.3.7l-.2.2a1 1 0 0 0 0 1.2l9.7 9.7a1 1 0 0 0 1.2 0l.2-.2c1.7-1.7 1.2-4 .6-5.3"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_play_circle_fill" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M12 24a12 12 0 1 1 0-24 12 12 0 0 1 0 24m6-12.9L9 6.6a1 1 0 0 0-1.5.9v9a1 1 0 0 0 1.4.9l9-4.5a1 1 0 0 0 0-1.8" clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_plus" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M1 12c0-.8.7-1.5 1.5-1.5h19a1.5 1.5 0 0 1 0 3h-19c-.8 0-1.5-.7-1.5-1.5"></path>
                        <path fill="currentColor" d="M12 23c-.8 0-1.5-.7-1.5-1.5v-19a1.5 1.5 0 1 1 3 0v19c0 .8-.7 1.5-1.5 1.5"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_plus_circle" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M12 24a12 12 0 1 1 0-24 12 12 0 0 1 0 24m0-22a10 10 0 1 0 0 20 10 10 0 0 0 0-20m1 16.5a1 1 0 0 1-2 0V13H5.5a1 1 0 0 1 0-2H11V5.5a1 1 0 1 1 2 0V11h5.5a1 1 0 1 1 0 2H13z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_plus_circle_fill" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="M12 0a12 12 0 1 0 0 24 12 12 0 0 0 0-24m4.8 13.2h-3.6v3.6c0 .7-.5 1.2-1.2 1.2s-1.2-.5-1.2-1.2v-3.6H7.2c-.7 0-1.2-.5-1.2-1.2s.5-1.2 1.2-1.2h3.6V7.2c0-.7.5-1.2 1.2-1.2s1.2.5 1.2 1.2v3.6h3.6c.7 0 1.2.5 1.2 1.2s-.5 1.2-1.2 1.2"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_podcast" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M24 11.5c0 5.2-3.6 9.7-8.8 11l-.4-.2v-.8l.4-.5a9.7 9.7 0 0 0 6.4-12.4 10.3 10.3 0 0 0-12.8-6 9.7 9.7 0 0 0-6.4 12.3 10 10 0 0 0 6.4 6c.2.2.4.4.4.7v.6l-.3.4h-.1C2.4 20.9-1.3 14.6.4 8.4a12 12 0 0 1 14.8-8c5.2 1.4 8.8 6 8.8 11.1m-4.2-.5c0 2.8-1.6 5.4-4.2 6.6l-.5-.1v-.8a1 1 0 0 1 .4-.8c2.7-1.8 3.3-5.4 1.4-8s-5.7-3.2-8.4-1.3a5.6 5.6 0 0 0 0 9.3c.3.2.4.5.5.8v.6a.4.4 0 0 1-.4.4h-.2c-3.8-2-5.3-6.5-3.3-10.1s6.7-5.2 10.5-3.3a8 8 0 0 1 4.2 6.7M12 8c1.4 0 2.6 1.1 2.6 2.5S13.4 13 12 13s-2.6-1.1-2.6-2.5S10.6 8 12 8m0 6c1.9 0 2.1.8 2 1.3l-.3 7.5c0 .4-.4 1.2-1.7 1.2s-1.6-.8-1.7-1.2l-.4-7.5c0-.5.2-1.3 2.1-1.3"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_privacy_choices" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M5.8 6.3h12.4c3.2 0 5.8 2.5 5.8 5.7a5.7 5.7 0 0 1-5.8 5.8H5.8A5.7 5.7 0 0 1 0 12a5.7 5.7 0 0 1 5.8-5.7m0 1A5 5 0 0 0 1 12a5 5 0 0 0 4.8 4.8h5.5L14 7.2zm14 2.9v-.7h-.6l-1.8 1.8-1.8-1.8H15v.7l1.8 1.8-1.8 1.8v.7h.7l1.8-1.8 1.8 1.8h.7v-.7L18.2 12z"
                          clip-rule="evenodd"></path>
                        <path fill="currentColor" d="M10.1 9.6c.2.2.3.5 0 .7l-3.4 4-.2.2-.6-.1-1.8-1.8v-.7h.7l1.4 1.4 3.2-3.7z"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_progress_bars" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M20.7 4a3.3 3.3 0 0 1 0 6.7H3.3a3.3 3.3 0 0 1 0-6.7zm-9.4 1.3h9.4a2 2 0 0 1 0 4h-9.4a3 3 0 0 0 0-4M0 16.7A3.3 3.3 0 0 0 3.3 20h17.4a3.3 3.3 0 0 0 0-6.7H3.3A3.3 3.3 0 0 0 0 16.7m20.7-2h-4a3 3 0 0 1 0 4h4a2 2 0 0 0 0-4"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_progress_bars_off" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="M0 1a1 1 0 0 1 1-1h22a1 1 0 0 1 1 1v3.3a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm0 9.3a1 1 0 0 1 1-1h22a1 1 0 0 1 1 1v3.4a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm0 9.4a1 1 0 0 1 1-1h22a1 1 0 0 1 1 1V23a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1z"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_progress_bars_on" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="M0 2a2 2 0 0 1 2-2h20a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm0 14a2 2 0 0 1 2-2h20a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2z"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_question_mark" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M13.8 16.3a1 1 0 0 1-.9.8H11a1 1 0 0 1-.9-.8c0-5.7 4.9-6 4.9-10.3 0-1.4-1.6-2.6-3.3-2.6S8.4 4.6 8.4 6c0 .5 0 1 .2 1.4a1 1 0 0 1-.8 1.2H6.1a1 1 0 0 1-.9-.7L5 6c0-3.3 3-6 6.9-6s6.8 2.7 6.8 6c0 5.5-5 6.1-5 10.3M12 19.4a2.3 2.3 0 1 1 0 4.6 2.3 2.3 0 0 1 0-4.6"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_question_mark_circle" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M12 24a12 12 0 1 1 0-24 12 12 0 0 1 0 24m0-22a10 10 0 1 0 0 20 10 10 0 0 0 0-20m1.1 12-.5.5h-1.1L11 14c0-3.3 2.8-3 2.8-5.5 0-.8-1-1.5-1.9-1.5-1 0-2 .7-2 1.5l.2.8a.5.5 0 0 1-.5.7h-1l-.5-.4L8 8.5C8 6.5 9.8 5 12 5s4 1.6 4 3.5c0 3.2-2.9 3-2.9 5.5M12 16a1.5 1.5 0 1 1-1.5 1.5A1.5 1.5 0 0 1 12 16"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_question_mark_speech_bubble" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="m12 22-2.3-.2a1 1 0 0 0-1 .2 11 11 0 0 1-5.1 2 .5.5 0 0 1-.5-.9 8 8 0 0 0 1.5-3l-.3-.7A11 11 0 0 1 0 11C0 5 5.4 0 12 0s12 5 12 11-5.4 11-12 11m1.2-9.4c0-2.3 2.8-2.2 2.8-5.4 0-1.8-1.7-3.4-3.9-3.4s-4 1.6-4 3.4l.2 1.2c0 .2.3.3.5.3h1l.4-.6v-.9c0-.8.9-1.4 1.8-1.4s1.9.6 1.9 1.4c0 2.5-2.8 2.2-2.8 5.4 0 .3.2.5.5.5h1.1c.3 0 .5-.2.5-.5m-1.1 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_redo" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M11 21.7h9.2a1.1 1.1 0 1 1 0 2.3H11a10.3 10.3 0 1 1 0-20.6h5.8V.6a.6.6 0 0 1 .9-.5l5.7 4a.6.6 0 0 1 0 1l-5.7 4a.6.6 0 0 1-1-.5V5.7H11a8 8 0 0 0-8 8 8 8 0 0 0 8 8"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_refresh" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M11 3.2V.5a.5.5 0 0 1 .8-.4L17 3.7a.5.5 0 0 1 0 .9l-5.2 3.6a.5.5 0 0 1-.9-.4V5.3a8.4 8.4 0 1 0 2.2 16.5c4.2-.5 7.3-4 7.3-8.2 0-.6.5-1 1-1s1.1.4 1.1 1C22.5 19.3 17.8 24 12 24S1.5 19.3 1.5 13.6c0-5.4 4-9.9 9.4-10.4"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_repeat" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M17.5 18.7h-11v2.7l-.3.5h-.5L.2 18l-.2-.4.2-.5 5.5-3.9.8.2v3h11a4 4 0 0 0 3-1.3 5 5 0 0 0 1.3-3.1c0-.3.1-.6.3-.8a1 1 0 0 1 1.6 0c.2.2.3.5.3.8a8 8 0 0 1-.5 2.6 7 7 0 0 1-1.4 2.1 7 7 0 0 1-2.1 1.5 6 6 0 0 1-2.5.5m.8-8h-.8V7.5h-11a4 4 0 0 0-3 1.3A5 5 0 0 0 2.2 12c0 .3-.1.6-.3.8L1 13l-.8-.3L0 12c0-1.8.7-3.5 2-4.7a7 7 0 0 1 4.5-2h11V2.6l.3-.5h.5L23.8 6l.2.4-.2.5z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_search" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M10 0a10 10 0 0 1 8 15.9l5.3 4.5a2 2 0 0 1 .1 3 2 2 0 0 1-3-.1l-4.5-5.4A10 10 0 1 1 9.9 0m0 17.8A7.8 7.8 0 1 0 10 2a7.8 7.8 0 0 0 0 15.7"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_sidebar_close" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M22 22H2a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h20a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2M7 4.5 6.5 4h-4l-.5.5v15l.5.5h4l.5-.5zm11 4a.5.5 0 0 0-.8-.4l-5 3.5a.5.5 0 0 0 0 .8l5 3.5a.5.5 0 0 0 .8-.4z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_sidebar_open" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M22 22H2a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h20a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2M7 4.5 6.5 4h-4l-.5.5v15l.5.5h4l.5-.5zm11.8 7-5-3.4a.5.5 0 0 0-.8.4v7a.5.5 0 0 0 .8.4l5-3.5a.5.5 0 0 0 0-.8"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_sign" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="m22.7 8.2-2.2 2.3a2 2 0 0 1-1.2.5H3.9a1 1 0 0 1-1-1V5c0-.6.5-1 1-1h15.4c.4 0 .9.2 1.2.5l2.2 2.3c.4.4.4 1 0 1.4M13.2 3h-2l-.5-.5V1c0-.6.5-1 1-1h1c.5 0 1 .4 1 1v1.5c0 .3-.3.5-.5.5m-8.5 9h15.4c.5 0 1 .4 1 1v5c0 .6-.5 1-1 1H4.7c-.5 0-.9-.2-1.2-.5l-2.2-2.3a1 1 0 0 1 0-1.4l2.2-2.3c.3-.3.8-.5 1.2-.5m6.5 8h2c.2 0 .4.2.4.5V23c0 .6-.4 1-1 1h-.9a1 1 0 0 1-1-1v-2.5c0-.3.2-.5.5-.5"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_snooze" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="M1 24c-.7 0-1-.3-1-1v-.8c0-.5.3-.9.6-1.2l8-11.1H1.3C-.3 9.9-.3 7 1.4 7h10.4c.6 0 1 .3 1 1v.8c0 .5-.4.8-.6 1.2L4.3 21.1h8c1.6 0 1.6 2.9 0 2.9zm13.4-11a1 1 0 0 1-.7-.7v-.7c0-.4.2-.6.5-1L20 2.3h-5.4c-1.3 0-1.3-2.2 0-2.2h7.9c.4 0 .7.2.7.7v.7c0 .4-.3.6-.5 1L17 10.7h6c1.4 0 1.4 2.2 0 2.2z"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_snooze_slash" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd" d="m2.7 1.3 20 20a1 1 0 1 1-1.4 1.4l-20-20a1 1 0 1 1 1.4-1.4" clip-rule="evenodd"></path>
                        <path fill="currentColor" d="m16 13-2-2 6.1-8.7h-5.4c-1.3 0-1.3-2.2 0-2.2h7.9c.4 0 .7.2.7.7v.7c0 .4-.3.6-.5 1L17 10.7h6c1.4 0 1.4 2.2 0 2.2h-7"></path>
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M0 23c0 .7.3 1 1 1h11.2c1.7 0 1.7-2.9 0-2.9H4.3l5.7-8v-.2l-2-2c-.2-.1-.2 0-.2 0l-7.2 10c-.3.4-.6.8-.6 1.3z" clip-rule="evenodd"></path>
                        <path fill="currentColor" d="M12.8 8c0-.7-.4-1-1-1h-1.7l2.3 2.5h.1c.2-.2.2-.4.2-.7zM1.4 9.7C-.3 9.9-.3 7 1.4 7H4l2.8 2.8z"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_speech_bubble" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="m12 22-2.3-.2a1 1 0 0 0-1 .2 11 11 0 0 1-5.1 2 .5.5 0 0 1-.5-.9 8 8 0 0 0 1.5-3l-.3-.7A11 11 0 0 1 0 11C0 5 5.4 0 12 0s12 5 12 11-5.4 11-12 11"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_square_and_pencil" fill="none" viewBox="0 0 24 25">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M22 4.8h-.5l-2.3-2.3a.4.4 0 0 1 0-.6L20.8.4a1.2 1.2 0 0 1 1.7 0l1.1 1a1.2 1.2 0 0 1 0 1.8zM9.8 16.6l-2.8.8a.3.3 0 0 1-.4-.3l.9-2.8c.1-.5.4-1 .8-1.4l9.5-9.5c.2-.2.5-.2.6 0l2.3 2.3a.4.4 0 0 1 0 .6l-9.5 9.5a3 3 0 0 1-1.4.8m12.1-5.1v9.2a3.3 3.3 0 0 1-3.3 3.3H3.3A3.3 3.3 0 0 1 0 20.7V5.5a3.3 3.3 0 0 1 3.3-3.3h9.2a1 1 0 1 1 0 2.2H3.3a1 1 0 0 0-1.1 1v15.3c0 .6.5 1.1 1 1.1h15.3c.6 0 1.1-.5 1.1-1v-9.3a1 1 0 1 1 2.2 0"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_star" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="m17.3 15 2.3 7.8v.5l-.3.5a1 1 0 0 1-1 0L12 19l-6.2 5a1 1 0 0 1-1.1 0l-.3-.6v-.6L6.7 15 .4 10.2 0 9.8v-.6l.4-.5.5-.2h7.8L11.1.7l.4-.5a1 1 0 0 1 1 0l.3.5 2.5 7.8H23c.2 0 .4 0 .5.2l.4.5v.6l-.4.4z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_store" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M23.7 9a3.3 3.3 0 0 1-4.5 1.2 3 3 0 0 1-1.3-1.4 3.3 3.3 0 0 1-5.9 0 3.3 3.3 0 0 1-5.9 0A3.3 3.3 0 0 1 .3 9a3 3 0 0 1 0-2.4l2-4.5A2 2 0 0 1 3.8 1H20a2 2 0 0 1 1.7 1.1l2 4.5c.3.8.3 1.7-.1 2.4m-18 8.5-.2-.2v-1.4a.2.2 0 0 1 .3-.2h12.4a.2.2 0 0 1 .3.2v1.4a.2.2 0 0 1-.3.2zm-2.5-6h1l.4.5v5.5a1 1 0 0 0 1 1h12.9a1 1 0 0 0 .9-1V12l.4-.5h1l.4.5v9.2a2 2 0 0 1-1.8 1.8H4.6a2 2 0 0 1-1.8-1.8V12z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_subtract" fill="none" viewBox="0 0 24 24">
                        <rect width="21.75" height="3" x="1.13" y="10.5" fill="currentColor" rx="1.5"></rect>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_subtract_circle" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M12 24a12 12 0 1 1 0-24 12 12 0 0 1 0 24m0-22a10 10 0 1 0 0 20 10 10 0 0 0 0-20M4.5 12a1 1 0 0 1 1-1h13a1 1 0 1 1 0 2h-13a1 1 0 0 1-1-1"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_subtract_circle_fill" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="M12 24a12 12 0 0 0 12-12c0-6.6-5.5-12-12-12A12 12 0 0 0 0 12a12 12 0 0 0 12 12M7 13c-.7 0-1.2-.3-1.2-1s.5-1 1.2-1h10c.7 0 1.1.4 1.1 1s-.4 1-1.1 1z"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_tabs" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="M16 6H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2m6-6H8a2 2 0 0 0-2 2v2a1 1 0 0 0 1 1h9a3 3 0 0 1 3 3v9a1 1 0 0 0 1 1h2a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_target" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M12 24a12 12 0 1 1 0-24 12 12 0 0 1 0 24m0-21a9 9 0 1 0 0 18 9 9 0 0 0 0-18m0 16a7 7 0 1 1 0-14 7 7 0 0 1 0 14m0-11a4 4 0 1 0 0 8 4 4 0 0 0 0-8m0 6a2 2 0 1 1 0-4 2 2 0 0 1 0 4"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_target_bullseye" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="m18 6.2-.5.3-5.4 7.3.2.6a1.6 1.6 0 0 1-1.7 1.6A1.6 1.6 0 0 1 9 14.4a1.6 1.6 0 0 1 1.8-1.5l5.3-7.3.2-.6-.3-1.6.1-.6L18 .2a.4.4 0 0 1 .7.1l.4 2.2.2.2 2.2-.4h.3a.4.4 0 0 1 .1.6l-1.8 2.7-.6.3z"></path>
                        <path fill="currentColor"
                          d="m16.5 10.2 1.4-2a10 10 0 0 1 2.4 6.2c0 5.3-4.3 9.6-9.7 9.6a9.6 9.6 0 1 1 0-19.1c1.4 0 2.7.3 3.8.7l-1.4 2a7.2 7.2 0 0 0-9.6 6.8c0 4 3.2 7.2 7.2 7.2a7.2 7.2 0 0 0 5.9-11.4"></path>
                        <path fill="currentColor"
                          d="m13.8 13.8 1.6-2.3q.9 1.4.9 3c0 3-2.5 5.5-5.7 5.5S5 17.5 5 14.4 7.5 9 10.6 9H12l-1.7 2.3a3 3 0 0 0-2.9 3.1 3.2 3.2 0 0 0 6.4 0z"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_text_caret" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M21 6a3 3 0 0 1 3 3v6a3 3 0 0 1-3 3h-5a1 1 0 1 1 0-2h5a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1h-5a1 1 0 1 1 0-2zM9 1h.5c1 0 1.8.4 2.5 1a4 4 0 0 1 2.5-1h.5a1 1 0 1 1 0 2h-.5c-.8 0-1.5.7-1.5 1.5v15c0 .8.7 1.5 1.5 1.5h.5a1 1 0 1 1 0 2h-.5c-1 0-1.8-.4-2.5-1a4 4 0 0 1-2.5 1H9a1 1 0 1 1 0-2h.5c.8 0 1.5-.7 1.5-1.5v-15c0-.8-.7-1.5-1.5-1.5H9a1 1 0 1 1 0-2M3 16h5a1 1 0 1 1 0 2H3a3 3 0 0 1-3-3V9a3 3 0 0 1 3-3h5a1 1 0 0 1 0 2H3a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_thumbs_down" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M3.9 2.8h2c.3 0 .7 0 1-.3l.4-.3A7 7 0 0 1 11 1h6.4c.9 0 1.7.7 1.8 1.7 0 .4 0 .8-.3 1 .6.1 1.1.5 1.4 1s.2 1 .1 1.4l-.6 1c.8.3 1.3 1.3 1 2.3-.1.4-.4.8-.8 1 .6.4 1 1.1.9 1.9-.2.9-1 1.5-1.8 1.5h-5.6s-.2.1-.2.3c.6 1.6.8 3.2.7 4.8 0 2.7-1.4 4.1-2.5 4.1a1 1 0 0 1-.9-.9v-3.5l-.3-1.1-3.5-4.8a2 2 0 0 0-1.3-.7H3.9c-.5 0-.9-.4-.9-1V3.9c0-.6.4-1 .9-1"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_thumbs_up" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M3.5 12.1h1.7c.5 0 1-.2 1.4-.7L10 6.7l.3-1.2V2c0-.5.4-.9.9-.9 1.1 0 2.6 1.4 2.6 4.1A13 13 0 0 1 13 10v.3h5.7c1 0 1.7.6 1.8 1.5s-.2 1.6-.9 2c.9.4 1.2 1.5.7 2.4-.2.4-.5.7-1 .9.4.2.6.5.7 1s0 .8-.1 1.2c-.2.6-.8 1-1.3 1l.2 1.1c0 1-.9 1.7-1.8 1.7h-6.4A7 7 0 0 1 6.9 22l-.4-.3-1-.3h-2c-.5 0-.9-.4-.9-1V13c0-.5.4-.9.9-.9"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_together" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="m23.1 9.3-3.4.7-.3.2a7 7 0 0 0 0 4.4l1.6 5a1 1 0 0 1-.5 1.1h-.3l-.7-.4-2.4-5-2.5 5-.7.5a1 1 0 0 1-.7-.9v-.2l1.6-5.1a7 7 0 0 0 0-4.4l-.3-.2-2.5-.4-2.5.4-.3.2a7 7 0 0 0 0 4.4l1.6 5a1 1 0 0 1-.5 1.1H10l-.6-.4-2.4-5h-.1l-2.4 5a1 1 0 0 1-.8.5 1 1 0 0 1-.7-.9v-.2l1.6-5.1a7 7 0 0 0 0-4.4l-.3-.2-3.5-.7-.5-.7.6-.6H23c.4 0 .7.3.7.7s-.4.6-.7.6m-6-6c1 0 2 .8 2 2 0 1-1 2-2 2s-2-1-2-2c0-1.2 1-2 2-2m-10.2 0c1 0 2 .8 2 2 0 1-1 2-2 2s-2-1-2-2c0-1.2 1-2 2-2"
                          clip-rule="evenodd"></path>
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M7 3c1 0 2 1 2 2.2s-.9 2.3-2 2.3A2.2 2.2 0 0 1 7 3m10.2 0c1.2 0 2.2 1 2.2 2.2s-1 2.3-2.2 2.3-2.2-1-2.2-2.3.9-2.2 2-2.2M.9 8.3l-.4.3a.4.4 0 0 0 .3.5l3.5.6M.7 9.5l3.6.7v.1a7 7 0 0 1 0 4.2l-1.5 5.1v.3a1 1 0 0 0 1 1.1 1 1 0 0 0 .9-.6l2.2-4.7 2.2 4.7a1 1 0 0 0 1.2.5c.6-.1.9-.7.7-1.3l-1.6-5.1a7 7 0 0 1 0-4.2h.2l2.4-.5 2.4.4.2.1c.4 1.4 0 3.9 0 4.2L13 19.6v.3a1 1 0 0 0 1 1.1 1 1 0 0 0 .9-.6l2.2-4.7 2.2 4.7c.2.4.5.6 1 .6h.3c.5-.2.8-.8.6-1.4l-1.6-5.1a7 7 0 0 1 0-4.2h.1l3.4-.7m-3.4.1 3-.5.5-.1.3-.4a.4.4 0 0 0-.4-.4m-3.4 1.4-.5.5a7 7 0 0 0 0 4.4l1.5 5.2-.3.7h-.2l-.4-.3-2.4-5a.3.3 0 0 0-.6 0l-2.4 5-.5.3-.5-.6v-.1l1.6-5.2a7 7 0 0 0 0-4.4l-.5-.5m-5 0-.5.5a7 7 0 0 0 0 4.4l1.6 5.2.2-.1h-.2a1 1 0 0 1-.4.8H10l-.4-.3-2.4-5a.3.3 0 0 0-.6 0l-2.4 5-.4.3-.6-.6v-.1l1.6-5.2a7 7 0 0 0 0-4.4h-.2M.7 9.6a1 1 0 0 1-.7-1 1 1 0 0 1 .9-.8H23c.5 0 .9.4.9.9s-.9.8-.9.8"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_trash_can" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M21 7H3a1 1 0 0 1-1-1V5c0-.6.5-1 1-1h3.2c0-1.5.3-2.3 1-3C8 .3 9 0 10.5 0h3.2c1.5 0 2.4.3 3.1 1s1 1.5 1 3H21c.6 0 1.1.4 1.1 1v1c0 .6-.5 1-1 1m-5.8-4.5a2 2 0 0 0-1.6-.5h-3.2a2 2 0 0 0-1.6.5A2 2 0 0 0 8.3 4h7.4a2 2 0 0 0-.5-1.5M19.9 8l.5.5-1 14c0 .9-.7 1.5-1.5 1.5H6.1c-.8 0-1.5-.6-1.6-1.4l-1-14a.5.5 0 0 1 .6-.6z"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_undo" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M12.6 24H3.4a1.1 1.1 0 1 1 0-2.3h9.2a8 8 0 1 0 0-16H6.9v2.9a.6.6 0 0 1-1 .4L.2 5a1 1 0 0 1 0-.9L6 .1a.6.6 0 0 1 1 .5v2.8h5.7a10.3 10.3 0 1 1 0 20.6"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_unlock" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M3 21.8v-8.6C3 12 3.9 11 5.1 11h.5V5.5c0-2 .5-3.2 1.5-4.1C8 .4 9.3 0 11.5 0h1c2.2 0 3.4.4 4.4 1.4s1.5 2 1.5 4.1V7c0 .6-.5 1-1.1 1a1 1 0 0 1-1-1V5.5c0-1.3-.3-2-1-2.6S14 2 12.5 2h-1c-1.4 0-2.2.3-2.8.9s-1 1.3-1 2.6V11H19c1.2 0 2.1 1 2.1 2.2v8.6c0 1.2-.9 2.2-2.1 2.2H5c-1 0-2-1-2-2.2"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_user" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M21.3 22H2.7c-.4 0-.7-.3-.7-.6.3-3 3.5-6 10-6s9.7 3 10 6c0 .3-.2.6-.6.6zM12 13.7c-3 0-5.4-2.3-5.4-6C6.6 4.3 8.8 2 12 2s5.5 2.4 5.5 5.6c0 3.8-2.6 6-5.5 6"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_user_circle" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M12 24a12 12 0 1 1 0-24 12 12 0 0 1 0 24m10-12a10 10 0 0 0-20 0 10 10 0 0 0 2.6 6.7.4.4 0 0 0 .6 0C6.4 17.2 8.7 16 12 16s5.6 1.2 6.9 2.7h.5A10 10 0 0 0 22 12m-10 2.5c-2.4 0-4.5-2-4.5-5.2 0-2.7 1.8-4.8 4.5-4.8s4.5 2 4.5 4.8c0 3.2-2.1 5.2-4.5 5.2"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_users" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M17.4 13.6c-2 0-3.9-2-3.9-5 0-2.6 1.6-4.6 4-4.6s3.9 2 3.9 4.6c0 3-1.9 5-4 5m0 1.2c4.3 0 6.4 2.4 6.6 4.7 0 .2-.2.5-.4.5h-9a1 1 0 0 1-.7-.6 5 5 0 0 0-1-2.7v-.6a8 8 0 0 1 4.5-1.3M6.6 13.6c-2.1 0-4-2-4-5C2.6 6 4.2 4 6.6 4s3.9 2 3.9 4.6c0 3-1.8 5-4 5m0 1.2c4.3 0 6.4 2.4 6.6 4.7 0 .2-.1.5-.4.5H.5c-.3 0-.5-.2-.5-.5.2-2.3 2.3-4.7 6.6-4.7"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_watch" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M16 19v3.5a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 8 22.5v-3.6A8 8 0 0 1 8 5.1V1.5A1.5 1.5 0 0 1 9.5 0h5A1.5 1.5 0 0 1 16 1.5v3.6a8 8 0 0 1 0 13.8M12 6a6 6 0 1 0 0 12 6 6 0 0 0 0-12m2.8 8.5-3.3-1.7a1 1 0 0 1-.5-.8l.5-4.5a.5.5 0 0 1 1 0l.5 4 2.3 2.1a.5.5 0 0 1-.5.8"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_wrench" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M2 17.6a3 3 0 1 0 4.4 4.3l7.2-8.2.5-.2a7 7 0 0 0 3.5.4 7 7 0 0 0 5.2-5 6 6 0 0 0 .1-2.3.5.5 0 0 0-.8-.3l-3.4 3.5-.5.1-3-.8-.3-.3-.8-3 .1-.5 3.5-3.4a.5.5 0 0 0-.3-.8A6 6 0 0 0 15 1a7 7 0 0 0-5 5.3 7 7 0 0 0 .4 3.5l-.2.5zm2 3.9A1.5 1.5 0 1 1 5.5 20 1.5 1.5 0 0 1 4 21.5"
                          clip-rule="evenodd"></path>
                      </symbol>
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_ynab_logo" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="M19.4 10.8H15l-.3.2-2.6 4.3h-.2L9.3 11l-.2-.2H4.7c-.1 0-.2.1-.1.2l5.2 7.6v4.9l.2.2h4s.2 0 .2-.2v-4.9l5.2-7.6c.1-.1 0-.2 0-.2m-7.7-6.6.3.1h.3c2.5-1.6.4-3.6-.3-4.3-.7.7-2.8 2.7-.3 4.2M9.1 10h.3l.2-.3C11 6.7 8 6.2 6.8 6c-.2 1-.9 4 2.3 4m-4-.7.2-.2v-.3c-.2-3.2-3.1-2.2-4.2-2 .3 1.1 1.1 4 4 2.5m.4 5.3.1-.3c0-.1 0-.2-.2-.3-2-2.4-3.8 0-4.5 1 .9.6 3.3 2.4 4.6-.4M12 5c-.6.6-2.2 2.2-.2 3.6h.4c2-1.4.3-3-.2-3.6"></path>
                        <path fill="currentColor"
                          d="m6.6 16-.2-.1c-2 0-1.6 1.8-1.5 2.5.7-.2 2.5-.5 1.8-2.3zm5-3.1h.5c2-1.4.3-3-.2-3.6-.6.6-2.2 2.2-.2 3.6m-8.2-1v-.5c-1.2-2-3-.5-3.6 0 .6.5 2 2.3 3.6.5m2-5.6h.2l.1-.3c.9-2.1-1.4-2.6-2.2-2.7-.1.8-.5 3 1.9 3m3.2-.7H9s.2 0 .2-.2c1.5-2.1-.8-3.2-1.6-3.6-.4.8-1.4 3.2 1.2 3.8m5.8 4.4h.3c3.2.1 2.5-2.9 2.3-4-1 .3-4 .8-2.8 3.7 0 .2.1.2.2.3m4-1.1.1.3.3.2c2.8 1.5 3.6-1.4 4-2.4-1.2-.3-4-1.3-4.3 1.9m-.1 5.2c-.2.1-.2.2-.2.3v.3c1.4 2.8 3.8 1 4.7.3-.7-.8-2.5-3.3-4.5-1m-1 2h-.2l-.1.2c-.7 1.8 1.1 2.1 1.8 2.3 0-.7.4-2.5-1.5-2.5m2.8-4.6v.5c1.5 1.8 3 0 3.6-.6-.7-.4-2.4-1.9-3.6.1m-2.2-5.2.2.1c2.4 0 2-2.2 1.9-3-.8.1-3 .6-2.2 2.7zM15 5.5h.2c2.6-.6 1.6-3 1.2-3.8-.8.4-3.1 1.5-1.6 3.6z"></path>
                      </symbol>
                    </svg>
                  </div>
                </div>
              </div>
            </div>
            <div class="budget-table-draggable">

            </div>
          </div>
          <!---->
        </section>
        <aside class="budget-inspector" style="width: 33%">
          <div class="budget-inspector-resizer">
            <div class="budget-inspector-resizer-indicator"></div>
          </div>
          <div class="budget-inspector-content"></div>
        </aside>
      </div>
      <!---->
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    // ember18
    $(document).ready(function() {
      $('.views-menu-button').on('mouseenter', function() {
        // Cambiar el estilo de transición con retraso
        $('#ember18').css('transition', 'opacity 0.2s 0.6s');
        $('#ember18').css('opacity', '1');
      }).on('mouseleave', function() {
        $('#ember18').css('opacity', '0');
        // Restaurar el estilo de transición original
        $('#ember18').css('transition', 'opacity 0.2s');
      });
    });

    // ember20
    $(document).ready(function() {
      $('.budget-toolbar-add-category').on('mouseenter', function() {
        // Cambiar el estilo de transición con retraso
        $('#ember20').css('transition', 'opacity 0.2s 0.6s');
        $('#ember20').css('opacity', '1');
      }).on('mouseleave', function() {
        $('#ember20').css('opacity', '0');
        // Restaurar el estilo de transición original
        $('#ember20').css('transition', 'opacity 0.2s');
      });
    });

    // ember23
    $(document).ready(function() {
      $('.budget-toolbar-open-recent-moves').on('mouseenter', function() {
        // Cambiar el estilo de transición con retraso
        $('#ember23').css('transition', 'opacity 0.2s 0.6s');
        $('#ember23').css('opacity', '1');
      }).on('mouseleave', function() {
        $('#ember23').css('opacity', '0');
        // Restaurar el estilo de transición original
        $('#ember23').css('transition', 'opacity 0.2s');
      });
    });
    // ember24
    $(document).ready(function() {
      $('.segmented-control-button[title="Progress Bars On"]').on('mouseenter', function() {
        // Cambiar el estilo de transición con retraso
        $('#ember24').css('transition', 'opacity 0.2s 0.6s');
        $('#ember24').css('opacity', '1');
      }).on('mouseleave', function() {
        $('#ember24').css('opacity', '0');
        // Restaurar el estilo de transición original
        $('#ember24').css('transition', 'opacity 0.2s');
      });
    });
    // ember25
    $(document).ready(function() {
      $('.segmented-control-button[title="Progress Bars Off"]').on('mouseenter', function() {
        // Cambiar el estilo de transición con retraso
        $('#ember25').css('transition', 'opacity 0.2s 0.6s');
        $('#ember25').css('opacity', '1');
      }).on('mouseleave', function() {
        $('#ember25').css('opacity', '0');
        // Restaurar el estilo de transición original
        $('#ember25').css('transition', 'opacity 0.2s');
      });
    });

    $(function() {
      window.addEventListener('focusInput', function() {
        setTimeout(function() {
          $('#budget-name').focus();
          centerModal(); //
        }, 100); // Retraso de 100 ms
      });
      const $newBudget = $('#new_budget_modal');
      //Abre modal New Budget
      window.addEventListener('showCreateModalForm', function() {
        $('#new_budget_modal').show();
        $('#modal-settings-budget-name').focus();
        centerModal();
      })

      //Cierra el modal New Budget
      window.addEventListener('hideCreateModalForm', function() {
        $('#new_budget_modal').hide();
      })

    });

    // Inicializa el calendario con la fecha actual
    document.addEventListener('DOMContentLoaded', function() {
      const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
      let currentDate = new Date(); // Fecha actual

      const updateCalendar = () => {
        const currentMonth = monthNames[currentDate.getMonth()];
        const currentYear = currentDate.getFullYear();
        document.getElementById('current-date').innerText = `${currentMonth} ${currentYear}`;
      };

      document.getElementById('prev-month').addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        updateCalendar();
      });

      document.getElementById('next-month').addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        updateCalendar();
      });

      updateCalendar(); // Inicializa el calendario con la fecha actual
    });

    // modal calendar
    document.addEventListener('DOMContentLoaded', function() {
      const openButton = document.querySelector('.budget-header-calendar-date-button');

      openButton.addEventListener('click', function() {
        const modalActive = document.getElementById('ember148');
        modalActive.classList.add('modal-overlay', 'active');
        event.stopPropagation();
      });
    });

    // Cerrar el modal calendar al hacer clic fuera de él
    document.addEventListener('click', function(event) {
      const modalActive = document.getElementById('ember148');
      const modal = document.querySelector('.modal');
      if(modalActive.classList.contains('active') && !modal.contains(event.target) && !event.target.classList.contains('budget-header-calendar-date-button')) {
        modalActive.classList.remove('modal-overlay', 'active');
      }
    });

  </script>
@endpush
