# realtime-laravel-app-with-socket-io

# 使用npm安装socket.io和ioredis
npm install socket.io ioredis --save

# 使用composer在Laravel中安装Redis
composer require predis/predis

# 关键代码
## chat-app
* index.html ==> socket.io客户端js代码
* index.js ==> 服务端socket.io代码，express代码

## redis-lesson
* socket.js ==> socket.io客户端代码
* routes/web.php ==> Redis广播代码
* resources/views/welcome.blade.php ==> HTML页面，Vuejs代码，socket.io客户端代码