window._ = require('lodash');

window.$ = window.jQuery = require("jquery");


window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


import Noty from "noty";
window.Noty = Noty;

window.moment = require('moment');

let Pikaday = require ('pikaday/pikaday');
window.Pikaday = Pikaday;

require('micromodal');
