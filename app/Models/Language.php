<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Language
 *
 * @property int $id
 * @property string $iso_code
 * @property string $code
 * @property string $name
 * @property string $name_native
 * @property string $text_direction
 * @property string $date_format
 * @property int $status
 * @property int|null $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereDateFormat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereIsoCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereNameNative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereTextDirection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Language extends Model
{
    //
}
