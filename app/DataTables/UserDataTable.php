<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('status', function ($user) {
                return $user->status();
            })
           
           
           ->editColumn('created_at',function($user){
            return \Carbon\Carbon::parse($user->created_at)->diffForHumans();
           })
           ->editColumn('updated_at',function($user){
            return \Carbon\Carbon::parse($user->updated_at)->diffForHumans();
           })
            ->addColumn('check', 'backend.includes.tables.checkbox')
            ->addColumn('action', function ($user) {
                return '<span class="dropdown">
                <button id="table-optins" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="fas fa-settings"></i></button>
                <span aria-labelledby="table-optins" class="dropdown-menu mt-1 dropdown-menu-left" x-placement="bottom-end">
            
                    <a href="'.route('admin.users.edit',$user->id).'"
                        class="btn btn-outline-primary dropdown-item">
                        <i class="ft-edit"></i> '.__('dashboard.edit').'
                    </a>
              
            
                    <form action="'.route('admin.users.destroy',$user->id).'" method="post" class="form-destroy">
                        '. csrf_field() .'
                        <input type="hidden" name="_method" value="delete">
                        <button type="submit" class="btn btn-outline-danger dropdown-item delete">
                            <i class="ft-trash-2"></i> '.__('dashboard.delete').'
                        </button>
                    </form>
            
                </span>
            </span>';
            })
           
            
            ->rawColumns(['action', 'status', 'check']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery()->orderBy('id', 'desc');;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('user-table')
                    ->columns($this->getColumns())
                    ->setTableAttribute('class', 'table table-bordered  table-striped table-sm w-100 dataTable')
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->lengthMenu([[5, 10, 20, 25, 30, -1], [5, 10, 20, 25, 30, 'All']])
                    ->pageLength(5)
                    ->buttons([
                        Button::make()->text('<i class="fa fa-plus"></i>')->addClass('btn btn-outline-info datatables-create-button show-modal-form')->titleAttr('Create New Category (c)')->key('c'),
                        Button::make()->text('<i class="fas fa-trash"></i>')->addClass('btn btn-outline-danger multi-delete')->titleAttr('Delete (d)')->key('d'),
                        Button::make('print')->text('<i class="fa fa-print"></i>')->addClass('btn btn-outline-success')->titleAttr('Print (p)')->key('p'),
                        Button::make('excel')->text('<i class="fas fa-file-excel"></i>')->addClass('btn btn-outline-info')->titleAttr('Excel (e)')->key('e'),
                        Button::make('csv')->text('<i class="fas fa-file-csv"></i>')->addClass('btn btn-outline-primary')->titleAttr('CSV (s)')->key('s'),
                        Button::make('pageLength')->text('<i class="fa fa-sort-numeric-up"></i>')->addClass('btn btn-outline-light page-length')->titleAttr('Page Length (l)')->key('l')
                    ])
                    ->responsive(true)
                    ->parameters([
                        'initComplete' => " function () {
                            this.api().columns([2,3,4]).every(function () {
                                var column = this;
                                var input = document.createElement(\"input\");
                                $(input).appendTo($(column.footer()).empty())
                                .on('keyup', function () {
                                    column.search($(this).val(), true, true, true).draw();
                                });
                            });
                        }",
                    ])
                    ->orderBy(0);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id')->hidden(),
            Column::make('check')->title('<input type="checkbox" id="check-all">')->exportable(false)->printable(false)->orderable(false)->searchable(false)->width(15)->addClass('text-center'),
            Column::make('name')->title(__('dashboard.name')),
            Column::make('email')->title(__('dashboard.email')),
            Column::make('status')->width(100)->addClass('text-center')->title(__('dashboard.status')),
    
            Column::make('created_at')->title(__('dashboard.created_at')),
            Column::make('updated_at')->title(__('dashboard.updated_at')),
            Column::computed('action')->exportable(false)->printable(false)->width(75)->addClass('text-center')->title(__('dashboard.operation')),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'User_' . date('YmdHis');
    }
}
