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
                        labels: labels,
                        datasets: [{
                            label: 'This week',
                            data: data,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        }]
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