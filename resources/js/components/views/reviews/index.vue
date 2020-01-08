<template>
    <div class="m-t-65" id="bookings-page">
        <div class="col-md-12 toggled">
            <div class="row">
                <div id="subheader_pg" class="subHeader__block">
                    <div class="float-left" style="display:flex;">
                        <div class="subheader__page__title">
                            <h6>Reviews</h6>
                        </div>

                        <span class="subheader__separator kt-subheader__separator--v"></span>

                        <div class="subheader__desc__count">
                            <span> 17 Total</span>
                        </div>
                    </div>
                    <div class="float-right">
                        <div style="display: flex;">
                            <a href="/reviews/create" class="btn btn-label-brand btn-bold">
                                Add Review
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
                        <th>Driver</th>
                        <th>Review</th>
                        <th>Rating</th>
                        <th>Customer</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tr slot-scope="{ item }">
                        <th>#{{ item.id }}</th>
                        <th>
                            <a href="/booking/1">#{{ item.booking.id }}</a>
                        </th>
                        <td>{{ item.driver.name }}</td>
                        <td style="width: 40%;">{{ item.review | truncate(150, '...') }}</td>
                        <td>
                            <div style="display: inline-flex;" v-if="item.rating == '1'">
                                <i class="fas fa-star star-gold"></i>
                                <i class="far fa-star star-gold"></i>
                                <i class="far fa-star star-gold"></i>
                                <i class="far fa-star star-gold"></i>
                                <i class="far fa-star star-gold"></i>
                            </div>

                            <div style="display: inline-flex;" v-if="item.rating == '2'">
                                <i class="fas fa-star star-gold"></i>
                                <i class="fas fa-star star-gold"></i>
                                <i class="far fa-star star-gold"></i>
                                <i class="far fa-star star-gold"></i>
                                <i class="far fa-star star-gold"></i>
                            </div>

                            <div style="display: inline-flex;" v-if="item.rating == '3'">
                                <i class="fas fa-star star-gold"></i>
                                <i class="fas fa-star star-gold"></i>
                                <i class="fas fa-star star-gold"></i>
                                <i class="far fa-star star-gold"></i>
                                <i class="far fa-star star-gold"></i>
                            </div>

                            <div style="display: inline-flex;" v-if="item.rating == '4'">
                                <i class="fas fa-star star-gold"></i>
                                <i class="fas fa-star star-gold"></i>
                                <i class="fas fa-star star-gold"></i>
                                <i class="fas fa-star star-gold"></i>
                                <i class="far fa-star star-gold"></i>
                                <i class="fas fa-starv"></i>
                            </div>

                            <div style="display: inline-flex;" v-if="item.rating == '5'">
                                <i class="fas fa-star star-gold"></i>
                                <i class="fas fa-star star-gold"></i>
                                <i class="fas fa-star star-gold"></i>
                                <i class="fas fa-star star-gold"></i>
                                <i class="fas fa-star star-gold"></i>
                            </div>
                        </td>
                        <td>{{ item.customer_name }}</td>
                        <td>{{ item.created_at | formatDate }}</td>
                        <td>
                            <div class="bk-span-actions" style="overflow: visible; position: relative; width: 80px;color: #595d6e;font-size: 1rem;">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-clean btn-icon btn-icon-md" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" v-bind:href="'/reviews/'+item.id">
                                            <i class="far fa-eye"></i>
                                            <span class="nav__link-text">View</span>
                                        </a>
                                        <a class="dropdown-item" @click="deleteReview(item.id)">
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
                    url: '/api/v1/reviews/',
                    orderables: [
                        {title: 'Id', name: 'id', type: 'numeric'},
                        {title: 'Booking ID', name: 'booking_id', type: 'numeric'},
                        {title: 'Rating', name: 'rating', type: 'numeric'},
                        {title: 'Review', name: 'review', type: 'string'},
                        {title: 'Created At', name: 'created_at', type: 'datetime'},
                    ],
                    filterGroups: [
                        {
                            name: 'Reviews',
                            filters: [
                                {title: 'Id', name: 'id', type: 'numeric'},
                                {title: 'Booking ID', name: 'booking_id', type: 'numeric'},
                                {title: 'Rating', name: 'rating', type: 'numeric'},
                                {title: 'Review', name: 'review', type: 'string'},
                                {title: 'Created At', name: 'created_at', type: 'datetime'},
                            ]
                        }
                    ]
                }
            }
        }
    }
</script>