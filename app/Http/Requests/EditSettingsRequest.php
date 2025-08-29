<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditSettingsRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $type = request()->route('type');
        if ($type == 'general') {
            return [
                'admin_site_title' => 'required_if:site,admin|max:255',
                'admin_site_footer_link' => 'required_if:site,admin|url',
                'main_site_title' => 'required_if:site,main|max:255',
            ];
        }
    }

    public function messages()
    {
        return [
            'admin_site_title.required_if' => 'Title is required.',
            'admin_site_footer_link.required_if' => 'Footer link is required.',
            'admin_site_footer_link.url' => 'Footer link must be a valid URL.',
            'main_site_title.required_if' => 'Title is required.',
        ];
    }
}
