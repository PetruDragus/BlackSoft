@extends('layouts.app')

@section('title', 'Customers')

@section('content')
    <div class="" style="margin-top: 50px;">
        <div class="col-md-12 toggled">
            <div class="row">
                <div id="subheader_pg" class="subHeader__block">
                    <div class="float-left" style="display:flex;">
                        <div class="subheader__page__title">
                            <h6>Customers</h6>
                        </div>

                        <span class="subheader__separator kt-subheader__separator--v"></span>

                        <div class="subheader__desc__count">
                            <span>2 Total</span>
                        </div>
                    </div>
                    <div class="float-right">
                        <div style="display: flex;">
                            <a href="/customers/create" class="btn btn-label-brand btn-bold">
                                Add Customer
                            </a>

                            <div class="dropdown">
                                <a id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn export-btn">
                                    <i class="fas fa-file-download"></i>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <div class="nav__section nav__section--first">
                                        <span class="nav__section-text">Choose an option</span>
                                    </div>

                                    <a class="dropdown-item" >
                                        <i class="fas fa-print"></i>
                                        <span class="nav__link-text">Print</span>
                                    </a>
                                    <a class="dropdown-item" href="/export/customers/exportExcel">
                                        <i class="far fa-file-excel"></i>
                                        <span class="nav__link-text">Excel</span>
                                    </a>
                                    <a class="dropdown-item"  href="/export/customers/exportCSV">
                                        <i class="fas fa-file-csv"></i>
                                        <span class="nav__link-text">CSV</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="accordion" id="customers--accordion">
            @foreach($customer as $item)
            <div class="card">
                <div class="card-body">
                    <a class="d-lg-flex justify-content-between collapsed" data-toggle="collapse" href="#Customer{{$item->id}}" role="button" aria-expanded="false" aria-controls="Customer1">
                        <div class="media mb-3 mb-lg-0">
                            <img src="https://mannatthemes.com/metrica/light/assets/images/users/user-1.jpg" class="mr-3 thumb-md align-self-center rounded-circle" alt="...">
                            <div class="media-body align-self-center">
                                <h5 class="mt-0 mb-1">{{ $item->name }}</h5>
                                <p class="text-muted mb-0">
                                    <i class="fas fa-map-marker-alt mr-2 text-info"></i>
                                    Seattle, Washington
                                </p>
                            </div>
                            <!--end media body-->
                        </div>
                        <!--end media-->
                        <p class="text-muted mb-2 mb-lg-0 align-self-center">
                            <i class="far fa-envelope mr-2 text-info font-14">

                            </i>
                            {{ $item->email }}
                        </p>
                        <p class="text-muted mb-2 mb-lg-0 align-self-center">
                            <i class="fas fa-phone mr-2 text-info font-14">

                            </i>{{ $item->phone }}</p>
                        <p class="text-muted mb-2 mb-lg-0 align-self-center">
                            <i class="fas fa-calendar mr-2 text-info font-14"></i>04 June 2019</p>
                    </a>
                </div>

                <div class="collapse" id="Customer{{$item->id}}" data-parent="#customers--accordion">
                    <div class="card card-body mb-0">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0 table-centered table-sm">
                                        <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Order Date</th>
                                            <th>Payment</th>
                                            <th>Order Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>#432</td>
                                            <td>25/11/2018</td>
                                            <td>$321</td>
                                            <td>
                                                <span class="badge badge-soft-success">Completed</span>
                                            </td>
                                            <td>
                                                <div class="dropdown d-inline-block float-right">
                                                    <a class="nav-link dropdown-toggle arrow-none" id="dLabel1" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v font-20 text-muted"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel1">
                                                        <a class="dropdown-item" href="#">Creat Project</a>
                                                        <a class="dropdown-item" href="#">Open Project</a>
                                                        <a class="dropdown-item" href="#">Tasks Details</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!--end /table-->
                                </div>
                                <!--end /tableresponsive-->
                            </div>

                            <div class="col-lg-4">
                                <h4 class="mt-0 header-title">Favorite Cars</h4>
                                <div id="carousel_cars" class="owl-carousel owl-theme">
                                    <div class="item">
                                        <div class="carousel-inner">
                                            <div class="media">
                                                <img src="https://mannatthemes.com/metrica/light/assets/images/products/img-3.png" height="150" class="mr-4" alt="...">
                                                <div class="media-body align-self-center">
                                                    <span class="badge badge-primary mb-2">354 sold</span>
                                                    <h4 class="mt-0">Important Watch</h4>
                                                    <p class="text-muted mb-0">$99.00</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="carousel-inner">
                                            <div class="media">
                                                <img src="https://mannatthemes.com/metrica/light/assets/images/products/img-3.png" height="150" class="mr-4" alt="...">
                                                <div class="media-body align-self-center">
                                                    <span class="badge badge-primary mb-2">354 sold</span>
                                                    <h4 class="mt-0">Important Watch</h4>
                                                    <p class="text-muted mb-0">$99.00</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="carousel-inner">
                                            <div class="media">
                                                <img src="https://mannatthemes.com/metrica/light/assets/images/products/img-3.png" height="150" class="mr-4" alt="...">
                                                <div class="media-body align-self-center">
                                                    <span class="badge badge-primary mb-2">354 sold</span>
                                                    <h4 class="mt-0">Important Watch</h4>
                                                    <p class="text-muted mb-0">$99.00</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
@endsection