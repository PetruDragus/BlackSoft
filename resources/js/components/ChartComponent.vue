<template>
    <!-- resources/assets/js/components -->
    <div>
        <canvas id="canvas"></canvas>
    </div>
</template>

<script>
    import { Chart } from 'Chart.js';
    import Vue from 'vue'
    import axios from 'axios'

    export default {
        data() {
            return {
                trips: {},
                props: {
                    labels: String,
                    dataProp: Object
                },
            }
        },
        methods: {
            renderChart() {
                new Chart(document.getElementById('canvas').getContext('2d'), {
                    type: 'line',
                    data: {
                        labels: ["Maybach", "S Class", "E Class", "B Class"],
                        //Data to be represented on x-axis
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                        datasets: [
                            {
                                label: 'Bookings',
                                backgroundColor: [
                                    'rgba(89, 162, 221, 0.4)',
                                ],
                                borderColor: [
                                    'rgba(89, 162, 221,1)',
                                ],
                                pointBackgroundColor: 'white',
                                borderWidth: 1,
                                pointBorderColor: '#249EBF',
                                //Data to be represented on y-axis
                                data: []
                            }
                        ]
                    },
                    options: {
                        title: {
                            display: false,
                            fontSize: 22,
                            text: 'Example'
                        }
                    }
                });
            },
            loadTrips() {
                axios.get('/api/drivers/').then(({ data }) => (this.trips = data));
            },
        },
        mounted() {
            this.renderChart(this.trips);
            this.loadTrips();
        }
    }
</script>