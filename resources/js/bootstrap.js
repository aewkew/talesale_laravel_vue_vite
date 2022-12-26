import _ from 'lodash';
window._ = _;
import 'bootstrap-icons/font/bootstrap-icons.css';
import 'bootstrap';


import axios from 'axios';

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

