<template>
    <!-- resources/assets/js/components -->
    <div>
        <canvas id="canvas"></canvas>
    </div>
</template>

<script>
    import { Chart } from 'Chart.js';

    export default {
        props: {
            labels: String,
            dataProp: String
        },
        methods: {
            renderChart() {

                new Chart(document.getElementById('pie-chart').getContext('2d'), {
                    type: 'pie',
                    data: {
                        labels: ["Luxury Class", "Bussiness Class", "First Class", "City Class"],
                        datasets: [{
                            label: "Population (millions)",
                            backgroundColor: ["#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                            data: [2478,5267,734,784]
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            text: 'Monthly sales by vehicles'
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