<template>
    <div class="col-md-4">
        <div class="dv">
            <div class="dv-header">
                <div class="dv-header-title">
                    {{ title }}
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
                            <span>{{ column }}</span>
                            <span class="dv-table-column" v-if="column === query.column">
                            <span v-if="query.direction === 'desc'">&darr;</span>
                            <span v-else>&uarr;</span>
                        </span>
                        </th>
                        <th>
                            Actions
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
                        <th>{{ row.name }}</th>
                        <td><i class="fas fa-car" style="padding: 2px 5px;"></i>
                            <span class="status status-light_green">
                                <span class="status-text" style="font-weight: 600;"> 9</span>
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
                                        <a class="dropdown-item" v-bind:href="'/vehicles/'+row.id+'/edit'">
                                            <i class="far fa-edit"></i>
                                            <span class="nav__link-text">Edit</span>
                                        </a>
                                        <a class="dropdown-item" @click="deleteVehicle(row.id)">
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
        data() {
            return {
                model: {},
                columns: {},
                source: '/api/v1/categories',
                title: 'Categories',
                query: {
                    page: 1,
                    column: 'id',
                    direction: 'desc',
                    per_page: 10,
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
            deleteVehicle(id) {
                if(confirm('are you sure?'))

                // Send request to the server
                    axios.delete( '/api/v1/categories/'+id)
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
                var vm = this

                const url = '/api/v1/categories?column=' + this.query.column + '&direction=' + this.query.direction + '&page=' + this.query.page + '&per_page=' + this.query.per_page + '&search_column=' + this.query.search_column + '&search_operator=' + this.query.search_operator + '&search_input=' + this.query.search_input;

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
    }
</script>