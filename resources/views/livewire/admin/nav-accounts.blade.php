<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
	<div class="nav-accounts">
		@if(!$budgetAccounts->isEmpty())
			@foreach($accountGroups as $group)
				{{--<div class="nav-account {{ $group->type === 'Budget' ? 'onBudget' : ($group->type === 'Loans' ? 'loan' : 'offBudget') }}">--}}
				<div class="nav-account {{ $group->type === 'Cash' ? 'cash' : ($group->type === 'Credit' ? 'credit' : ($group->type === 'Loans' ? 'loan' : 'offBudget')) }}">
					<div class="nav-account-block" wire:click="toggleGroup('{{ $group->type }}')">
						<button class="nav-account-name nav-account-name-button user-data" aria-label="collapse {{ strtoupper($group->type) }}" type="button">
							<svg class="ynab-new-icon" width="8" height="8">
								<use href="#icon_sprite_chevron_{{ $showGroups[$group->type] ?? false ? 'down' : 'right' }}">
									<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_chevron_down" fill="none" viewBox="0 0 24 24">
										<path fill="currentColor" fill-rule="evenodd"
											d="M13 18.7a1.4 1.4 0 0 1-2 0L.4 7.4a2 2 0 0 1 0-2 1.4 1.4 0 0 1 2 0l9.6 10 9.6-10.2a1.4 1.4 0 0 1 2 0 2 2 0 0 1 0 2.1z"
											clip-rule="evenodd"></path>
									</symbol>
									<!---->
									<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_chevron_right" fill="none" viewBox="0 0 24 24">
										<path fill="currentColor" fill-rule="evenodd"
											d="M7.4 23.6a1.5 1.5 0 0 1-2 0 1.4 1.4 0 0 1 0-2l10-9.6-10-9.6a1.4 1.4 0 0 1 0-2 1.5 1.5 0 0 1 2 0L18.6 11c.5.6.5 1.4 0 2z"
											clip-rule="evenodd"></path>
									</symbol>
								</use>
							</svg>
							<div>{{ strtoupper($group->type) }}</div>
						</button>
						<div class="nav-account-value nav-account-block-value user-data">
              <span class="user-data currency tabular-nums {{ $group->total_balance >= 0 ? 'positive' : 'negative' }}">
                {{ $group->total_balance < 0 ? '−' : '' }}<bdi>{{ currency() }}</bdi>{{ format_number(abs($group->total_balance)) }}
              </span>
						</div>
						<div class="nav-account-icons nav-account-icons-right"></div>
					</div>
					@if($showGroups[$group->type] ?? false)
						<div id="accounts-container-{{ $group->type }}" class="accounts-container">
							@foreach($group->accounts as $account)
								<a id="ember{{ $account->id }}" draggable="true" class="nav-account-row {{ $account->id == $activeAccountId ? 'is-selected' : '' }} "
									href="{{ route('accounts.assign', ['id' => $account->id]) }}" data-account-id="{{ $account->id }}">
									<div class="nav-account-icons nav-account-icons-left js-nav-account-icons-left" title="Edit Account"
										wire:click="openEditAccountModal({{ $account->id }})"
										onclick="event.preventDefault(); event.stopPropagation()">
										<svg class="ynab-new-icon edit" width="12" height="12">
											<use href="#icon_sprite_pencil">
												<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_pencil" fill="none" viewBox="0 0 24 24">
													<path fill="currentColor" fill-rule="evenodd"
														d="m0 23.5 1.1-3.7A4 4 0 0 1 2.2 18l14-14a.5.5 0 0 1 .8 0l3 3a.5.5 0 0 1 0 .8l-14 14c-.5.5-1.1.9-1.8 1L.5 24a.4.4 0 0 1-.5-.5m22-23L23.5 2a1.6 1.6 0 0 1 0 2.3L21.7 6a.5.5 0 0 1-.8 0l-3-3a.5.5 0 0 1 0-.8L19.7.5a1.6 1.6 0 0 1 2.3 0"
														clip-rule="evenodd"></path>
												</symbol>
											</use>
										</svg>
									</div>
									<div class="nav-account-name user-data" title="{{ $account->nickname }}">
										{{ $account->nickname }}
									</div>
									<div class="nav-account-value user-data">
                    <span class="user-data currency tabular-nums {{ $account->balance >= 0 ? 'positive' : 'negative' }}">
                        {{ $account->balance < 0 ? '−' : '' }}<bdi>{{ currency() }}</bdi>{{ format_number(abs($account->balance)) }}
                    </span>
									</div>
									<span id="ember{{ $account->id + 1 }}" class="direct-status-import-icon nav-account-icons nav-account-icons-right">
                    <svg class="ynab-new-icon" width="16" height="16">
                        <use href="#icon_sprite_"></use>
                    </svg>
                </span>
								</a>
							@endforeach
						</div>
					@endif
				</div>
			@endforeach
		@endif
	</div>
</div>
