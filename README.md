# 📅 Agenda Futebol

Sistema de agendamento de jogos e organização de partidas de futebol. Ideal para grupos, times amadores e organizadores que precisam gerenciar horários, locais e participantes de partidas.

---

## 🧰 Tecnologias Utilizadas

- ⚙️ [Laravel](https://laravel.com/) — Backend PHP
- ⚡ [Livewire](https://livewire.laravel.com/) — Componentização reativa no frontend
- 🚀 [Vite](https://vitejs.dev/) — Empacotador moderno para frontend
- 💅 [Tailwind CSS](https://tailwindcss.com/) — Estilização
- 📦 [Composer](https://getcomposer.org/) — Gerenciador de dependências PHP
- 📦 [NPM](https://www.npmjs.com/) — Gerenciador de pacotes JS
- 🗄️ [MySQL](https://dev.mysql.com/doc/) — Banco de dados relacional

---

## 🚀 Como rodar o projeto?

Siga os passos abaixo no terminal:

```bash
# Instalar dependências do backend
composer install

# Instalar dependências do frontend
npm install

# Copiar o arquivo de exemplo do ambiente
cp .env.example .env

# Gerar a key da aplicação
php artisan key:generate

# Rodar as migrações do banco
php artisan migrate

# Iniciar backend
php artisan serve

# Iniciar frontend com Vite
npm run dev

