
const passport = {};
const cookies = require('vue-cookies');
import axios from 'axios'

passport.install = function(Vue) {
    const $passport = {};

    $passport.getAccessToken = () => {
        return cookies.get('access_token');
    };

    $passport.accessToken = (user, router) => {
        const requestData = {
            grant_type: 'password',
            client_id: 2,
            client_secret: 'rtgMgElr4xczRsbmc8T8W8W3zbUpCkHa38GmR7m1',
            scope: ''
        }
        
        const data = Object.assign(requestData, user);        

        axios.post('http://localhost:8000/oauth/token', data)
        .then((response) => {            
            cookies.set('access_token', response.data.access_token, response.data.expires_in + 's');
            cookies.set('refresh_token', response.data.refresh_token);
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + response.data.access_token;           
            router.push({ name: 'dashboard' });
        });
    }

    Vue.prototype.$passport = $passport;
}

export default passport;