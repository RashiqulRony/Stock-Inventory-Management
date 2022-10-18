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
        profile             : `${apiUrl}/profile-update`,
        changePassword      : `${apiUrl}/change-password`,
        getCategories       : `${apiUrl}/get-categories`,
        getSubcategories    : `${apiUrl}/get-subcategories`,
        getCatWiseSubcat    : `${apiUrl}/get-category-wise-subcategories`,
        getBrands           : `${apiUrl}/get-brands`,
    },

    category    : `${apiUrl}/category`,
    subcategory : `${apiUrl}/subcategory`,
    brand       : `${apiUrl}/brand`,
    product     : `${apiUrl}/product`,
    customer    : `${apiUrl}/customer`,


};
