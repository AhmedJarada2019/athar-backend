<?php

namespace App\Nova;

use App\Models\HowItWorkItem as ModelsHowItWorkItem;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\Color;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Outl1ne\NovaSortable\Traits\HasSortableRows;
use Ramsey\Uuid\Type\Integer;

class HowItWorkItem extends Resource
{
    use HasSortableRows;
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\HowItWorkItem>
     */
    public static $model = \App\Models\HowItWorkItem::class;


    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Number::make(__('Sort Order'), 'sort_order'),

            Avatar::make(__('Logo'), 'logo')
                ->sortable()
                ->required()
                ->rules('image', 'mimes:svg')
                ->creationRules('required'),

            Text::make(__('Arabic Title'), 'title_ar')
                ->sortable()
                ->required()
                ->rules('string', 'max:255', 'min:3'),

            Text::make(__('Arabic Title'), 'title_en')
                ->sortable()
                ->required()
                ->rules('string', 'max:255', 'min:3'),
            Textarea::make(__('Arabic Description'), 'description_ar')
                ->sortable()
                ->required()
                ->rules('string', 'max:255'),
            Textarea::make(__('English Description'), 'description_en')
                ->sortable()
                ->required()
                ->rules('string', 'max:255', 'min:3'),
            Color::make(__('Color'), 'color')
                ->sortable()
                ->required()
                ->rules('required'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }
    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->orderBy('sort_order');
    }
    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */

    public static function redirectAfterCreate(NovaRequest $request, $resource)
    {
        $currentInstanceCount = ModelsHowItWorkItem::count();
        if ($currentInstanceCount == 4) {
            return '/resources/' . $request->input('viaResource') . '/' . $request->input('viaResourceId');
        }
    }

    public static function authorizedToCreate(Request $request)
    {
        $maxAllowedInstances = 4;
        $currentInstanceCount = ModelsHowItWorkItem::count();
        return $currentInstanceCount < $maxAllowedInstances;
    }
    public function authorizedToReplicate(Request $request)
    {
        $maxAllowedInstances = 4;
        $currentInstanceCount = ModelsHowItWorkItem::count();
        return $currentInstanceCount < $maxAllowedInstances;
    }
    public function authorizedToDelete(Request $request)
    {
        $currentInstanceCount = ModelsHowItWorkItem::count();
        if ($currentInstanceCount <= 2) {
            return false;
        }
        return true;
    }
}
