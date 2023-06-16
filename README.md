# Sobre o projeto

## Requisitos
    - PHP 8.2
    - Docker
    - Docker Compose

## Passos

### Clonar repositório
    $ git clone git@github.com:rachinha-tech/backend.git
    
### Executar comando abaixo, para instalar composer e suas dependências no projeto
        
    docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v "$(pwd):/var/www/html" \
        -w /var/www/html \
        laravelsail/php82-composer:latest \
        composer install --ignore-platform-reqs

### Variáveis de ambiente
    $ cp .env.example .env 

### Start em containers docker, do projeto
    $ ./vendor/bin/sail up -d

### Permissão de usuário
    $ sudo chown -R $USER: .

### Permissão para storage
    $ sudo chmod -R 777 /storage

### Permissão para escrever no .env
    $ sudo chmod -R 777 .env

### Gerar Key
    $ sudo ./vendor/bin/sail artisan key:generate

### Você pode criar um alias para o comando do sail adicionando a seguinte linha no seu arquivo ```~/.bashrc```
    $ alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
    
### Resultará em três contêineres do Docker em execução:
    - PostgreeSQL
    - Redis
    - Laravel
   
### Executar migrate

    sail artisan migrate

### Executar seeders

    sail artisan db:seed
 
## Versão
    - 0.0.3
