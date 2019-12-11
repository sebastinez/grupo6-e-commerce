// Permite el cambio de clases al #menu cuando se hace scroll.
$(window).scroll(function() {
  if ($(window).scrollTop() > 0) {
    document.getElementById('menu').classList.remove('header-initial');
    document.getElementById('menu').classList.add('header-moved');
  } else {
    document.getElementById('menu').classList.remove('header-moved');
    document.getElementById('menu').classList.add('header-initial');
  }
});
