<?php

namespace App\Services;

use App\Repositories\ColorsRepositoryInterface;
use App\Models\ColorsValidator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class ColorsService{

    private $colorsRepository;

    public function __construct(ColorsRepositoryInterface $colorsRepository){
        $this->colorsRepository = $colorsRepository;
    }

    public function getAll(){
        try{
            $colors = $this->colorsRepository->getAll();
            $countItems = (count($colors) > 0) ? true : false;

            if($countItems){
                return response()->json($colors, Response::HTTP_OK);
            } else {
                return response()->json([], Response::HTTP_OK);
            }
        } catch(QueryException $e){
            return response()->json(['erro' => 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function get(int $id){
        try{
            $color = $this->colorsRepository->get($id);
            $countItems = (count($color) > 0) ? true : false;

            if($countItems){
                return response()->json($color, Response::HTTP_OK);
            } else {
                return response()->json(null, Response::HTTP_NOT_FOUND);
            }
        } catch(QueryException $e){
            return response()->json(['erro' => 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function store(Request $request){
        $validator = Validator::make(
                $request->all(),
                ColorsValidator::NEW_PACKAGE_RULE,
                ColorsValidator::ERROR_MESSAGES
        );

        if($validator->fails()){
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        } else{
            try{
                $color = $this->colorsRepository->store($request);
                return response()->json($color, Response::HTTP_CREATED);
            } catch(QueryException $e){
                return response()->json(['erro' => 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }

	}

    public function update(int $id, Request $request){
        try{
            $color = $this->colorsRepository->update($id, $request);
            return response()->json($color, Response::HTTP_OK);
        } catch(QueryException $e){
            return response()->json(['erro' => 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
	}

    public function destroy(int $id){
        try{
            $color = $this->colorsRepository->destroy($id);
            return response()->json($color, Response::HTTP_OK);
        } catch(QueryException $e){
            return response()->json(['erro' => 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
	}

}

?>
