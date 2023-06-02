const  setAuthHeader = (app, token) => {
    if (token) {
        app.$axios.defaults.headers = {
            Authorization: 'Bearer ' + token,
        }
    } else {
        delete app.$axios.defaults.headers.Authorization;
    }
}

export default setAuthHeader;
