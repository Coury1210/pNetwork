@extends('layouts.frontend.app')

@section('title','Withdraw')

@section('content')
<!-- success-alert start -->
<div class="alert-message-area">
	<div class="alert-content">
		<h4 class="ale">{{ __(config('constants.success.settings_updated')) }}</h4>
	</div>
</div>
<!-- success-alert end -->

<!-- error-alert start -->
<div class="error-message-area">
	<div class="error-content">
		<h4 class="error-msg">{{ __(config('constants.success.settings_updated')) }}</h4>
	</div>
</div>
<!-- error-alert end -->

<!-- main area start -->
<section>
	<div class="main-area pt-50 ml-200">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="tab-content">
						<div class="setting-main-area" id="balance">
							<div class="settings-content-area">
								<div class="settings-form">
									<div class="row">
										<div class="col-lg-12">
											<div class="withdraw-dashboard">
												<h4>{{ __('Select payment method') }}</h4>
												<hr>
												<div class="withdraw-payment-choose">
													<nav>
														<ul class="nav nav-tabs">
															<li>
																<a href="#paypal_section" data-toggle="tab" class="active">
																	<div class="single-payment-method text-center">
																		<img src="{{ asset('frontend/img/paypal.png') }}">
																		<p>{{ __('Minimum') }} {{ $currency_value->symbol }}50.00</p>
																	</div>
																</a>
															</li>
															<li>
																<a href="#swift_section" data-toggle="tab" style="margin-left: 100px">
																	<div class="single-payment-method text-center">
																		<img src="{{ asset('frontend/img/swift.png') }}">
																		<p>{{ __('Minimum') }} {{ $currency_value->symbol }}500.00</p>
																	</div>
																</a>
															</li>

															<li>
																<a href="#crypto_section" data-toggle="tab" style="margin-left: 200px">
																	<div class="single-payment-method text-center">
																		<img src="{{ asset('frontend/img/crypto.png') }}">
																		<p>{{ __('Minimum') }} {{ $currency_value->symbol }}500.00</p>
																	</div>
																</a>
															</li>
														</ul>
													</nav>
													<div class="tab-content">
														<div class="paypal-section tab-pane fade active show" id="paypal_section">
															<form class="deposit_form" action="{{ route('deposit.store') }}" method="post">
																@csrf
																<div class="row">
																	<div class="col-lg-6">
																		<div class="form-group">
																			<label>{{ __('PayPal E-mail') }}</label>
																			<input type="email" class="form-control" placeholder="{{ __('PayPal E-mail') }}" name="paypal_email">
																			<input type="hidden" name="method" value="paypal">
																		</div>
																	</div>	
																	<div class="col-lg-6">
																		<div class="form-group">
																			<label>{{ __('Amount') }}</label>
																			<input type="number" class="form-control" placeholder="{{ __('Amount') }}" name="amount">
																		</div>
																	</div>
																</div>
																<div class="settings-btn">
																	<button class="withdraw_button" type="submit">{{ __('Deposit') }}</button>
																</div>
															</form>
														</div>

														<div class="paypal-section tab-pane fade" id="crypto_section">
															<form class="deposit_form" action="{{ route('deposit.store') }}" method="post">
																@csrf
																<div class="row">
																	<div class="col-lg-6">
																		<div class="form-group">
																			<label>{{ __('Bitcoin Address') }}</label>
																			<input type="text" class="form-control" placeholder="{{ __('Bitcoin Address') }}" name="btc_address">
																			<input type="hidden" name="method" value="btc">
																		</div>
																	</div>	
																	<div class="col-lg-6">
																		<div class="form-group">
																			<label>{{ __('Amount') }}</label>
																			<input type="number" class="form-control" placeholder="{{ __('Amount') }}" name="amount">
																		</div>
																	</div>
																</div>
																<div class="settings-btn">
																	<button class="withdraw_button" type="submit">{{ __('Deposit') }}</button>
																</div>
															</form>
														</div>



														<div class="swift-section tab-pane fade" id="swift_section">
															<form class="deposit_form" action="{{ route('deposit.store') }}" method="POST">
																@csrf
																<div class="row">
																	<div class="col-lg-12">
																		<div class="form-group">
																			<label>{{ __('Full Name') }}</label>
																			<input type="text" class="form-control" placeholder="{{ __('Full Name') }}" name="name">
																			<input type="hidden" id="withdraw_index" value="{{ route('withdraw.index') }}">
																		</div>
																	</div>	
																	<div class="col-lg-12">
																		<div class="form-group">
																			<label>{{ __('Email') }}</label>
																			<input type="email" class="form-control" placeholder="{{ __('Email') }}" name="email">
																			<input type="hidden" name="type" value="swift">
																		</div>
																	</div>
																	<div class="col-lg-12">
																		<div class="form-group">
																			<label>{{ __('Billing Address Line 1') }}</label>
																			<input type="text" class="form-control" placeholder="{{ __('Billing Address Line 1') }}" name="billing_address_1">
																		</div>
																	</div>
																	<div class="col-lg-12">
																		<div class="form-group">
																			<label>{{ __('Billing Address Line 2(Optional)') }}</label>
																			<input type="text" class="form-control" placeholder="{{ __('Billing Address Line 2(Optional)') }}" name="billing_address_2">
																		</div>
																	</div>
																	<div class="col-lg-12">
																		<div class="form-group">
																			<label>{{ __('City') }}</label>
																			<input type="text" class="form-control" placeholder="{{ __('City') }}" name="city">
																		</div>
																	</div>
																	<div class="col-lg-12">
																		<div class="form-group">
																			<label>{{ __('State(Optional)') }}</label>
																			<input type="text" class="form-control" placeholder="{{ __('State(Optional)') }}" name="state">
																		</div>
																	</div>
																	<div class="col-lg-12">
																		<div class="form-group">
																			<label>{{ __('Postal Code') }}</label>
																			<input type="number" class="form-control" placeholder="{{ __('Postal Code') }}" name="postal_code">
																		</div>
																	</div>
																	<div class="col-lg-12">
																		<div class="form-group">
																			<label>{{ __('Amount') }}</label>
																			<input type="number" class="form-control" placeholder="{{ __('Amount') }}" name="amount">
																		</div>
																	</div>
																	<div class="col-lg-12">
																		<div class="form-group">
																			<label>{{ __('Country') }}</label>
																			<div class="login-birthday-display">
																				<div class="login-form-gorup">
																					<select name="country">
																						<option value=""></option>
																					</select>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col-lg-12">
																		<hr>
																	</div>
																	<div class="col-lg-12">
																		<div class="form-group">
																			<label>{{ __("Bank Account Holder's Name") }}</label>
																			<input type="text" class="form-control" placeholder="{{ __("Bank Account Holder's Name") }}" name="account_holder_name">
																		</div>
																	</div>
																	<div class="col-lg-12">
																		<div class="form-group">
																			<label>{{ __('Bank Account Number/IBAN') }}</label>
																			<input type="text" class="form-control" placeholder="{{ __('Bank Account Number/IBAN') }}" name="account_number">
																		</div>
																	</div>
																	<div class="col-lg-12">
																		<div class="form-group">
																			<label>{{ __('SWIFT Code') }}</label>
																			<input type="number" class="form-control" placeholder="{{ __('SWIFT Code') }}" name="swift_code">
																		</div>
																	</div>
																	<div class="col-lg-12">
																		<div class="form-group">
																			<label>{{ __('Bank Name in Full') }}</label>
																			<input type="text" class="form-control" placeholder="{{ __('Bank Name in Full') }}" name="bank_full_name">
																		</div>
																	</div>
																	<div class="col-lg-12">
																		<div class="form-group">
																			<label>{{ __('Bank Branch City') }}</label>
																			<input type="text" class="form-control" placeholder="{{ __('Bank Branch City') }}" name="bank_branch_city">
																		</div>
																	</div>
																	<div class="col-lg-12">
																		<div class="form-group">
																			<label>{{ __('Bank Branch Country') }}</label>
																			<div class="login-birthday-display">
																				<div class="login-form-gorup">
																					<select name="bank_branch_country">
																					
																						<option value=""></option>
																					</select>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col-lg-12">
																		<hr>
																	</div>
																	<div class="col-lg-12">
																		<div class="form-group">
																			<label>{{ __('Intermediary Bank - Bank Code') }}</label>
																			<input type="text" class="form-control" placeholder="{{ __('Intermediary Bank - Bank Code') }}" name="intermediary_bank_code">
																		</div>
																	</div>
																	<div class="col-lg-12">
																		<div class="form-group">
																			<label>{{ __('Intermediary Bank - Name') }}</label>
																			<input type="text" class="form-control" placeholder="{{ __('Intermediary Bank - Name') }}" name="intermediary_bank_name">
																		</div>
																	</div>
																	<div class="col-lg-12">
																		<div class="form-group">
																			<label>{{ __('Intermediary Bank - City') }}</label>
																			<input type="text" class="form-control" placeholder="{{ __('Intermediary Bank - City') }}" name="intermediary_bank_city">
																		</div>
																	</div>
																	<div class="col-lg-12">
																		<div class="form-group">
																			<label>{{ __('Intermediary Bank - Country') }}</label>
																			<div class="login-birthday-display">
																				<div class="login-form-gorup">
																					<select name="intermediary_bank_country">
																					
																						<option value=""></option>
																					</select>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="settings-btn">
																	<button class="withdraw_button" type="submit">{{ __('Deposit') }}</button>
																</div>
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
                                <div class="withdraw-body">
                                    <h4>{{ __('Withdraw History') }}</h4>
                                    <div class="ads-table table-responsive mt-30">
                                        <table class="table">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">{{ __('Transaction Id') }}</th>
                                                    <th scope="col">{{ __('Email') }}</th>
                                                    <th scope="col">{{ __('Payment Method') }}</th>
                                                    <th scope="col">{{ __('Total Amount') }}</th>
                                                    <th scope="col">{{ __('Status') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (count($withdraws) <= 0)
                                                 <tr> <td><p>No withdraw records </p></td></tr>
                                                @endif
                                                @foreach($withdraws as $key=>$withdraw)
                                                <tr>
                                                    <th scope="row">{{ $key + 1 }}</th>
                                                    <td>{{ $withdraw->withdraw_id }}</td>
                                                    <td class="email">{{ $withdraw->email }}</td>
                                                    <td>{{ $withdraw->type }}</td>
                                                    <td>{{ $currency_value->symbol }}{{ number_format($withdraw->amount,2) }}</td>
                                                    <td>
                                                        @if($withdraw->status == 'pending')
                                                        <div class="ads-publish">
                                                              <a href="javascript:void(0)" class="pjax pending disabled">{{ __('Pending') }}</a>
                                                          </div>
                                                        @elseif($withdraw->status == 'approve')
                                                        <div class="ads-publish">
                                                              <a href="javascript:void(0)" class="pjax publish disabled">{{ __('Approved') }}</a>
                                                          </div>
                                                          @else
                                                          <div class="ads-publish">
                                                              <a href="javascript:void(0)" class="pjax reject disabled">{{ __('Rejected') }}</a>
                                                          </div>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot class="thead-light">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">{{ __('Transaction Id') }}</th>
                                                    <th scope="col">{{ __('Email') }}</th>
                                                    <th scope="col">{{ __('Payment Method') }}</th>
                                                    <th scope="col">{{ __('Total Amount') }}</th>
                                                    <th scope="col">{{ __('Status') }}</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
							</div>
						</div>
						
						<div class="setting-main-area tab-pane fade" id="balance">
							<p> Deposit Area </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- main area end -->
@endsection