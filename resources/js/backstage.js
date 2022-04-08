import swal from 'sweetalert'
window.axios = require('axios')
import flatpickr from "flatpickr"

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'