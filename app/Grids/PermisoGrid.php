<?php

namespace App\Grids;

use Closure;
use Leantony\Grid\Grid;

class PermisoGrid extends Grid implements PermisoGridInterface
{
    /**
     * The name of the grid
     *
     * @var string
     */
    protected $name = 'Lista de Permisos';

    /**
     * List of buttons to be generated on the grid
     *
     * @var array
     */
    protected $buttonsToGenerate = [
        'crear', 'ver', 'eliminar', 'actualizar', 'export'
    ];

    /**
     * Specify if the rows on the table should be clicked to navigate to the record
     *
     * @var bool
     */
    protected $linkableRows = false;

    /**
    * Set the columns to be displayed. Check `docs/customize_columns.md` for more information
    *
    * @return void
    * @throws \Exception if an error occurs during parsing of the data
    */
    public function setColumns()
    {
        $this->columns = [
		    "id" => [
		        "label" => "ID",
		        "filter" => [
		            "enabled" => true,
		            "operator" => "="
		        ],
		        "styles" => [
		            "column" => "col-md-2"
		        ]
		    ],
		    "permiso" => [
		        "search" => [
		            "enabled" => true
		        ],
		        "filter" => [
		            "enabled" => true,
		            "operator" => "="
		        ]
		    ],
		    "descripcion" => [
		        "search" => [
		            "enabled" => true
		        ],
		        "filter" => [
		            "enabled" => true,
		            "operator" => "="
		        ]
		    ],
		    "fecha_alta" => [
		        "search" => [
		            "enabled" => true
		        ],
		        "filter" => [
		            "enabled" => true,
		            "operator" => "="
		        ]
		    ]
		];
    }

    /**
     * Set the links/routes. This are referenced using named routes, for the sake of simplicity
     *
     * @return void
     */
    public function setRoutes()
    {
        // searching, sorting and filtering
        $this->sortRouteName = 'permisos.index';
        $this->searchRoute = 'permisos.index';

        // crud support
        $this->indexRouteName = 'permisos.index';
        $this->createRouteName = 'permisos.create';
        $this->viewRouteName = 'permisos.show';
        $this->deleteRouteName = 'permisos.destroy';
    }

    /**
    * Return a closure that is executed per row, to render a link that will be clicked on to execute an action
    *
    * @return Closure
    */
    public function getLinkableCallback(): Closure
    {
        $view = $this->viewRouteName;

        return function ($gridName, $item) use ($view) {
            return route($view, [$gridName => $item->id]);
        };
    }

    /**
    * Configure rendered buttons, or add your own
    *
    * @return void
    */
    public function configureButtons()
    {
        $this->makeCustomButton([
            // an icon for the button, as chosen from font-awesome. Defaults to null
            'icon' => 'fa-user',
            // the name of the button. Defaults to Unknown
            'name' => 'crear',
            // css class for the button. Defaults to `btn btn-default`
            'class' => 'btn btn-success',
            // function that will be called to determine if the button will be displayed. Defaults to null
            'renderIf' => function() {return true;}, 
            // a link for this button. using the function specified will get an already existing route. Otherwise you can use any of
            // laravel's helper functions to get a url. Defaults to #
            // it accepts both a string and a callbac. See the scenarios below
            'url' => route('permisos.create'),
            // where to the left or right with respect to other buttons would it be displayed. Higher means it will slide over to the far left, 
            // and lower means it will slide over to the far right. Its actually a sort run over the collection of buttons, and this argument
            // passed in the callback as an arg. Defaults to null
            'position' => 99,
            // if an action on it would trigger a PJAX action. Defaults to false
            'pjaxEnabled' => true, 
        ], 'toolbar');
        $this->makeCustomButton([
            // an icon for the button, as chosen from font-awesome. Defaults to null
            'icon' => 'fa-user',
            // the name of the button. Defaults to Unknown
            'name' => 'actualizar',
            // css class for the button. Defaults to `btn btn-default`
            'class' => 'data-remote btn btn-info btn-xs btn-grid-row',
            // function that will be called to determine if the button will be displayed. Defaults to null
            'renderIf' => function() {return true;}, 
            // a link for this button. using the function specified will get an already existing route. Otherwise you can use any of
            // laravel's helper functions to get a url. Defaults to #
            // it accepts both a string and a callbac. See the scenarios below
            'url' => function($gridName, $gridItem) {
                return route('permisos.update', ['id' => $gridItem->id]);
            },
            // where to the left or right with respect to other buttons would it be displayed. Higher means it will slide over to the far left, 
            // and lower means it will slide over to the far right. Its actually a sort run over the collection of buttons, and this argument
            // passed in the callback as an arg. Defaults to null
            'position' => 99,
            // if an action on it would trigger a PJAX action. Defaults to false
            'pjaxEnabled' => true, 
        ], 'rows');
        $this->makeCustomButton([
            // an icon for the button, as chosen from font-awesome. Defaults to null
            'icon' => 'fa-user',
            // the name of the button. Defaults to Unknown
            'name' => 'ver',
            // css class for the button. Defaults to `btn btn-default`
            'class' => 'data-remote btn btn-primary btn-xs btn-grid-row',
            // function that will be called to determine if the button will be displayed. Defaults to null
            'renderIf' => function() {return true;}, 
            // a link for this button. using the function specified will get an already existing route. Otherwise you can use any of
            // laravel's helper functions to get a url. Defaults to #
            // it accepts both a string and a callbac. See the scenarios below
            'url' => function($gridName, $gridItem) {
                return route('permisos.show', ['id' => $gridItem->id]);
            },
            // where to the left or right with respect to other buttons would it be displayed. Higher means it will slide over to the far left, 
            // and lower means it will slide over to the far right. Its actually a sort run over the collection of buttons, and this argument
            // passed in the callback as an arg. Defaults to null
            'position' => 99,
            // if an action on it would trigger a PJAX action. Defaults to false
            'pjaxEnabled' => true, 
        ], 'rows');
        $this->makeCustomButton([
            // an icon for the button, as chosen from font-awesome. Defaults to null
            'icon' => 'fa-user',
            // the name of the button. Defaults to Unknown
            'name' => 'eliminar',
            // css class for the button. Defaults to `btn btn-default`
            'class' => 'data-remote btn btn-danger btn-xs btn-grid-row',
            // function that will be called to determine if the button will be displayed. Defaults to null
            'renderIf' => function() {return true;}, 
            // a link for this button. using the function specified will get an already existing route. Otherwise you can use any of
            // laravel's helper functions to get a url. Defaults to #
            // it accepts both a string and a callbac. See the scenarios below
            'url' => function($gridName, $gridItem) {
                return route('permisos.destroy', ['id' => $gridItem->id]);
            },
            // where to the left or right with respect to other buttons would it be displayed. Higher means it will slide over to the far left, 
            // and lower means it will slide over to the far right. Its actually a sort run over the collection of buttons, and this argument
            // passed in the callback as an arg. Defaults to null
            'position' => 99,
            // if an action on it would trigger a PJAX action. Defaults to false
            'pjaxEnabled' => true, 
        ], 'rows');
    }

    /**
    * Returns a closure that will be executed to apply a class for each row on the grid
    * The closure takes two arguments - `name` of grid, and `item` being iterated upon
    *
    * @return Closure
    */
    public function getRowCssStyle(): Closure
    {
        return function ($gridName, $item) {
            return "";
        };
    }
}