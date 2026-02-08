<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function (PostTooLargeException $e, $request) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'O tamanho dos dados enviados excede o limite do servidor. Reduza o tamanho da imagem (máx. 2 MB recomendado).',
                ], 413);
            }
            return redirect()->back()
                ->with('error', 'O tamanho dos dados enviados (ex.: imagem) excede o limite do servidor. Use uma imagem menor (máx. 2 MB) ou peça ao administrador do servidor para aumentar post_max_size e upload_max_filesize no PHP.');
        });
    }
}
