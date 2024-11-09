document.addEventListener('DOMContentLoaded', function () {
  const form = document.querySelector('form');
  const cadastrarAnuncio = document.getElementById('cadastrarAnuncio');

cadastrarAnuncio.addEventListener('click', function (event) {
  event.preventDefault();
  form.submit();
  }
);
});