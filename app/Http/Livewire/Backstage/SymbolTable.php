<?php

namespace App\Http\Livewire\Backstage;

use App\Models\Symbol;

class SymbolTable extends TableComponent
{

    public $sortField = 'name';
    public function render()
    {
        $columns = [
            [
                'title' => 'name',
                'sort' => true,
            ],
            [
                'title' => 'image',
                'image' => true,
                'sort' => false,
            ],
            [
                'title' => 'Points(3 matches)',
                'attribute'=> 'points_3_match',
                'sort' => true,
            ],
            [
                'title' => 'Points(4 matches)',
                'attribute'=> 'points_4_match',
                'sort' => true
            ],
            [
                'title' => 'Points(5 matches)',
                'attribute'=> 'points_5_match',
                'sort' => true
            ],
            [
                'title' => 'tools',
                'sort' => false,
                'tools' => ['edit', 'delete']
            ] 

        ];
        return view('livewire.backstage.table', [
            'columns' => $columns,
            'resource' => 'symbols',
            'rows' => Symbol::orderBy($this->sortField, $this->sortAsc ? 'DESC' : 'ASC')
                            ->paginate($this->perPage),
        ]);
    }
}
