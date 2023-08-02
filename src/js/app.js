document.addEventListener('DOMContentLoaded', function(){
    eventListeners();
    darkMode();
});

function eventListeners() {
    const menuMobile = document.querySelector('.menu-mobile');
    menuMobile.addEventListener('click', responsiveNavigation);
}

//display field conditionally
const contactmethod = document.querySelectorAll('input[name="contact[contact]"]');
contactmethod.forEach(input => input.addEventListener('click',displayContactmethod));

function displayContactmethod(e) {
    const contactDiv = document.querySelector('#contact');
    // contactDiv.textContent = "diste click";
    //console.log(e.target.value);
    if (e.target.value === 'phone') {
        contactDiv.innerHTML = `
        <label for="phone">Phone</label>
        <input type="tel" name="contact[phone]" id="phone"placeholder="phone">
        <p>Date and time for the call</p>
        <label for="date">date</label>
        <input type="date" id="date" name="contact[date]">
        <label for="time">time</label>
        <input type="time" id="time" min="09:00" max="17:00" name="contact[time]">
        `;
    } else {
        contactDiv.innerHTML = `
        <label for="email">Email</label>
        <input type="email" name="contact[email]" id="email"placeholder="email" required>
        `;
    }
}

function responsiveNavigation() {
    const navigation = document.querySelector('.navigation');
    if (navigation.classList.contains('display-menu')) {
        navigation.classList.remove('display-menu')
    } else {
        navigation.classList.add('display-menu')
    }
}

function darkMode() {
    const prefersDarkMode = window.matchMedia('prefers-color-scheme:dark');
    //console.log(prefersDarkMode.matches);
    if (prefersDarkMode.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }

    prefersDarkMode.addEventListener('change', function () {
        if (prefersDarkMode.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });

    const buttonDarKMode = document.querySelector('.dark-mode-button');
    buttonDarKMode.addEventListener('click', function () {
        document.body.classList.toggle('dark-mode');
    });
}