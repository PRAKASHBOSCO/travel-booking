<?php
namespace App\Services\Contracts;

use Illuminate\Http\Request;

interface ITermService extends IBaseService {
	public function getPostsPagination($number = 10, $where = []);
	public function getTaxonomyByName($tax_name);
	public function newTerm(Request $request);
	public function editTerm(Request $request);
	public function deleteTerm(Request $request);
	public function getTermByID($id);
}

