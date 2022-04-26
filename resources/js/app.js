const { default: Echo } = require('laravel-echo');

require('./bootstrap');

const channel = window.Echo.channel('public.playground.1');

channel.subscribed( () => {

    console.log('subscribed');

})