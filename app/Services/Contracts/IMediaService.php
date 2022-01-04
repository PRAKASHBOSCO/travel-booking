<?php
namespace App\Services\Contracts;

use Illuminate\Http\Request;

interface IMediaService extends IBaseService {
   public function getMediaFolder($storage = false);
   public function getAllMedia(Request $request);
   public function getMediaPopup(Request $request);
   public function uploadMedia(Request $request);
   public function getMediaDetail(Request $request);
   public function deleteMediaItem(Request $request);
   public function bulkDeleteMediaItem(Request $request);
}

