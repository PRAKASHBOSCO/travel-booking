<?php
namespace App\Services\Contracts;

use Illuminate\Http\Request;

interface IUserService extends IBaseService {
	public function updateProfile(Request $request);
    public function getUsersPagination($number = 10, $where = []);
    public function getPartnerPagination($number = 10, $where = []);
    public function newUser(Request $request);
    public function getUserForm(Request $request);
    public function editUser(Request $request);
    public function deleteUser(Request $request);
    public function approvePartner(Request $request);
    public function partnerRegister(Request $request);
    public function upgradePartner($action);
}

