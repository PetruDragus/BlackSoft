@extends('layouts.app')

@section('content')
    <div id="dash">
        <div class="row">
            <div class="col-sm-12 sunset-msg">
                <div>
                    <img src="https://image.flaticon.com/icons/png/512/205/205630.png" width="75" />
                </div>

                <div class="text-box">
                    @if(!Auth::user()->profile)
                        <p class="tit">Good Morning, {{ Auth::user()->name }}</p>
                    @else
                        <p class="tit">Good Morning, {{ Auth::user()->profile->name }}</p>
                    @endif
                    <p class="subtit">It's time to take on the day.</p>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <div class="card dashboard-card">
                    <div class="card-header custom-header pb-0" style="display: flex;">
                        <div>
                            <h2 class="card-title">Bookings</h2>
                            <h6 class="card-subtitle">Overview of this month</h6>
                        </div>
                        <div class="card-options toggles">
                            <input type="checkbox" name="checkbox1" id="checkbox1" class="ios-toggle" checked/>
                            <label for="checkbox1" class="checkbox-label" data-off="off" data-on="on"></label>
                        </div>
                    </div>

                    <div class="card-body">
                        <p class="text-muted">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                        <div class="row">
                            <div class="col-8">
                                <h6 class="text-body text-uppercase font-weight-semibold">Total Bookings</h6>
                                <h2 class="text-primary count mt-0 font-30 mb-0">{{ $new_bookings->count() }}</h2>
                            </div>
                            <div class="col-4">
                                <img src="https://www.spruko.com/demo/sparic/html/assets/images/svg/chart.svg" alt="imag" class="w-40 h-100 text-right float-right">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <div class="card dashboard-card">
                    <div class="card-header custom-header pb-0" style="display: flex;">
                        <div>
                            <h2 class="card-title">Customers</h2>
                            <h6 class="card-subtitle">Overview of this month</h6>
                        </div>
                        <div class="card-options toggles">
                            <input type="checkbox" name="checkbox1" id="checkbox1" class="ios-toggle" />
                            <label for="checkbox1" class="checkbox-label" data-off="off" data-on="on"></label>
                        </div>
                    </div>

                    <div class="card-body">
                        <p class="text-muted">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                        <div class="row">
                            <div class="col-8">
                                <h6 class="text-body text-uppercase font-weight-semibold">Total Customers</h6>
                                <h2 class="text-secondary count mt-0 font-30 mb-0">{{ $new_customers->count() }}</h2>
                            </div>
                            <div class="col-4">
                                <img src="https://www.spruko.com/demo/sparic/html/assets/images/svg/businessman.svg" alt="imag" class="w-40 h-100 text-right float-right">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <div class="card dashboard-card">
                    <div class="card-header custom-header pb-0" style="display: flex;">
                        <div>
                            <h2 class="card-title">Invoices</h2>
                            <h6 class="card-subtitle">Overview of this month</h6>
                        </div>
                        <div class="card-options toggles">
                            <input type="checkbox" name="checkbox1" id="checkbox1" class="ios-toggle" />
                            <label for="checkbox1" class="checkbox-label" data-off="off" data-on="on"></label>
                        </div>
                    </div>

                    <div class="card-body">
                        <p class="text-muted">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                        <div class="row">
                            <div class="col-8">
                                <h6 class="text-body text-uppercase font-weight-semibold">Total Invoices</h6>
                                <h2 class="text-warning count mt-0 font-30 mb-0">{{ $new_invoices->count() }}</h2>
                            </div>
                            <div class="col-4">
                                <img src="https://www.spruko.com/demo/sparic/html/assets/images/svg/list.svg" alt="imag" class="w-40 h-100 text-right float-right">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <div class="card dashboard-card">
                    <div class="card-header custom-header pb-0" style="display: flex;">
                        <div>
                            <h2 class="card-title">Earnings</h2>
                            <h6 class="card-subtitle">Overview of this month</h6>
                        </div>
                        <div class="card-options toggles">
                            <input type="checkbox" name="checkbox1" id="checkbox1" class="ios-toggle" checked/>
                            <label for="checkbox1" class="checkbox-label" data-off="off" data-on="on"></label>
                        </div>
                    </div>

                    <div class="card-body">
                        <p class="text-muted">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                        <div class="row">
                            <div class="col-8">
                                <h6 class="text-body text-uppercase font-weight-semibold">Total Earnings</h6>
                                <h2 class="text-danger count mt-0 font-30 mb-0">€ {{ $new_invoices->sum('total') }}</h2>
                            </div>
                            <div class="col-4">
                                <img src="https://www.spruko.com/demo/sparic/html/assets/images/svg/investment.svg" alt="imag" class="w-40 h-100 text-right float-right">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card dashboard-card">
                    <div class="card-header custom-header pb-0">
                        <div>
                            <h3 class="card-title">Sales Monthly</h3>
                            <h6 class="card-subtitle">Overview of this year live charts</h6>
                        </div>

                        <div class="card-options">

                        </div>
                    </div>

                    <div class="card-body">
                        <div id="timeline-chart" class="h-300" style="min-height: 365px;">
                            <chart></chart>
                        </div>


                        <p class="text-muted">Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example</p>
{{--                        <div class="row">--}}
{{--                            <div class="col-md-4 mb-5 mb-md-0">--}}
{{--                                <h6 class="text-body text-uppercase font-weight-semibold">Sales Last Week</h6>--}}
{{--                                <h3 class="mb-3 font-weight-semibold">8,965</h3>--}}
{{--                                <div class="mb-0">--}}
{{--                                    <h5 class="mb-2 d-block text-muted">--}}
{{--                                        <span class="fs-16">Weekly</span>--}}
{{--                                        <span class="float-right">55%</span>--}}
{{--                                    </h5>--}}
{{--                                    <div class="progress">--}}
{{--                                        <div class="progress-bar" role="progressbar" aria-valuenow="83" aria-valuemin="0" aria-valuemax="100" style="width: 83%; background-color: rgb(52, 125, 241);"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-4 mb-5 mb-md-0">--}}
{{--                                <h6 class="text-body text-uppercase font-weight-semibold">Sales Last Month</h6>--}}
{{--                                <h3 class="mb-3 font-weight-semibold">19,758</h3>--}}
{{--                                <div class="mb-0">--}}
{{--                                    <h5 class="mb-2 d-block text-muted">--}}
{{--                                        <span class="fs-16">Monthly</span>--}}
{{--                                        <span class="float-right">75%</span>--}}
{{--                                    </h5>--}}
{{--                                    <div class="progress progress-md h-2">--}}
{{--                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary w-75"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-4"> <h6 class="text-body text-uppercase font-weight-semibold">Sales Last Year</h6>--}}
{{--                                <h3 class="mb-3 font-weight-semibold">1,52,635</h3>--}}
{{--                                <div class="mb-0">--}}
{{--                                    <h5 class="mb-2 d-block text-muted">--}}
{{--                                        <span class="fs-16">Yearly</span>--}}
{{--                                        <span class="float-right">85%</span>--}}
{{--                                    </h5>--}}
{{--                                    <div class="progress progress-md h-2">--}}
{{--                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning w-85"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="resize-triggers">
                            <div class="expand-trigger">
                                <div style="width: 937px; height: 556px;"></div>
                            </div>
                            <div class="contract-trigger">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card dashboard-card">
                            <div class="card-header custom-header">
                                <div>
                                    <h3 class="card-title">Reviews</h3>
                                    <h6 class="card-subtitle">Overview of latest reviews</h6>
                                </div>
                                <div class="card-options">
                                </div>
                            </div>

                            <div class="card-body p-0 ">
                                <div class="list-group list-lg-group list-group-flush">
                                    @foreach ($reviews as $row)
                                        <a class="list-group-item list-group-item-action" href="{{ route('reviews.show', $row->id) }}">
                                            <div class="media mt-0">
                                                <img class="avatar-xxl rounded-circle mr-3" src="https://www.theupholsteryforum.com/styles/FLATBOOTS/theme/images/user4.png" alt="Image description">
                                                <div class="media-body">
                                                    <div class="d-md-flex align-items-center">
                                                        <h4 class="mb-3"> {{ $row->customer_name }} </h4>
                                                        <small class="text-primary ml-md-auto">
                                                            <i class="fe fe-calendar mr-1"></i>
                                                            {{ $row->created_at }}
                                                        </small>
                                                    </div>
                                                    <div>
                                                        @if($row->rating === "1")
                                                            <div style="display: inline-flex;">
                                                                <i class="fas fa-star star-gold"></i>
                                                                <i class="far fa-star star-gold"></i>
                                                                <i class="far fa-star star-gold"></i>
                                                                <i class="far fa-star star-gold"></i>
                                                                <i class="far fa-star star-gold"></i>
                                                            </div>
                                                        @elseif($row->rating === "2")
                                                            <div style="display: inline-flex;">
                                                                <i class="fas fa-star star-gold"></i>
                                                                <i class="fas fa-star star-gold"></i>
                                                                <i class="far fa-star star-gold"></i>
                                                                <i class="far fa-star star-gold"></i>
                                                                <i class="far fa-star star-gold"></i>
                                                            </div>
                                                        @elseif($row->rating === "3")
                                                            <div style="display: inline-flex;">
                                                                <i class="fas fa-star star-gold"></i>
                                                                <i class="fas fa-star star-gold"></i>
                                                                <i class="fas fa-star star-gold"></i>
                                                                <i class="far fa-star star-gold"></i>
                                                                <i class="far fa-star star-gold"></i>
                                                            </div>
                                                        @elseif($row->rating === "4")
                                                            <div style="display: inline-flex;" >
                                                                <i class="fas fa-star star-gold"></i>
                                                                <i class="fas fa-star star-gold"></i>
                                                                <i class="fas fa-star star-gold"></i>
                                                                <i class="fas fa-starv"></i>
                                                                <i class="far fa-star star-gold"></i>
                                                            </div>
                                                        @elseif($row->rating == "5")
                                                            <div style="display: inline-flex;" >
                                                                <i class="fas fa-star star-gold"></i>
                                                                <i class="fas fa-star star-gold"></i>
                                                                <i class="fas fa-star star-gold"></i>
                                                                <i class="fas fa-star star-gold"></i>
                                                                <i class="fas fa-star star-gold"></i>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <p class="mb-0 text-muted">
                                                        {!!  substr(strip_tags($row->review), 0, 150) !!}
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-6">
                                        <p class="mb-0 text-muted font-13">
                                            <i class="fas fa-dot-circle text-secondary mr-2"></i>New Leads</p>
                                    </div>
                                    <!-- end col-->
                                    <div class="col-sm-6">
                                        <p class="mb-0 text-muted font-13">
                                            <i class="fas fa-dot-circle text-warning mr-2"></i>New Leads Target</p>
                                    </div>
                                    <!-- end col-->
                                </div>
                                <!-- end row-->
                                <div class="progress bg-warning mb-3" style="height:5px;">
                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0 text-muted text-truncate align-self-center">
                                        <span class="text-success">
                                            <i class="fas fa-sort-amount-up mr-2"></i>1.5%</span> Up From Last Week</p>
                                    <button type="button" class="btn btn-outline-info btn-sm">Leads Report</button>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div id="recent-transactions">
                    <div class="card dashboard-card">
                        <div class="card-header custom-header">
                            <div>
                                <h3 class="card-title">Latest Bookings</h3>
                                <h6 class="card-subtitle">Overview of this month</h6>
                            </div>
                            <div class="card-options">
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table id="recent-orders" class="table table-hover table-xl mb-0 ps">
                                    <thead>
                                    <tr>
                                        <th class="border-top-0">Status</th>
                                        <th class="border-top-0">Invoice#</th>
                                        <th class="border-top-0">Stayed</th>
                                        <th class="border-top-0">Bussiness Type</th>
                                        <th class="border-top-0">Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bookings->slice(0, 5) as $item)
                                        <tr>
                                            <td class="text-truncate">
                                                <i class="far fa-dot-circle @if($item->status == 'Finished') success @elseif($item->status == 'Cancelled') danger @endif font-medium-1 mr-1"></i>
                                                {{ $item->status  }}
                                            </td>
                                            <td class="text-truncate">
                                                <a href="">#</a>
                                            </td>
                                            <td class="text-truncate">
                                                @if (!empty($item->customer))
                                                    <span>{{ $item->customer->name }}</span>
                                                @else
                                                    <span>N/A</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if (!empty($item->vehicle))
                                                    @if ($item->vehicle->bussiness_type == "Bussiness Class")
                                                        <button type="button" class="btn btn-sm btn-outline-danger round">{{ $item->vehicle->bussiness_type }}</button>
                                                    @elseif ($item->vehicle->bussiness_type == "Luxury Class")
                                                        <button type="button" class="btn btn-sm btn-outline-purple round">{{ $item->vehicle->bussiness_type }}</button>
                                                    @elseif ($item->vehicle->bussiness_type == "First Class")
                                                        <button type="button" class="btn btn-sm btn-outline-yellow round">{{ $item->vehicle->bussiness_type }}</button>
                                                    @endif
                                                @else
                                                    <button type="button" class="btn btn-sm btn-outline-danger round">N/A</button>
                                                @endif

                                            </td>
                                            <td class="text-truncate">€ {{ $item->price }}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                    </div>
                                    <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                    </div>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card dashboard-card">

                    <div class="card-body">
                        <canvas id="pie-chart" width="800" height="425">
                            <pie_chart></pie_chart>
                        </canvas>
                    </div>

                        <p class="text-muted">Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example</p>

                        <div class="resize-triggers">
                            <div class="expand-trigger">
                                <div style="width: 937px; height: 556px;"></div>
                            </div>
                            <div class="contract-trigger">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection