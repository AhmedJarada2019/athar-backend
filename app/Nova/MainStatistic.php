<?php

namespace App\Nova;

use App\Models\MainStatistic as ModelsMainStatistic;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Outl1ne\NovaSortable\Traits\HasSortableRows;

class MainStatistic extends Resource
{
    use HasSortableRows;

    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\MainStatistic>
     */
    public static $model = \App\Models\MainStatistic::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'label_ar';
    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'label_ar',
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
            Text::make(__('Arabic Label'), 'label_ar')
                ->sortable()
                ->required()
                ->rules('string', 'max:255'),
            Text::make(__('English Label'), 'label_en')
                ->sortable()
                ->required()
                ->rules('string', 'max:255'),
            Text::make(__('Value'), 'value')
                ->sortable()
                ->required()
                ->rules('string', 'max:255'),
        ];
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->orderBy('sort_order');
    }

    public function actions(NovaRequest $request)
    {
        return [];
    }
    public static function redirectAfterCreate(NovaRequest $request, $resource)
    {
        return '/resources/' . $request->input('viaResource') . '/' . $request->input('viaResourceId');
    }

    public static function authorizedToCreate(Request $request)
    {
        $maxAllowedInstances = 3;
        $currentInstanceCount = ModelsMainStatistic::count();
        return $currentInstanceCount < $maxAllowedInstances;
    }
    public function authorizedToDelete(Request $request)
    {
        $currentInstanceCount = ModelsMainStatistic::count();
        if ($currentInstanceCount <= 2) {
            return false;
        }
        return true;
    }
    public function authorizedToReplicate(Request $request)
    {
        $maxAllowedInstances = 3;
        $currentInstanceCount = ModelsMainStatistic::count();
        return $currentInstanceCount < $maxAllowedInstances;
    }
}
