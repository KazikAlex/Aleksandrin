$('.news_carousel').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    prevArrow: $('.prev_btn'),
    nextArrow: $('.next_btn')
});

$('.brend_wrap').slick({
    infinite: true,
    slidesToShow: 6,
    slidesToScroll: 1,
    dots: false,
    prevArrow: $('.brend_left-arrow'),
    nextArrow: $('.brend_right-arrow'),
    responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 860,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 580,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
});

$('.stock_wrap').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    dots: false,
    prevArrow: $('.left_arrow'),
    nextArrow: $('.right_arrow'),
    responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
      ]
});

$('.blocks-gallery-grid').slick({
    vertical: true,
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    prevArrow: $('.single_item_carousel_prev'),
    nextArrow: $('.single_item_carousel_next')
});

var descrBtn = document.getElementById('descr_btn'),
    specBtn = document.getElementById('spec_btn'),
    descrText = document.getElementById('descr_text'),
    specText = document.getElementById('spec_text'),
    hamb = document.getElementById('hamb'),
    pageMenu = document.getElementById('header_page-menu'),
    catMenu = document.getElementById('header_category-menu'),
    divTop = document.getElementById('top'),
    divMiddle = document.getElementById('middle'),
    divBottom = document.getElementById('bottom');

document.addEventListener("DOMContentLoaded", function() {
  if (specBtn != null) {
    specBtn.addEventListener('click', function () {
      if (specText.style.display == 'block') {
          specText.style.display = 'none';
          specBtn.style.background = 'none';
          specBtn.style.color = 'black';
          descrText.style.display = 'block';
          descrBtn.style.background = '#F9C678';
          descrBtn.style.color = '#FFFFFF';                                     
      }else {
        specText.style.display = 'block';
        specBtn.style.background = '#F9C678';
        specBtn.style.color = '#FFFFFF';
        descrText.style.display = 'none';
        descrBtn.style.background = 'none';
        descrBtn.style.color = 'black';  
        descrBtn.addEventListener('click', function (){
          specText.style.display = 'none';
          specBtn.style.background = 'none';
          specBtn.style.color = 'black';
          descrText.style.display = 'block';
          descrBtn.style.background = '#F9C678';
          descrBtn.style.color = '#FFFFFF';   
        });
      }
    });
  }
});

document.addEventListener("DOMContentLoaded", function() {
  if (hamb != null) {
    hamb.addEventListener('click', function () {
      if (pageMenu.style.display == 'block') {
          pageMenu.style.display = 'none';
          catMenu.style.display = 'none';
          // head.style.height = '91px';
          divTop.style.transform = 'rotate(0deg)';
          divTop.style.position = 'relative';
          divMiddle.style.transform = 'rotate(0deg)';
          divMiddle.style.position = 'relative';
          divBottom.style.display = 'block';
          divBottom.style.transform = 'rotate(0deg)';
          divBottom.style.position = 'relative';
          // mainSub.style.padding = '74px 0 0 0';
      }else {
          pageMenu.style.display = 'block';
          // head.style.height = '400px';
          catMenu.style.display = 'block';
          divTop.style.transform = 'rotate(45deg)';
          divTop.style.position = 'absolute';
          divTop.style.top = '6%';
          divMiddle.style.transform = 'rotate(-45deg)';
          divMiddle.style.position = 'absolute';
          divMiddle.style.top = '6%';
          divBottom.style.display = 'none';
          // mainSub.style.padding = '250px 0 0 0';
          pageMenu.addEventListener('click', function () {
            pageMenu.style.display = 'none';
            catMenu.style.display = 'none';
            // head.style.height = '91px';
            divTop.style.transform = 'rotate(0deg)';
            divTop.style.position = 'relative';
            divMiddle.style.transform = 'rotate(0deg)';
            divMiddle.style.position = 'relative';
            divBottom.style.display = 'block';
            divBottom.style.transform = 'rotate(0deg)';
            divBottom.style.position = 'relative';
          });
          catMenu.addEventListener('click', function () {
            pageMenu.style.display = 'none';
            catMenu.style.display = 'none';
            // head.style.height = '91px';
            divTop.style.transform = 'rotate(0deg)';
            divTop.style.position = 'relative';
            divMiddle.style.transform = 'rotate(0deg)';
            divMiddle.style.position = 'relative';
            divBottom.style.display = 'block';
            divBottom.style.transform = 'rotate(0deg)';
            divBottom.style.position = 'relative';
          });
      }  
    });
  }
});