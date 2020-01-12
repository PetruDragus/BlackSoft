<template>
    <div class="m-t-65" id="bookings-page">
        <div class="col-md-12 toggled">
            <div class="row">
                <div id="subheader_pg" class="subHeader__block">
                    <div class="float-left" style="display:flex;">
                        <div class="subheader__page__title">
                            <h6>Contact Forms</h6>
                        </div>

                        <span class="subheader__separator kt-subheader__separator--v"></span>

                        <div class="subheader__desc__count">
                            <span> 17 Total</span>
                        </div>
                    </div>
                    <div class="float-right">
                        <div style="display: flex;">

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
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tr slot-scope="{ item }">
                        <th>#{{ item.id }}</th>
                        <td>{{ item.name }}</td>
                        <td>{{ item.email }}</td>
                        <td>{{ item.subject }}</td>
                        <td>{{ item.message }}</td>
                        <td>
                            <div class="bk-span-actions" style="overflow: visible; position: relative; width: 80px;color: #595d6e;font-size: 1rem;">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-clean btn-icon btn-icon-md" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" v-bind:href="'/contact-form/'+item.id">
                                            <i class="far fa-eye"></i>
                                            <span class="nav__link-text">View</span>
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
                    url: '/api/v1/contact-form/',
                    orderables: [
                        {title: 'Id', name: 'id', type: 'numeric'},
                        {title: 'Name', name: 'name', type: 'string'},
                        {title: 'Email', name: 'email', type: 'string'},
                        {title: 'Subject', name: 'subject', type: 'string'},
                        {title: 'Message', name: 'message', type: 'string'},
                        {title: 'Created At', name: 'created_at', type: 'datetime'},
                    ],
                    filterGroups: [
                        {
                            name: 'Contact Form',
                            filters: [
                                {title: 'Id', name: 'id', type: 'numeric'},
                                {title: 'Name', name: 'name', type: 'string'},
                                {title: 'Email', name: 'email', type: 'string'},
                                {title: 'Subject', name: 'subject', type: 'string'},
                                {title: 'Message', name: 'message', type: 'string'},
                                {title: 'Created At', name: 'created_at', type: 'datetime'},
                            ]
                        }
                    ]
                }
            }
        }
    }
</script>