{{-- content layout --}}
<div id="create-budget" class="content-layout user-logged-in">
	<a class="skip-to-content" href="#start-of-content">Skip to content</a>
	<!-- Sidebar -->
	<nav id="nav-sidebar" class="ynab-u sidebar logged-in" style="width: 260px;" role="navigation">
		<div class="sidebar-left">
			<div class="sidebar-contents">
				<div class="dashboard">
					<button class="sidebar-nav-menu sibedar-nav-menu-budget js-sidebar-nav-menu user-data" type="button" wire:click="openMenuSettingsModal">
						<div class="sidebar-nav-budget-email">
							<span class="sidebar-nav-budget-email-budget">{{ $activeBudget->name ?? 'YNAB' }}</span>
							<span class="sidebar-nav-budget-email-email button-truncate">{{ $user->email }}</span>
						</div>
						<svg class="ynab-new-icon sidebar-nav-arrow" width="16" height="16">
							<!---->
							<use href="#icon_sprite_caret_down">
								<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_caret_down" fill="none" viewBox="0 0 24 24">
									<path fill="currentColor" d="M11 19.5.2 6.1C-.4 5.2.3 4 1.3 4h21.4c1 0 1.7 1.2 1 2L13.1 19.6a1.4 1.4 0 0 1-2.2 0"></path>
								</symbol>
							</use>
						</svg>
					</button>
					<!---->
					<div class="dashboard-learn-more">
						<div class="explore-resources-heading">
							<h3>Explore Resources</h3>
							<img class="resource-image" src="{{ asset('images/front/brand/blue-squiggle.svg') }}" alt="A squiggly blue line.">
						</div>
						<section class="dashboard-group">
							<img class="resource-image" src="{{ asset('images/front/brand/tv.svg') }}" alt="An image of an old timey TV set.">
							There’s no shame in one-after-another if it changes your life.
							<a class="ynab-button contrast" href="https://www.ynab.com/videos/" data-analytics="Click Watch Videos" target="_blank" rel="noopener noreferrer">
								Watch the Videos
							</a>
						</section>
						<section class="dashboard-group">
							<img class="resource-image" src="{{ asset('images/front/brand/books.svg') }}" alt="A stack of books.">
							Stay in the know with a daily dose of all things YNAB.
							<a class="ynab-button contrast" href="https://www.ynab.com/blog" data-analytics="Click Read the Blog" target="_blank" rel="noopener noreferrer">
								Read the Blog
							</a>
						</section>
						<section class="dashboard-group">
							<img class="resource-image" src="{{ asset('images/front/brand/mic.svg') }}" alt="A podcast microphone.">
							Budgeting wisdom and occasional hilarious off-topic musings.
							<a class="ynab-button contrast" href="https://www.ynab.com/podcasts/" data-analytics="Click Listen Podcasts" target="_blank" rel="noopener noreferrer">
								Listen to the Podcasts
							</a>
						</section>
					</div> <!--End Dashboard learn more-->
				</div>
				<!---->
			</div>
		</div> <!-- Sidebar Left-->
		<!---->
	</nav> <!--End Nav-->
	<!---->
	<div id="start-of-content"></div>
	<div class="content users-budgets">
		<div class="flash-message">
			<!---->
		</div>
		<div class="budget-picker-section">
			<h3>Your Budgets</h3>
			<div class="budgets">
				<!---->
				{{-- Budget List Items active budget --}}
				@if($budgets->isNotEmpty())
					@foreach($budgets as $budget)
						<!-- Itera sobre cada presupuesto -->
						<div class="budget-list-item">
							<a href="#" wire:click.prevent="setActiveBudget({{ $budget->id }})">
								<div class="thumbnail">
									<svg class="ynab-new-icon" width="90" height="90">
										<!---->
										<use href="#icon_sprite_ynab_logo">
											<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_ynab_logo" fill="none" viewBox="0 0 24 24">
												<path fill="currentColor"
													d="M19.4 10.8H15l-.3.2-2.6 4.3h-.2L9.3 11l-.2-.2H4.7c-.1 0-.2.1-.1.2l5.2 7.6v4.9l.2.2h4s.2 0 .2-.2v-4.9l5.2-7.6c.1-.1 0-.2 0-.2m-7.7-6.6.3.1h.3c2.5-1.6.4-3.6-.3-4.3-.7.7-2.8 2.7-.3 4.2M9.1 10h.3l.2-.3C11 6.7 8 6.2 6.8 6c-.2 1-.9 4 2.3 4m-4-.7.2-.2v-.3c-.2-3.2-3.1-2.2-4.2-2 .3 1.1 1.1 4 4 2.5m.4 5.3.1-.3c0-.1 0-.2-.2-.3-2-2.4-3.8 0-4.5 1 .9.6 3.3 2.4 4.6-.4M12 5c-.6.6-2.2 2.2-.2 3.6h.4c2-1.4.3-3-.2-3.6"></path>
												<path fill="currentColor"
													d="m6.6 16-.2-.1c-2 0-1.6 1.8-1.5 2.5.7-.2 2.5-.5 1.8-2.3zm5-3.1h.5c2-1.4.3-3-.2-3.6-.6.6-2.2 2.2-.2 3.6m-8.2-1v-.5c-1.2-2-3-.5-3.6 0 .6.5 2 2.3 3.6.5m2-5.6h.2l.1-.3c.9-2.1-1.4-2.6-2.2-2.7-.1.8-.5 3 1.9 3m3.2-.7H9s.2 0 .2-.2c1.5-2.1-.8-3.2-1.6-3.6-.4.8-1.4 3.2 1.2 3.8m5.8 4.4h.3c3.2.1 2.5-2.9 2.3-4-1 .3-4 .8-2.8 3.7 0 .2.1.2.2.3m4-1.1.1.3.3.2c2.8 1.5 3.6-1.4 4-2.4-1.2-.3-4-1.3-4.3 1.9m-.1 5.2c-.2.1-.2.2-.2.3v.3c1.4 2.8 3.8 1 4.7.3-.7-.8-2.5-3.3-4.5-1m-1 2h-.2l-.1.2c-.7 1.8 1.1 2.1 1.8 2.3 0-.7.4-2.5-1.5-2.5m2.8-4.6v.5c1.5 1.8 3 0 3.6-.6-.7-.4-2.4-1.9-3.6.1m-2.2-5.2.2.1c2.4 0 2-2.2 1.9-3-.8.1-3 .6-2.2 2.7zM15 5.5h.2c2.6-.6 1.6-3 1.2-3.8-.8.4-3.1 1.5-1.6 3.6z"></path>
											</symbol>
										</use>
									</svg>
								</div>
								<button class="select-budget user-data select-budget-name-button" type="button">{{ $budget->name }}</button>
								<div class="last-modified user-data">
									Last used {{ $budget->created_at->diffForHumans() }}
								</div>
								<div class="hover-state" title="{{ $budget->name }}">
									<button class="select-budget user-data" type="button">{{ $budget->name }}</button>
									<div class="last-modified user-data">
										Last used {{ $budget->created_at->diffForHumans() }}
									</div>
									<button wire:click.prevent.stop="openSureDelete" class="wants-tombstone-button" type="button">
										<svg class="ynab-new-icon" width="16" height="16">
											<!---->
											<use href="#icon_sprite_trash_can">
												<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_trash_can" fill="none" viewBox="0 0 24 24">
													<path fill="currentColor" fill-rule="evenodd"
														d="M21 7H3a1 1 0 0 1-1-1V5c0-.6.5-1 1-1h3.2c0-1.5.3-2.3 1-3C8 .3 9 0 10.5 0h3.2c1.5 0 2.4.3 3.1 1s1 1.5 1 3H21c.6 0 1.1.4 1.1 1v1c0 .6-.5 1-1 1m-5.8-4.5a2 2 0 0 0-1.6-.5h-3.2a2 2 0 0 0-1.6.5A2 2 0 0 0 8.3 4h7.4a2 2 0 0 0-.5-1.5M19.9 8l.5.5-1 14c0 .9-.7 1.5-1.5 1.5H6.1c-.8 0-1.5-.6-1.6-1.4l-1-14a.5.5 0 0 1 .6-.6z"
														clip-rule="evenodd"></path>
												</symbol>
											</use>
										</svg>
									</button>
								</div>
								@if($isOpenSureModal)
									<div class="are-you-sure">
										<div class="are-you-sure-vertical">
											Are you sure you want to delete the budget '{{ $budget->name }}'?
											<div class="actions">
												<button class="ynab-button primary" type="button" wire:click.prevent.stop="closeSureModal">
													Cancel
												</button>
												<button class="ynab-button destructive" type="button" wire:click.prevent.stop="deleteBudget({{ $budget->id }})">
													Delete
												</button>
											</div>
										</div>
									</div>
								@endif
							</a>
						</div>
					@endforeach
				@endif
				<!---->
				{{-- Botton Create New Budgewt --}}
				<div class="create-new-budget" wire:click.prevent="openCreateModal">
					<button type="button">
						<svg class="ynab-new-icon" width="80" height="80">
							<!---->
							<use href="#icon_sprite_plus_circle_fill">
								<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_plus_circle_fill" fill="none" viewBox="0 0 24 24">
									<path fill="currentColor"
										d="M12 0a12 12 0 1 0 0 24 12 12 0 0 0 0-24m4.8 13.2h-3.6v3.6c0 .7-.5 1.2-1.2 1.2s-1.2-.5-1.2-1.2v-3.6H7.2c-.7 0-1.2-.5-1.2-1.2s.5-1.2 1.2-1.2h3.6V7.2c0-.7.5-1.2 1.2-1.2s1.2.5 1.2 1.2v3.6h3.6c.7 0 1.2.5 1.2 1.2s-.5 1.2-1.2 1.2"></path>
								</symbol>
							</use>
						</svg>
						Create New Budget
					</button>
				</div>
				<!---->
			</div>
		</div>
		<div class="budget-picker-section">
			<!---->
		</div>
	</div> <!--End Content-->
	<!---->
	<livewire:admin.create-budget :fromBudget="true"/>
</div>

@push('scripts')
	<script>
		
		// Escuchar el evento 'redirectHome'
		document.addEventListener('DOMContentLoaded', function () {
			Livewire.on('redirectHome', function () {
				Livewire.navigate('{{ route("admin.budget") }}');
			});
		});
	
	</script>
@endpush
