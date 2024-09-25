function excluirAnuncio(button) {
    const anuncio = button.closest('.anuncio');
    if (confirm('Tem certeza que deseja excluir este anúncio?')) {
        anuncio.remove();
        alert('Anúncio excluído com sucesso.');

    }
}
const form = document.getElementById('form-interesse');

form.addEventListener('submit', function (e) {

    document.getElementById('erro-nome').textContent = '';
    document.getElementById('erro-telefone').textContent = '';
    document.getElementById('erro-mensagem').textContent = '';

    let valido = true;

    const nome = document.getElementById('nome').value.trim();
    if (nome === '') {
        document.getElementById('erro-nome').textContent = 'O nome é obrigatório.';
        valido = false;
    }

    const telefone = document.getElementById('telefone').value.trim();
    if (telefone === '') {
        document.getElementById('erro-telefone').textContent = 'O telefone é obrigatório.';
        valido = false;
    } else if (!/^\d{10,11}$/.test(telefone)) {
        document.getElementById('erro-telefone').textContent = 'O telefone deve ter 10 ou 11 dígitos.';
        valido = false;
    }

    const mensagem = document.getElementById('mensagem').value.trim();
    if (mensagem === '') {
        document.getElementById('erro-mensagem').textContent = 'A mensagem é obrigatória.';
        valido = false;
    }

    if (valido) {
        alert('Interesse registrado com sucesso!');
        form.reset();
    }
});