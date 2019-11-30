@extends('layouts.app')

@section('title', 'New Booking')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="panel">
        <div class="panel-heading">
            <div class="panel-title">
                <div>
                    <div>Create Booking</div>
                </div>
            </div>
        </div>

        <form class="form" action="{{ route('bookings.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="panel-form">
                <div>
                    <div class="row row-line">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Pickup Address</span>
                                </label>

                                <input id="pickup-address" type="text" source="input" label="name" name="pickup_address" col="4" class="form-input" >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Drop Address</span>
                                </label>

                                <input id="dropoff-address" type="text" source="input" label="name" name="drop_address" col="4" class="form-input" >
                            </div>
                        </div>
                    </div>

                    <div class="row row-line">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Driver</span>
                                </label>

                                <select name="driver_id" class="form-control select-input">
                                    <option value="" disabled="disabled">Select ..</option>
                                    @foreach($driver as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Vehicle</span>
                                </label>

                                <select class="form-control select-input" name="vehicle_id">
                                    <option value="" disabled="disabled">Select ..</option>
                                    @foreach($vehicle as $item)
                                        <option value="{{ $item->id }}">{{ $item->make }} {{ $item->make }} / € {{ $item->price }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Date</span>
                                </label>

                                <input type="date" source="input" label="name" name="date" col="4" class="form-input" >
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Pickup time</span>
                                </label>


                                <div class="row">
                                    <div class="col-md-6" style="padding-right: 0;">
                                        <div class="form-group">
                                            <select name="pickup_hour" class="form-control select-input">
                                                <option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="00">00</option></select>
                                        </div>
                                    </div>

                                    <div class="col-md-6" style="padding-left: 0;">
                                        <div class="form-group">
                                            <select name="pickup_min" class="form-control select-input">
                                                <option value="00">00</option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>
                                                <option value="36">36</option>
                                                <option value="37">37</option>
                                                <option value="38">38</option>
                                                <option value="39">39</option>
                                                <option value="40">40</option>
                                                <option value="41">41</option>
                                                <option value="42">42</option>
                                                <option value="43">43</option>
                                                <option value="44">44</option>
                                                <option value="45">45</option>
                                                <option value="46">46</option>
                                                <option value="47">47</option>
                                                <option value="48">48</option>
                                                <option value="49">49</option>
                                                <option value="50">50</option>
                                                <option value="51">51</option>
                                                <option value="52">52</option>
                                                <option value="53">53</option>
                                                <option value="54">54</option>
                                                <option value="55">55</option>
                                                <option value="56">56</option>
                                                <option value="57">57</option>
                                                <option value="58">58</option>
                                                <option value="59">59</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row row-line">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Flight Number</span>
                                </label>

                                <input type="text" source="input" label="name" name="flight_number" col="4" class="form-input">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Pickup Sign</span>
                                </label>

                                <input type="text" source="input" label="name" name="pickup_sign" col="4" class="form-input">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Passagers</span>
                                </label>

                                <select class="form-control select-input" name="passagers">
                                    <option value="" disabled="disabled">Select ..</option>
                                    <option value="1" >1</option>
                                    <option value="2" >2</option>
                                    <option value="3" >3</option>
                                    <option value="4" >4</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Seats</span>
                                </label>

                                <select class="form-control select-input" name="seats">
                                    <option value="" disabled="disabled">Select ..</option>
                                    <option value="1" >1</option>
                                    <option value="2" >2</option>
                                    <option value="3" >3</option>
                                    <option value="4" >4</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Bags</span>
                                </label>

                                <select class="form-control select-input" name="bags">
                                    <option value="" disabled="disabled">Select ..</option>
                                    <option value="1" >1</option>
                                    <option value="2" >2</option>
                                    <option value="3" >3</option>
                                    <option value="4" >4</option>
                                    <option value="5" >5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row row-line">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Customer Name</span>
                                </label>

                                <input type="text" source="input" label="name" name="name" col="4" class="form-input">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Customer Email</span>
                                </label>

                                <input type="text" source="input" label="name" name="email" col="4" class="form-input" >
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Customer Phone</span>
                                </label>

                                <input type="text" source="input" label="name" name="phone" col="4" class="form-input" >
                            </div>
                        </div>
                    </div>

                    <div class="row row-line">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Special Requests</span>
                                </label>

                                <textarea type="text" name="special_request" rows="4" cols="50" class="form-input" style="height:100px;"></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Additional Info</span>
                                </label>

                                <textarea type="text" name="additional_info" rows="4" cols="50" class="form-input" style="height:100px;"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row row-line">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Status <i class="fas fa-info-circle"></i></span>
                                </label>

                                <select name="status" class="form-control select-input">
                                    <option value="" disabled="disabled">Select ..</option>
                                    <option value="Pending" >Pending</option>
                                    <option value="Cancelled" >Cancelled</option>
                                    <option value="Finished" >Finished</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="panel-footer panel-alt">
                <div class="flex flex-end">
                    <div>
                        <a href="{{ route('bookings.index') }}" class="btn btn-default">
                            <span class="btn-text">Cancel</span>
                        </a>

                        <button type="submit" class="btn btn-primary">
                            <span class="btn-text">Save</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>
@endsection
