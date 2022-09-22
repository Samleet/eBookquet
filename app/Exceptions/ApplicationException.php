<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApplicationException extends Exception
{
    /**
     * @var int
     */
    private $status = 400;

    /**
     * ApplicationException constructor.
     * @param string $message
     * @param int $status
     */
    public function __construct(string $message, ?int 
    $status = null)
    {        
        parent::__construct($message);
        if (!empty($status)) $this->status = $status;
    }

    /**
     * Render the exception into an HTTP response.
     * @param  Request  $request
     * @return Response
     */
    public function render(Request $request): object
    {
        return response()->json([
            "message" => $this->getMessage(), //////
            "status" => $this->status,
        ], $this->status);
    }
}
