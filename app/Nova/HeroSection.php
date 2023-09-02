<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Color;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class HeroSection extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\HeroSection>
     */
    public static $model = \App\Models\HeroSection::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'first_heading_ar';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'first_heading_ar'
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

            Text::make(__('First Heading Arabic'), 'first_heading_ar')
                ->sortable()
                ->required()
                ->rules('max:30', 'min:3')->updateRules('required'),
            Text::make(__('First Heading English'), 'first_heading_en')
                ->sortable()
                ->required()
                ->rules('max:50', 'min:3')->updateRules('required'),

            Text::make(__('Secound Heading Arabic'), 'secound_heading_ar')
                ->sortable()
                ->required()
                ->rules('max:255')->updateRules('required'),
            Text::make(__('Secound Heading English'), 'secound_heading_en')
                ->sortable()
                ->required()
                ->rules('max:255')->updateRules('required'),

            Text::make(__('Third Heading Arabic'), 'third_heading_ar')
                ->sortable()
                ->required()
                ->rules('max:255')->updateRules('required'),
            Text::make(__('Third Heading English'), 'third_heading_en')
                ->sortable()
                ->required()
                ->rules('max:255')->updateRules('required'),

            Text::make(__('Description Arabic'), 'description_ar')
                ->sortable()
                ->required()
                ->rules('max:255')->updateRules('required'),

            Text::make(__('Description English'), 'description_en')
                ->sortable()
                ->required()
                ->rules('max:255')->updateRules('required'),

            File::make(__('Background'), 'background')
                ->sortable()
                ->required()
                ->updateRules('required'),
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
    public static function authorizedToCreate(Request $request)
    {
        return false;
    }

    public function authorizedToDelete(Request $request)
    {
        return false;
    }
    public function authorizedToReplicate(Request $request)
    {
        return false;
    }
}
