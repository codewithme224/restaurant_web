<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
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
            $edit = "<a href='".route('admin.product.edit', $query->id)."' class='btn btn-primary'><i class='far fa-edit'></i></a>";
            $delete = "<a href='".route('admin.product.destroy', $query->id)."' class='btn btn-danger delete-item' mx-4><i class='fas fa-trash-alt'></i></a>";

            $more = '<div class="btn-group dropleft">
            <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-cog"></i>
            </button>
            <div class="dropdown-menu dropleft" x-placement="left-start" style="position: absolute; transform: translate3d(-2px, 0px, 0px); top: 0px; left: 0px; will-change: transform;">
              <a class="dropdown-item" href="'.route('admin.product-gallery.show-index', $query->id).'">Product Gallery</a>
              <a class="dropdown-item" href="'.route('admin.product-size.show-index', $query->id).'">Product Variants</a>

            </div>
          </div>';

            return $edit . " ". $delete . " ". $more;
        })
        ->addColumn('image', function($query){
            return "<img src='".asset($query->thumb_image)."' width='60px' height='60px'>";
        })
            ->addColumn('price', function($query) {
                return '$'.$query->price;
            })
            ->addColumn('offer_price', function($query) {
                return '$'.$query->price;
            })
            ->addColumn('status', function($query){
                return $query->status == 1 ? "<span class='badge badge-primary'>Active</span>" : "<span class='badge badge-danger'>Inactive</span>";
            })
            ->addColumn('show_at_home', function($query){
                return $query->show_at_home == 1 ? "<span class='badge badge-primary'>Yes</span>" : "<span class='badge badge-danger'>No</span>";
            })
            ->rawColumns(['action', 'image', 'price', 'show_at_home', 'status', 'show_at_home'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('product-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            Column::make('id'),
            Column::make('image'),
            Column::make('name'),
            Column::make('price'),
            Column::make('offer_price'),
            Column::make('show_at_home'),
            Column::make('status'),
            Column::computed('action')
                  ->exportable(true)
                  ->printable(true)
                  ->width(150)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Product_' . date('YmdHis');
    }
}
