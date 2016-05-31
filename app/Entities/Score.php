<?php

namespace Bomm\Entities;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = [
        'artistic_quality',
        'originality',
        'production_quality_music',
        'market_potential',
        'production_quality_video',
        'artistic_direction',
        'facebook',
        'twitter',
        'instagram',
        'quality_text',
        'quality_photos',
        'technical_information',
        'pitch',
        'showcase',
        'group_id',
    ];
    public function group(){
        return $this->belongsTo(Group::class);
    }
}
