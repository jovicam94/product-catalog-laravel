import './bootstrap';

import * as bootstrap from 'bootstrap';

const logOutLink =  document.querySelector(".log-out");

const logout = (event) => {
    event.preventDefault();
    document.getElementById('logout-form').submit();
}

if (logOutLink) {
    logOutLink.addEventListener('click', logout)
}
