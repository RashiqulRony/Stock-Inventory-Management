const apiUrl = "http://www.roninve.local/api";

export default {
    auth: {
        login        : `${apiUrl}/login`,
        register     : `${apiUrl}/register`,
        refreshToken : `${apiUrl}/refresh-token`,
        me           : `${apiUrl}/me`,
        logout       : `${apiUrl}/logout`,
    },

    profile: `${apiUrl}/profile-update`
};
