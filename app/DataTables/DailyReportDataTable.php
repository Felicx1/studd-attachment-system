<?php

namespace App\DataTables;

use App\Models\DailyReport;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DailyReportDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($query){

                 $editBtn = "<a href='".route('daily-reports.edit', $query->id)."' class='btn btn-primary'>Edit</a>";
                 $deleteBtn = "<a href='".route('daily-reports.destroy', $query->id)."' class='btn btn-danger disabled  ml-2'>Delete</i></a>";

                 return $editBtn.$deleteBtn;

            })
            ->escapeColumns(['id'])
            ->addColumn('date', function($query){

                return $query->created_at->format('d-m-Y');

            })
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(DailyReport $model): QueryBuilder
    {
        return $model->where('user_id', auth()->user()->id)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('dailyreport-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                       // Button::make('reset'),
                       // Button::make('reload')
                    ])->responsive(); 
                    
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            //Column::make('id'),
            Column::make('date'),
            Column::make('descrption_of_work_done'),
            Column::make('remarks_or_comments'),
            Column::make('sign_or_innitials'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(200)
                  ->addClass('text-center'),
          

           
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'DailyReport_' . date('YmdHis');
    }
}
