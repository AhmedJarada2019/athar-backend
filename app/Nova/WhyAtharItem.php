<?php

namespace App\Nova;

use App\Models\WhyAtharItem as ModelsWhyAtharItem;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class WhyAtharItem extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\WhyAtharItem>
     */
    public static $model = \App\Models\WhyAtharItem::class;

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
            Text::make(__('Arabic Title'), 'title_ar')
                ->sortable()
                ->required()
                ->rules('string', 'max:255'),
            Text::make(__('English Title'), 'title_en')
                ->sortable()
                ->required()
                ->rules('string', 'max:255'),
            Textarea::make(__('Arabic Description'), 'description_ar')
                ->sortable()
                ->required()
                ->rules('string', 'max:255'),
            Textarea::make(__('English Description'), 'description_en')
                ->sortable()
                ->required()
                ->rules('string', 'max:255'),
            Avatar::make(__('Why Athar Hint'), 'image')
                ->required()
                ->creationRules('required')
                ->updateRules('required')
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

    public static function redirectAfterCreate(NovaRequest $request, $resource)
    {
        $currentInstanceCount = ModelsWhyAtharItem::count();
        if ($currentInstanceCount == 4) {
            return '/resources/' . $request->input('viaResource') . '/' . $request->input('viaResourceId');
        }
    }

    public static function authorizedToCreate(Request $request)
    {
        $maxAllowedInstances = 4;
        $currentInstanceCount = ModelsWhyAtharItem::count();
        return $currentInstanceCount < $maxAllowedInstances;
    }
    public function authorizedToReplicate(Request $request)
    {
        $maxAllowedInstances = 4;
        $currentInstanceCount = ModelsWhyAtharItem::count();
        return $currentInstanceCount < $maxAllowedInstances;
    }
    public function authorizedToDelete(Request $request)
    {
        $currentInstanceCount = ModelsWhyAtharItem::count();
        if ($currentInstanceCount <= 2) {
            return false;
        }
        return true;
    }

    public function createForm(NovaRequest $request)
    {
        $form = parent::createForm($request);

        // Remove the "Create and Add Another" button
        $form->withButton(__('Create'))->withoutCreating();

        // Add other fields to the form if needed
        $form->addFields([
            Text::make('Title'),
            // Add other fields here
        ]);

        return $form;
    }
}
