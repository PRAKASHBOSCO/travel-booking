<?php
namespace App\Services\Contracts;

use Illuminate\Http\Request;

interface IOptionService extends IBaseService {
    public function getIconsAction(Request $request);
    public function getOption($key, $unserialize = false);
    public function saveSettings(Request $request);
    public function getListItemHtml(Request $request);
    public function getPaymentForm(Request $request);
    public function sortPayment(Request $request);
	public function getCheckingEmailForm(Request $request);
}

