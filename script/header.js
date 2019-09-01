// Permite el cambio de clases al #menu cuando se hace scroll.
// TODO: Se debe implementar una forma mas suave de quitar la traslucidez..
$(window).scroll(function() {
  if ($(window).scrollTop() > 0) {
    document.getElementById('menu').classList.remove('header-initial');
    document.getElementById('menu').classList.add('header-moved');
  } else {
    document.getElementById('menu').classList.remove('header-moved');
    document.getElementById('menu').classList.add('header-initial');
  }
});
