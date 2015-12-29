<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use \Response;
class RolesRequest extends Request {

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
		return [
			'name' => 'required',
			'access' => 'required',
//			'email' => 'email',
//			'avatar' => 'mimes:jpeg,bmp,png'
		];
	}

	public function forbiddenResponse()
    {
        return Response::make('Maaf! anda tidak punya hak untuk melakukan tindakan ini.',403);
    }

    public function messages()
    {
        return [
            'avatar.mimes' => 'Bukan format gambar yang falid. Format gambar yang valid adalah jpeg, bmp dan png.'
        ];
    }

}
