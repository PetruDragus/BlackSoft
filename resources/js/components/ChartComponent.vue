<template>
    <!-- resources/assets/js/components -->
    <div>
        <canvas id="canvas"></canvas>
    </div>
</template>

<script>
    import {Chart} from 'Chart.js';

    export default {
        props: {
            labels: String,
            dataProp: String
        },
        methods: {
            renderChart() {

                new Chart(document.getElementById('canvas').getContext('2d'), {
                    type: 'line',
                    data: {
                        labels: ["January","February","March","April","May","June","July","August","September","October", "November", "December"],
                        datasets: [
                            {
                                label: "Bookings",
                                backgroundColor: ["#537fc9", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                                data: [168,132,167,132,111,164,134,199,143,123,167,155],
                                backgroundColor: "#5e5e5e"
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
            }
        },
        mounted() {
            this.renderChart();
        }
    }
</script>