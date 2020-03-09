import axios from 'axios'
const cookies = require('vue-cookies');
const apiBaseUrl =  'http://localhost:8000/api';
//import store from '@/store';

export default {
    findAll() {},

    async find(id) {
        //store.commit('dashboard/setLoading');
        if(isNaN(parseInt(id))) return false;

        try {
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + cookies.get('access_token');

            return await axios.get(`${apiBaseUrl}/order/${id}`)
            .then((response) => {
                return {
                    status: true,
                    result:response.data.data
                }
            })
            .catch( err => {
                return {
                    status: false,
                    error: err.message,
                    description: err.response.data.message
                }
            });

        } catch (error) {
            return {
                status: false,
                error: error,
                description: null
            }
        }
    },

    async findByDate(date) {
        if(!date) return [];

        try {
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + cookies.get('access_token');

            return await axios.get(`${apiBaseUrl}/order/?data_inicial=${date}`)
            .then((response) => {
                return {
                    status: true,
                    result:response.data.data
                }
            })
            .catch( err => {
                return {
                    status: false,
                    error: err.message,
                    description: err.response.statusText
                }
            });

        } catch (error) {
            return {
                status: false,
                error: error,
                description: error.response.statusText
            }
        }
    },


    async getDetails(id){
        if(!id) return {};

        try {
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + cookies.get('access_token');

            return await axios.get(`${apiBaseUrl}/order/${id}/details`)
            .then((response) => {
                    return {
                        status: true,
                        result: response.data.data
                    }
            })
            .catch( err => {
                return {
                    status: false,
                    error: err.message,
                    description: err.response.data.message
                }
            });

        } catch (error) {
            return {
                status: false,
                error: error,
                description: null
            }
        }
    }

}