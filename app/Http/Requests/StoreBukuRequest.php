<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBukuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
                'title' => 'required',
                'author' => 'required',
                'deskripsi' => 'required|max:800',
                'isi' => 'required|min:20',
                'image' => 'required|image',
                'genre' => 'required|array',
                'genre.*' => 'required',
                'chapter' => 'required',
        ];
    }

    public function messages() :array {
        return [
                'title.required' => 'Title wajib di isi',
                'author.required' => 'Author wajib di isi',
                'deskripsi.required' => 'Deskripsi wajib di isi',
                'isi.required' => 'Isian wajib di isi',
                'image.required' => 'Image wajib di isi',
                'genre.required' => 'Genre wajib di pilih',
                'chapter.required' => 'Judul chapter wajib di isi',
        ];
    }
}
