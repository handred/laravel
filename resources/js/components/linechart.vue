<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">LINE CHART Component Header</div>

                    <div class="card-body">
                        <line-chart :chart-data="data" :height="200" :options="{responsive:true, maintainAspectRation:true}"></line-chart>
                    
                    <button @click="update"  :disabled="is_refresh" >reload</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</template>


<script>

    import LineChart from './linechart.js'

            export default {
                components: {
                    LineChart
                },
                data: function () {
                    return {
                        data: [],
                        is_refresh:false
                    };
                },
                mounted: function () {
                    this.update();
                },
                methods: {
                    update: function () {
                        //this.id++;
                        this.is_refresh=true;
                        axios.get('/chat/chartdata').then((msg) => {
                            console.log(msg.data);
                            this.data = msg.data;
                            this.is_refresh=false;
                        });
                    }
                }
            }
</script>