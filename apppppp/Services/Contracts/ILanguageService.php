<?php
namespace App\Services\Contracts;

use Illuminate\Http\Request;

interface ILanguageService extends IBaseService {
    public function getDataLanguage(Request $request);
    public function updateLanguage(Request $request);
    public function changeStatus(Request $request);
    public function deleteLanguage(Request $request);
    public function sortLanguage(Request $request);
    public function getDataTranslation(Request $request);
    public function scanTranslation(Request $request);
    public function updateTranslation(Request $request);
}

