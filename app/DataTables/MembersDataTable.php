<?php

namespace App\DataTables;

use App\Models\Member;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class MembersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($member) {
                $viewUrl = route('members.show', $member->memberID);
                $editUrl = route('members.edit', $member->memberID);
                $deleteUrl = route('members.destroy', $member->memberID);
    
                return '
                    <a href="'.$viewUrl.'" class="btn btn-sm btn-primary">
                        <i class="ri-eye-line"></i>
                    </a>
                    <a href="'.$editUrl.'" class="btn btn-sm btn-warning">
                        <i class="ri-edit-line"></i>
                    </a>
                    <form action="'.$deleteUrl.'" method="POST" style="display:inline;" class="delete-form" data-id="'.$member->surname. ' ' .$member->firstName.'">
                        '.csrf_field().'
                        '.method_field('DELETE').'
                        <button type="button" class="btn btn-sm btn-danger delete-btn">
                            <i class="ri-delete-bin-line"></i>
                        </button>
                    </form>
                ';
            })
            ->setRowId('memberID');
    }
    

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Member $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Member $model): QueryBuilder
    {
        return $model->newQuery()->select([
            'memberID',
            'firstName',
            'middleName',
            'surname',
            'gender',
            'DOB',
            'telephone',
            'email',
            'nearestPrimary',
            'address',
            'town',
            'houseNumber',
            'nearestStreet',
            'village',
            'role',
            'created_at',
            'updated_at'
        ]);
    }

    /**
     * Optional method if you want to use HTML builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('members-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->scrollX(true)
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('memberID'),
            Column::make('surname'),
            Column::make('firstName'),
            Column::make('gender'),
            Column::make('telephone'),
            Column::make('email'),
            Column::make('nearestStreet'),
            Column::make('village'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(200)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Members_' . date('YmdHis');
    }
}
