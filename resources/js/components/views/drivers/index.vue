<template>
    <div class="m-t-65" id="bookings-page">
        <div class="col-md-12 toggled">
            <div class="row">
                <div id="subheader_pg" class="subHeader__block">
                    <div class="float-left" style="display:flex;">
                        <div class="subheader__page__title">
                            <h6>Drivers</h6>
                        </div>

                        <span class="subheader__separator kt-subheader__separator--v"></span>

                        <div class="subheader__desc__count">
                            <span> 17 Total</span>
                        </div>
                    </div>
                    <div class="float-right">
                        <div style="display: flex;">
                            <a href="/drivers/create" class="btn btn-label-brand btn-bold">
                                Add Driver
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
                                    <a class="dropdown-item" href="/export/drivers/exportExcel">
                                        <i class="far fa-file-excel"></i>
                                        <span class="nav__link-text">Excel</span>
                                    </a>
                                    <a class="dropdown-item"  href="/export/drivers/exportCSV">
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
                        <th> </th>
                        <th>ID.</th>
                        <th>City</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone No.</th>
                        <th>GPS Card</th>
                        <th>Fuel Card</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Total Trips</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tr slot-scope="{ item }">
                        <th class="text-center">
                            <img :src="'/storage/' + item.filename" style="border-radius: 50%;box-shadow: 0px 5px 25px 0px rgba(0,0,0,0.2);border: 1px solid #fff;width: 50px;">
                        </th>
                        <th>#{{ item.id }}</th>
                        <td>{{ item.city }}</td>
                        <td>{{ item.name }}</td>
                        <td>{{ item.address }}</td>
                        <td>{{ item.email }}</td>
                        <td>{{ item.phone }}</td>
                        <td>
                            <div class="flex">
                                <img src="https://icons-for-free.com/iconfiles/png/512/credit+card+debit+card+master+card+icon-1320184902602310693.png" width="25">
                                <span style="padding: 5px; font-weight:700;">{{ item.gps_card }}</span>
                            </div>
                        </td>
                        <td>
                            <div class="flex">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/Credit_or_Debit_Card_Flat_Icon_Vector.svg/1024px-Credit_or_Debit_Card_Flat_Icon_Vector.svg.png" width="25">
                                <span style="padding: 5px; font-weight:700;">{{ item.fuel_card }}</span>
                            </div>
                        </td>
                        <td>
                            <span class="status status-pink" v-if="item.status === 'Inactive'">
                                <span class="status-text">{{ item.status }}</span>
                            </span>

                            <span class="status status-green" v-else-if="item.status === 'Active'">
                                <span class="status-text">{{ item.status }}</span>
                            </span>

                            <span class="status status-pink" v-else-if="!item.status">
                                <span class="status-text">N/A</span>
                            </span>
                        </td>
                        <td>{{ item.birthday | formatDate }}</td>
                        <td>{{ item.created_at | formatDate }}</td>
                        <td>
                            <span class="status status-blue">
                                <span class="status-text" style="font-weight: 600 !important; font-size: 10px;">217</span>
                            </span>
                        </td>
                        <td>
                            <div class="bk-span-actions" style="overflow: visible; position: relative; width: 80px;color: #595d6e;font-size: 1rem;">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-clean btn-icon btn-icon-md" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" v-bind:href="'/drivers/'+item.id+'/edit'">
                                            <i class="far fa-edit"></i>
                                            <span class="nav__link-text">Edit</span>
                                        </a>
                                        <a class="dropdown-item" @click="deleteDriver(item.id)">
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
                    url: '/api/v1/drivers/',
                    orderables: [
                        {title: 'Id', name: 'id', type: 'numeric'},
                        {title: 'Name', name: 'name', type: 'string'},
                        {title: 'Email', name: 'email', type: 'string'},
                        {title: 'Phone No.', name: 'phone', type: 'numeric'},
                        {title: 'Created At', name: 'created_at', type: 'datetime'},
                    ],
                    filterGroups: [
                        {
                            name: 'Reviews',
                            filters: [
                                {title: 'Id', name: 'id', type: 'numeric'},
                                {title: 'Name', name: 'name', type: 'string'},
                                {title: 'Email', name: 'email', type: 'string'},
                                {title: 'Phone No.', name: 'phone', type: 'numeric'},
                                {title: 'Created At', name: 'created_at', type: 'datetime'},
                            ]
                        }
                    ]
                }
            }
        }
    }
</script>