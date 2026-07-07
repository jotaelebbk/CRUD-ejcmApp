# Social Game Network (MVP) 🎮

Desenvolvimento do back-end para um MVP de rede social focado na comunidade gamer, estruturado sob o padrão MVC com **PHP e Laravel**.

> **Visão Geral:**
> Este projeto foi concebido como um MVP para uma rede social voltada ao público gamer. O foco do back-end foi criar uma estrutura robusta capaz de gerenciar interações complexas entre usuários, garantindo escalabilidade e fluidez na experiência social dentro do ambiente da EJCM (UFRJ).

---

## ⚙️ Principais Funcionalidades (Back-end)
A lógica desenvolvida centralizou a gestão de interações sociais através de controllers e serviços eficientes:

*   **Social Graph:** Implementação das relações de *Follow* (Seguir/Seguidor).
*   **Engagement Engine:** Lógica de persistência para *Likes* e *Comments* em tempo real.
*   **Feed System:** Gerenciamento de posts e estruturação de conteúdos de usuários.
*   **Social Invites:** Lógica para controle de convites entre usuários.

## 💡 Minhas Responsabilidades
Atuando como o responsável pelo back-end, foquei em:
*   **Modelagem de Dados (Eloquent ORM):** Estruturação de relacionamentos `Many-to-Many` e `One-to-Many` para suportar o grafo social (ex: usuários e seus seguidores).
*   **API Design:** Criação de rotas RESTful para permitir que o front-end consumisse os dados de interação de forma simples e rápida.
*   **Regras de Negócio:** Centralização da lógica de validação para garantir que ações como "curtir" ou "seguir" tivessem integridade total.

---

## 🚀 O que aprendi na prática
Construir o MVP de uma rede social ensinou-me que **integridade de dados é tudo**. Gerenciar estados de "curtidas" e "seguidores" em escala requer um entendimento sólido de como o Laravel lida com as tabelas de junção e relacionamentos do banco de dados. Foi uma imersão profunda em como transformar funcionalidades de "mundo real" em código eficiente.

---

## 🛠 Tech Stack
<p align="left">
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" />
  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" />
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" />
</p>
