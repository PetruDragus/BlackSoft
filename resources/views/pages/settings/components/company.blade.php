@extends('layouts.app')

@section('content')
    <div id="app-settings" class="row">
        <div class="settings-sidebar col-md-3">
            <div class="settings-sidebar-inner">
                <strong class="settings-title">App Settings</strong>
                <ul class="settings-list">
                    @foreach ($settings_group as $row)
                        <li class="nav-item">
                            <a href="/settings{{ $row->uri }}" class="settings-link">
                                <span class="settings-text">{{ $row->name }}</span>
                                <i class="settings-icon2 icon fas fa-caret-right"></i>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="tab-content col-md-9" >
            <div class="settings-inner" >
                <div class="content-inner">
                    <div class="panel panel-margin">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <div>Company information</div>
                            </div>
                        </div>
                        <div class="panel-form">
                            <div class="row row-line">
                                <div class="col-8 col-offset-8">
                                    <div class="form-group">
                                        <label class="form-label">
                                            <span>Company name</span>
                                        </label>
                                        <input type="text" class="form-input" source="input" label="Name" value="BlackHansa">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">
                                            <span>Company address</span>
                                        </label>
                                        <textarea class="form-input" type="text" source="textarea" label="Company address">
                                            Str. 1 decembrie 1918
                                        </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">
                                            <span>Company email</span>
                                        </label>
                                        <input type="text" class="form-input" source="input" label="Name" value="blackhansa@blackhansa.de">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">
                                            <span>Company telephone</span>
                                            <small class="form-optional">(Optional)</small>
                                        </label>
                                        <input type="text" class="form-input" source="input" label="Name" value="636764">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">
                                            <span>Company Fax</span>
                                            <small class="form-optional">(Optional)</small>
                                        </label>
                                        <input type="text" class="form-input" source="input" label="Name" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="flex flex-end">
                                <div>
                                    <button type="button" class="btn btn-primary">
                                        <span class="btn-text">Save</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection