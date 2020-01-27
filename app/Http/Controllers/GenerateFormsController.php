<?php

namespace App\Http\Controllers;

use App\Models\Soldier;
use Illuminate\Http\Request;
use PDF;

class GenerateFormsController extends Controller
{
    public function form111(Soldier $soldier, Request $request)
    {
        
        $template_file_name = storage_path;

        $rand_no = rand(111111, 999999);
        $fileName = "results_" . $rand_no . ".docx";

        $folder   = storage_path('docs/exports');
        $full_path = $folder . '/' . $fileName;

        try
        {
            if (!file_exists($folder))
            {
                mkdir($folder);
            }

            //Copy the Template file to the Result Directory
            copy($template_file_name, $full_path);

            // add calss Zip Archive
            $zip_val = new \ZipArchive();

            //Docx file is nothing but a zip file. Open this Zip File
            if($zip_val->open($full_path) == true)
            {
                // In the Open XML Wordprocessing format content is stored.
                // In the document.xml file located in the word directory.

                $key_file_name = 'word/document.xml';
                $message = $zip_val->getFromName($key_file_name);

                // this data Replace the placeholders with actual values
                $message = str_replace("name",      "linus",       $message);

                //Replace the content with the new content created above.
                $zip_val->addFromString($key_file_name, $message);
                $zip_val->close();
            }
        }
        catch (\Exception $exc)
        {
            $error_message =  "Error creating the Word Document";
            var_dump($exc);
        }

//        $totalExtraDuties = $soldier->extraDuties()->sum('days');
//        $deservedLeaves = $soldier->leaves()->where('type', 1)->sum('days');
//        $bonusLeaves = $soldier->leaves()->where('type', 2)->sum('days');
//        $totalShortage = $soldier->shortages()->sum('time');
//        $totalVoids = $soldier->voidDuties()->sum('days');
//        $soldier->load('martialInfo', 'leaves', 'shortages', 'extraDuties', 'voidDuties');
//        return view('form-111', compact('soldier', 'totalExtraDuties', 'deservedLeaves', 'bonusLeaves', 'totalShortage', 'totalVoids'));
    }
}
