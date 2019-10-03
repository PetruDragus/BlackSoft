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
                            <span> 2 Total</span>
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
                        <tr v-for="row in model.data" data-href='http://127.0.0.1:8000/bookings/' >
                            <th>#{{ row.id }}</th>
                            <td class="md-w245">{{ row.pickup_address }}</td>
                            <td class="md-w245">{{ row.drop_address }}</td>
                            <td>{{ row.date | formatDate }}</td>
                            <td>
                                <span class="status status-blue">
                                    <span class="status-text" style="font-weight: 600 !important;font-size: 10px;">{{ row.seats }}</span>
                                </span>
                            </td>
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
                            <td class="td-price">€ {{ row.price | formatMoney}}</td>
                            <td>
                                <span class="status status-gray" v-if="row.status == 'Pending'">
                                    <span class="status-text">{{ row.status }}</span>
                                </span>

                                <span class="status status-pink" v-if="row.status == 'Cancelled'">
                                    <span class="status-text">{{ row.status }}</span>
                                </span>

                                <span class="status status-green" v-if="row.status == 'Finished'">
                                    <span class="status-text">{{ row.status }}</span>
                                </span>
                            </td>
                            <td>{{ row.created_at | formatDate }}</td>
                            <td>
                                <div class="bk-span-actions" style="overflow: visible; position: relative; width: 80px;color: #595d6e;font-size: 1rem;">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-clean btn-icon btn-icon-md" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal">
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
                                                <i class="far fa-trash-alt"></i>
                                                <span class="nav__link-text">Delete</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </td>
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

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import Vue from 'vue'
    import axios from 'axios'
    //similar to vue-resource
    export default {
        bookings: {},
        props: ['title'],
        data() {
            return {
                model: {},
                columns: {},
                source: '/api/bookings',
                query: {
                    page: 1,
                    column: 'id',
                    direction: 'desc',
                    per_page: 15,
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
            this.fetchIndexData()
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
            deleteBooking(id) {
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {

                    // Send request to the server
                    this.form.delete('/api/bookings/'+id).then(() => {
                        swal(
                            'Deleted!',
                            'Your contact has been deleted.',
                            'success'
                        );
                    }).catch(() => {
                        swal('Failed!', 'There was someting wrong!', 'Warning!');
                    });
                })
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
            fetchIndexData() {
                var vm = this;

                const url = 'http://127.0.0.1:8000/api/bookings?column=' + this.query.column + '&direction=' + this.query.direction + '&page=' + this.query.page + '&per_page=' + this.query.per_page + '&search_column=' + this.query.search_column + '&search_operator=' + this.query.search_operator + '&search_input=' + this.query.search_input;

                axios.get(url)
                    .then(function(response) {
                        Vue.set(vm.$data, 'model', response.data.model)
                        Vue.set(vm.$data, 'columns', response.data.columns)
                    })
                    .catch(function(response) {
                        console.log(response)
                    })
            }
        }
        ,
        computed: {
            resultCount () {
                return this.fetchIndexData = response.data
            }
        },
    }
</script>