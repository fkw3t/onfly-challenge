# ONFLY TODO


<!-- <h2>docker</h2>

* [x] xdebug -->

<h2>project structure</h2>

* [x] Modelagem do banco
* [x] Modelagem de entidades
    * [x] Relacionamentos
* [] Estruturação de endpoints
    * [] Auth
        * [] cadastro 
        * [] login 
        * [] logout
        * [] token stats
    * [] Despesas
        * [] cadastrar despesa
        * [] visualizar despesa
        * [] editar despesa
        * [] remover despesa
* [] Notifications
* [] Testes
* [] Documentação - Swagger

Obs:
- [x] Utilizar UUID.
- [] Utilizar camada de services e repository pattern.

- [] Fazer a validação da API utilizando o Form Request.
- [] Fazer a camada de transformação da API utilizando o API Resources.
- [] Fazer a camada de roteamento utilizando API Resource Routes.
- [] Fazer a camada de restrição de acesso utilizando as Policies.
- [] Disparar o e-mail utilizando as Notifications, e colocar ele em uma fila, para que seja disparado de forma assíncrona.
- [] Não se esqueça das FK nas Migrations e das Relations dos Models.

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




