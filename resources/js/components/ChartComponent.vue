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

                new Chart(document.getElementById('canvas').getContext('2d'), {
                    type: 'bar',
                    data: {
                        labels: ["Maybach", "S Class", "E Class", "B Class"],
                        datasets: [
                            {
                                label: "Population (millions)",
                                backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9"],
                                data: [2478,5267,734,784,433]
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