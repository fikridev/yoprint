const { default: Echo } = require('laravel-echo');

require('./bootstrap');

const channel = window.Echo.channel('update-import-status');


channel.listen('UpdateStatusProcessing',(e)=>{
    alert('This showed Up!');
});

import JobsComponent from './components/JobsComponent.vue';

let app=createApp(JobsComponent)


app.mount("#app")

// const app = new Vue({
//     el: '#app'
// })
// Register Vue Components
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// Initialize Vue
// const app = new Vue({
//     el: '#app',
// });