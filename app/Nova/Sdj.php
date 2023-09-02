<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Http\Requests\NovaRequest;

class Sdj extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Sdj>
     */
    public static $model = \App\Models\Sdj::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name_en', 'name_ar',
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
                ->rules('string', 'max:255')
                ->creationRules('unique:sdjs,name_ar')
                ->updateRules('unique:sdjs,name_ar,{{resourceId}}'),


            Text::make(__('English Name'), 'name_en')
                ->sortable()
                ->required()
                ->rules('string', 'max:255')
                ->creationRules('unique:sdjs,name_en')
                ->updateRules('unique:sdjs,name_en,{{resourceId}}'),

            Avatar::make(__('Arabic Logo'), 'image_ar')
                ->required()
                ->rules('image'),
            Avatar::make(__('English Logo'), 'image_en')
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
}
