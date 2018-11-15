<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">AJAX Component Header</div>

                    <div class="card-body">
                        Vue AJAX component Content 
                        <button @click="update" v-if="!is_refresh" >BUTTON {{id}}</button>
                        <span v-if="is_refresh">Загрузка...</span>
                        <table>
                            <thead>
                                <tr>
                                    <th>Индекс</th>
                                    <th>Ключ</th>
                                    <th>Значение</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for = "(value, key, index) in urldata" >
                                    <td>{{index}}</td>
                                    <td>{{key}}</td>
                                    <td>{{value}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        data: function () {
            return {
                urldata:[],
                is_refresh:false,
                id: 0
            };
        },
        mounted: function () {
            this.update();
        },
        methods: {
            update: function () {
                //this.id++;
                this.is_refresh=true;
                axios.get('/chat/json').then((msg)=>{
                    this.urldata = msg.data;
                    this.is_refresh=false;
                    this.id++;
                });
            }
        }
    }
</script>