<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;
    protected $table = 'enquiries';
    protected $fillable = ['customer_name', 'nationality', 'program_interested', 'entry_semester', 'current_education', 'school_name', 'email', 'phone', 'direct_message', 'where_did_you_hear'];
    protected $primaryKey = 'enq_id';
}
