<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">CHAT Component Header</div>

                    <div class="card-body">
                        <textarea readonly="1" rows="10" cols="50">{{messages.join('\n')}}</textarea>
                        <br>
                        <input type="text" v-model="message" />
                        <button @click="sendmessage"  :disabled="is_refresh" >Sendmessage {{id}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>

var socket = io('192.168.1.35:3000');

            export default {
                data: function () {
                    return {
                        id: 0,
                        messages:[],
                        message:'',
                        is_refresh: false
                    };
                },
                mounted: function () {
                    socket.on('chartevent:App\\Events\\ChatEvent', function (data) {
                        console.log(data);
                        this.messages.push(data.message);
                    }.bind(this));
                    
                    socket.on('message', function (message) {
                        console.log(message);
                        this.messages.push(message);
                    }.bind(this));
                    
                },
                methods: {

                    sendmessage: function () {
                        var params = {
                            method: 'get',
                            url: '/chat/sendmessage',
                            params: {message: this.message}
                        };

                        this.id++;
                        this.is_refresh = true;
                        
                        socket.emit('message', this.message);
                        
//                        axios(params).then((msg) => {
                            //console.log(msg);
                            this.message = '';
                            this.is_refresh = false;
                        //});
                    }


                }
            }
</script>