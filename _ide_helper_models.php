<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Nutrition
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $title
 * @property string $description
 * @property string $calories
 * @property string $proteins
 * @property string $carbohydrates
 * @property string $timeOfDay
 * @property string $image
 * @method static \Illuminate\Database\Eloquent\Builder|Nutrition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Nutrition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Nutrition query()
 * @method static \Illuminate\Database\Eloquent\Builder|Nutrition whereCalories($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nutrition whereCarbohydrates($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nutrition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nutrition whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nutrition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nutrition whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nutrition whereProteins($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nutrition whereTimeOfDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nutrition whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nutrition whereUpdatedAt($value)
 */
	class Nutrition extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Products
 *
 * @property int $id
 * @property string $name
 * @property string $details
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Products newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Products newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Products query()
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereUpdatedAt($value)
 */
	class Products extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Recipe
 *
 * @property int $id
 * @property string $title
 * @property string $recipe
 * @property string $time
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe query()
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereRecipe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereUpdatedAt($value)
 */
	class Recipe extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SpecialEvents
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $eventType
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvents newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvents newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvents query()
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvents whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvents whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvents whereEventType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvents whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvents whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvents whereUpdatedAt($value)
 */
	class SpecialEvents extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $role
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 */
	class User extends \Eloquent {}
}

