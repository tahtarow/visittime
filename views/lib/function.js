function save_scroll() {

    window.addEventListener('scroll', function() {
        localStorage.setItem('scroll', window.pageYOffset);
    });
    localStorage.getItem('scroll') && window.scrollTo(0, localStorage.getItem('scroll'));
}
