export default function menuMobile(){

    const btnMenu = document.querySelector('.js-btn-mobile');
    const menu = document.querySelector('.nav-mobile ul');

    if(btnMenu && menu){

        btnMenu.addEventListener('click',() => {
            menu.classList.toggle('active');
        });
        
    }


    
}