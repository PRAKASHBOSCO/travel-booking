<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 12/9/20
 * Time: 14:44
 */

namespace App\Modules\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Contracts\ILanguageService;
use Illuminate\Http\Request;

class LanguageController extends Controller {

    private $service;

    public function __construct(ILanguageService $_service) {
        $this->service = $_service;
    }

    public function updateTranslateAction(Request $request)
    {
        $response = $this->service->updateTranslation($request);
        return response()->json($response);
    }

    public function scanTranslateAction(Request $request){
        $response = $this->service->scanTranslation($request);
        return response()->json($response);
    }

    public function translationView(Request $request){
        $data = $this->service->getDataTranslation($request);
        return $this->getView($this->getFolderView('language.translation'), $data);
    }

    public function sortLanguageAction(Request $request)
    {
        $response = $this->service->sortLanguage($request);
        return response()->json($response);
    }

    public function deleteLanguageAction(Request $request)
    {
        $response = $this->service->deleteLanguage($request);
        return response()->json($response);
    }

    public function changeLanguageStatusAction(Request $request)
    {
        $response = $this->service->changeStatus($request);
        return response()->json($response);
    }

    public function updateLanguageAction(Request $request)
    {
        $response = $this->service->updateLanguage($request);
        return response()->json($response);
    }

    public function index(Request $request){
        $data = $this->service->getDataLanguage($request);
        if(isset($data['redirect'])){
            return response()->redirectToRoute($data['routeName']);
        }
        return $this->getView($this->getFolderView('language.index'), $data);
    }
}