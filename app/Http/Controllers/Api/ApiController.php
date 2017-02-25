<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Response as IllimunateResponse;
use Response ;

class ApiController extends Controller
{
    protected $statusCode = IllimunateResponse::HTTP_OK;

    public function respondWithPagination(Paginator $paginate, $data){

        $data = array_merge($data,[

            'paginator'        => [
                'total_count'  => $paginate->total(),
                'total_pages'  => ceil($paginate->total() / $paginate->perPage()),
                'current_page' => $paginate->currentPage(),
                'limit'        =>  $paginate->perPage()
            ],
        ]);

        return $this->respond($data);

    }

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function respondNotFound($message = '!Not Found'){

        $this->setStatusCode(IllimunateResponse::HTTP_NOT_FOUND);
        return $this->respondWithError($message);
    }

    public function respondInternalError($message = '!Internal Error'){

        $this->setStatusCode(IllimunateResponse::HTTP_INTERNAL_SERVER_ERROR);
        return $this->respondWithError($message);
    }

    public function respond($data, $headers= []){

         return Response::json($data, $this->getStatusCode(), $headers);

    }

    public function respondWithError($message = null){
        return $this->respond([
            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode(),
            ]
        ]);

    }

    public function respondCreated($message)
    {
        $this->setStatusCode(IllimunateResponse::HTTP_CREATED);
        return $this->respond([
            'message' => $message
        ]);
    }


    public function respondUnProcessableEntity($message)
    {
        $this->setStatusCode(422);
        return $this->respondWithError($message);
    }

}