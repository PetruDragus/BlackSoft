@extends('layouts.app')

@section('title', 'New Booking')

@section('content')
    <div>
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


        <div role="alert" class="alert alert-light alert-elevate">
            <div class="alert-icon">
                <i class="fas fa-exclamation"></i>
            </div>
            <div class="alert-text">
                You must select the date even if it remains the same. <br>
                If the date is not set the input field will be saved empty
            </div>
        </div>

        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <div>
                        <div>Edit Booking #{{ $booking->id }}</div>
                    </div>
                </div>
            </div>

            <form class="form" action="{{ route('bookings.update', $booking->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="panel-form">
                    <div>
                        <div class="row row-line">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Pickup Address</span>
                                    </label>

                                    <input id="pickup-address" type="text" source="input" label="name" name="pickup_address" col="4" class="form-input" value="{{ $booking->pickup_address }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Drop Address</span>
                                    </label>

                                    <input id="dropoff-address" type="text" source="input" label="name" name="drop_address" col="4" class="form-input" value="{{ $booking->drop_address }}">
                                </div>
                            </div>
                        </div>

                        <div class="row row-line">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Driver</span>
                                    </label>

                                    <select name="driver_id" class="form-control select-input select2">
                                        <option value="" disabled="disabled">Select ..</option>
                                        @foreach($driver as $item)
                                            <option value="{{ $item->id }}" {{ ( $booking->driver_id == $item->id ) ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Vehicle</span>
                                    </label>

                                    <select class="form-control select-input select2" name="vehicle_id">
                                        <option value="" disabled="disabled">Select ..</option>
                                        @foreach($vehicle as $item)
                                            <option value="{{ $item->id }}" {{ ( $booking->vehicle_id == $item->id ) ? 'selected' : '' }}>{{ $item->make }} {{ $item->model }} / € {{ $item->price }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Date</span>
                                    </label>

                                    <input type="date" source="input" label="name" name="date" col="4" class="form-input" value="{{ $booking->date }}" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Pickup Time</span>
                                    </label>

                                    <div class="row">
                                        <div class="col-md-6" style="padding-right: 0;">
                                            <div class="form-group">
                                                <select name="pickup_hour" class="form-control select-input">
                                                    <option value="01" @if($booking->pickup_hour == 1) selected @endif>01</option>
                                                    <option value="02" @if($booking->pickup_hour == 12) selected @endif>02</option>
                                                    <option value="03" @if($booking->pickup_hour == 13) selected @endif>03</option>
                                                    <option value="04" @if($booking->pickup_hour == 14) selected @endif>04</option>
                                                    <option value="05" @if($booking->pickup_hour == 15) selected @endif>05</option>
                                                    <option value="06" @if($booking->pickup_hour == 16) selected @endif>06</option>
                                                    <option value="07" @if($booking->pickup_hour == 17) selected @endif>07</option>
                                                    <option value="08" @if($booking->pickup_hour == 18) selected @endif>08</option>
                                                    <option value="09" @if($booking->pickup_hour == 19) selected @endif>09</option>
                                                    <option value="10" @if($booking->pickup_hour == 10) selected @endif>10</option>
                                                    <option value="11" @if($booking->pickup_hour == 11) selected @endif>11</option>
                                                    <option value="12" @if($booking->pickup_hour == 12) selected @endif>12</option>
                                                    <option value="13" @if($booking->pickup_hour == 13) selected @endif>13</option>
                                                    <option value="14" @if($booking->pickup_hour == 14) selected @endif>14</option>
                                                    <option value="15" @if($booking->pickup_hour == 15) selected @endif>15</option>
                                                    <option value="16" @if($booking->pickup_hour == 16) selected @endif>16</option>
                                                    <option value="17" @if($booking->pickup_hour == 17) selected @endif>17</option>
                                                    <option value="18" @if($booking->pickup_hour == 18) selected @endif>18</option>
                                                    <option value="19" @if($booking->pickup_hour == 19) selected @endif>19</option>
                                                    <option value="20" @if($booking->pickup_hour == 20) selected @endif>20</option>
                                                    <option value="21" @if($booking->pickup_hour == 21) selected @endif>21</option>
                                                    <option value="22" @if($booking->pickup_hour == 22) selected @endif>22</option>
                                                    <option value="23" @if($booking->pickup_hour == 23) selected @endif>23</option>
                                                    <option value="00" @if($booking->pickup_hour == 00) selected @endif>00</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6" style="padding-left: 0;">
                                            <div class="form-group">
                                                <select name="pickup_min" class="form-control select-input">
                                                    <option value="00" @if($booking->pickup_min == 00) selected @endif>00</option>
                                                    <option value="01" @if($booking->pickup_min == 01) selected @endif>01</option>
                                                    <option value="02" @if($booking->pickup_min == 02) selected @endif>02</option>
                                                    <option value="03" @if($booking->pickup_min == 03) selected @endif>03</option>
                                                    <option value="04" @if($booking->pickup_min == 04) selected @endif>04</option>
                                                    <option value="05" @if($booking->pickup_min == 05) selected @endif>05</option>
                                                    <option value="06" @if($booking->pickup_min == 06) selected @endif>06</option>
                                                    <option value="07" @if($booking->pickup_min == 07) selected @endif>07</option>
                                                    <option value="08" @if($booking->pickup_min == 8) selected @endif>08</option>
                                                    <option value="09" @if($booking->pickup_min == 9) selected @endif>09</option>
                                                    <option value="10" @if($booking->pickup_min == 10) selected @endif>10</option>
                                                    <option value="11" @if($booking->pickup_min == 11) selected @endif>11</option>
                                                    <option value="12" @if($booking->pickup_min == 12) selected @endif>12</option>
                                                    <option value="13" @if($booking->pickup_min == 13) selected @endif>13</option>
                                                    <option value="14" @if($booking->pickup_min == 14) selected @endif>14</option>
                                                    <option value="15" @if($booking->pickup_min == 15) selected @endif>15</option>
                                                    <option value="16" @if($booking->pickup_min == 16) selected @endif>16</option>
                                                    <option value="17" @if($booking->pickup_min == 17) selected @endif>17</option>
                                                    <option value="18" @if($booking->pickup_min == 18) selected @endif>18</option>
                                                    <option value="19" @if($booking->pickup_min == 19) selected @endif>19</option>
                                                    <option value="20" @if($booking->pickup_min == 20) selected @endif>20</option>
                                                    <option value="21" @if($booking->pickup_min == 21) selected @endif>21</option>
                                                    <option value="22" @if($booking->pickup_min == 22) selected @endif>22</option>
                                                    <option value="23" @if($booking->pickup_min == 23) selected @endif>23</option>
                                                    <option value="24" @if($booking->pickup_min == 24) selected @endif>24</option>
                                                    <option value="25" @if($booking->pickup_min == 25) selected @endif>25</option>
                                                    <option value="26" @if($booking->pickup_min == 26) selected @endif>26</option>
                                                    <option value="27" @if($booking->pickup_min == 27) selected @endif>27</option>
                                                    <option value="28" @if($booking->pickup_min == 28) selected @endif>28</option>
                                                    <option value="29" @if($booking->pickup_min == 29) selected @endif>29</option>
                                                    <option value="30" @if($booking->pickup_min == 30) selected @endif>30</option>
                                                    <option value="31" @if($booking->pickup_min == 31) selected @endif>31</option>
                                                    <option value="32" @if($booking->pickup_min == 32) selected @endif>32</option>
                                                    <option value="33" @if($booking->pickup_min == 33) selected @endif>33</option>
                                                    <option value="34" @if($booking->pickup_min == 34) selected @endif>34</option>
                                                    <option value="35" @if($booking->pickup_min == 35) selected @endif>35</option>
                                                    <option value="36" @if($booking->pickup_min == 36) selected @endif>36</option>
                                                    <option value="37" @if($booking->pickup_min == 37) selected @endif>37</option>
                                                    <option value="38" @if($booking->pickup_min == 38) selected @endif>38</option>
                                                    <option value="39" @if($booking->pickup_min == 39) selected @endif>39</option>
                                                    <option value="40" @if($booking->pickup_min == 40) selected @endif>40</option>
                                                    <option value="41" @if($booking->pickup_min == 41) selected @endif>41</option>
                                                    <option value="42" @if($booking->pickup_min == 42) selected @endif>42</option>
                                                    <option value="43" @if($booking->pickup_min == 43) selected @endif>43</option>
                                                    <option value="44" @if($booking->pickup_min == 44) selected @endif>44</option>
                                                    <option value="45" @if($booking->pickup_min == 45) selected @endif>45</option>
                                                    <option value="46" @if($booking->pickup_min == 46) selected @endif>46</option>
                                                    <option value="47" @if($booking->pickup_min == 47) selected @endif>47</option>
                                                    <option value="48" @if($booking->pickup_min == 48) selected @endif>48</option>
                                                    <option value="49" @if($booking->pickup_min == 49) selected @endif>49</option>
                                                    <option value="50" @if($booking->pickup_min == 50) selected @endif>50</option>
                                                    <option value="51" @if($booking->pickup_min == 51) selected @endif>51</option>
                                                    <option value="52" @if($booking->pickup_min == 52) selected @endif>52</option>
                                                    <option value="53" @if($booking->pickup_min == 53) selected @endif>53</option>
                                                    <option value="54" @if($booking->pickup_min == 54) selected @endif>54</option>
                                                    <option value="55" @if($booking->pickup_min == 55) selected @endif>55</option>
                                                    <option value="56" @if($booking->pickup_min == 56) selected @endif>56</option>
                                                    <option value="57" @if($booking->pickup_min == 57) selected @endif>57</option>
                                                    <option value="58" @if($booking->pickup_min == 58) selected @endif>58</option>
                                                    <option value="59" @if($booking->pickup_min == 59) selected @endif>59</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row row-line">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Name</span>
                                    </label>

                                    <input type="text" source="input" label="name" name="name" col="4" class="form-input" value="{{ $booking->name }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Phone</span>
                                    </label>

                                    <input type="text" source="input" label="name" name="phone" col="4" class="form-input" value="{{ $booking->phone }}">
                                </div>
                            </div>
                        </div>

                        <div class="row row-line">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Flight Number</span>
                                    </label>

                                    <input type="text" source="input" label="name" name="flight_number" col="4" class="form-input" value="{{ $booking->flight_number }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Pickup Sign</span>
                                    </label>

                                    <input type="text" source="input" label="name" name="pickup_sign" col="4" class="form-input" value="{{ $booking->pickup_sign }}">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Passengers</span>
                                    </label>

                                    <select class="form-control select-input" name="passagers">
                                        <option value="" disabled="disabled">Select ..</option>
                                        <option value="1" @if($booking->passagers == 1) selected @endif>1</option>
                                        <option value="2" @if($booking->passagers == 2) selected @endif>2</option>
                                        <option value="3" @if($booking->passagers == 3) selected @endif>3</option>
                                        <option value="4" @if($booking->passagers == 4) selected @endif>4</option>
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
                                        <option value="1" @if($booking->seats == 1) selected @endif>1</option>
                                        <option value="2" @if($booking->seats == 2) selected @endif>2</option>
                                        <option value="3" @if($booking->seats == 3) selected @endif>3</option>
                                        <option value="4" @if($booking->seats == 4) selected @endif>4</option>
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
                                        <option value="1" @if($booking->bags == 1) selected @endif>1</option>
                                        <option value="2" @if($booking->bags == 2) selected @endif>2</option>
                                        <option value="3" @if($booking->bags == 3) selected @endif>3</option>
                                        <option value="4" @if($booking->bags == 4) selected @endif>4</option>
                                        <option value="5" @if($booking->bags == 5) selected @endif>5</option>
                                        <option value="6" @if($booking->bags == 6) selected @endif>6</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row row-line">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Special Requests</span>
                                    </label>

                                    <textarea type="text" name="special_request" rows="4" cols="50" class="form-input" style="height:100px;">
                                        {{ $booking->special_request }}
                                    </textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Additional Info</span>
                                    </label>

                                    <textarea type="text" name="additional_info" rows="4" cols="50" class="form-input" style="height:100px;">
                                        {{ $booking->additional_info }}
                                    </textarea>
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
