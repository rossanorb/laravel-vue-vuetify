
// initial state
const state = {
    dateFormatted: '',
    showDetails: false,    
}

// getters
const getters = {
    showDetails: (state, getters, rootState) => {
        return state.showDetails;
    }
    
}

// mutations
const mutations = {
    setFormatDate(state, date) {
        state.dateFormatted = date;
    },

    setShowDetails(state, status) {
        state.showDetails = status;
    }

}

// actions
const actions = {
    formatDate({ commit }, date) {
        const [year, day, month] = date.split('-')
        let dateFormatted = `${month}/${day}/${year}`;
        commit('setFormatDate', dateFormatted)
    },

    setShowDetails({ commit }, status ) {
        commit('setShowDetails', status )
    }


}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
 