window._ = require('lodash');

window.$ = window.jQuery = require("jquery");

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.moment = require('moment');
