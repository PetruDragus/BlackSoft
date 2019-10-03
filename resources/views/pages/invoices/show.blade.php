@extends('layouts.app')

@section('content')
<div>
    <div id="single--invoice" class="panel panel-margin">
        <div class="panel-heading">
            <div class="panel-title">
                <div>
                    <a href="/invoices">Invoices</a> / QT-125901
                </div>
            </div>
            <div class="panel-extra">
                <div>
                    <a href="/invoices" class="btn btn-default btn-sm router-link-active">
                        <small class="icon icon-arrow-left-c">
                            <i class="fas fa-long-arrow-alt-left"></i>
                        </small>
                    </a>
                    <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#send--invoice--modal">
                        <span class="icon icon-email">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <!---->
                        <!---->
                    </button>
                    <!---->
                    <div class="dropdown">
                        <button type="button" class="btn btn-default btn-sm">
                            <span class="icon icon-more">
                                <i class="fas fa-ellipsis-h"></i>
                            </span>
                            <!---->
                            <!---->
                        </button>
                        <div class="dropdown-inner dropdown-right" style="width: 200px;">
                            <!---->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel-body">
            <div>
                <div class="document">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8 float-right put-right logo-box">
                                <img src="https://blackhansa.de/images/blackhansa-logo.png" class="inv-logo" alt="">
                            </div>
                            <div class="cleargix"></div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-lg-7 col-xl-8 m-b-20">
                                <h5 class="my--company--details">blackhansa GmbH 10711 halensee str. 3</h5>
                                <ul class="list-unstyled">
                                    <li>
                                        <h5><strong>EURO CONSTRUCTII SRL</strong></h5>
                                    </li>
                                    <li>
                                        <span>Jud. Galati , Mun. Galati</span>
                                    </li>
                                    <li>Str. Cluj , Nr.45 , Bl.Doja2, Et. P</li>
                                    <li>Rumänien</li>
                                </ul>
                            </div>

                            <div class="col-sm-6 col-lg-5 col-xl-4 m-b-20">
                                <span class="text-muted">Rechnung</span>
                                <ul class="list-unstyled invoice-payment-details">
                                    <li><h5>Rechnungsnr: <span class="text-right">501</span></h5></li>
                                    <li>Rechnungsdatum: <span>23.05.2019</span></li>
                                    <li>Fälligkeitsdatum: <span>31.05.2019</span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Beschreibung</th>
                                    <th>Menge</th>
                                    <th>Einheit</th>
                                    <th>Preis</th>
                                    <th>USt</th>
                                    <th>Betrag</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Supercut XPM Basis 230 V</td>
                                    <td>1</td>
                                    <td>Stück</td>
                                    <td>1.610,00 </td>
                                    <td>0% </td>
                                    <td> 1.610,00</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Supercut XPM Basis 230 V</td>
                                    <td>1</td>
                                    <td>Stück</td>
                                    <td>1.610,00 </td>
                                    <td>0% </td>
                                    <td> 1.610,00</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Supercut XPM Basis 230 V</td>
                                    <td>1</td>
                                    <td>Stück</td>
                                    <td>1.610,00 </td>
                                    <td>0% </td>
                                    <td> 1.610,00</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div>
                            <div class="row invoice-payment">
                                <div class="col-sm-7">
                                </div>
                                <div class="col-sm-5">
                                    <div class="m-b-20">
                                        <h6>Total due</h6>
                                        <div class="table-responsive no-border">
                                            <table class="table mb-0">
                                                <tbody>
                                                <tr>
                                                    <th>Subtotal:</th>
                                                    <td class="text-right">$7,000</td>
                                                </tr>
                                                <tr>
                                                    <th>Tax: <span class="text-regular">(25%)</span></th>
                                                    <td class="text-right">$1,750</td>
                                                </tr>
                                                <tr>
                                                    <th>Total:</th>
                                                    <td class="text-right text-primary"><h5>$8,750</h5></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-info">
                                <h5>Other information</h5>
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed dictum ligula, cursus blandit risus. Maecenas eget metus non tellus dignissim aliquam ut a ex. Maecenas sed vehicula dui, ac suscipit lacus. Sed finibus leo vitae lorem interdum, eu scelerisque tellus fermentum. Curabitur sit amet lacinia lorem. Nullam finibus pellentesque libero, eu finibus sapien interdum vel</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="filterable">
        <div class="panel panel-margin">
            <div class="panel-heading">
                <div class="panel-title">
                    <div>
                        <a href="/payments">Payments</a>
                    </div>
                </div>
                <div class="panel-extra">
                    <div>
                        <a href="/payments" class="btn btn-default btn-sm router-link-active">
                            <small class="icon icon-arrow-left-c"></small>
                        </a>
                        <button type="button" class="btn btn-default btn-sm">
                            <span class="icon icon-email"></span>
                            <!---->
                            <!---->
                        </button>
                        <!---->
                        <div class="dropdown">
                            <button type="button" class="btn btn-default btn-sm">
                                <span class="icon icon-more"></span>
                                <!---->
                                <!---->
                            </button>
                            <div class="dropdown-inner dropdown-right" style="width: 200px;">
                                <!---->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-body">
                <table class="table table-link">
                    <thead>
                    <tr>
                        <th class="w-3" style="text-align: left;">Number</th>
                        <th class="w-3" style="text-align: left;">Payment Date</th>
                        <th class="w-3" style="text-align: left;">Invoice</th>
                        <th class="w-9" style="text-align: left;">Contact</th>
                        <th class="w-3" style="text-align: left;">Amount Received</th>
                        <th class="w-3" style="text-align: left;">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $item)
                            <tr>
                                <td class="" style="text-align: left;">PY-{{ $item->id }}</td>
                                <td class="" style="text-align: left;">{{ $item->date }}</td>
                                <td class="" style="text-align: left;">{{ $item->invoice->number }}</td>
                                <td class="" style="text-align: left;">
                                    <span>{{ $item->contact->name }}</span>
                                </td>
                                <td class="" style="text-align: left;">€ {{ $item->amount }}</td>
                                <td class="" style="text-align: left;">
                                    <span class="status @if($item->status == "Sent")status-light_green @elseif($item->status == "Paid") status-blue @endif">
                                        <span class="status-text">{{ $item->status }}</span>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <!---->
                </table>
            </div>

            <div class="panel-footer panel-alt"><div class="flex flex-between flex-center"><div><select class="form-input form-input-sm"><option value="5">5</option> <option value="15">15</option></select> <small>Showing 1 - 1 of 1 entries.</small></div> <div><button disabled="disabled" type="button" class="btn btn-default btn-sm"><!----> <span class="btn-text">
          « Prev
        </span> <!----></button> <button disabled="disabled" type="button" class="btn btn-default btn-sm"><!----> <span class="btn-text">
          Next »
        </span> <!----></button></div></div></div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="send--invoice--modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-heading">
                    <div class="modal-title">
                        <div>
                            <div>
                                <span>Sent Email</span>
                            </div>
                        </div>
                    </div>
                    <!---->
                    <div class="modal-close">
                        <span class="icon icon-close"></span>
                    </div>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Email To</span> <!---->
                                </label>
                                <input type="text" class="form-input" source="input" label="Email To" col="12" value="{{ $invoice->customer->email }}"> <!---->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>BCC</span> <!---->
                                </label>
                                <input type="text" class="form-input" source="input" label="BCC" col="12" value="user@blackhansa.de"> <!---->
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <span>Subject</span> <!---->
                        </label>
                        <input type="text" class="form-input" source="input" label="Subject" value="Invoice {{ $invoice->number }} from Blackhansa">
                        <!---->
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <span>Message</span> <!---->
                        </label>

                        <textarea type="text" name="special_request" rows="4" cols="50" class="form-input" style="height:200px;">
Dear {{ $invoice->customer->firstname }}

Please find the attached invoice. We appreciate your prompt payment.

Due Date: 07-08-2019

Amount: USD {{ $invoice->total }}

Thank you

Team Blackhansa Demo
                        </textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <div>

                    </div>
                    <div>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><!---->
                            <span class="btn-text">Cancel</span>
                            <!---->
                        </button>
                        <button type="button" class="btn btn-primary"><!---->
                            <span class="btn-text">
                            Sent
                        </span>
                            <!---->
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection