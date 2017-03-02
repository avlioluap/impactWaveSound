<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MusicSearchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //$this->sanitize();
        return [
            'musicPesquisa' => 'required',
            'musicPage'     => 'nullable',
            'musicType'     => 'required'
        ];
    }

    public function messages()
    {
        return [
            'musicPesquisa.required' => \Lang::get('music.musicSearchEmptyMsg'),
        ];
    }

    /**
     * exemplo para limpar inputs
     */
    public function sanitize()
    {
        $input = $this->all();

        if (preg_match("#https?://#", $input['url']) === 0) {
            $input['url'] = 'http://'.$input['url'];
        }

        $input['name'] = filter_var($input['name'], FILTER_SANITIZE_STRING);
        $input['description'] = filter_var($input['description'], FILTER_SANITIZE_STRING);

        $this->replace($input);
    }
}
