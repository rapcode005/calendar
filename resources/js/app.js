require('./bootstrap');
window.Vue = require('vue');

Vue.component(
    'example-component',
    require('./components/app.vue')
);