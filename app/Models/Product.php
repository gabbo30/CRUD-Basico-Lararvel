<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Especifica el nombre de la tabla si no sigue la convención de nombres por defecto
    protected $table = 'products';

    // Lista los campos que se pueden asignar masivamente
    protected $fillable = ['name', 'product_name', 'price', 'stock']; // Ajusta estos campos según tu esquema

    // Si tienes timestamps en tu tabla, puedes dejar esta propiedad como true. Si no, puedes desactivarla.
    public $timestamps = true; // O false si no estás usando timestamps
}