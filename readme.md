# Sistema Eletrônico de Trabalhos Acadêmicos para Graduação - Em elaboração

Sistema para 

Funcionalidades:
Para o aluno:
- Submissão dos arquivos necessários para realizar a inscrição na matéria do TCC.
- Seleção de orientador.
- Submissão do TCC.

Para o orientador:
- Seleção de orientandos.
- Montagem da banca.
- Agendar a apresentação do orientando.
- Impressão da ficha da apresentação.

## Instalação de bibliotecas e dependências

    node
    php7.1.3+

Procure pela biblioteca em sua distribuição.

## Procedimentos de deploy

Em seu terminal:

```
composer install
cp .env.example .env
```

Editar o arquivo `.env`

- Dados da conexão
- Dados do OAuth e números USP dos admins do sistema

```
    SENHAUNICA_KEY=
    SENHAUNICA_SECRET=
    SENHAUNICA_CALLBACK_ID=

    CODPES_ADMINS=
```

Rode as migrations

```
php artisan key:generate
php artisan migrate
```

Caso falte alguma dependência, siga as instruções do `composer`.

## Compile os assests com npm

    npm install
    npm run dev

## Publicando Assets do AdminLTE

Para ter o font disponível usando o AdminLTE, utilize o comando:

    php artisan vendor:publish --provider="JeroenNoten\LaravelAdminLte\ServiceProvider" --tag=assets

## Contribuindo com o projeto

### Passos iniciais

Siga o guia no site do [uspdev](https://uspdev.github.io/contribua)

### Padrões de Projeto

Utilizamos a [PSR-2](https://www.php-fig.org/psr/psr-2/) para padrões de projeto. Ajuste seu editor favorito para a especificação.
