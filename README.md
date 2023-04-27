## Sobre o projeto

### Requisitos
    - PHP 8.2
    - Docker
    - Docker Compose

### Passos
    - Clonar repositório
       ``` $ git clone git@github.com:rachinha-tech/backend.git```
    
    - Executar comando abaixo, para instalar composer e suas dependências no projeto
        ```
            docker run --rm \
                -u "$(id -u):$(id -g)" \
                -v "$(pwd):/var/www/html" \
                -w /var/www/html \
                laravelsail/php82-composer:latest \
                composer install --ignore-platform-reqs 
        ```

    - Variáveis de ambiente
        ``` $ cp .env.example .env ```
    
    - Start em containers docker, do projeto
        ``` $ ./vendor/bin/sail up -d ```
    
    - Resultará em três contêineres do Docker em execução:
        - PostgreeSQL
        - Redis
        - Laravel
    
### Versão

    - 0.0.2