<?php
// app/Models/Notification.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'message', 'read_at'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
