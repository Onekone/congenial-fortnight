<?php

// @formatter:off

/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models {
    /**
     * App\Models\Prophecy
     *
     * @property int                                   $id
     * @property int                                   $user_id
     * @property string                                $question
     * @property int                                   $prophecy_variant_id
     * @property \Illuminate\Support\Carbon|null       $created_at
     * @property \Illuminate\Support\Carbon|null       $updated_at
     * @property-read \App\Models\ProphecyVariant|null $result
     * @property-read \App\Models\User|null            $user
     * @method static \Illuminate\Database\Eloquent\Builder|Prophecy newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Prophecy newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Prophecy query()
     * @method static \Illuminate\Database\Eloquent\Builder|Prophecy whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Prophecy whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Prophecy whereProphecyVariantId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Prophecy whereQuestion($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Prophecy whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Prophecy whereUserId($value)
     */
    class Prophecy extends \Eloquent { }
}

namespace App\Models {
    /**
     * App\Models\ProphecyVariant
     *
     * @property int                             $id
     * @property string                          $content
     * @property float                           $bias
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @method static \Illuminate\Database\Eloquent\Builder|ProphecyVariant newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|ProphecyVariant newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|ProphecyVariant query()
     * @method static \Illuminate\Database\Eloquent\Builder|ProphecyVariant random()
     * @method static \Illuminate\Database\Eloquent\Builder|ProphecyVariant whereBias($value)
     * @method static \Illuminate\Database\Eloquent\Builder|ProphecyVariant whereContent($value)
     * @method static \Illuminate\Database\Eloquent\Builder|ProphecyVariant whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|ProphecyVariant whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|ProphecyVariant whereUpdatedAt($value)
     */
    class ProphecyVariant extends \Eloquent { }
}

namespace App\Models {
    /**
     * App\Models\User
     *
     * @property int                                                                                                                $id
     * @property string                                                                                                             $name
     * @property string                                                                                                             $display_name
     * @property string|null                                                                                                        $external_driver
     * @property string|null                                                                                                        $external_id
     * @property string|null                                                                                                        $external_access_token
     * @property string|null                                                                                                        $external_refresh_token
     * @property string                                                                                                             $password
     * @property string|null                                                                                                        $remember_token
     * @property \Illuminate\Support\Carbon|null                                                                                    $created_at
     * @property \Illuminate\Support\Carbon|null                                                                                    $updated_at
     * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
     * @property-read int|null                                                                                                      $notifications_count
     * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken>                           $tokens
     * @property-read int|null                                                                                                      $tokens_count
     * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
     * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|User query()
     * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereDisplayName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereExternalAccessToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereExternalDriver($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereExternalId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereExternalRefreshToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
     */
    class User extends \Eloquent { }
}

