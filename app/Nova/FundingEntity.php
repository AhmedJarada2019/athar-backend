<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use App\Models\Enum\FundingType;
use Laravel\Nova\Http\Requests\NovaRequest;

class FundingEntity extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\FundingEntities>
     */
    public static $model = \App\Models\FundingEntity::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    public static $group = 'Opportunities';


    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name_ar', 'name_en'
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
            Text::make(__('Arabic Name'), 'name_ar')
                ->sortable()
                ->required()
                ->rules('max:255'),

            Text::make(__('English Name'), 'name_en')
                ->sortable()
                ->required()
                ->rules('max:255'),
            Select::make(__('Type'), 'type')
                ->options(
                    FundingType::options()
                )
                ->required()
                ->displayUsingLabels()
                ->sortable()
                ->rules('max:255'),

            Avatar::make(__('Logo'), 'logo')
                ->required()
                ->rules('image'),
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

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
    public function authorizedToDelete(Request $request)
    {
        return false;
    }
}
