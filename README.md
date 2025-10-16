# RH-Manager

Gerenciador de RH (skeleton) construído com Laravel 10. Projeto configurado para desenvolvimento via Laravel Sail (Docker), MySQL e Vite para empacotamento de assets.

## Sumário rápido

- Backend: Laravel (código em `app/`)
- Frontend: Vite + assets em `resources/` → compilados para `public/`
- DB: MySQL via Docker (service name `mysql`)
- Mail: Mailpit via Docker (porta 8025)

## Começando (desenvolvimento)

1. Copie o arquivo de ambiente e edite valores se necessário:

```zsh
cp .env.example .env
```

2. Instale dependências PHP e JS:

```zsh
composer install
npm install
```

3. Suba os containers (Laravel Sail):

```zsh
./vendor/bin/sail up -d
```

4. Execute migrations + seeders (no container):

```zsh
./vendor/bin/sail artisan migrate --seed
```

5. Rode o servidor Vite (local, watch de assets):

```zsh
npm run dev
```

6. Acesse a aplicação (ajuste `APP_URL` no `.env`) e o Mailpit em `http://localhost:8025`.

## Estrutura importante

- `app/Models` — Eloquent models (ex.: `User.php`, `UserDetail.php`, `Department.php`)
- `app/Actions/Fortify` — Customizações de autenticação/registro do Fortify
- `app/Http/Controllers` — Controllers HTTP
- `database/migrations`, `database/seeders`, `database/factories` — migrations, seeders e factories
- `resources/js`, `resources/css` — frontend; `vite.config.js` configura o bundling
- `routes/web.php`, `routes/api.php` — rotas

## Comandos úteis

- Subir containers: `./vendor/bin/sail up -d`
- Rodar um comando artisan no container: `./vendor/bin/sail artisan <command>`
- Testes: `./vendor/bin/sail test`
- Rodar tinker: `./vendor/bin/sail artisan tinker`

## Integrações e configurações específicas

- Mailpit (dev): service `mailpit` está em `docker-compose.yml`. No `.env` use `MAIL_MAILER=smtp` e `MAIL_HOST=mailpit`.
- Banco de dados: `DB_HOST=mysql` esperado ao rodar via Sail. A imagem MySQL definida no `docker-compose.yml` inclui healthcheck para indicar prontidão.
- Xdebug: controlado por `.env` (`SAIL_XDEBUG_MODE`).

## Problemas comuns / Troubleshooting

- Erro `could not find driver` ao rodar `php artisan migrate`: normalmente ocorre porque você executou `php` no host e não dentro do container Sail. Use `./vendor/bin/sail artisan migrate` ou instale `pdo_mysql` no PHP do host (`php8.x-mysql`).
- Se MySQL estiver indisponível no container, verifique `./vendor/bin/sail ps` e os logs `./vendor/bin/sail logs mysql`.
- Erros de assets: rode `npm run dev` para desenvolvimento ou `npm run build` para produção (ver `package.json`).

## Convenções do projeto

- Relações Eloquent seguem `hasOne`/`belongsTo` (veja `User::detail()` e `User::department()`).
- Overwrites do Fortify estão em `app/Actions/Fortify` (ponto de entrada para fluxos de autenticação customizados).

## Testes

Rodar test suite:

```zsh
./vendor/bin/sail test
```

Se testes falharem por questões de banco, verifique se os seeders/migrations foram aplicados no ambiente de teste.

---

Se quiser, eu posso:

- Adicionar exemplos de `Makefile`/`tasks.json` para simplificar comandos comuns;
- Incluir instruções para rodar localmente sem Docker (lista de pacotes PHP necessários);
- Expandir a seção de troubleshooting com logs e comandos de diagnóstico.

Por favor me diga se prefere o README em inglês ou com mais detalhes de deploy/CI.
