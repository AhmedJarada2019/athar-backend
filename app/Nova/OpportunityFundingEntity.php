<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use App\Models\Enum\FundingType;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use function Aws\map;

class OpportunityFundingEntity extends Resource
{
    public static $displayInNavigation = false;

    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\OpportunityFundingEntity>
     */
    public static $model = \App\Models\OpportunityFundingEntity::class;

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
            BelongsTo::make(__('Opportunity'), 'opportunity', Opportunity::class)
                ->sortable()
                ->required(),

            BelongsTo::make(__('Funding Entity'), 'fundingEntity', static::getResourceClass())
                ->sortable()
                ->required(),

            Currency::make(__('Funding Ration'), 'funding_ration')->sortable()
                ->required()
                ->currency('SAR')
                ->step(10000)
                ->rules('numeric'),

            Currency::make(__('Funding Amount'), 'funding_amount')->sortable()
                ->required()
                ->currency('SAR')
                ->step(10000)
                ->rules('numeric'),

            Text::make(__('Link'), 'link')
                ->required(),
        ];
    }

    public static function type()
    {
        return FundingType::platforms;
    }

    public static function getResourceClass()
    {
        return match (static::type()) {
            FundingType::platforms => PlatformFundingEntity::class,
            FundingType::customer_funds => CustomerFundingEntity::class,
            FundingType::saudi_fund => SaudiFundingEntity::class,
        };
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
