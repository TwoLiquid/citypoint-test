<?php

namespace App\Http\Controllers\Api;

use App\Support\Controller\Response\ApiResponseTrait;
use App\Support\Transformer\TransformTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

/**
 * Class BaseController
 *
 * @package App\Http\Controllers\Api
 */
class BaseController extends Controller
{
    use AuthorizesRequests, ValidatesRequests, ApiResponseTrait, TransformTrait;
}
