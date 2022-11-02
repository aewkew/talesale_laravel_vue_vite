import _ from 'lodash';
window._ = _;
import 'bootstrap-icons/font/bootstrap-icons.css';
import 'bootstrap';


import axios from 'axios';
import Vuex from 'vuex'

window.axios = axios;
window.Vuex =Vuex;



window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

