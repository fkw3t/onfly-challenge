# ONFLY TODO


<!-- <h2>docker</h2>

* [x] xdebug -->

<h2>project structure</h2>

* [x] Modelagem do banco
* [x] Modelagem de entidades
    * [x] Relacionamentos
* [x] Estruturação de endpoints
    * [x] Auth
        * [x] cadastro 
        * [x] login 
        * [x] logout
        * [x] token stats
    * [x] Usuario
        * [x] visualizar usuario por cnpj
        * [x] visualizar usuario por documento
        * [x] editar usuario
        * [x] remover usuario
    * [x] Despesas
        * [x] cadastrar despesa
        * [x] visualizar despesa
        * [x] editar despesa
        * [x] remover despesa
* [x] API Resources
    * [x] Usuario
        * [x] Resource 
        * [x] Collection 
    * [x] Despesas
        * [x] Resource 
        * [x] Collection 
* [x] Authorization
    * [x] Usuario
    * [x] Despesas
* [x] Notification
* [] Testes
* [] Documentação - Swagger

Obs:
- [x] Utilizar UUID.
- [] Utilizar camada de services e repository pattern.

- [x] Fazer a validação da API utilizando o Form Request.
- [x] Fazer a camada de transformação da API utilizando o API Resources.
- [x] Fazer a camada de roteamento utilizando API Resource Routes.
- [x] Fazer a camada de restrição de acesso utilizando as Policies.
- [x] Disparar o e-mail utilizando as Notifications, e colocar ele em uma fila, para que seja disparado de forma assíncrona.
- [x] Não se esqueça das FK nas Migrations e das Relations dos Models.

<h2>modelagem banco de dados</h2>

- table: user
    * id: varchar(uuid)
    * name: varchar
    * document_id: varchar
    * person_type: boolean
    * email: varchar
    * phone: varchar
    * password: varchar

- table: expense
    * id: varchar(uuid)
    * description: varchar
    * occurred_in: datetime
    * user_id: varchar
    * amount: decimal