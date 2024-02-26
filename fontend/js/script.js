    // --------------------------sidebar-prod-category-----------------
    const itemsliderbar = document.querySelectorAll(".category-left-li")
    itemsliderbar.forEach(function(menu,index){
        menu.addEventListener("click",function(){
            menu.classList.toggle("block")    
        })
    })
    
    const addToCart = document.querySelectorAll(".add-to-cart")
    const shoppingCart = document.querySelectorAll(".shopping-cart")
    addToCart.forEach(function(menu,index){
        menu.addEventListener("click",function(){
            menu.classList.toggle("block")    
        })
    })
    shoppingCart.forEach(function(menu,index){
        menu.addEventListener("click",function(){
            menu.classList.toggle("block")    
        })
    })

    const changePasswordButton = document.querySelector('.change-password');
    const changePasswordForm = document.querySelector('.change-password-form');
    const accountInfoItem = document.querySelector('.customer-infor-left-item');
    const changePasswordInfoItem = document.querySelector('.customer-infor-left-item-change-password');


    changePasswordButton.addEventListener('click', function() {
    changePasswordForm.style.display = 'block';
    changePasswordInfoItem.style.color = '#000';
    accountInfoItem.style.color = '#aaa';
    });

    accountInfoItem.addEventListener('click', function() {
    changePasswordForm.style.display = 'none';
    changePasswordInfoItem.style.color = '#aaa';
    accountInfoItem.style.color = '#000';
    });

    