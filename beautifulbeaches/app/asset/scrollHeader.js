window.addEventListener('scroll', function() {
    const scrollHeader = document.getElementById('scrollHeader');
    if(window.scrollY > 0) {
        scrollHeader.classList.add('scrolled');
        document.getElementById('logo1').style.display = 'none';
        document.getElementById('logo2').style.display = 'inline';
    } else {
        scrollHeader.classList.remove('scrolled');
        document.getElementById('logo1').style.display = 'inline';
        document.getElementById('logo2').style.display = 'none';
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const scrollHeader = document.getElementById('scrollHeader');
    if(window.scrollY > 0) {
        scrollHeader.classList.add('scrolled');
        document.getElementById('logo1').style.display = 'none';
        document.getElementById('logo2').style.display = 'inline';
    } else {
        scrollHeader.classList.remove('scrolled');
        document.getElementById('logo1').style.display = 'inline';
        document.getElementById('logo2').style.display = 'none';
        document.getElementById('logo1').src 
    }
});