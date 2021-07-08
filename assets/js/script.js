$(function () {
    // 
    document.querySelector('.menu--icon').addEventListener('click',()=>{
    if (document.querySelector('.main-nav').style.display == 'flex') {
            document.querySelector('.main-nav').style.display = 'none';
        } else {
            document.querySelector('.main-nav').style.display = 'flex';
        }
    });



    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > 500) {
            document.querySelector('.botao-topo').style.width = '40px';
        } else {
            document.querySelector('.botao-topo').style.width = '';
        }
    });
    document.querySelector('.botao-topo').addEventListener('click',()=>{
        console.log('pah');
        jQuery('body,html').animate({
            scrollTop: 0
          }, 800);
         return false;
    });


});

// console.log('hello');