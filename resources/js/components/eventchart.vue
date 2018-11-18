<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">LINE CHART Component Header</div>

                    <div class="card-body">
                        <line-chart :chart-data="data" :height="200" :options="{responsive:true, maintainAspectRation:true}"></line-chart>

                        <input type ="checkbox" v-model="realtime" />
                        <input type="text" v-model="label" />
                        <input type="text" v-model="sale" />

                        <button @click="senddata"  :disabled="is_refresh" >Sendata {{id}}</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>


<script>

    import LineChart from '../linechart.js'

            export default {
                components: {
                    LineChart
                },
                data: function () {
                    return {
                        id: 0,
                        realtime: false,
                        label: '',
                        sale: 500,
                        data: [],
                        is_refresh: false
                    };
                },
                mounted: function () {
                    
                    this.update();
                    var socket = io('localhost:3000');
                    var App = this;
                    socket.on('chartevent:App\\Events\\NewEvent', function (data) {
                        console.log(data);
                        App.data = data.result;
                    });
                    
                },
                methods: {
                    update: function () {
                        this.id++;
                        this.is_refresh = true;
                        axios.get('/chat/neweventstart').then((msg) => {
                            console.log(msg.data);
                            this.data = msg.data;
                            this.is_refresh = false;
                        });
                    },

                    senddata: function () {
                        var params = {
                            method: 'get',
                            url: '/chat/newevent',
                            params: {label: this.label, sale: this.sale, realtime: this.realtime}
                        };

                        this.id++;
                        this.is_refresh = true;
                        axios(params).then((msg) => {
                            console.log(msg.data);
                            this.data = msg.data;
                            this.is_refresh = false;
                        });
                    }


                }
            }
</script>