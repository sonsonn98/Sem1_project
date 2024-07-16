window.addEventListener('scroll', function() {
    const scrollHeader = document.getElementById('scrollHeader');
    if(window.scrollY > 0) {
        scrollHeader.classList.add('scrolled')
    } else {
        scrollHeader.classList.remove('scrolled');
    }
});