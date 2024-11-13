export default function menuMobile(){
    
    const menuOptions = document.querySelector('.js-menu-mobile');
    const menuBtn = document.querySelector('.js-btn-menu');

    menuBtn.addEventListener('click',() =>{
        menuOptions.classList.toggle('active');
    });


    if(window.innerWidth > 768 || menuOptions.classList.contains('active')){
        menuOptions.classList.remove('active');
    }

}