const apiUrl = "http://www.roninve.local/api";

export default {
    auth: {
        login        : `${apiUrl}/login`,
        register     : `${apiUrl}/register`,
        refreshToken : `${apiUrl}/refresh-token`,
        me           : `${apiUrl}/me`,
        logout       : `${apiUrl}/logout`,
    },

    common: {
        profile        : `${apiUrl}/profile-update`,
        changePassword : `${apiUrl}/change-password`
    },

    category    : `${apiUrl}/category`,
    subcategory : `${apiUrl}/subcategory`,
    brand       : `${apiUrl}/brand`,


};
