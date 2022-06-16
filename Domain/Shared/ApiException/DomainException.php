<?php

namespace App\Domain\Shared\ApiException;

use Symfony\Component\HttpFoundation\Response;

class DomainException extends ApiException
{
    public function getStatusCode(): int
    {
        return Response::HTTP_BAD_REQUEST;
    }

    public static function message(string $message): DomainException
    {
        return new self($message);
    }
}
