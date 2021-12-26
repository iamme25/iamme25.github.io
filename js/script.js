let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .navbar');

menu.onclick = () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
};

let themeBtn = document.querySelector('#theme-btn');

if(localStorage.getItem('theme') == null){
    localStorage.setItem('theme', 'light')
}

let localData = localStorage.getItem('theme')

if (localData == 'light'){
    document.body.classList.remove('active');
}
else if(localData == 'dark'){
    document.body.classList.add('active');
}

themeBtn.onclick = () =>{
    themeBtn.classList.toggle('fa-sun');

    if(themeBtn.classList.contains('fa-sun')){
        document.body.classList.add('active');
        localStorage.setItem('theme', 'dark')
    }else{
        document.body.classList.remove('active');
        localStorage.setItem('theme', 'dark')
    }
};

window.onscroll = () =>{
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');

    let maxHeight = window.document.body.scrollHeight - window.innerHeight;
    let percentage = ((window.scrollY) / maxHeight) * 100;
    document.querySelector('.header .scroll-indicator').style.width = percentage + '%';
};