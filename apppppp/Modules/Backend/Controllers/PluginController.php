<?php
/**
 * Created by PhpStorm.
 * User: Jream
 * Date: 5/12/2020
 * Time: 11:33 PM
 */
namespace App\Modules\Backend\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PluginController extends Controller{
    private $url = 'https://plugins.booteam.co/index.php';

    public function __construct() {

    }

    public function installPluginAction(Request $request){
        $plugin = $request->post('plugin');
        $action = $request->post('action');

        if(!empty($plugin)){
        	switch ($action){
		        case 'install':
		        case 'update':
			        $download = send_curl($this->url, [
				        'action' => 'install',
				        'ext' => $plugin
			        ]);
			        if(!empty($download)){
				        $content = @file_get_contents($download);
				        if (strpos($http_response_header[0], "200")) {
					        $file_name = app_path( 'Plugins/' . trim( $plugin ) . '.zip' );
					        $saved     = copy( $download, $file_name );
					        if ( $saved ) {
						        $zip = new \ZipArchive();
						        $zip->open( $file_name, \ZipArchive::CREATE );
						        $extracted = $zip->extractTo( app_path( 'Plugins/' ) );
						        $zip->close();
						        File::delete( $file_name );
						        if ( $extracted ) {
							        $version = $request->post( 'version', '1.0.0' );
							        $this->_updateDatabase( $plugin, $version );

							        return response()->json( [
								        'status'  => true,
								        'title'   => __( 'System Alert' ),
								        'message' => __( 'The plugin has been installed successfully' ),
								        'reload'  => true
							        ] );
						        } else {
							        return response()->json( [
								        'status'  => false,
								        'title'   => __( 'System Alert' ),
								        'message' => __( 'Install add on fail' ),
							        ] );
						        }
					        } else {
						        return response()->json( [
							        'status'  => false,
							        'title'   => __( 'System Alert' ),
							        'message' => __( 'Can not install this plugin. Please try again!' )
						        ] );
					        }
				        }else{
					        return response()->json( [
						        'status'  => false,
						        'title'   => __( 'System Alert' ),
						        'message' => __( 'Can not install this plugin. Please try again!' )
					        ] );
				        }
			        } else {
				        return response()->json([
					        'status' => false,
					        'title' => __('System Alert'),
					        'message' => __('Can not install this plugin. Please try again!'),
					        'reload' => true
				        ]);
			        }
			    break;
		        case 'remove':
			        $file_path = app_path( 'Plugins/' . trim( $plugin ) );
			        rmdir_recursive($file_path);
			        $this->_removeDatabase( $plugin );
			        return response()->json( [
				        'status'  => true,
				        'title'   => __( 'System Alert' ),
				        'message' => __( 'The plugin has been removed successfully' ),
				        'reload'  => true
			        ] );
		        	break;
	        }
        }

        return response()->json([
            'status'  => false,
            'message' => __( 'Data is invalid' )
        ]);
    }

	private function _removeDatabase($plugin){
		$db = get_opt('gmz_plugins', []);
		if(!is_array($db)){
			$db = [];
		}
		if(isset($db[$plugin])){
			unset($db[$plugin]);
		}
		update_opt('gmz_plugins', json_encode($db));
	}

    private function _updateDatabase($plugin, $version){
    	$db = get_opt('gmz_plugins', []);
	    if(!is_array($db)){
	    	$db = [];
	    }
    	$db[$plugin] = $version;
	    update_opt('gmz_plugins', json_encode($db));
    }

    public function pluginView(Request $request){
        try {
            $request = file_get_contents(add_query_arg(['action' => 'all'], $this->url));
            $plugins = json_decode($request, true);
            $installed = get_opt('gmz_plugins', []);

            return $this->getView($this->getFolderView('plugins.index'), ['plugins' => $plugins, 'installed' => $installed]);
        }catch (\Exception $e){
            return $this->getView($this->getFolderView('plugins.index'), ['error' => __('Can not connect to server. Please try it again after some minute')]);
        }
    }
}