<template>
    <div class="m-t-65" id="bookings-page">
        <div class="col-md-12 toggled">
            <div class="row">
                <div id="subheader_pg" class="subHeader__block">
                    <div class="float-left" style="display:flex;">
                        <div class="subheader__page__title">
                            <h6>Bookings</h6>
                        </div>

                        <span class="subheader__separator kt-subheader__separator--v"></span>

                        <div class="subheader__desc__count">
                            <span> 17 Total</span>
                        </div>
                    </div>
                    <div class="float-right">
                        <div style="display: flex;">
                            <a href="/bookings/create" class="btn btn-label-brand btn-bold">
                                Add Booking
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
                                    <a class="dropdown-item" href="/export/bookings/exportExcel">
                                        <i class="far fa-file-excel"></i>
                                        <span class="nav__link-text">Excel</span>
                                    </a>
                                    <a class="dropdown-item"  href="/export/bookings/exportCSV">
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
                            <th>ID</th>
                            <th>Trip No.</th>
                            <th>Pickup Address</th>
                            <th>Drop Address</th>
                            <th>Customer</th>
                            <th>Driver</th>
                            <th>Vehicle</th>
                            <th>Pickup Date / Time</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tr slot-scope="{ item }">
                        <th>#{{ item.id }}</th>
                        <th>{{ item.number }}</th>
                        <td class="md-w245">{{ item.pickup_address }}</td>
                        <td class="md-w245">{{ item.drop_address }}</td>
                        <td>{{ item.customer.name }}</td>
                        <td>
                            <div style="display: inline-flex;">
                                <div class="sidebar-icon">
                                    <i class="fas fa-user-tie"></i>
                                </div>

                                <div>
                                    <div v-if="item.driver !== null">{{ item.driver.name }}</div>
                                    <div v-else style="color: #E63A46;">Unassigned</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div style="display: inline-flex;">
                                <div class="sidebar-icon">
                                    <i class="fas fa-car"></i>
                                </div>

                                <div>
                                    <div v-if="item.vehicle !== null">{{ item.vehicle.plate }}</div>
                                    <div v-else style="color: #E63A46;">Unassigned</div>
                                </div>
                            </div>
                        </td>


                        <td style="width: 150px;">{{ item.date | formatMiniDate }} / {{ item.pickup_hour }}:{{ item.pickup_min }}</td>
                        <td class="td-price" v-if="item.price > '0'" style="width: 75px;">€ {{ item.price | formatMoney}}</td>
                        <td>
                            <div v-if="item.status == 'Pending'" style="display: flex;">
                                <a @click="acceptModal(row)" class="btn-tbl-accept" >
                                    <i class="fas fa-check"></i>
                                </a>

                                <a v-on:click="cancelTrip(row.id)" class="btn-tbl-reject">
                                    <i class="fas fa-minus"></i>
                                </a>
                            </div>

                            <span class="status status-60min" v-if="item.status === '60 min'">
                                <span class="status-text">{{ item.status }}</span>
                            </span>

                            <span class="status status-arrived" v-else-if="item.status === 'Arrived'">
                                <span class="status-text">{{ item.status }}</span>
                            </span>

                            <span class="status status-blue" v-else-if="item.status === 'Accepted'">
                                <span class="status-text">Accepted</span>
                            </span>

                            <span class="status status-pink" v-else-if="item.status === 'Cancelled'">
                                <span class="status-text">{{ item.status }}</span>
                            </span>

                            <span class="status status-green" v-else-if="item.status === 'Finished'">
                                <span class="status-text">{{ item.status }}</span>
                            </span>
                        </td>
                        <td>{{ item.created_at | formatMiniDate }}</td>
                        <td>
                            <div class="bk-span-actions" style="overflow: visible; position: relative; width: 80px;color: #595d6e;font-size: 1rem;">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-clean btn-icon btn-icon-md" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" v-bind:href="'/bookings/'+item.id">
                                            <i class="far fa-eye"></i>
                                            <span class="nav__link-text">View</span>
                                        </a>
                                        <a class="dropdown-item" v-bind:href="'/bookings/'+item.id+'/edit'">
                                            <i class="far fa-edit"></i>
                                            <span class="nav__link-text">Edit</span>
                                        </a>
                                        <a class="dropdown-item" >
                                            <i class="fas fa-ban"></i>
                                            <span class="nav__link-text">Cancel</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <!-- Assign modal -->
                        <div class="modal fade" id="assignModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Assign booking (no. {{ item.number }}) to driver and vehicle</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
<!--                                    <form @submit.prevent="acceptTrip">-->
<!--                                        <div class="modal-body">-->
<!--                                            <div class="assign-form">-->
<!--                                                <div class="row">-->
<!--                                                    <div class="form-group col-md-6">-->
<!--                                                        <label class="form-label">-->
<!--                                                            <span>Select Driver:</span>-->
<!--                                                        </label>-->

<!--                                                        <select v-model="form.driver_id" class="form-control select-input" name="driver_id">-->
<!--                                                            <option value="" disabled="disabled">Select ..</option>-->
<!--                                                            <option v-for="driver in drivers.data" v-bind:value="driver.id">{{ driver.name }}</option>-->
<!--                                                        </select>-->
<!--                                                    </div>-->

<!--                                                    <div class="form-group col-md-6">-->
<!--                                                        <label class="form-label">-->
<!--                                                            <span>Select Vehicle:</span>-->
<!--                                                        </label>-->

<!--                                                        <select v-model="form.vehicle_id" class="form-control select-input" name="vehicle_id">-->
<!--                                                            <option value="" disabled="disabled">Select ..</option>-->
<!--                                                            <option v-for="vehicle in vehicles.data" v-bind:value="vehicle.id">{{ item.plate }} - {{ vehicle.make }} {{ vehicle.model }} </option>-->
<!--                                                        </select>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="modal-footer">-->
<!--                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
<!--                                            <button :disabled="form.busy" type="submit" class="btn btn-primary">Save</button>-->
<!--                                        </div>-->
<!--                                    </form>-->
                                </div>
                            </div>
                        </div>
                        <!-- End assign modal -->

                    </tr>
                </filterable>
            </div>
        </div>
    </div>
</template>

<script>
    import Vue from 'vue'
    import axios from 'axios'
    import { Form, HasError, AlertError } from 'vform'
    Vue.component(HasError.name, HasError);
    Vue.component(AlertError.name, AlertError);
    import Filterable from '../../../components/Filterable'

    export default {
        components: { Filterable },
        data() {
            return {
                drivers: {},
                vehicles: {},

                filterable: {
                    url: '/api/v1/bookings/',
                    orderables: [
                        {title: 'Id', name: 'id',  type: 'string'},
                        {title: 'Number', name: 'number'},
                        {title: 'Pickup Address', name: 'pickup_address'},
                        {title: 'Drop Address', name: 'drop_address'},
                        {title: 'Flight Number', name: 'flight_number'},
                        {title: 'Payment Method', name: 'payment_method'},
                        {title: 'Date', name: 'date'},
                        {title: 'Passengers', name: 'passengers'},
                        {title: 'Bags', name: 'bags'},
                        {title: 'Created At', name: 'created_at'},
                    ],
                    filterGroups: [
                        {
                            name: 'Bookings',
                            filters: [
                                {title: 'Id', name: 'id', type: 'numeric'},
                                {title: 'Number', name: 'number', type: 'string'},
                                {title: 'Pickup Address', name: 'pickup_address', type: 'string'},
                                {title: 'Drop Address', name: 'drop_address', type: 'string'},
                                {title: 'Flight Number', name: 'flight_number', type: 'string'},
                                {title: 'Payment Method', name: 'payment_method'},
                                {title: 'Date', name: 'date', type: 'datetime'},
                                {title: 'Passengers', name: 'passengers', type: 'numeric'},
                                {title: 'Bags', name: 'bags', type: 'numeric'},
                                {title: 'Created At', name: 'created_at', type: 'datetime'},
                            ]
                        }
                    ]
                }
            }
        },
        methods: {
            deleteBooking(id) {
                if(confirm('are you sure?'))
                // Send request to the server
                    axios.delete( '/api/v1/bookings/'+id)
                        .then(function (response) {
                            window.location.reload();
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
            },
            acceptModal(row) {
                this.editmode = true;
                this.form.reset();
                $('#assignModal').modal('show');
                this.form.fill(row);
            },
            acceptTrip (id) {
                this.form.put('api/v3/booking/accept/'+this.form.id)
                    .then(function (response) {
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                this.fetchIndexData();
                $('#assignModal').modal('hide');
            },
            cancelTrip(id) {
                this.form.put('api/v3/booking/reject/'+id)
                    .then(function (response) {
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                this.fetchIndexData();
            },
            loadDrivers() {
                axios.get('/api/v1/drivers').then(({ data }) => (this.drivers = data));
            },
            loadVehicles() {
                axios.get('/api/v1/vehicles').then(({ data }) => (this.vehicles = data));
            }
        },
        created() {
            this.loadDrivers();
            this.loadVehicles();
        },
    }
</script>