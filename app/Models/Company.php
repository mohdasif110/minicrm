<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
	 public $fillable = [
        'name', 
        'email', 
        'address', 
        'website', 
        'logo'
	];
	
	public function getEmployees()
    {
        return $this->hasMany(Employee::class);
    }	
}
