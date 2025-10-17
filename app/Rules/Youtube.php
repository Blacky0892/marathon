<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Youtube implements Rule
{
    private string $regex = '~
  ^(?:https?://)?                           # Optional protocol
   (?:www[.])?                              # Optional sub-domain
   (?:youtube[.]com/watch[?]v=|youtu[.]be/) # Mandatory domain name (w/ query string in .com)
   ([^&]{11})                               # Video id of 11 characters as capture group 1
    ~x';

    private string $regexRutube = '~
  ^(?:https?://)?
   (?:www[.])?
   (?:rutube[.]ru/video/)
   ([^&]{32})
    ~x';
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return is_null($value) || preg_match($this->regex, $value) === 1 || preg_match($this->regexRutube, $value) === 1;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'Ссылка должна вести на ролик в сервисе Youtube или Rutube.';
    }
}
