@extends('layouts.app')


@section('content')
    <div class="m-t-65" id="bookings-page">
        <div class="col-md-12 toggled">
            <div class="row">
                <div id="subheader_pg" class="subHeader__block">
                    <div class="float-left" style="display:flex;">
                        <div class="subheader__page__title">
                            <h6>Roles</h6>
                        </div>

                        <span class="subheader__separator kt-subheader__separator--v"></span>

                        <div class="subheader__desc__count">
                            <span> 17 Total</span>
                        </div>
                    </div>
                    <div class="float-right">
                        <div style="display: flex;">
                            <a href="/roles/create" class="btn btn-label-brand btn-bold">
                                Add Role
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
                                    <a class="dropdown-item" href="/export/roles/exportExcel">
                                        <i class="far fa-file-excel"></i>
                                        <span class="nav__link-text">Excel</span>
                                    </a>
                                    <a class="dropdown-item"  href="/export/roles/exportCSV">
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

        <div class="">
            <div class="dv-body table-responsive">
                <div class="filterable">
                    <div class="panel">
                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($roles as $key => $role)
                                        <tr>
                                            <th>{{ ++$i }}</th>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->created_at }}</td>
                                            <td>{{ $role->updated_at }}</td>
                                            <td>
                                                <div class="bk-span-actions" style="overflow: visible; position: relative; width: 80px; color: rgb(89, 93, 110); font-size: 1rem;">
                                                    <div class="dropdown">
                                                        <a id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                                            <i class="fas fa-ellipsis-h"></i>
                                                        </a>
                                                        <div aria-labelledby="dropdownMenuButton" class="dropdown-menu">
                                                            <a href="/roles/3/edit" class="dropdown-item">
                                                                <i class="far fa-edit"></i>
                                                                <span class="nav__link-text">Edit</span>
                                                            </a>
                                                            <a class="dropdown-item">
                                                                <i class="far fa-trash-alt"></i>
                                                                <span class="nav__link-text">Delete</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection