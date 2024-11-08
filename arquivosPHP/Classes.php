<?php
    class Anunciante {
        private $id;
        private $nome;
        private $cpf;
        private $email;
        private $senhaHash;
        private $telefone;

        public function __construct($id, $nome, $cpf, $email, $senhaHash, $telefone) {
            $this->id = $id;
            $this->nome = $nome;
            $this->cpf = $cpf;
            $this->email = $email;
            $this->senhaHash = $senhaHash;
            $this->telefone = $telefone;
        }

        public function getId() {
            return $this->id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getCpf() {
            return $this->cpf;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getSenhaHash() {
            return $this->senhaHash;
        }

        public function getTelefone() {
            return $this->telefone;
        }

        // Método estático para criar um novo cliente por meio da inserção na tabela 'cliente' do BD.
        // Métodos estáticos estão associados à classe em si, e não a uma instância.
        // No PHP devem ser chamados com a sintaxe: NomeDaClasse::NomeDoMétodoEstático
        static function Create($pdo, $nome, $cpf, $email, $senhaHash, $telefone)
        {
            // Neste caso é necessário utilizar prepared statements para prevenir inj. de S Q L, pois temos parâmetros (dados do cliente) fornecidos pelo usuário.
            // Repare que a coluna Id foi omitida por ser do tipo auto_increment.
            $stmt = $pdo->prepare(
            <<<SQL
            INSERT INTO anunciante (nome, cpf, email, senhaHash, telefone)
            VALUES (?, ?, ?, ?, ?)
            SQL
            );

            // Executa a declaração preparada fornecendo valores aos parâmetros (pontos-de-interrogação)
            $stmt->execute([$nome, $cpf, $email, $senhaHash, $telefone]);

            // retorna o id do novo cliente criado
            return $pdo->lastInsertId();
        }
    }

    class Anuncio {
        private $id;
        private $marca;
        private $modelo;
        private $ano;
        private $cor;
        private $quilometragem;
        private $descricao;
        private $valor;
        private $dataHora;
        private $estado;
        private $cidade;
        private $idAnunciante;

        public function __construct($id, $marca, $modelo, $ano, $cor, $quilometragem, $descricao, $valor, $dataHora, $estado, $cidade, $idAnunciante) {
            $this->id = $id;
            $this->marca = $marca;
            $this->modelo = $modelo;
            $this->ano = $ano;
            $this->cor = $cor;
            $this->quilometragem = $quilometragem;
            $this->descricao = $descricao;
            $this->valor = $valor;
            $this->dataHora = $dataHora;
            $this->estado = $estado;
            $this->cidade = $cidade;
            $this->idAnunciante = $idAnunciante;
        }

        public function getId() {
            return $this->id;
        }

        public function getMarca() {
            return $this->marca;
        }

        public function getModelo() {
            return $this->modelo;
        }

        public function getAno() {
            return $this->ano;
        }

        public function getCor() {
            return $this->cor;
        }

        public function getQuilometragem() {
            return $this->quilometragem;
        }

        public function getDescricao() {
            return $this->descricao;
        }

        public function getValor() {
            return $this->valor;
        }

        public function getDataHora() {
            return $this->dataHora;
        }

        public function getEstado() {
            return $this->estado;
        }

        public function getCidade() {
            return $this->cidade;
        }

        public function getIdAnunciante() {
            return $this->idAnunciante;
        }
    }

    class Interesse {
        private $id;
        private $nome;
        private $telefone;
        private $mensagem;
        private $dataHora;
        private $idAnuncio;

        public function __construct($id, $nome, $telefone, $mensagem, $dataHora, $idAnuncio) {
            $this->id = $id;
            $this->nome = $nome;
            $this->telefone = $telefone;
            $this->mensagem = $mensagem;
            $this->dataHora = $dataHora;
            $this->idAnuncio = $idAnuncio;
        }

        public function getId() {
            return $this->id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getTelefone() {
            return $this->telefone;
        }

        public function getMensagem() {
            return $this->mensagem;
        }

        public function getDataHora() {
            return $this->dataHora;
        }

        public function getIdAnuncio() {
            return $this->idAnuncio;
        }
    }

    class Foto {
        private $id;
        private $idAnuncio;
        private $nomeArqFoto;

        public function __construct($id, $idAnuncio, $nomeArqFoto) {
            $this->id = $id;
            $this->idAnuncio = $idAnuncio;
            $this->nomeArqFoto = $nomeArqFoto;
        }

        public function getId() {
            return $this->id;
        }

        public function getIdAnuncio() {
            return $this->idAnuncio;
        }

        public function getNomeArqFoto() {
            return $this->nomeArqFoto;
        }
    }
?>