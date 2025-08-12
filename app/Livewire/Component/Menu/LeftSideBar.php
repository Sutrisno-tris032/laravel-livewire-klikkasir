<?php

namespace App\Livewire\Component\Menu;

use App\Models\Menu;
use Livewire\Component;

class LeftSideBar extends Component
{
    public function render()
    {
        $menuList = Menu::where('parent_id', 0)
            ->with('children')
            ->get();

        return view(
            'livewire.component.menu.left-side-bar',
            compact('menuList')
        );
    }
}
