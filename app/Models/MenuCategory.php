<?php

namespace App\Models;

use Datlechin\FilamentMenuBuilder\Concerns\HasMenuPanel;
use Datlechin\FilamentMenuBuilder\Contracts\MenuPanelable;
use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model implements MenuPanelable
{
    use HasMenuPanel;
 
    public function getMenuPanelTitleColumn(): string
    {
        return 'name';
    }
 
    public function getMenuPanelUrlUsing(): callable
    {
        return fn (self $model) => route('categories.show', $model->slug);
    }
}