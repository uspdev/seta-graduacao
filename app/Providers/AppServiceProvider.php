<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use App\Edital;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $editais_ativos = (new Edital)->getMenuEditaisAtivos()
                ->map(function (Edital $edital) {

                    return [
                        'text' => $edital->anoReferencia,
                        'url' => '/cadtema/' . $edital->anoReferencia
                    ];
                });

            $event->menu->add('Área do Docente');
            $event->menu->add([
                'text' => 'Cad Temas e Qtde Alunos',
                'icon' => 'file-text-o',
                'label_color' => 'info',
                'can' => 'ADMIN',
                'submenu' => $editais_ativos->toArray()
            ]);

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
