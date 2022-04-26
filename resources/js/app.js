const { default: Echo } = require('laravel-echo');

require('./bootstrap');

const channel = window.Echo.channel('update-import-status');

channel.listen('UpdateStatusProcessing',(e)=>{
    alert('This showed Up!');
});