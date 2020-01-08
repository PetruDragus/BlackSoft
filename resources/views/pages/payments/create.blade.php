@extends('layouts.app')

@section('title', 'Contact')

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

        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <div>
                        <div>New Payment</div>
                    </div>
                </div>
            </div>

            <form class="form" action="{{ route('payments.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="panel-form">
                    <div>
                        <div class="row row-line">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Date</span>
                                    </label>

                                    <input type="date" source="input" label="name" name="date" col="4" class="form-input">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Invoice</span>
                                    </label>

                                    <select class="form-control select-input" name="invoice_id">
                                        <option value="" disabled="disabled">Select ..</option>
                                        @foreach($invoices as $item)
                                            <option value="{{ $item->id }}">{{ $item->number }} - {{ $item->date }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row row-line">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Contact</span>
                                    </label>

                                    <select class="form-control select-input" name="contact_id">
                                        <option value="" disabled="disabled">Select ..</option>
                                        @foreach($contacts as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Amount</span>
                                    </label>

                                    <input type="text" source="input" label="name" name="amount" col="4" class="form-input">
                                </div>
                            </div>
                        </div>

                        <div class="row row-line">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Status</span>
                                    </label>

                                    <select class="form-control select-input" name="status">
                                        <option value="" disabled="disabled">Select ..</option>
                                        <option value="Sent">Sent</option>
                                        <option value="Paid">Paid</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel-footer panel-alt">
                    <div class="flex flex-end">
                        <div>
                            <a href="{{ route('contacts.index') }}" class="btn btn-default">
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