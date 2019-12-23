<template>
    <div class="m-t-35">
        <div class="col-md-12 toggled">
            <div class="row">
                <div id="subheader_pg" class="subHeader__block">
                    <div class="float-left" style="display:flex;">
                        <div class="subheader__page__title">
                            <h6>Bookings</h6>
                        </div>

                        <span class="subheader__separator kt-subheader__separator--v"></span>

                        <div class="subheader__desc__count">
                            <span> {{ this.model.total }} Total</span>
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

        <div class="dv">
            <div class="dv-header">
                <div class="dv-header-title">
                    Bookings
                </div>
                <div class="dv-header-columns">
                    <span class="dv-header-pre">Search: </span>
                    <select class="dv-header-select" v-model="query.search_column">
                        <option v-for="column in columns" :value="column">{{column}}</option>
                    </select>
                </div>
                <div class="dv-header-operators">
                    <select class="dv-header-select" v-model="query.search_operator">
                        <option v-for="(value, key) in operators" :value="key">{{value}}</option>
                    </select>
                </div>
                <div class="dv-header-search">
                    <input type="text" class="dv-header-input"
                           placeholder="Search"
                           v-model="query.search_input"
                           @keyup.enter="fetchIndexData()">
                </div>
                <div class="dv-header-submit">
                    <button class="dv-header-btn"@click="fetchIndexData()">Filter</button>
                </div>
            </div>
            <div class="dv-body table-responsive">
                <table class="dv-table table">
                    <thead>
                    <tr>
                        <th v-for="column in columns" @click="toggleOrder(column)">
                            <span>{{column}}</span>
                            <span class="dv-table-column" v-if="column === query.column">
                    <span v-if="query.direction === 'desc'">&darr;</span>
                    <span v-else>&uarr;</span>
                  </span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr v-if="model.data < 1">
                            <td class="" colspan="10" style="text-align: left;">
                                <div class="table-no_results">No results found!</div>
                            </td>
                        </tr>
                        <tr v-for="row in model.data">
                            <th>#{{ row.id }}</th>
                            <th>{{ row.number }}</th>
                            <td class="md-w245">{{ row.pickup_address }}</td>
                            <td class="md-w245">{{ row.drop_address }}</td>
                            <td style="display:grid;font-weight: 600;">
                                <div style="display: inline-flex;">
                                    <div class="sidebar-icon" style="margin-right: 10px;">
                                        <i class="fas fa-user-tie"></i>
                                    </div>

                                    <div>
                                        <div v-if="row.driver !== null">{{ row.driver.name }}</div>
                                        <div v-else style="color: #E63A46;">Unassigned</div>
                                    </div>
                                </div>

                                <div style="display: inline-flex;">
                                    <div class="sidebar-icon" style="margin-right: 10px;">
                                        <i class="fas fa-car"></i>
                                    </div>

                                    <div>
                                        <div v-if="row.vehicle !== null">{{ row.vehicle.plate }}</div>
                                        <div v-else style="color: #E63A46;">Unassigned</div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ row.date | formatDate }} / {{ row.pickup_hour }}:{{ row.pickup_min }}</td>
                            <td>
                                <span class="status status-blue">
                                    <span class="status-text" style="font-weight: 600 !important;font-size: 10px;">{{ row.passagers }}</span>
                                </span>
                            </td>
                            <td>
                                <span class="status status-blue">
                                    <span class="status-text" style="font-weight: 600 !important;font-size: 10px;">{{ row.bags }}</span>
                                </span>
                            </td>

                            <td class="td-price" v-if="row.price > '0'">€ {{ row.price | formatMoney}}</td>
                            <td class="td-price" v-else="row.price == '0'">
                                <a @click="generatePrice(row.id)">
                                    <span class="status status-blue">
                                        <span class="status-text">Generate Price</span>
                                    </span>
                                </a>
                            </td>
                            <td>
                                <div v-if="row.status == 'Pending'" style="display: flex;">
                                    <a @click="acceptModal(row)" class="btn-tbl-accept" >
                                        <i class="fas fa-check"></i>
                                    </a>

                                    <a v-on:click="cancelTrip(row.id)" class="btn-tbl-reject">
                                        <i class="fas fa-minus"></i>
                                    </a>
                                </div>

                                <span class="status status-60min" v-if="row.status === '60 min'">
                                    <span class="status-text">{{ row.status }}</span>
                                </span>

                                <span class="status status-arrived" v-else-if="row.status === 'Arrived'">
                                    <span class="status-text">{{ row.status }}</span>
                                </span>

                                <span class="status status-blue" v-else-if="row.status === 'Accepted'">
                                    <span class="status-text">Accepted</span>
                                </span>

                                <span class="status status-pink" v-else-if="row.status === 'Cancelled'">
                                    <span class="status-text">{{ row.status }}</span>
                                </span>

                                <span class="status status-green" v-else-if="row.status === 'Finished'">
                                    <span class="status-text">{{ row.status }}</span>
                                </span>
                            </td>
<!--                            <td>-->

<!--                                <a target="_blank" v-bind:href="'https://maps.google.com/maps?saddr=' + row.pickup_address + '&amp;daddr=' + row.drop_address + '&amp;ie=UTF8&amp;z=11&amp;layer=t&amp;t=m&amp;iwloc=A&amp;output=embed?iframe=true&amp;width=640&amp;height=480'" data-gal="prettyPhoto[gallery]" class="btn btn-tbl-delete btn-xs btn-view-route">-->
<!--                                    <i class="fa fa-map-marker-alt"></i>-->
<!--                                </a>-->
<!--                            </td>-->
                            <td>{{ row.created_at | formatDate }}</td>
                            <td>
                                <div class="bk-span-actions" style="overflow: visible; position: relative; width: 80px;color: #595d6e;font-size: 1rem;">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-clean btn-icon btn-icon-md" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" data-toggle="modal" v-bind:data-target="'#previewBookingModal'+row.id">
                                                <i class="far fa-window-restore"></i>
                                                <span class="nav__link-text">Preview</span>
                                            </a>
                                            <a class="dropdown-item" v-bind:href="'/bookings/'+row.id">
                                                <i class="far fa-eye"></i>
                                                <span class="nav__link-text">View</span>
                                            </a>
                                            <a class="dropdown-item" v-bind:href="'/bookings/'+row.id+'/edit'">
                                                <i class="far fa-edit"></i>
                                                <span class="nav__link-text">Edit</span>
                                            </a>
                                            <a class="dropdown-item">
                                                <i class="fas fa-ban"></i>
                                                <span class="nav__link-text">Cancel</span>
                                            </a>
                                            <a class="dropdown-item" @click="cancelTrip(row)">
                                                <i class="far fa-trash-alt"></i>
                                                <span class="nav__link-text">Delete</span>
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
                                            <h5 class="modal-title" id="exampleModalLongTitle">Assign booking (no. {{ row.number}}) to driver and vehicle</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form @submit.prevent="acceptTrip">
                                            <div class="modal-body">
                                                <div class="assign-form">
                                                        <div class="row">
                                                            <div class="form-group col-md-6">
                                                                <label class="form-label">
                                                                    <span>Select Driver:</span>
                                                                </label>

                                                                <select v-model="form.driver_id" class="form-control select-input" name="driver_id">
                                                                    <option value="" disabled="disabled">Select ..</option>
                                                                    <option v-for="item in drivers.data" value="1">{{ item.name }}</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label class="form-label">
                                                                    <span>Select Vehicle:</span>
                                                                </label>

                                                                <select v-model="form.vehicle_id" class="form-control select-input" name="vehicle_id">
                                                                    <option value="" disabled="disabled">Select ..</option>
                                                                    <option v-for="item in vehicles.data" value="1">{{ item.plate }} - {{ item.make }} {{ item.model }} </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button :disabled="form.busy" type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End assign modal -->

                            <!-- Modal -->
                            <div class="modal fade booking-modal" v-bind:id="'previewBookingModal'+row.id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                {{ row.pickup_hour }}:{{ row.pickup_min }} - {{ row.date | formatDate }} - #{{ row.number }}

                                                <span class="status status-gray" v-if="row.status === 'Pending'">
                                                    <span class="status-text">{{ row.status }}</span>
                                                </span>

                                                <span class="status status-60min" v-else-if="row.status === '60 min'">
                                                    <span class="status-text">{{ row.status }}</span>
                                                </span>

                                                <span class="status status-arrived" v-else-if="row.status === 'Arrived'">
                                                    <span class="status-text">{{ row.status }}</span>
                                                </span>

                                                <span class="status status-arrived" v-else-if="row.status === 'Accepted'">
                                                    <span class="status-text">Accepted</span>
                                                </span>

                                                <span class="status status-pink" v-else-if="row.status === 'Cancelled'">
                                                    <span class="status-text">{{ row.status }}</span>
                                                </span>

                                                <span class="status status-green" v-else-if="row.status === 'Finished'">
                                                    <span class="status-text">{{ row.status }}</span>
                                                </span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form @submit.prevent="editBooking()">

                                            <input type="hidden" name="_method" value="PUT">
                                            <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6 booking-modal-list">
                                                    <div class="list-b-item">
                                                        <h5>Booking Information:</h5>
                                                        <div class="row">
                                                            <label class="col-md-4 col-form-label justify-content-end">Pickup Address: </label>
                                                            <div class="col-md-8 col-form-label">
                                                                {{ row.pickup_address }}
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-md-4 col-form-label justify-content-end">Drop Address: </label>
                                                            <div class="col-md-8 col-form-label">
                                                                {{ row.drop_address }}
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-md-4 col-form-label justify-content-end">Time / Date: </label>
                                                            <div class="col-md-8 col-form-label">
                                                                {{ row.pickup_hour }}:{{ row.pickup_min }} / {{ row.date | formatDate }}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="list-b-item">
                                                        <h5>Customer Information:</h5>
                                                        <div class="row">
                                                            <label class="col-md-4 col-form-label justify-content-end">Name: </label>
                                                            <div v-if="row.name !== null" class="col-md-8">
                                                                {{ row.name }}
                                                            </div>

                                                            <div v-if="row.name == null" class="col-md-8">
                                                                N/A
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-md-4 col-form-label justify-content-end">Email: </label>
                                                            <div v-if="row.customer !== null" class="col-md-8">
                                                                {{ row.customer.email }}
                                                            </div>

                                                            <div v-if="row.customer == null" class="col-md-8">
                                                                N/A
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-md-4 col-form-label justify-content-end">Phone: </label>
                                                            <div v-if="row.phone !== null" class="col-md-8">
                                                                {{ row.phone }}
                                                            </div>

                                                            <div v-if="row.phone == null" class="col-md-8">
                                                                N/A
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="list-b-item">
                                                        <h5>Financial Information:</h5>
                                                        <div class="row" style="display: flex;">
                                                            <div class="col-md-6">
                                                                <div class="row" style="display: block;">
                                                                    <label class="col-md-4 col-form-label justify-content-end">Price: </label>
                                                                    <div class="col-md-8">
                                                                        € {{ row.price | formatMoney }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="row" style="display: block;">
                                                                    <label class="col-md-4 col-form-label justify-content-end">Invoice: </label>
                                                                    <div class="col-md-8">
                                                                        {{ row.invoice.number }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <GmapMap
                                                            :center="{ lat:52.5200, lng:13.4050 }"
                                                            :zoom="10"
                                                            map-type-id="terrain"
                                                            style="width: auto; height: 400px"
                                                    >
                                                    </GmapMap>
<!--                                                    <div class="change-driver-form">-->
<!--                                                        <form>-->
<!--                                                            <div class="form-group">-->
<!--                                                                <label class="form-label">-->
<!--                                                                    <span>Change Driver:</span>-->
<!--                                                                </label>-->

<!--                                                                <select v-model="form.driver_id" class="form-control select-input" name="driver_id">-->
<!--                                                                    <option value="" disabled="disabled">Select ..</option>-->
<!--                                                                    <option v-for="item in drivers.data" value="1">{{ item.name }}</option>-->
<!--                                                                </select>-->
<!--                                                            </div>-->
<!--                                                        </form>-->
<!--                                                    </div>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="dv-footer">
                <div class="dv-footer-item">
                    <span class="small">Displaying {{model.from}} - {{model.to}} of {{model.total}} rows</span>
                </div>
                <div class="dv-footer-item">
                    <div class="dv-footer-sub">
                        <button class="dv-footer-btn btn btn-default btn-sm" @click="prev()">&laquo; Prev</button>
                        <button class="dv-footer-btn btn btn-default btn-sm" @click="next()">Next &raquo;</button>
                    </div>
                </div>
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

    //similar to vue-resource
    export default {
        bookings: {},
        props: ['title'],
        data() {
            return {
                form: new Form({
                    id: '',
                    driver_id: '',
                    vehicle_id: '',
                    status: '',
                    pickup_address: '',
                    drop_address: ''
                }),
                drivers: {},
                vehicles: {},
                model: {},
                columns: {},
                source: '/api/v1/bookings',
                query: {
                    page: 1,
                    column: 'id',
                    direction: 'desc',
                    per_page: 20,
                    search_column: 'id',
                    search_operator: 'not_equal',
                    search_input: ''
                },
                operators: {
                    equal: '=',
                    not_equal: '<>',
                    less_than: '<',
                    greater_than: '>',
                    less_than_or_equal_to: '<=',
                    greater_than_or_equal_to: '>=',
                    in: 'IN',
                    like: 'LIKE'
                }
            }
        },
        created() {
            this.fetchIndexData();
            this.loadDrivers();
            this.loadVehicles();
        },
        methods: {
            next() {
                if(this.model.next_page_url) {
                    this.query.page++
                    this.fetchIndexData()
                }
            },
            prev() {
                if(this.model.prev_page_url) {
                    this.query.page--
                    this.fetchIndexData()
                }
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
                        window.location.reload();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                this.fetchIndexData();
                $('#assignModal').modal('hide');
            },
            cancelTrip (id) {
                this.form.put('api/v3/booking/cancel/'+id)
                    .then(function (response) {
                        window.location.reload();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                this.fetchIndexData();
            },
            deleteBooking(id) {

                // Send request to the server
                this.form.put('api/v1/bookings/cancel/'+id)
                    .then(function (response) {
                        window.location.reload();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            toggleOrder(column) {
                if(column === this.query.column) {
                    // only change direction
                    if(this.query.direction === 'desc') {
                        this.query.direction = 'asc'
                    } else {
                        this.query.direction = 'desc'
                    }
                } else {
                    this.query.column = column
                    this.query.direction = 'asc'
                }
                this.fetchIndexData()
            },
            loadContacts() {
                axios.get('/api/bookings/all').then(({ data }) => (this.bookings = data));
            },
            loadDrivers() {
                axios.get('/api/v1/drivers').then(({ data }) => (this.drivers = data));
            },
            loadVehicles() {
                axios.get('/api/v1/vehicles').then(({ data }) => (this.vehicles = data));
            },
            fetchIndexData() {
                var vm = this

                const url = '/api/v1/bookings?column=' + this.query.column + '&direction=' + this.query.direction + '&page=' + this.query.page + '&per_page=' + this.query.per_page + '&search_column=' + this.query.search_column + '&search_operator=' + this.query.search_operator + '&search_input=' + this.query.search_input;

                axios.get(url)
                    .then(function(response) {
                        Vue.set(vm.$data, 'model', response.data.model)
                        Vue.set(vm.$data, 'columns', response.data.columns)
                    })
                    .catch(function(response) {
                        console.log(response)
                    })
            }
        },
        // created() {
        //     this.fetchIndexData();
        //     setInterval(() => this.fetchIndexData(), 3000);
        // }
    }
</script>