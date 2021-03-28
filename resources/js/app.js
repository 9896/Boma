/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');



/**
 * Import echo
 *
import Echo from "laravel-echo"

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'thekey'
});

import EchoLibrary from "laravel-echo"

window.Echo = new EchoLibrary({
    broadcaster: 'pusher',
    key: 'thekey',
    wsHost: window.location.localhost,
    wsPort: 6001
});

Echo.channel('chat-room.1')
    .listen('ChatMessageWasReceived', (e) => {
        console.log(e.user, e.chatMessage);
    });

*/

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
import HelloWorldComponent from './components/HelloWorldComponent.vue';
import ExampleComponent from './components/ExampleComponent.vue';
import Laugh from './components/Laugh.vue';
//Vue.component('hello-world-component', require('./components/HelloWorldComponent.vue').default);
//Vue.component('example-component', require('./components/ExampleComponent.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    components: {
        HelloWorldComponent,
        ExampleComponent,
        Laugh,
    }
});
