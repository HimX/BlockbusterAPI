<?php

namespace App\Rules;

use App\Models\Movie;

class MovieType implements \Illuminate\Contracts\Validation\Rule
{

    /**
     * @inheritDoc
     */
    public function passes($attribute, $value)
    {
        $movieTypes = [Movie::TYPE_OLDIE, Movie::TYPE_NORMAL, Movie::TYPE_NEW_RELEASE];
        return in_array($value, $movieTypes);
    }

    /**
     * @inheritDoc
     */
    public function message()
    {
        return trans('validation.movie_type');
    }
}
