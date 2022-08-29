<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Shipment
 *
 * @property int $id
 * @property int $user_id
 * @property string $waybill
 * @property string $customer_address
 * @property string $customer_name
 * @property string $phone_number
 * @property int $is_canceled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereCustomerAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereCustomerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereIsCanceled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereWaybill($value)
 * @mixin \Eloquent
 */
class Shipment extends Model
{
    use HasFactory;

    protected $fillable = ['waybill', 'customer_address', 'customer_name', 'phone_number'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
