@extends('layouts.status')

@section('title', 'New Booking')

@section('content')
    <div>
        <div class="panel">

            <form class="form" action="{{ route('update.status60min', $booking->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="panel-footer panel-alt">
                    <div class="flex flex-end">
                        <div>
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
