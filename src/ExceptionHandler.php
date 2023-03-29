<?php

namespace Flashy;

use App\Exceptions\Handler as BaseExceptionHandler;
use Flashy\Exceptions\FlashException;
use Illuminate\Http\Request;
use Throwable;

class ExceptionHandler extends BaseExceptionHandler
{
    public function render($request, Throwable $e)
    {
        $resp = parent::render($request, $e);

        $code = $resp->getStatusCode();
        $allowed_headers = array_map('strtolower', config('flashy.allowed_headers'));

        if (! collect($request->headers)->hasAny($allowed_headers)) {
            return $resp;
        }

        collect(config('flashy.flash_codes'))
          ->each(fn ($msg, $key) => Error_If($code === $key, $msg ?? $e->getMessage()));

        return $resp;
    }

    public function register(): void
    {
        parent::register();

        $this->reportable(function (FlashException $e) {
            return false;
        });
        $this->renderable(function (FlashException $e, Request $req) {
            $data = [$e->type => $e->body, 'data' => $e->props];

            if ($req->hasHeader('X-Inertia')) {
                return back()->with($data);
            }

            return response(collect($data)->filter());
        });
    }
}
