
<template>
    <div class="m-t-65" id="bookings-page">
        <div class="col-md-12 toggled">
            <div class="row">
                <div id="subheader_pg" class="subHeader__block">
                    <div class="float-left" style="display:flex;">
                        <div class="subheader__page__title">
                            <h6>Vehicles</h6>
                        </div>

                        <span class="subheader__separator kt-subheader__separator--v"></span>

                        <div class="subheader__desc__count">
                            <span> 0 Total</span>
                        </div>
                    </div>
                    <div class="float-right">
                        <div style="display: flex;">
                            <a href="/vehicles/create" class="btn btn-label-brand btn-bold">
                                Add Vehicle
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
                                    <a class="dropdown-item" href="/export/vehicles/exportExcel">
                                        <i class="far fa-file-excel"></i>
                                        <span class="nav__link-text">Excel</span>
                                    </a>
                                    <a class="dropdown-item"  href="/export/vehicles/exportCSV">
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
                        <th>Name.</th>
                        <th>Business Type</th>
                        <th>Vehicle Price</th>
                        <th>Driver/Operator</th>
                        <th>Current Meter</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tr slot-scope="{ item }">
                        <td style="width: 25%;">
                            <div class="vh--table--name" style="display:flex;">
                                <div class="vh--image">
                                    <img :src="'/storage/' + item.filename" width="100">
                                </div>

                                <div class="vh--content" >
                                    <a href="#">#{{ item.id }} - {{ item.year }} - {{ item.make }} {{ item.model }}</a>
                                    <p><span>VIN/SN:</span> {{ item.vin }}</p>
                                    <p><span>Plate No:</span> {{ item.plate }}</p>
                                </div>
                            </div>
                        </td>
                        <td>First Class</td>
                        <td>€ {{ item.price }}</td>
                        <td>{{ item.driver.name }}</td>
                        <td>{{ item.current_meter }} km</td>
                        <td>
                            <div class="bk-span-actions" style="overflow: visible; position: relative; width: 80px;color: #595d6e;font-size: 1rem;">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-clean btn-icon btn-icon-md" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" v-bind:href="'/vehicles/'+item.id+'/edit'">
                                            <i class="far fa-edit"></i>
                                            <span class="nav__link-text">Edit</span>
                                        </a>
                                        <a class="dropdown-item" @click="deleteVehicle(item.id)">
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
                filterable: {
                    url: '/api/v1/vehicles/',
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