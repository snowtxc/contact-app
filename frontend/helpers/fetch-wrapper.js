import axios from 'axios';

function handleResponse(response) {
    response = response.response ? response.response: response;
    if (!response || !response.status || response.status < 200 || response.status >= 300) {
        if ([401, 403].includes(response.status) && user) {
            logout();
        }
        const error = (data && data.message) || response.statusText;
        return Promise.reject(error);
    }
    return response.data;
}



function authHeader(url, contentType = 'application/json') {
    const { user } = useAuthStore();
    const isLoggedIn = !!user?.token;
    const isApiUrl = url.startsWith(import.meta.env.VITE_API_URL);
    
    const headers = {};


    if (isLoggedIn && isApiUrl) {
        headers['Authorization'] = `Bearer ${user.token}`;
    }
    return headers;
}




export const fetchWrapper = {
    get: (url, params) => axios.get(url, { headers: authHeader(url), params }).then(handleResponse),
    post: (url, body, contentType = 'application/json') => axios.post(url, body, { headers: authHeader(url, contentType) }).then(handleResponse),
    put: (url, body, contentType = 'application/json') => axios.put(url, body, { headers: authHeader(url, contentType) }).then(handleResponse),
    delete: (url, params) => axios.delete(url, { headers: authHeader(url), params }).then(handleResponse),
};

