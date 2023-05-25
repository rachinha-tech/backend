<?php

namespace Database\Seeders;

use App\Models\Modality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModalitySeeder extends Seeder
{
    public function run(): void
    {
        Modality::insert([
            [
                'name' => 'Futsal',
                'quantity_players' => 5,
                'url_image' => 'https://static.mundoeducacao.uol.com.br/mundoeducacao/2022/10/falcao-futsal.jpg',
                'description' => 'Espaço para evento esportivo.',
            ],
            [
                'name' => 'Futebol Campo',
                'quantity_players' => 11,
                'url_image' => 'http://cdn.espn.com.br/image/wide/960_3cf994dc-df5c-33ee-ad5f-cdaedfd592be.jpg?random=648',
                'description' => 'Espaço para evento esportivo.',
            ],
            [
                'name' => 'Futebol Society',
                'quantity_players' => 7,
                'url_image' => 'http://arquivos.tribunadonorte.com.br/fotos/245421.jpg',
                'description' => 'Espaço para evento esportivo.',
            ],
            [
                'name' => 'Handebol',
                'quantity_players' => 5,
                'url_image' => 'http://www.prefeitura.sp.gov.br/cidade/secretarias/upload/esportes/lucas/handebol1.jpg',
                'description' => 'Espaço para evento esportivo.',
            ],
            [
                'name' => 'Vôlei',
                'quantity_players' => 5,
                'url_image' => 'https://conteudo.imguol.com.br/c/esporte/72/2022/09/06/leal-e-um-dos-destaques-no-ataque-da-selecao-brasileira-de-volei-1662493763877_v2_900x506.jpg',
                'description' => 'Espaço para evento esportivo.',
            ],
            [
                'name' => 'Basquete',
                'quantity_players' => 5,
                'url_image' => 'https://i1.wp.com/bstatic.epicbuzzer.com/uploads/2020/03/Stephen-Curry-and-LeBron-James.jpg?w=1100&ssl=1',
                'description' => 'Espaço para evento esportivo.',
            ],
            [
                'name' => 'Beach Tennis',
                'quantity_players' => 2,
                'url_image' => 'https://pmspa.rj.gov.br/wp-content/uploads/2023/03/Beach-Tenis-Fest-Verao-2023-Credito-LEO-BORGES-17-600x400.jpg',
                'description' => 'Espaço para evento esportivo.',
            ],
            [
                'name' => 'Paintball',
                'quantity_players' => 5,
                'url_image' => 'https://img.freepik.com/fotos-gratis/um-homem-com-uma-arma-jogando-paintball_169016-4997.jpg?w=1380&t=st=1683755152~exp=1683755752~hmac=64cd264d60862b7f197eea746a6d85208a0ef1a05afc011628f12f56970bfb8b',
                'description' => 'Espaço para evento esportivo.',
            ],
            [
                'name' => 'Fute Vôlei',
                'quantity_players' => 2,
                'url_image' => 'http://s.glbimg.com/jo/eg/f/620x390/2011/10/25/new_image.jpg',
                'description' => 'Espaço para evento esportivo.',
            ],
        ]);
    }
}
