<?php
namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

use App\Http\Requests;
use File;
use ZipArchive;
  
class BackupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {

    }


    public function index() {

    try {

        $dirNames = array();  
       // $this->folderPath = 'export'.DS.str_replace( '.', '_', $this->getCurrentShop->getCurrentShop()->shopify_domain ).DS.'exported_files';

        $this->folderPath = public_path() .'/files/1/' ;

        
        $getAllDirs = File::directories( public_path( $this->folderPath ) );

        foreach( $getAllDirs as $dir ) {

            $dirNames[] = basename($dir);

        }
        return view('backups/listfolders', compact('dirNames'));

    } catch ( Exception $ex ) {
        Log::error( $ex->getMessage() );
    }



}

public function getFiles( $directoryName ) {

    try {
        $filesArr = array();
        $this->folderPath = 'export'.DS.str_replace( '.', '_', $this->getCurrentShop->getCurrentShop()->shopify_domain ).DS.'exported_files'. DS . $directoryName;
        $folderPth = public_path( $this->folderPath );
        $files = File::allFiles( $folderPth ); 
        $replaceDocPath = str_replace( public_path(),'',$this->folderPath );

        foreach( $files as $file ) {

            $filesArr[] = array( 'fileName' => $file->getRelativePathname(), 'fileUrl' => url($replaceDocPath.DS.$file->getRelativePathname()) );

        }

        return view('backups/listfiles', compact('filesArr'));

    } catch (Exception $ex) {
        Log::error( $ex->getMessage() );
    }


}


 public function zipFiles(Request $request)
 {
         // dd($request->all());
           $dir_name = $request->search;

           $myFiles = '/files/1/' . $dir_name ;

   $zip = new ZipArchive;
   
        $fileName = 'myNewFile.zip';
   
        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE)
        {
            $files = File::files(public_path($myFiles));
              //dd($files);
   
            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }
             
            $zip->close();
        }
    
        return response()->download(public_path($fileName));
    }


}
