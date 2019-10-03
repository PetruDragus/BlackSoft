@extends('layouts.app')

@section('content')

    <div id="opportunity--header" class="m-t-25">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mt-0 header-title">All Opportunities by Owner</h4>
                                <p class="text-muted mb-4">Contrary to popular belief, Lorem Ipsum is not simply random text.</p>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <form class="form-inline">
                                            <div class="form-group mx-sm-3">
                                                <label for="status-select" class="mr-2">Sort By</label>
                                                <select class="custom-select" id="status-select">
                                                    <option selected="">All</option>
                                                    <option value="1">Hot</option>
                                                    <option value="2">Cold</option>
                                                    <option value="3">In Progress</option>
                                                    <option value="4">Lost</option>
                                                    <option value="5">Won</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="text-lg-right mt-3 mt-lg-0">
                                            <button type="button" class="btn btn-info waves-effect waves-light mr-1">
                                                <i class="fas fa-filter"></i>
                                            </button>
                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-lg">+ Add New</button>
                                        </div>
                                        <!--  Modal content for the above example -->
                                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mt-0" id="myLargeModalLabel">Add New Opportunities</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="Location">Location</label>
                                                                        <input type="text" class="form-control" id="Location" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="PhoneNo">Phone No</label>
                                                                        <input type="text" class="form-control" id="PhoneNo" required="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <div class="form-group">
                                                                        <label for="NewOppEmail">Email</label>
                                                                        <input type="email" class="form-control" id="NewOppEmail" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="modal-status-select" class="mr-2">Category</label>
                                                                        <select class="custom-select" id="modal-status-select">
                                                                            <option selected="">Select</option>
                                                                            <option value="1">Hot</option>
                                                                            <option value="2">Cold</option>
                                                                            <option value="3">In Progress</option>
                                                                            <option value="4">Lost</option>
                                                                            <option value="5">Won</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button type="button" class="btn btn-sm btn-primary">Save</button>
                                                            <button type="button" class="btn btn-sm btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                    </div>


                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="media" style="position: relative;">
                                        <div id="apex_radialbar4" class="apex-charts mb-n5" style="min-height: 180px;"><div id="apexchartss8ray8qx" class="apexcharts-canvas apexchartss8ray8qx light" style="width: 300px; height: 180px;"><svg id="SvgjsSvg1046" width="300" height="180" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1048" class="apexcharts-inner apexcharts-graphical" transform="translate(89.5, 0)"><defs id="SvgjsDefs1047"><clipPath id="gridRectMasks8ray8qx"><rect id="SvgjsRect1049" width="125" height="147" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><clipPath id="gridRectMarkerMasks8ray8qx"><rect id="SvgjsRect1050" width="163" height="185" x="-20" y="-20" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><linearGradient id="SvgjsLinearGradient1056" x1="0" y1="1" x2="1" y2="1"><stop id="SvgjsStop1057" stop-opacity="1" stop-color="rgba(203,162,128,1)" offset="0"></stop><stop id="SvgjsStop1058" stop-opacity="1" stop-color="rgba(242,242,242,1)" offset="1"></stop><stop id="SvgjsStop1059" stop-opacity="1" stop-color="rgba(242,242,242,1)" offset="1"></stop></linearGradient><filter id="SvgjsFilter1062" filterUnits="userSpaceOnUse"><feFlood id="SvgjsFeFlood1063" flood-color="#000000" flood-opacity="0.15" result="SvgjsFeFlood1063Out" in="SourceGraphic"></feFlood><feComposite id="SvgjsFeComposite1064" in="SvgjsFeFlood1063Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite1064Out"></feComposite><feOffset id="SvgjsFeOffset1065" dx="0" dy="2" result="SvgjsFeOffset1065Out" in="SvgjsFeComposite1064Out"></feOffset><feGaussianBlur id="SvgjsFeGaussianBlur1066" stdDeviation="4 " result="SvgjsFeGaussianBlur1066Out" in="SvgjsFeOffset1065Out"></feGaussianBlur><feMerge id="SvgjsFeMerge1067" result="SvgjsFeMerge1067Out" in="SourceGraphic"><feMergeNode id="SvgjsFeMergeNode1068" in="SvgjsFeGaussianBlur1066Out"></feMergeNode><feMergeNode id="SvgjsFeMergeNode1069" in="[object Arguments]"></feMergeNode></feMerge><feBlend id="SvgjsFeBlend1070" in="SourceGraphic" in2="SvgjsFeMerge1067Out" mode="normal" result="SvgjsFeBlend1070Out"></feBlend></filter><linearGradient id="SvgjsLinearGradient1077" x1="0" y1="1" x2="1" y2="1"><stop id="SvgjsStop1078" stop-opacity="1" stop-color="rgba(203,162,128,1)" offset="0"></stop><stop id="SvgjsStop1079" stop-opacity="1" stop-color="rgba(0,143,251,1)" offset="1"></stop><stop id="SvgjsStop1080" stop-opacity="1" stop-color="rgba(0,143,251,1)" offset="1"></stop></linearGradient></defs><g id="SvgjsG1052" class="apexcharts-radialbar"><g id="SvgjsG1053"><g id="SvgjsG1054"><g id="apexcharts-track-0" class="apexcharts-radialbar-track apexcharts-track" rel="1"><path id="apexcharts-radialbarTrack-0" d="M 61.5 24.68780487804878 A 47.81219512195122 47.81219512195122 0 1 1 61.49165519776752 24.687805606270153" fill="none" fill-opacity="1" stroke="rgba(242,242,242,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="7.7079512195121955" stroke-dasharray="0" class="apexcharts-radialbar-area" filter="url(#SvgjsFilter1062)" data:pathOrig="M 61.5 24.68780487804878 A 47.81219512195122 47.81219512195122 0 1 1 61.49165519776752 24.687805606270153"></path></g></g><g id="SvgjsG1071"><g id="apexcharts-series-0" class="apexcharts-series apexcharts-radial-series LeadsxWon" rel="1"><path id="apexcharts-radialbar-slice-0" d="M 61.5 24.68780487804878 A 47.81219512195122 47.81219512195122 0 1 1 13.68780487804878 72.5" fill="none" fill-opacity="0.85" stroke="url(#SvgjsLinearGradient1077)" stroke-opacity="1" stroke-linecap="round" stroke-width="7.946341463414635" stroke-dasharray="0" class="apexcharts-radialbar-area" data:angle="270" data:value="75" index="0" j="0" data:pathOrig="M 61.5 24.68780487804878 A 47.81219512195122 47.81219512195122 0 1 1 13.68780487804878 72.5"></path></g><circle id="SvgjsCircle1072" r="43.95821951219512" cx="61.5" cy="72.5" class="apexcharts-radialbar-hollow" fill="#293450"></circle><g id="SvgjsG1073" class="apexcharts-datalabels-group" transform="translate(0, 0)" style="opacity: 1;"><text id="SvgjsText1074" font-family="Helvetica, Arial, sans-serif" x="61.5" y="67.5" text-anchor="middle" dominant-baseline="auto" font-size="13px" fill="#ffffff" class="apexcharts-datalabel-label" style="font-family: Helvetica, Arial, sans-serif;">Leads Won</text><text id="SvgjsText1075" font-family="Helvetica, Arial, sans-serif" x="61.5" y="93.5" text-anchor="middle" dominant-baseline="auto" font-size="20px" fill="#ff7d51" class="apexcharts-datalabel-value" style="font-family: Helvetica, Arial, sans-serif;">75%</text></g></g></g></g><line id="SvgjsLine1082" x1="0" y1="0" x2="123" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1083" x1="0" y1="0" x2="123" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line></g></svg><div class="apexcharts-legend"></div></div></div>
                                        <div class="media-body align-self-center">
                                            <h4 class="mt-0 mb-2 font-16">Leads Won by Owner</h4>
                                            <p class="text-muted mb-0">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                                        </div>
                                        <div class="resize-triggers">
                                            <div class="expand-trigger">
                                                <div style="width: 430px; height: 193px;">

                                                </div>
                                            </div>
                                            <div class="contract-trigger">

                                            </div>
                                        </div>

                                        <div class="col-lg-3 align-self-center">
                                            <ul class="list-unstyled mb-0">
                                                <li>
                                                    <i class="mdi mdi-circle far fa-circle mr-2 text-success"></i>
                                                    Won
                                                </li>
                                                <li>
                                                    <i class="mdi mdi-circle far fa-circle mr-2 text-warning"></i>
                                                    In Progress
                                                </li>
                                                <li>
                                                    <i class="mdi mdi-circle far fa-circle mr-2 text-purple"></i>
                                                    Hot
                                                </li>
                                                <li>
                                                    <i class="mdi mdi-circle far fa-circle mr-2 text-secondary"></i>
                                                    Cold
                                                </li>
                                                <li>
                                                    <i class="mdi mdi-circle far fa-circle mr-2 text-danger"></i>
                                                    Lost
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="media">
                                    <img class="d-flex align-self-center mr-3 rounded-circle" src="https://mannatthemes.com/metrica/light/assets/images/widgets/opp-1.png" alt="" height="50">
                                    <div class="media-body align-self-center">
                                        <h4 class="mt-0 mb-2 font-16">Starbucks coffee</h4>
                                        <ul class="list-inline mb-0 text-muted">
                                            <li class="list-inline-item mr-2">
                                                <span>
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </span>Seattle, Washington</li>
                                            <li class="list-inline-item mr-2">
                                                <span>
                                                    <i class="far fa-envelope"></i>
                                                </span>Ernest@Webster.com</li>
                                            <li class="list-inline-item">
                                                <span>
                                                    <i class="fas fa-mobile-alt"></i>
                                                </span>
                                                +1 234 567 890
                                            </li>
                                        </ul>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <!--end media-->
                            </div>
                            <!--end col-->
                            <div class="col-sm-2 align-self-center">
                                <div class="text-right">
                                    <span>
                                        <i class="fas fa-circle text-success mr-2"></i>
                                    </span>
                                    <a href="#" class="mr-2">
                                        <i class="fas fa-edit text-info font-16"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fas fa-trash-alt text-danger font-16"></i>
                                    </a>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="media">
                                    <img class="d-flex align-self-center mr-3 rounded-circle" src="https://mannatthemes.com/metrica/light/assets/images/widgets/opp-1.png" alt="" height="50">
                                    <div class="media-body align-self-center">
                                        <h4 class="mt-0 mb-2 font-16">Starbucks coffee</h4>
                                        <ul class="list-inline mb-0 text-muted">
                                            <li class="list-inline-item mr-2">
                                                <span>
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </span>Seattle, Washington</li>
                                            <li class="list-inline-item mr-2">
                                                <span>
                                                    <i class="far fa-envelope"></i>
                                                </span>Ernest@Webster.com</li>
                                            <li class="list-inline-item">
                                                <span>
                                                    <i class="fas fa-mobile-alt"></i>
                                                </span>
                                                +1 234 567 890
                                            </li>
                                        </ul>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <!--end media-->
                            </div>
                            <!--end col-->
                            <div class="col-sm-2 align-self-center">
                                <div class="text-right">
                                    <span>
                                        <i class="fas fa-circle text-success mr-2"></i>
                                    </span>
                                    <a href="#" class="mr-2">
                                        <i class="fas fa-edit text-info font-16"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fas fa-trash-alt text-danger font-16"></i>
                                    </a>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="media">
                                    <img class="d-flex align-self-center mr-3 rounded-circle" src="https://mannatthemes.com/metrica/light/assets/images/widgets/opp-1.png" alt="" height="50">
                                    <div class="media-body align-self-center">
                                        <h4 class="mt-0 mb-2 font-16">Starbucks coffee</h4>
                                        <ul class="list-inline mb-0 text-muted">
                                            <li class="list-inline-item mr-2">
                                                <span>
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </span>Seattle, Washington</li>
                                            <li class="list-inline-item mr-2">
                                                <span>
                                                    <i class="far fa-envelope"></i>
                                                </span>Ernest@Webster.com</li>
                                            <li class="list-inline-item">
                                                <span>
                                                    <i class="fas fa-mobile-alt"></i>
                                                </span>
                                                +1 234 567 890
                                            </li>
                                        </ul>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <!--end media-->
                            </div>
                            <!--end col-->
                            <div class="col-sm-2 align-self-center">
                                <div class="text-right">
                                    <span>
                                        <i class="fas fa-circle text-success mr-2"></i>
                                    </span>
                                    <a href="#" class="mr-2">
                                        <i class="fas fa-edit text-info font-16"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fas fa-trash-alt text-danger font-16"></i>
                                    </a>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="media">
                                    <img class="d-flex align-self-center mr-3 rounded-circle" src="https://mannatthemes.com/metrica/light/assets/images/widgets/opp-1.png" alt="" height="50">
                                    <div class="media-body align-self-center">
                                        <h4 class="mt-0 mb-2 font-16">Starbucks coffee</h4>
                                        <ul class="list-inline mb-0 text-muted">
                                            <li class="list-inline-item mr-2">
                                                <span>
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </span>Seattle, Washington</li>
                                            <li class="list-inline-item mr-2">
                                                <span>
                                                    <i class="far fa-envelope"></i>
                                                </span>Ernest@Webster.com</li>
                                            <li class="list-inline-item">
                                                <span>
                                                    <i class="fas fa-mobile-alt"></i>
                                                </span>
                                                +1 234 567 890
                                            </li>
                                        </ul>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <!--end media-->
                            </div>
                            <!--end col-->
                            <div class="col-sm-2 align-self-center">
                                <div class="text-right">
                                    <span>
                                        <i class="fas fa-circle text-success mr-2"></i>
                                    </span>
                                    <a href="#" class="mr-2">
                                        <i class="fas fa-edit text-info font-16"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fas fa-trash-alt text-danger font-16"></i>
                                    </a>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="media">
                                    <img class="d-flex align-self-center mr-3 rounded-circle" src="https://mannatthemes.com/metrica/light/assets/images/widgets/opp-1.png" alt="" height="50">
                                    <div class="media-body align-self-center">
                                        <h4 class="mt-0 mb-2 font-16">Starbucks coffee</h4>
                                        <ul class="list-inline mb-0 text-muted">
                                            <li class="list-inline-item mr-2">
                                                <span>
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </span>Seattle, Washington</li>
                                            <li class="list-inline-item mr-2">
                                                <span>
                                                    <i class="far fa-envelope"></i>
                                                </span>Ernest@Webster.com</li>
                                            <li class="list-inline-item">
                                                <span>
                                                    <i class="fas fa-mobile-alt"></i>
                                                </span>
                                                +1 234 567 890
                                            </li>
                                        </ul>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <!--end media-->
                            </div>
                            <!--end col-->
                            <div class="col-sm-2 align-self-center">
                                <div class="text-right">
                                    <span>
                                        <i class="fas fa-circle text-success mr-2"></i>
                                    </span>
                                    <a href="#" class="mr-2">
                                        <i class="fas fa-edit text-info font-16"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fas fa-trash-alt text-danger font-16"></i>
                                    </a>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="media">
                                    <img class="d-flex align-self-center mr-3 rounded-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQY-WTEZFWKAgUBA70icz_DwKIekbJTmHS4U6A0lR4WAb46g4n0" alt="" height="50">
                                    <div class="media-body align-self-center">
                                        <h4 class="mt-0 mb-2 font-16">Starbucks coffee</h4>
                                        <ul class="list-inline mb-0 text-muted">
                                            <li class="list-inline-item mr-2">
                                                <span>
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </span>Seattle, Washington</li>
                                            <li class="list-inline-item mr-2">
                                                <span>
                                                    <i class="far fa-envelope"></i>
                                                </span>Ernest@Webster.com</li>
                                            <li class="list-inline-item">
                                                <span>
                                                    <i class="fas fa-mobile-alt"></i>
                                                </span>
                                                +1 234 567 890
                                            </li>
                                        </ul>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <!--end media-->
                            </div>
                            <!--end col-->
                            <div class="col-sm-2 align-self-center">
                                <div class="text-right">
                                    <span>
                                        <i class="fas fa-circle text-success mr-2"></i>
                                    </span>
                                    <a href="#" class="mr-2">
                                        <i class="fas fa-edit text-info font-16"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fas fa-trash-alt text-danger font-16"></i>
                                    </a>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="media">
                                    <img class="d-flex align-self-center mr-3 rounded-circle" src="https://cdn1.vectorstock.com/i/1000x1000/31/45/building-cityscape-construction-company-logo-vector-19953145.jpg" alt="" height="50">
                                    <div class="media-body align-self-center">
                                        <h4 class="mt-0 mb-2 font-16">Starbucks coffee</h4>
                                        <ul class="list-inline mb-0 text-muted">
                                            <li class="list-inline-item mr-2">
                                                <span>
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </span>Seattle, Washington</li>
                                            <li class="list-inline-item mr-2">
                                                <span>
                                                    <i class="far fa-envelope"></i>
                                                </span>Ernest@Webster.com</li>
                                            <li class="list-inline-item">
                                                <span>
                                                    <i class="fas fa-mobile-alt"></i>
                                                </span>
                                                +1 234 567 890
                                            </li>
                                        </ul>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <!--end media-->
                            </div>
                            <!--end col-->
                            <div class="col-sm-2 align-self-center">
                                <div class="text-right">
                                    <span>
                                        <i class="fas fa-circle text-success mr-2"></i>
                                    </span>
                                    <a href="#" class="mr-2">
                                        <i class="fas fa-edit text-info font-16"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fas fa-trash-alt text-danger font-16"></i>
                                    </a>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>
            </div>

            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="media">
                                    <img class="d-flex align-self-center mr-3 rounded-circle" src="https://cdn1.vectorstock.com/i/1000x1000/31/45/building-cityscape-construction-company-logo-vector-19953145.jpg" alt="" height="50">
                                    <div class="media-body align-self-center">
                                        <h4 class="mt-0 mb-2 font-16">Starbucks coffee</h4>
                                        <ul class="list-inline mb-0 text-muted">
                                            <li class="list-inline-item mr-2">
                                                <span>
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </span>Seattle, Washington</li>
                                            <li class="list-inline-item mr-2">
                                                <span>
                                                    <i class="far fa-envelope"></i>
                                                </span>Ernest@Webster.com</li>
                                            <li class="list-inline-item">
                                                <span>
                                                    <i class="fas fa-mobile-alt"></i>
                                                </span>
                                                +1 234 567 890
                                            </li>
                                        </ul>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <!--end media-->
                            </div>
                            <!--end col-->
                            <div class="col-sm-2 align-self-center">
                                <div class="text-right">
                                    <span>
                                        <i class="fas fa-circle text-success mr-2"></i>
                                    </span>
                                    <a href="#" class="mr-2">
                                        <i class="fas fa-edit text-info font-16"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fas fa-trash-alt text-danger font-16"></i>
                                    </a>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="media">
                                    <img class="d-flex align-self-center mr-3 rounded-circle" src="https://cdn1.vectorstock.com/i/1000x1000/31/45/building-cityscape-construction-company-logo-vector-19953145.jpg" alt="" height="50">
                                    <div class="media-body align-self-center">
                                        <h4 class="mt-0 mb-2 font-16">Starbucks coffee</h4>
                                        <ul class="list-inline mb-0 text-muted">
                                            <li class="list-inline-item mr-2">
                                                <span>
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </span>Seattle, Washington</li>
                                            <li class="list-inline-item mr-2">
                                                <span>
                                                    <i class="far fa-envelope"></i>
                                                </span>Ernest@Webster.com</li>
                                            <li class="list-inline-item">
                                                <span>
                                                    <i class="fas fa-mobile-alt"></i>
                                                </span>
                                                +1 234 567 890
                                            </li>
                                        </ul>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <!--end media-->
                            </div>
                            <!--end col-->
                            <div class="col-sm-2 align-self-center">
                                <div class="text-right">
                                    <span>
                                        <i class="fas fa-circle text-success mr-2"></i>
                                    </span>
                                    <a href="#" class="mr-2">
                                        <i class="fas fa-edit text-info font-16"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fas fa-trash-alt text-danger font-16"></i>
                                    </a>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="media">
                                    <img class="d-flex align-self-center mr-3 rounded-circle" src="https://as1.ftcdn.net/jpg/02/41/30/72/500_F_241307210_MjjaJC3SJy2zJZ6B7bKGMRsKQbdwRSze.jpg" alt="" height="50">
                                    <div class="media-body align-self-center">
                                        <h4 class="mt-0 mb-2 font-16">Starbucks coffee</h4>
                                        <ul class="list-inline mb-0 text-muted">
                                            <li class="list-inline-item mr-2">
                                                <span>
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </span>Seattle, Washington</li>
                                            <li class="list-inline-item mr-2">
                                                <span>
                                                    <i class="far fa-envelope"></i>
                                                </span>Ernest@Webster.com</li>
                                            <li class="list-inline-item">
                                                <span>
                                                    <i class="fas fa-mobile-alt"></i>
                                                </span>
                                                +1 234 567 890
                                            </li>
                                        </ul>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <!--end media-->
                            </div>
                            <!--end col-->
                            <div class="col-sm-2 align-self-center">
                                <div class="text-right">
                                    <span>
                                        <i class="fas fa-circle text-success mr-2"></i>
                                    </span>
                                    <a href="#" class="mr-2">
                                        <i class="fas fa-edit text-info font-16"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fas fa-trash-alt text-danger font-16"></i>
                                    </a>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="media">
                                    <img class="d-flex align-self-center mr-3 rounded-circle" src="https://seeklogo.com/images/R/rounded-design-company-logo-58FEBA6563-seeklogo.com.png" alt="" height="50">
                                    <div class="media-body align-self-center">
                                        <h4 class="mt-0 mb-2 font-16">Starbucks coffee</h4>
                                        <ul class="list-inline mb-0 text-muted">
                                            <li class="list-inline-item mr-2">
                                                <span>
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </span>Seattle, Washington</li>
                                            <li class="list-inline-item mr-2">
                                                <span>
                                                    <i class="far fa-envelope"></i>
                                                </span>Ernest@Webster.com</li>
                                            <li class="list-inline-item">
                                                <span>
                                                    <i class="fas fa-mobile-alt"></i>
                                                </span>
                                                +1 234 567 890
                                            </li>
                                        </ul>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <!--end media-->
                            </div>
                            <!--end col-->
                            <div class="col-sm-2 align-self-center">
                                <div class="text-right">
                                    <span>
                                        <i class="fas fa-circle text-success mr-2"></i>
                                    </span>
                                    <a href="#" class="mr-2">
                                        <i class="fas fa-edit text-info font-16"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fas fa-trash-alt text-danger font-16"></i>
                                    </a>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="media">
                                    <img class="d-flex align-self-center mr-3 rounded-circle" src="https://image.freepik.com/free-vector/abstract-company-logo_1057-1742.jpg" alt="" height="50">
                                    <div class="media-body align-self-center">
                                        <h4 class="mt-0 mb-2 font-16">Starbucks coffee</h4>
                                        <ul class="list-inline mb-0 text-muted">
                                            <li class="list-inline-item mr-2">
                                                <span>
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </span>Seattle, Washington</li>
                                            <li class="list-inline-item mr-2">
                                                <span>
                                                    <i class="far fa-envelope"></i>
                                                </span>Ernest@Webster.com</li>
                                            <li class="list-inline-item">
                                                <span>
                                                    <i class="fas fa-mobile-alt"></i>
                                                </span>
                                                +1 234 567 890
                                            </li>
                                        </ul>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <!--end media-->
                            </div>
                            <!--end col-->
                            <div class="col-sm-2 align-self-center">
                                <div class="text-right">
                                    <span>
                                        <i class="fas fa-circle text-success mr-2"></i>
                                    </span>
                                    <a href="#" class="mr-2">
                                        <i class="fas fa-edit text-info font-16"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fas fa-trash-alt text-danger font-16"></i>
                                    </a>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="media">
                                    <img class="d-flex align-self-center mr-3 rounded-circle" src="https://cdn1.vectorstock.com/i/1000x1000/31/45/building-cityscape-construction-company-logo-vector-19953145.jpg" alt="" height="50">
                                    <div class="media-body align-self-center">
                                        <h4 class="mt-0 mb-2 font-16">Starbucks coffee</h4>
                                        <ul class="list-inline mb-0 text-muted">
                                            <li class="list-inline-item mr-2">
                                                <span>
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </span>Seattle, Washington</li>
                                            <li class="list-inline-item mr-2">
                                                <span>
                                                    <i class="far fa-envelope"></i>
                                                </span>Ernest@Webster.com</li>
                                            <li class="list-inline-item">
                                                <span>
                                                    <i class="fas fa-mobile-alt"></i>
                                                </span>
                                                +1 234 567 890
                                            </li>
                                        </ul>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <!--end media-->
                            </div>
                            <!--end col-->
                            <div class="col-sm-2 align-self-center">
                                <div class="text-right">
                                    <span>
                                        <i class="fas fa-circle text-success mr-2"></i>
                                    </span>
                                    <a href="#" class="mr-2">
                                        <i class="fas fa-edit text-info font-16"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fas fa-trash-alt text-danger font-16"></i>
                                    </a>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="media">
                                    <img class="d-flex align-self-center mr-3 rounded-circle" src="https://seeklogo.com/images/B/business-company-logo-2D5E330790-seeklogo.com.png" alt="" height="50">
                                    <div class="media-body align-self-center">
                                        <h4 class="mt-0 mb-2 font-16">Starbucks coffee</h4>
                                        <ul class="list-inline mb-0 text-muted">
                                            <li class="list-inline-item mr-2">
                                                <span>
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </span>Seattle, Washington</li>
                                            <li class="list-inline-item mr-2">
                                                <span>
                                                    <i class="far fa-envelope"></i>
                                                </span>Ernest@Webster.com</li>
                                            <li class="list-inline-item">
                                                <span>
                                                    <i class="fas fa-mobile-alt"></i>
                                                </span>
                                                +1 234 567 890
                                            </li>
                                        </ul>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <!--end media-->
                            </div>
                            <!--end col-->
                            <div class="col-sm-2 align-self-center">
                                <div class="text-right">
                                    <span>
                                        <i class="fas fa-circle text-success mr-2"></i>
                                    </span>
                                    <a href="#" class="mr-2">
                                        <i class="fas fa-edit text-info font-16"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fas fa-trash-alt text-danger font-16"></i>
                                    </a>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>
            </div>
        </div>
    </div>
@endsection