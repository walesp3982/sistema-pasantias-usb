import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.axios.interceptors.response.use(
    response => response,
    error => {
        // Si el token/sesión expiró (401 o 419)
        if (error.response && (error.response.status === 401 || error.response.status === 419)) {
            // Redirige al login
            window.location.href = '/login';
        }
        return Promise.reject(error);
    }
);