@extends('owner/index')
@section('title', "Pricing plan")

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('owner.pricingPlan', ['id' =>  Session::get('idSession')]) }}">Pricing plan</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    @if($payment !== null)
        @if($payment === 0)
            <div>
                <p>You have sent an upgrade request. Please wait for a response from us!</p>
            </div>
        @endif
    @endif
    <div class="container">
        <div class="fix-top">
            @if ($paidSuccess)
                <div class="alert alert-success">
                    <h6>{{ $paidSuccess }}</h6>
                </div>
            @endif
        </div>
        <div>
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th></th>
                        <th>
                            <div>
                                <p class="plan-title">Trial Version</p>
                                <p class="plan-desc">(You have 7 days for a free trial)</p>
                            </div>
                        </th>
                        <th>
                            <div>
                                <p class="plan-title">Paid Version</p>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="monthly-price">
                                Monthly price
                            </div>
                        </td>
                        <td>
                            <div class="money-pricing monthly-price">
                                <span class="pricing-table__feature-value pricing-table__feature-price monthly-price__price">0</span>
                                <span class="monthly-price__billing-period text-minor">/mo</span>
                                <span class="monthly-price__currency text-minor">USD</span>
                            </div>
                        </td>
                        <td>
                            <div class="money-pricing monthly-price">
                                <span class="pricing-table__feature-value pricing-table__feature-price monthly-price__price">14.99</span>
                                <span class="monthly-price__billing-period text-minor">/mo</span>
                                <span class="monthly-price__currency text-minor">USD</span>
                            </div>
                        </td>
                    </tr>
                    @if($status == null)
                        <tr>
                            <td>
                                <div class="monthly-price">
                                    Plan
                                </div>
                            </td>
                            <td colspan="2">
                                <div class="monthly-price">
                                    You need to own at least one hotel
                                </div>
                            </td>
                        </tr>
                    @endif
                    @if($status == 1)
                        <tr>
                            <td>
                                <div class="monthly-price">
                                    Select Plan
                                </div>
                            </td>
                            <td>
                                <div class="monthly-price">
                                   <p class="current-plan">Current plan</p>
                                </div>
                            </td>
                            <td>
                                <div class="monthly-price">
                                    <button type="button" class="btn" style="background: #00084b; color: #fff; width: 25%!important"><a href="{{ route('owner.paymentPlan') }}">Upgrade</a></button>
                                </div>
                            </td>
                        </tr>
                    @endif
                    @if($status == 2)
                        <tr>
                            <td>
                                <div class="monthly-price">
                                    Select Plan
                                </div>
                            </td>
                            <td>
                                <div class="monthly-price">
                                    {{-- <button type="button" class="btn " style="background: #00084b; color: #fff; width: 25%!important">Select</button> --}}
                                </div>
                            </td>
                            <td>
                                <div class="monthly-price">
                                    Current plan
                                </div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>

    </script>
@endpush
