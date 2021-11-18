## Change
É um site para publicação de anuncios de itens usados e/ou serviços.
Onde cada usuário possa conversar entre si via Chat, para realizar uma troca sustentavel de itens.

### Uso
Para o funcionamento adequado do projeto em sua maquina local é necessario que se crie um virtualHost para o projeto.
Além disso é necessário que o script nomeado de change.sql seja importado no banco de dados mysql.
Os dados de acesso ao banco podem ser encontrado e/ou modificados em src/config/connection.php.

Para ambiente de produção não é recomendado o uso do usuário root para acesso ao banco,
além disse é recomentadado também que os dados de acesso ao banco sejam colocados em um arquivo de configuração.

### Falta
Infelizmente não tive tempo o suficiente para implementar o chat.

### Bugs
O php não está com o encode configurado corretamente. Então provavelmente caracteres especiais não serão reconhecidos adequadamente.

### Creditos
Esse projeto foi desenvolvido como parte da avaliação da disciplina de servidores web, da UTFPR - Campus Ponta Grossa. Sob a Orientação do Professor Diego Antunes.
Aluno desenvolvedor: Carlos de Souza.