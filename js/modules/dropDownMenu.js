export default function dropDownMenu(){

    const options = document.querySelectorAll('.js-menu-dropdown');

    if(options){
        options.forEach((option,index) => {
            option.addEventListener('click',() => {
                const subMenu = document.querySelectorAll('.drop-menu');

                subMenu[index].classList.toggle('active');

                subMenu.forEach((menu) => {
                    if(subMenu[index] != menu){
                        menu.classList.remove('active');
                    }
                });
                
                
            });
        });
    }
}