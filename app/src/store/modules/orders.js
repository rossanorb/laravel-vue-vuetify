import order from './../../api/order';

const state = {
    orders: [],
    details: {}
}

const getters = {
    details: (state) => {
        return state.details;
    }
}

const actions = {
    find( { commit, dispatch }, search ) {
        dispatch('dashboard/setShowDetails', false, { root: true });
        if(search.id){
            order.find(search.id)
            .then( (orders) => {
                commit('setOrder', orders.result)
            });
        }
        else if(search.date){
            order.findByDate(search.date)
            .then( (orders) => {
                if(orders.status){
                    commit('setOrders', orders.result)
                }
            });
        }
    },

    getDetails({ commit, dispatch }, id) {
        dispatch('dashboard/setShowDetails', true, { root: true });
        if(id){
            order.getDetails(id)
            .then( details => {
                commit('setDetails', details.result)
            });
        }

        return false;
    }
}

const mutations = {
    setOrder( state, orders) {
        state.orders = [];
        if( typeof orders !== 'undefined'){
            state.orders.push(orders);
        }
    },

    setOrders( state, orders){
        state.orders = orders;
    },

    setDetails( state, details){
        state.details = details;
    }
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}