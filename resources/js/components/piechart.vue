<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">PIE CHART Component Header</div>

                    <div class="card-body">
                        <pie-chart :chart-data="data" :height="200" :options="{responsive:true, maintainAspectRation:true}"></pie-chart>

                        <button @click="update"  :disabled="is_refresh" >reload {{id}}</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>


<script>

    import PieChart from '../piechart.js'

            export default {
                components: {
                    PieChart
                },
                data: function () {
                    return {
                        id: 0,
                        data: [],
                        is_refresh: false
                    };
                },
                mounted: function () {
                    this.update();
                },
                methods: {
                    update: function () {
                        this.id++;
                        this.is_refresh = true;
                        axios.get('/chat/piechartdata').then((msg) => {
                            console.log(msg.data);
                            this.data = msg.data;
                            this.is_refresh = false;
                        });
                    }
                }
            }
</script>