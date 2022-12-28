
export default {
    state: {
        isLoading: false
    },
    getters: {
        isLoading: (state) => {
            return state.isLoading;
        },
    },
    mutations: {
        IS_LOADING: (state, resData) => {
            state.isLoading = resData;
        },
    },
    actions: {
        isLoading(context, value) {
            context.commit("IS_LOADING", value);
        },
    },
}


