<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class OpportunityManagmentMember extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\OpportunityManagmentMember>
     */
    public static $model = \App\Models\OpportunityManagmentMember::class;
    public static $displayInNavigation = false;

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
            Text::make(__('Arabic Name'), 'name_ar')
                ->sortable()
                ->required()
                ->rules('string', 'max:255'),
            Text::make(__('English Name'), 'name_en')
                ->sortable()
                ->required()
                ->rules('string', 'max:255'),

            Text::make(__('Arabic Label'), 'label_ar')
                ->sortable()
                ->required()
                ->rules('string', 'max:255'),

            Text::make(__('English Label'), 'label_en')
                ->sortable()
                ->required()
                ->rules('string', 'max:255'),
            BelongsTo::make(__('opportunity'), 'opportunity', Opportunity::class)
                ->sortable()
                ->required(),
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
}
