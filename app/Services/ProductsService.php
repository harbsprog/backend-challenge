<?php

namespace App\Services;

use App\Repositories\ProductsRepositoryInterface;
use App\Models\ProductsValidator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class ProductsService{

    private $productsRepository;

    public function __construct(ProductsRepositoryInterface $productsRepository){
        $this->productsRepository = $productsRepository;
    }

    public function getAll(){
        try{
            $products = $this->productsRepository->getAll();
            $countItems = (count($products) > 0) ? true : false;

            if($countItems){
                $colorArray = array(
                    'color' => '',
                    'code' => ''
                );

                foreach($products as $product){

                    $colorVariant = explode('[', $product->color_variant);
                    $colorVariant = explode(']', $colorVariant[1]);
                    $colorVariant = explode(',', $colorVariant[0]);

                    foreach($colorVariant as $key => $color){
                        $colorFinally = $this->productsRepository->getColorVariant($color);

                        $colorArray[$key] = $colorFinally;
                    }

                    $product->color_variant = array_filter($colorArray);
                    $colorArray = array();
                }

                return response()->json($products, Response::HTTP_OK);
            } else {
                return response()->json([], Response::HTTP_OK);
            }
        } catch(QueryException $e){
            return response()->json(['erro' => 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function get(int $id){
        try{
            $product = $this->productsRepository->get($id);
            $product[0]['color_variant'] = ($product[0]['color_variant']);
            $countItems = (count($product) > 0) ? true : false;

            if($countItems){
                $colorArray = array(
                    'color' => '',
                    'code' => ''
                );

                $colorVariant = explode('[', $product[0]['color_variant']);
                $colorVariant = explode(']', $colorVariant[1]);
                $colorVariant = explode(',', $colorVariant[0]);

                foreach($colorVariant as $key => $color){
                    $colorFinally = $this->productsRepository->getColorVariant($color);

                    $colorArray[$key] = $colorFinally;
                }

                $product[0]['color_variant'] = array_filter($colorArray);

                return response()->json($product, Response::HTTP_OK);
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
                ProductsValidator::NEW_PACKAGE_RULE,
                ProductsValidator::ERROR_MESSAGES
        );

        if($validator->fails()){
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        } else{
            try{
                $request->merge([
                    'color_variant' => json_encode($request->color_variant)
                ]);

                $product = $this->productsRepository->store($request);
                return response()->json($product, Response::HTTP_CREATED);
            } catch(QueryException $e){
                return response()->json(['erro' => 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }

	}

    public function update(int $id, Request $request){
        $validator = Validator::make(
                $request->all(),
                ProductsValidator::NEW_PACKAGE_RULE,
                ProductsValidator::ERROR_MESSAGES
        );

        if($validator->fails()){
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        } else{
            try{
                $request->merge([
                    'color_variant' => json_encode($request->color_variant)
                ]);

                $product = $this->productsRepository->update($id, $request);
                return response()->json($product, Response::HTTP_OK);
            } catch(QueryException $e){
                return response()->json(['erro' => 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
    }

    public function destroy(int $id){
        try{
            $product = $this->productsRepository->destroy($id);
            return response()->json($product, Response::HTTP_OK);
        } catch(QueryException $e){
            return response()->json(['erro' => 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
	}

}

?>
