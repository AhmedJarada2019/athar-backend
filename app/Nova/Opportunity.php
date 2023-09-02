<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Tag;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Email;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;
use Outl1ne\NovaSimpleRepeatable\SimpleRepeatable;

class Opportunity extends Resource
{
    public static $group = 'Opportunities';

    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Opportunity>
     */
    public static $model = \App\Models\Opportunity::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'title_ar',
        'title_en',
        'sub_title_ar',
        'sub_title_en',
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
                ->rules('max:255'),

            Text::make(__('English Title'), 'title_en')
                ->sortable()
                ->required()
                ->rules('max:255'),

            Text::make(__('Sub Title Arabic'), 'sub_title_ar')
                ->sortable()
                ->required()
                ->rules('max:255'),

            Text::make(__('Sub Title English'), 'sub_title_en')
                ->sortable()
                ->required()
                ->rules('max:255'),
            Currency::make(__('External Investments'), 'external_investments')
                ->symbol('%')
                ->step(1)
                ->max(99)
                ->required(),

            Avatar::make(__('Image'), 'image')
                ->required()
                ->rules('image'),
            Trix::make(__('Arabic Description'), 'description_ar')
                ->withFiles()
                ->required()
                ->creationRules('required'),

            Trix::make(__('English Description'), 'description_en')
                ->withFiles()
                ->required()
                ->creationRules('required'),

            Trix::make(__('Arabic Financial Details'), 'financial_details_ar')
                ->withFiles()
                ->required()->creationRules('required'),

            Trix::make(__('English Financial Details'), 'financial_details_en')
                ->withFiles()
                ->required()->creationRules('required'),

            Trix::make(__('Arabic Features'), 'features_ar')
                ->withFiles()
                ->required()->creationRules('required'),

            Trix::make(__('English Features'), 'features_en')
                ->withFiles()
                ->required()->creationRules('required'),


            Trix::make(__('Arabic Risks'), 'risks_ar')
                ->withFiles()
                ->required()->creationRules('required'),

            Trix::make(__('English Risks'), 'risks_en')
                ->withFiles()
                ->required()->creationRules('required'),

            BelongsTo::make(__('Fund'), 'fund', Fund::class)
                ->required()
                ->showCreateRelationButton(),

            Tag::make(__('Sdjs'), 'sdjs', Sdj::class)
                ->showCreateRelationButton()
                ->preload()
                ->required(),

            Tag::make(__('Opportunity Statistics'), 'opportunityStatistics', Statistic::class)
                ->showCreateRelationButton()
                ->preload()
                ->required(),


            HasOne::make(
                __("Saudi Funding"),
                'saudiFunding',
                SaudiOpportunityFundingEntity::class
            )
                ->required(),
            HasOne::make(
                __("Customer Funding"),
                'customerFunding',
                CustomerOpportunityFundingEntity::class
            )
                ->required(),
            BelongsToMany::make(
                __('Opportunity Funding Entities'),
                'fundingEntities',
                PlatformFundingEntity::class
            )
                ->fields(function () {
                    return [
                        Currency::make(__('Funding Ration'), 'funding_ration')->sortable()
                            ->currency('SAR')
                            ->step(10000)
                            ->required()
                            ->rules('numeric'),

                        Currency::make(__('Funding Amount'), 'funding_amount')->sortable()
                            ->required()
                            ->currency('SAR')
                            ->step(10000)
                            ->rules('numeric'),
                        Text::make(__('Link'), 'link')
                            ->sortable()
                            ->required()
                            ->rules('max:255')->updateRules('required'),
                    ];
                }),
            HasMany::make(
                __('Opportunity Attachments'),
                'opportunityAttachments',
                OpportunityAttachment::class
            )
                ->required(),
            HasMany::make(
                __('Opportunity Activities'),
                'opportunityActivities',
                OpportunityActivity::class
            )
                ->required(),
            HasMany::make(
                __('Opportunity Management Members'),
                'opportunityManagmentMembers',
                OpportunityManagmentMember::class
            )
                ->required(),
            HasMany::make(
                __('Opportunity Partners'),
                'opportunityPartners',
                OpportunityPartner::class
            )
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

    protected static function afterValidation(NovaRequest $request, $validator)
    {
        // $count = count(json_decode($request->statistics) ?: []);
        // if ($count > 3 or $count < 2) {
        //     $validator->errors()->add(
        //         'statistics',
        //         __("statistics minimum 2 and maximum 3")
        //     );
        // }
    }
}
