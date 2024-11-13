export default function clickOutside(){

    const overlay = document.querySelector('.overlay');
    const menu = document.querySelector('.nav-mobile ul');

    if(overlay && menu){

        overlay.addEventListener('click',() => {
            menu.classList.remove('active');
        });
        
    }
}