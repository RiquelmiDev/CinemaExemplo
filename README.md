# CinemaExemplo

## Estrutura de Pastas e Arquivos

```
CinemaExemplo/
│
├── index.php
├── README.md
│
├── User/
│   ├── login.php
│   └── register.php
│
├── src/
│   ├── Classes/
│   │   ├── Conexao.php
│   │   ├── Insercao.php
│   │   └── Selecao.php
│   │
│   ├── Controllers/
│   │   └── user/
│   │       ├── loginController.php
│   │       ├── logout.php
│   │       └── newUserController.php
│   │
│   └── database/
│       └── estrutura.sql
```

---

## Descrição das Pastas e Arquivos

### index.php
Página principal do sistema. Exibe a barra de navegação, opções de login/logout, e funcionalidades de acordo com o tipo de usuário (comum ou admin).

---

### User/
Contém as páginas de interface para o usuário realizar login e cadastro.

- **login.php**: Formulário de login. Exibe mensagens de erro caso o login falhe.
- **register.php**: Formulário de cadastro de novo usuário.

---

### src/Classes/
Contém as classes responsáveis pela conexão e manipulação dos dados no banco.

- **Conexao.php**: Define as constantes de configuração do banco de dados (host, usuário, senha, nome do banco).
- **Insercao.php**: Classe responsável por inserir novos registros no banco, como cadastro de usuários. Faz validações para evitar duplicidade de email e CPF.
- **Selecao.php**: Classe responsável por buscar e validar dados no banco, como autenticação de login e busca de usuário por email.

---

### src/Controllers/user/
Controladores responsáveis pelo processamento das ações dos formulários de usuário.

- **loginController.php**: Processa o login do usuário, valida os dados e gerencia a sessão.
- **logout.php**: Realiza o logout do usuário, destruindo a sessão e redirecionando para a página inicial.
- **newUserController.php**: Processa o cadastro de novos usuários, faz validações e inicia a sessão do usuário cadastrado.

---

### src/database/
Contém arquivos relacionados ao banco de dados do sistema.

- **cinemaexemplo.sql**: Script SQL para criação das tabelas e estrutura inicial do banco de dados.

---

## Fluxo do Sistema

O fluxo básico do sistema funciona da seguinte forma:

1. **Usuário acessa uma página de formulário**  
   Por exemplo, ao acessar `User/login.php` ou `User/register.php`, o usuário encontra um formulário de login ou cadastro.

2. **Envio do formulário**  
   Ao preencher e enviar o formulário, os dados são enviados via método `POST` para um controller específico, definido pelo atributo `action` do formulário.  
   - O formulário de login envia para `src/Controllers/user/loginController.php`
   - O formulário de cadastro envia para `src/Controllers/user/newUserController.php`

3. **Processamento pelo Controller**  
   O controller recebe os dados, faz as validações necessárias (ex: autenticação, verificação de duplicidade, etc.) e interage com as classes de acesso ao banco.

4. **Uso das Classes de Acesso ao Banco**  
   Os controllers utilizam as classes localizadas em `src/Classes/` para manipular os dados:
   - **Conexao.php**: Responsável por criar a conexão com o banco de dados MySQL.
   - **Insercao.php**: Utilizada para inserir novos registros, como o cadastro de usuários, garantindo validações como unicidade de email e CPF.
   - **Selecao.php**: Utilizada para buscar e validar dados, como autenticação de login e consulta de usuários.

5. **Gerenciamento de Sessão e Redirecionamento**  
   Após o processamento, o controller pode iniciar uma sessão, definir variáveis de sessão, exibir mensagens de erro ou sucesso, e redirecionar o usuário para a página apropriada (ex: página principal, painel do usuário, etc.).

6. **Logout**  
   O logout é realizado acessando diretamente o arquivo `src/Controllers/user/logout.php`, que destrói a sessão e redireciona para a página inicial.

### Exemplo de fluxo de login

- Usuário acessa `User/login.php`
- Preenche o formulário e envia (action aponta para `src/Controllers/user/loginController.php`)
- O controller valida os dados, utiliza as classes para autenticação, e, se válido, redireciona para `index.php`

---

## Como rodar o projeto

1. Clone o repositório para o seu ambiente local.
2. Configure o banco de dados MySQL conforme as constantes em `src/Classes/Conexao.php`.
3. Importe a estrutura do banco de dados usando o arquivo `src/database/cinemaexemplo.sql`.
4. Inicie o servidor local (ex: WAMP, XAMPP) e acesse `index.php` pelo navegador.

---
