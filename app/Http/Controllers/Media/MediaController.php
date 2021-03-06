<?php

namespace App\Http\Controllers;

use Storage;
use App\File;
use App\FileAudit;
use http\Client\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Contracts\Routing\ResponseFactory;

class MediaController extends Controller
{
    /**
     * Require users to have been authenticated before reaching this page.
     *
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Download the given file.
     *
     * @param File $file
     *
     * @return mixed
     */
    public function downloadFile(File $file)
    {
        $file->update(['download_count' => ++$file->download_count]);
        FileAudit::newAudit($file);

        /* @noinspection PhpUndefinedMethodInspection */
        return Storage::disk($file->driver)
            ->download($file->getFullPath(), $file->public_name.'.'.$file->extension->name);
    }

    /**
     * Return the uuid of the stored files.
     *
     * @return ResponseFactory|\Illuminate\Http\Response
     */
    public function store()
    {
        $values = request()->all();
        $errors = [];
        $stored_files = [];

        if (! isset($values['upload'])) {
            // Check to see if we are seeing a file upload key of upload_*
            // This might happen if there are more than one upload fields in form.
            foreach ($values as $key => $value) {
                ! preg_match('/upload_/', $key) ?: $values['upload'] = $value;
            }

            if (! isset($values['upload'])) {
                $errors[] = 'A file was not attached to this request.';

                return response(json_encode($errors), 444);
            }
        }

        if (! is_array($values['upload']) && $values['upload'] instanceof UploadedFile) {
            $values['upload'] = [$values['upload']];
        }

        foreach ($values['upload'] as $file) {
            $tmp_file = File::saveTmpFile($file);
            $tmp_file ? $stored_files[] = $tmp_file->uuid
                    : $errors[] = 'You can not upload a file of this type.';
        }

        if (count($errors) > 0) {
            return response(json_encode($errors), 444);
        }

        return response($stored_files, 200);
    }
}
