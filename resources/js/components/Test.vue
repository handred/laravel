<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component Header</div>

                    <div class="card-body">
                        Vue component Content
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
        props: ['urldata'],
        mounted: function () {
            console.log('Component mounted.');
            this.update();
        },
        methods: {
            update: function () {
                console.log('update');
                console.log(this.urldata);
            }
        }
    }
</script>