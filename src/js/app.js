document.addEventListener('DOMContentLoaded', function(){
    eventListeners();
    darkMode();
});

function eventListeners() {
    const menuMobile = document.querySelector('.menu-mobile');
    menuMobile.addEventListener('click', responsiveNavigation);
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