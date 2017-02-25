<?php

namespace App\Http\Controllers\Api;

use App\User;
use Application\Transformers\UserTransformer;
use Illuminate\Http\Request;
use Response, Input;

class CategoryController extends ApiController
{
    /**
     * @var Application\Transformers\UserTransformer
     */
    protected $userTransformer;


    public function __construct(UserTransformer $userTransformer)
    {
        $this->userTransformer = $userTransformer;

    }

    /**
     * Display a listing of the resource.
     *
     * Illuminate\Http\Request
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->get('limit')?:10;
        $users = User::paginate($limit);

        return $this->respondWithPagination($users,[
            'datas'   => $this->userTransformer->transformCollection($users->all()),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        if(!$request->get('name') or !$request->get('email')){
            $this->respondUnProcessableEntity('Parameters failed validation for user.');
        }
        User::create([
            'name'     => $request->get('name'),
            'email'    => $request->get('email'),
            'password' => $request->get('password'),
        ]);

        $this->respondCreated('User Successfully Created');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if(!$user){
            return $this->respondNotFound('User Doesnot exists');
        }
        return $this->respond([
            'data'=> $this->userTransformer->transform($user)
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if(!$user){
            return $this->respondNotFound('User Doesnot exists');
        }
        return $this->respond([
            'data'=> $this->userTransformer->transform($user)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if(!$user){
            return $this->respondNotFound('User Doesnot exists');
        }

        $user->update([
            'name'     => $request->get('name'),
            'email'    => $request->get('email'),
            'password' => $request->get('password'),
        ]);

        $this->respondCreated('User Successfully Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if(!$user){
            return $this->respondNotFound('User Doesnot exists');
        }
        User::destroy($id);
        $this->respondCreated('User Deleted Successfully');
    }




}
