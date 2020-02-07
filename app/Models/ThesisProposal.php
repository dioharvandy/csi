<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThesisProposal extends Model
{
    public function theses()
    {
        return $this->belongsTo(Theses::class);
    }
}
