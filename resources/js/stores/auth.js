let authInfo = localStorage.getItem("authInfo");
if (authInfo === 'undefined') {
    authInfo = null
}

export default {
    state: {
        authInfo: authInfo ? JSON.parse(authInfo) : null,
        accessToken: localStorage.getItem("accessToken"),
        isLoggedIn: authInfo !== null,
        headers: { Authorization: 'Bearer ' + localStorage.getItem("accessToken") },
    },
    getters: {
        isLoggedIn: (state) => {
            return state.isLoggedIn;
        },
        authUser: (state) => {
            return state.authInfo;
        },
        getUserName: (state) => {
            return state.authInfo.name;
        },
        getUserId: (state) => {
            return state.authInfo.id;
        },
        accessToken: (state) => {
            return state.accessToken;
        },
        headers: (state) => {
            return state.headers;
        }
    },
    mutations: {
        PROFILE_UPDATE: (state, resData) => {
            localStorage.setItem("authInfo", JSON.stringify(resData.user));
            state.authInfo = resData.user;
        },
        LOGIN_SUCCESS: (state, rqsData) => {
            localStorage.setItem("authInfo", JSON.stringify(rqsData.user));
            localStorage.setItem("accessToken", rqsData.token);
            state.isLoggedIn = true;
            state.authInfo = rqsData;
            state.accessToken = rqsData.access_token;
        },
        LOGOUT: (state) => {
            localStorage.removeItem("authInfo");
            localStorage.removeItem("accessToken");
            state.isLoggedIn = false;
            state.authInfo = null;
            state.accessToken = "";
        },
    },
    actions: {
        profileUpdate(context, formData) {
            const config = {
                headers: { 'content-type': 'multipart/form-data' }
            };
            return axios.post(Api.common.profile, formData, { headers: store.getters.headers, config })
                .then((response) => {
                  if (response.data.status === true) {
                      context.commit("PROFILE_UPDATE", response.data);
                      return Promise.resolve(response);
                  } else {
                      return response.data;
                  }
                })
                .catch((error) => {
                    return Promise.reject(error);
                });
        },
        login(context, credentials) {
            return axios.post(Api.auth.login, credentials)
                .then((response) => {
                  if (response.data.status === true) {
                      context.commit("LOGIN_SUCCESS", response.data);
                      return Promise.resolve(response);
                  } else {
                      return response.data;
                  }
                })
                .catch((error) => {
                    return Promise.reject(error);
                });
        },

        logout(context) {
            return axios
                .post(Api.auth.logout, {},{ headers: store.getters.headers })
                .then((response) => {
                    return Promise.resolve(response);
                })
                .catch((error) => {
                    return Promise.reject(error);
                })
                .finally(() => {
                    context.commit("LOGOUT");
                });
        },
    },
}


