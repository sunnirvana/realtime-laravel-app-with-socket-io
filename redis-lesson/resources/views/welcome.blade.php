<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="http://cdn.bootcss.com/socket.io/1.4.8/socket.io.min.js"></script>
        <script src="http://cdn.bootcss.com/vue/1.0.26/vue.min.js"></script>
        {{--<script src="http://cdn.bootcss.com/jquery/3.1.0/jquery.min.js"></script>--}}
    </head>
    <body id="socket-demo">

    <ul>
        <li v-for="user in users">@{{ user }}</li>
        {{--<p id="user-name"></p>--}}
    </ul>

    <script>
        var socket = io('192.168.10.10:3000');
        new Vue({
            el: '#socket-demo',
            data: {
                users: []
            },
            ready:function(){
                socket.on('test-channel:userMessage', function(data){
                    this.users.push(data.first_name + ' ' + data.last_name);
                }.bind(this))
            }
        });
    </script>
    </body>
</html>
