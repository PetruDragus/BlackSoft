<template>
    <div class="m-t-65" id="bookings-page">
        <div class="col-md-12 toggled">
            <div class="row">
                <div id="subheader_pg" class="subHeader__block">
                    <div class="float-left" style="display:flex;">
                        <div class="subheader__page__title">
                            <h6>Users</h6>
                        </div>

                        <span class="subheader__separator kt-subheader__separator--v"></span>

                        <div class="subheader__desc__count">
                            <span> 17 Total</span>
                        </div>
                    </div>
                    <div class="float-right">
                        <div style="display: flex;">
                            <a href="/users/create" class="btn btn-label-brand btn-bold">
                                Add User
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
                                    <a class="dropdown-item" href="/export/users/exportExcel">
                                        <i class="far fa-file-excel"></i>
                                        <span class="nav__link-text">Excel</span>
                                    </a>
                                    <a class="dropdown-item"  href="/export/users/exportCSV">
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
                <filterable v-bind="filterable">
                    <thead slot="thead">
                    <tr>
                        <th>ID.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tr slot-scope="{ item }">
                        <th>#{{ item.id }}</th>
                        <td>{{ item.name }}</td>
                        <td>{{ item.email }}</td>
                        <td>N/A</td>
                        <td>
                            <div class="bk-span-actions" style="overflow: visible; position: relative; width: 80px;color: #595d6e;font-size: 1rem;">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-clean btn-icon btn-icon-md" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" v-bind:href="'/users/'+item.id+'/edit'">
                                            <i class="far fa-edit"></i>
                                            <span class="nav__link-text">Edit</span>
                                        </a>
                                        <a class="dropdown-item" >
                                            <i class="far fa-trash-alt"></i>
                                            <span class="nav__link-text">Delete</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </filterable>
            </div>
        </div>
    </div>
</template>

<script>

    import Vue from 'vue'
    import axios from 'axios'
    import Filterable from '../../../components/Filterable'

    //similar to vue-resource
    export default {
        components: { Filterable },
        data() {
            return {
                drivers: {},
                vehicles: {},
                props: ['title'],
                filterable: {
                    url: '/api/v1/users/',
                    orderables: [
                        {title: 'Id', name: 'id', type: 'numeric'},
                        {title: 'Name', name: 'name', type: 'string'},
                        {title: 'Email', name: 'email', type: 'string'},
                        {title: 'Created At', name: 'created_at', type: 'datetime'},
                    ],
                    filterGroups: [
                        {
                            name: 'Users',
                            filters: [
                                {title: 'Id', name: 'id', type: 'numeric'},
                                {title: 'Name', name: 'name', type: 'string'},
                                {title: 'Email', name: 'email', type: 'string'},
                                {title: 'Created At', name: 'created_at', type: 'datetime'},
                            ]
                        }
                    ]
                }
            }
        }
    }
</script>