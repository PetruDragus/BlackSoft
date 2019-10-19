<template>
    <div class="m-t-65">
        <div class="col-md-12 toggled">
            <div class="row">
                <div id="subheader_pg" class="subHeader__block">
                    <div class="float-left" style="display:flex;">
                        <div class="subheader__page__title">
                            <h6>Job Applications</h6>
                        </div>

                        <span class="subheader__separator kt-subheader__separator--v"></span>

                        <div class="subheader__desc__count">
                            <span> 2 Total</span>
                        </div>
                    </div>
                    <div class="float-right">
                        <div>
                            <a href="/applications/create" class="btn btn-label-brand btn-bold">
                                Add Job Application
                            </a>

                            <a href="" class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--md">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon id="Shape" points="0 0 24 0 24 24 0 24"></polygon>
                                        <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                        <path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" id="Combined-Shape" fill="#000000"></path>
                                    </g>
                                </svg>
                            </a>
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
                    <tr v-for="row in model.data">
                        <th>#{{ row.id }}</th>
                        <td>
                            <a href="/jobs/1">#{{ row.job.title }}</a>
                        </td>
                        <td>{{ row.firstname }}</td>
                        <td>{{ row.lastname }}</td>
                        <td>{{ row.phone }}</td>
                        <td>{{ row.email }}</td>
                        <td>
                            <span class="status status-green" v-if="row.status == 'Active'">
                                <span class="status-text">{{ row.status }}</span>
                            </span>

                            <span class="status status-pink" v-if="row.status == 'Inactive'">
                                <span class="status-text">{{ row.status }}</span>
                            </span>
                        </td>
                        <td>{{ row.created_at }}</td>
                        <td>
                            <div class="bk-span-actions" style="overflow: visible; position: relative; width: 80px;color: #595d6e;font-size: 1rem;">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-clean btn-icon btn-icon-md" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" v-bind:href="'/applications/'+row.id">
                                            <i class="far fa-eye"></i>
                                            <span class="nav__link-text">View</span>
                                        </a>
                                        <a class="dropdown-item" v-bind:href="'/applications/'+row.id+'/edit'">
                                            <i class="far fa-edit"></i>
                                            <span class="nav__link-text">Edit</span>
                                        </a>
                                        <a class="dropdown-item" @click="deleteApplication(row.id)">
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
    </div>
</template>

<script>
    import Vue from 'vue'
    import axios from 'axios'
    //similar to vue-resource
    export default {
        props: ['title'],
        data() {
            return {
                model: {},
                columns: {},
                source: '/api/v1/jobApplication',
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
            deleteApplication(id) {
                if(confirm('are you sure?'))

                // Send request to the server
                    axios.delete( '/api/v1/jobApplication/'+id)
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
            fetchIndexData() {
                var vm = this;

                const url = '/api/v1/jobApplication?column=' + this.query.column + '&direction=' + this.query.direction + '&page=' + this.query.page + '&per_page=' + this.query.per_page + '&search_column=' + this.query.search_column + '&search_operator=' + this.query.search_operator + '&search_input=' + this.query.search_input;

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