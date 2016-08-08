<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>New Users</h1>
        <ul>
            <li v-for="user in users"  track-by="$index">@{{ user }}</li>
        </ul>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.4.8/socket.io.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>

        <script>
            var socket = io('http://localhost:3000')
            new Vue({
                el: 'body',
                data: {
                    users : []
                },
                ready: function() {
                    socket.on('chat-channel:App\\Events\\UserSignedUp', function (data) {
                        this.users.push(data.username)
                    }.bind(this))
                }
            })
        </script>
    </body>
</html>
