<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class whois extends Model
{
    use HasFactory;
    protected $fillable = ['Domain', 'DomainName', 'DomainAlias'];
}
