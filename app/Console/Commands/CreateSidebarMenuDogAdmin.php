<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;
use App\Models\DogAdmin\Utils;
use App\Models\DogAdmin\Fields;
use App\Models\DogAdmin\Config;

use App\User;

use Log;

class CreateSidebarMenuDogAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dogadmin:create_sidebar_menu';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea el menu lateral';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $content = File::get("resources/stubs/view.add_edit.stub");

        $config = new Config();
        $menus = $config->getMenusData();

        $content = '';
        $include = '';

        foreach ($menus as $menu)
        {
        	// cada menu puede tener un icono
        	$icon = (isset($menu->icon_class)) ? $menu->icon_class : '';

        	// si el menu tiene submenu
        	if (isset($menu->submenus))
        	{
        		$submenusCamelized = $config->getSubmenusCamelized($menu->submenus);
        		array_walk($submenusCamelized, function(&$item) { $item = '$module == "'.$item.'"'; });
        		$active = '{{ '.implode(' || ', $submenusCamelized).' ? "active" : "" }}';

        		$content .= "<li class='treeview $active'>".PHP_EOL;
        		$content .= "<a href='#''><i class='$icon'></i> <span>$menu->title</span> <i class='fa fa-angle-right pull-right'></i></a>".PHP_EOL;
        		$content .= '<ul class="treeview-menu">'.PHP_EOL;

        		foreach ($menu->submenus as $submenu)
        		{
        			// cada submenu puede tener un icono
        			$icon = (isset($submenu->icon_class)) ? $submenu->icon_class : '';
        			$module = $config->getModuleData($submenu->module);

        			// para agregar class active al menu
        			$active = '{{ $module == "'.Utils::camelize($module->general->table).'" ? "active" : "" }}';

        			// cada submenu puede tener un contador de distintos colores
        			$count = (isset($submenu->count_color)) ? '<span class="pull-right-container"><small class="label pull-right bg-'.$submenu->count_color.'">{{ $'.$module->general->table.'::count() }}</small></span>' : '';
        			$include .= ($count != '') ? "@inject('".$module->general->table."', 'App\Models\\".Utils::camelize($module->general->table)."')".PHP_EOL : '';

        			$content .= "<li class='$active'><a href='/".$module->general->table."'><i class='$icon'></i> $submenu->title $count</a></li>".PHP_EOL;
        		}

        		$content .= '</ul>'.PHP_EOL;
        		$content .= '</li>'.PHP_EOL;
        	}
        	else
        	{
        		$module = $config->getModuleData($menu->module);

        		// para agregar class active al menu
        		$active = '{{ $module == "'.Utils::camelize($module->general->table).'" ? "active" : "" }}';

        		// cada menu puede tener un contador de distintos colores
        		$count = (isset($menu->count_color)) ? '<span class="pull-right-container"><small class="label pull-right bg-'.$menu->count_color.'">{{ $'.$module->general->table.'::count() }}</small></span>' : '';
        		$include .= ($count != '') ? "@inject('".$module->general->table."', 'App\Models\\".Utils::camelize($module->general->table)."')".PHP_EOL : '';

        		$content .= "<li class='$active'><a href='/".$module->general->table."'><i class='$icon'></i> <span>$menu->title</span>$count</a></li>".PHP_EOL;
        	}
        }

        $content = $include.PHP_EOL.$content;

        File::put("resources/views/partials/sidebar_menu.blade.php", $content);
        /*=====  End of DIRECTORIO Y ARCHIVOS  ======*/



    }
}
