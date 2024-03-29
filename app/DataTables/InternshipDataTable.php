<?php

namespace App\DataTables;

use App\Models\Internship;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class InternshipDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'internship.action')
            ->addColumn('name', function($query){

                return $query->user->name;

            })
            ->addColumn('email', function($query){

                return $query->user->email;

            })
            ->addColumn('phone_number', function($query){

                return $query->user->phone_number;

            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Internship $model): QueryBuilder
    {
        if (auth()->user()->role ==  'admin')  {
            return $model->newQuery();   
        }else {

            return $model->where('user_id', auth()->user()->id)->newQuery();
        }
        
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('internship-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    //->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        //Button::make('reset'),
                        //Button::make('reload')
                    ])->responsive();
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
          
           // Column::make('id'),
            Column::make('name'),
            Column::make('email'),
            Column::make('phone_number'),
            Column::make('company'),
            Column::make('country'),
            Column::make('county'),
            Column::make('address'),
            Column::make('duration'), 
            // Column::computed('action')
            // ->exportable(false)
            // ->printable(false)
            // ->width(60)
            // ->addClass('text-center'),
            
            
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Internship_' . date('YmdHis');
    }
}
