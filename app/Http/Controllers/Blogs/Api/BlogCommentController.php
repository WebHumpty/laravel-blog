<?php

namespace App\Http\Controllers\Blogs\Api;

use App\Http\Controllers\Controller;
use App\Models\Blogs\BlogComment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogCommentController extends Controller
{
    private array $validateDate = [
        'name' => 'required|string|max:100',
        'email' => 'required|string|email|max:255',
        'comment' => 'required|string|max:255',
    ];

    /**
     * сохранить и вернуть новый комментарий
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->all();

        $validator = Validator::make($data, $this->validateDate);

        if ($validator->fails()) {
            return response()
                ->json([
                    'status' => false,
                    'errors' => $validator->errors(),
                ]);
        }

        $item = BlogComment::create($data);

        return response()
            ->json([
                'status' => true,
                'name' => $item->name,
                'comment' => $item->comment,
                'date' => $item->publishedDate(),
            ])
            ->setStatusCode(200);
    }
}
