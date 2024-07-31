<?php

namespace App\Support\Controller\Response;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Trait ApiResponseTrait
 *
 * @package App\Support\Controller\Response
 */
trait ApiResponseTrait
{
    /**
     * Default
     *
     * @var int
     */
    private int $statusCode = 200;

    /**
     * @var array
     */
    private array $headers = [];

    /**
     * @var array|null
     */
    private ?array $pagination = null;

    /**
     * @return int
     */
    protected function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     *
     * @return $this
     */
    protected function setStatusCode(int $statusCode): static
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @param LengthAwarePaginator $paginator
     *
     * @return $this
     */
    protected function setPagination(LengthAwarePaginator $paginator): static
    {
        $this->pagination = [
            'page'     => $paginator->currentPage(),
            'by'       => $paginator->perPage(),
            'total'    => $paginator->total(),
            'lastPage' => $paginator->lastPage()
        ];

        return $this;
    }

    /**
     * @param array $headers
     *
     * @return $this
     */
    protected function setHeaders(array $headers): static
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * @param array $data
     *
     * @return JsonResponse
     */
    private function respond(array $data = []): JsonResponse
    {
        return response()->json(
            $data,
            $this->getStatusCode(),
            $this->headers,
            JSON_UNESCAPED_UNICODE
        );
    }

    /**
     * @param array|null $data
     * @param string|null $message
     *
     * @return JsonResponse
     */
    protected function respondWithSuccess(array $data = null, string $message = null): JsonResponse
    {
        $response = $data ?: [];

        if ($message) {
            $response['message'] = $message;
        }

        if ($this->pagination) {
            $response['pagination'] = $this->pagination;
        }

        return $this->respond($response);
    }

    /**
     * @param mixed $data
     * @param int $statusCode
     *
     * @return JsonResponse
     */
    private function respondRawError(mixed $data, int $statusCode = 400): JsonResponse
    {
        $response = [
            'errors' => [
                'message' => 'Unknown error.'
            ]
        ];

        if (is_array($data)) {
            $response = [
                'errors' => $data
            ];
        }

        if (is_string($data)) {
            $response = [
                'errors' => [
                    'message' => $data
                ]
            ];
        }

        return $this->setStatusCode($statusCode)
            ->respond($response);
    }

    /**
     * @param string|null $message
     *
     * @return JsonResponse
     */
    protected function respondWithError(string $message = null): JsonResponse
    {
        return $this->respondRawError($message);
    }

    /**
     * @param string|null $message
     *
     * @return JsonResponse
     */
    protected function respondNotFound(string $message = null): JsonResponse
    {
        return $this->respondRawError(
            $message,
            Response::HTTP_NOT_FOUND
        );
    }

    /**
     * @param string|null $message
     *
     * @return JsonResponse
     */
    protected function respondForbidden(string $message = null): JsonResponse
    {
        return $this->respondRawError(
            $message,
            Response::HTTP_FORBIDDEN
        );
    }

    /**
     * @param array $data
     * @param string|null $message
     * @param int $statusCode
     *
     * @return JsonResponse
     */
    protected function respondWithErrors(array $data, string $message = null, int $statusCode = 400): JsonResponse
    {
        $response = [
            'errors' => $data
        ];

        if ($message) {
            $response['message'] = $message;
        }

        return $this->setStatusCode($statusCode)
            ->respond($response);
    }

    /**
     * @param array $data
     *
     * @return JsonResponse
     */
    protected function respondWithValidationError(array $data): JsonResponse
    {
        return $this->respondRawError(
            $data,
            Response::HTTP_UNPROCESSABLE_ENTITY
        );
    }

    /**
     * @param array $data
     * @param string $message
     *
     * @return JsonResponse
     */
    protected function respondWithValidationErrors(array $data, string $message): JsonResponse
    {
        $response = [
            'errors' => $data
        ];

        if ($message) {
            $response['message'] = $message;
        }

        return $this->respondRawError(
            $response,
            Response::HTTP_UNPROCESSABLE_ENTITY
        );
    }

    /**
     * @param string|null $message
     *
     * @return JsonResponse
     */
    protected function respondWithAuthorizationError(string $message = null): JsonResponse
    {
        return $this->respondRawError(
            $message ?: 'Authorization error.',
            Response::HTTP_UNAUTHORIZED
        );
    }
}
