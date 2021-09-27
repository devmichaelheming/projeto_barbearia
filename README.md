# Barber Easy

Sistema de gerenciamento de uma barbearia (Projeto acadêmico)

No 5º semestre do curso de Análise e Desenvolvimento de Sistemas, na Unifasipe Depois de analisar e visar a necessidade de administrar uma barbearia, desde suas  atividades de rotina até na questão financeira, resolvi desenvolver o ‘Barber Easy’,  um sistema para o gerenciamento de atividades de rotina de uma barbearia com as  seguintes funcionalidades: tela inicial com um calendário listando os agendamentos  semanais, cadastro de clientes, cadastro de usuários do sistema (com permissões),  cadastro de serviços e agendamento de clientes. 

Utilizando das seguintes tecnologias: Html 5, Css 3, JavaScript, Bootstrap, jquery, Php 7, Laravel, entre outras...

## Requisitos.

  ● APACHE.
  
  ● PHP 5.6 ou superior.
  
  ● MYSQL.
  
## Instalação.

Para clonar o projeto:

  ● git clone https://github.com/MichaelHeming25/projeto_barbearia

Para instalar as dependencias

    composer install

Atualize as informações do banco de dados no '.env' (caso não tenha, crie um arquivo '.env' com base no arquivo '.env.example').

Para migrar as tabelas do projeto para o seu banco de daods:

    php artisan migrate
  
## Execução

Para rodar o projeto:

    php artisan serve
