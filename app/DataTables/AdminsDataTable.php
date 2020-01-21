<?php

namespace App\DataTables;

use App\AdminDatatable;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;
use App\Admin;
class AdminsDataTable extends DataTable
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
            ->addColumn('actions', 'admin.admins.buttons.actions')
            ->addColumn('checkbox', 'admin.admins.buttons.checkbox')
            ->rawColumns(['actions','checkbox']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\AdminDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return Admin::query();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('admin-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy([0, 'desc'])
                    ->lengthMenu([[10,25,50,100,250, -1],[10,25,50,100,250, trans('admin.all_record')]])
                    ->pageLength(25)
                    ->buttons(

                        Button::make('create')->className('btn btn-primary ml-2 my-3')->text(' <i class="fa fa-plus"></i> '.trans('admin.create_admin')),

                        Button::make('csv')->className('btn btn-danger ml-2')->text(' <i class="fa fa-download"></i> '.trans('admin.ex_csv')),
                        Button::make('excel')->className('btn btn-danger ml-2')->text(' <i class="fa fa-download"></i> '.trans('admin.excel')),

                        Button::make('print')->className('btn btn-success ml-2')->text(' <i class="fa fa-print"></i> '.trans('admin.print')),
                        Button::make('reload')->className('btn btn-warning ml-2')->text(' <i class="fa fa-undo"></i> '.trans('admin.refresh')),
                        Button::make()->className('btn btn-danger ml-2 delBtn')->text('<i class="fa fa-trash"></i>'.trans('admin.deleteAll')),
                    )->parameters([
                        'initComplete' => " function () {
                            this.api().columns([1,2,3,4]).every(function () {
                                var column = this;
                                var input = document.createElement(\"input\");
                                $(input).appendTo($(column.footer()).empty())
                                .on('keyup', function () {
                                    column.search($(this).val(), false, false, true).draw();
                                });
                            });
                        }",
                        'language' => datatable_lang()
                    ]);

    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [

            [
				'name'  => 'checkbox',
				'data'  => 'checkbox',
                'title' => '<input type="checkbox" class="check_all" onclick="check_all();"/>',
                'exportable' => false,
				'printable'  => false,
				'orderable'  => false,
				'searchable' => false,
			], [
				'name'  => 'id',
				'data'  => 'id',
				'title' => '#',
			],[
				'name'  => 'name',
				'data'  => 'name',
				'title' => trans('admin.admin_name'),
			], [
				'name'  => 'email',
				'data'  => 'email',
				'title' => 'Admin Email',
				'title' => trans('admin.admin_email'),
			], [
				'name'  => 'created_at',
				'data'  => 'created_at',
				'title' => trans('admin.created_at'),
			], [
				'name'  => 'updated_at',
				'data'  => 'updated_at',
				'title' => trans('admin.updated_at'),
			], [
				'name'       => 'actions',
				'data'       => 'actions',
				'title'      => trans('admin.actions'),
				'exportable' => false,
				'printable'  => false,
				'orderable'  => false,
				'searchable' => false,
            ],
		];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Admin_' . date('YmdHis');
    }
}
