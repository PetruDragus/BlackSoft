@extends('layouts.app')

@section('content')
    <div id="app-settings" class="row">
        <div class="settings-sidebar col-md-3">
            <div class="settings-sidebar-inner">
                <strong class="settings-title">App Settings</strong>
                <ul class="settings-list">
                    @foreach ($settings_group as $row)
                    <li class="nav-item">
                        <a href="/my-account" class="settings-link">
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
                                <div>General</div>
                            </div>
                        </div>
                        <div class="panel-form">
                            <div class="row row-line">
                                <div class="col-8 col-offset-8">
                                    <div class="form-group">
                                        <label class="form-label">
                                            <span>App Name</span></label>
                                        <input type="text" class="form-input" source="input" label="Name" value="BlackHansa Fleet Management">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">
                                         x   <span>Date format</span> <!---->
                                        </label>
                                        <select class="form-input">
                                            <option value="d-m-Y">
                                                d-m-Y
                                            </option><option value="Y-m-d">
                                                Y-m-d
                                            </option><option value="d-M-Y">
                                                d-M-Y
                                            </option><option value="Y-M-d">
                                                Y-M-d
                                            </option><option value="d/m/Y">
                                                d/m/Y
                                            </option><option value="Y/m/d">
                                                Y/m/d
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">
                                            <span>Language</span>
                                        </label>
                                        <select class="form-input">
                                            <option value="en">
                                                English
                                            </option>
                                        </select>
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