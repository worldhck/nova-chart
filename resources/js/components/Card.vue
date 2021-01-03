<template>
    <div>
        <div class="card relative px-6 py-4">
            <div class="flex mb-4">
                <h3 class="mr-3 text-base text-80 font-bold">{{card.title}}</h3>
            </div>
            <div class="custom-chart-wrap">
                <canvas class="custom-chart" ref="canvas"></canvas>
            </div>
        </div>
    </div>
</template>

<script>
let Chart = require('chart.js');

export default {
    props: [
        'card',

        // The following props are only available on resource detail cards...
        // 'resource',
        // 'resourceId',
        // 'resourceName',
    ],

    data() {
        return {
            colors: ['#4dc9f6', '#f67019', '#f53794', '#537bc4', '#acc236'],
        }
    },

    mounted() {

        this.card.chart.data.datasets.forEach((item, key) => {
            if (key in this.colors) {
                this.card.chart.data.datasets[key] = Object.assign({
                    backgroundColor: Chart.helpers.color(this.colors[key]).alpha(0.5).rgbString(),
                    borderColor: Chart.helpers.color(this.colors[key]).alpha(0.5).rgbString(),
                    borderWidth: 1
                }, item);
            }
        });

        let ctx = this.$refs.canvas.getContext('2d');
        new Chart(ctx, {
            type: this.card.chart.type,
            data: this.card.chart.data,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'top',
                },
                title: {
                    display: false,
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

    },
}
</script>
