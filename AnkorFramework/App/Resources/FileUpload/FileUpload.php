<?php

namespace AnkorFramework\App\Resources\FileUpload;

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;



class FileUpload
{

    private $bucket;
    private $s3;
    private $imageURl = '';

    public function __construct()
    {

        $this->bucket = $_ENV['S3_BUCKET_NAME'];

        $this->s3 = new S3Client([
            'version' => $_ENV['S3_VERSION'],
            'region' => $_ENV['S3_REGION'],
            'credentials' => [
                'key' => $_ENV['S3_ACCESS_KEY'],
                'secret' => $_ENV['S3_SECRET_KEY'],
            ]
        ]);
    }


    public function uploadFile($file, $prefix)
    {
        if (empty($file)) {
            return; //?
        }

        $file_name = basename($file["name"]);
        $file_type = pathinfo($file_name, PATHINFO_EXTENSION);

        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (!in_array($file_type, $allowTypes)) {
            return; //?
        }

        $file_temp_src = $file["tmp_name"];

        if (!is_uploaded_file($file_temp_src)) {
            return; //?
        }

        $file_name = str_replace(' ', '_', $file_name); // Replace spaces with underscores
        $file_name = preg_replace('/[^A-Za-z0-9.\_]/', '', $file_name);
        $file_name = $prefix . "_" . $file_name; //add time to file name

        try {
            $result = $this->s3->putObject([
                'Bucket' => $this->bucket,
                'Key' => $file_name,
                'ACL' => 'public-read',
                'SourceFile' => $file_temp_src,
                'ContentType' => mime_content_type($file_temp_src)
            ]);
            $this->imageURl = $result->get('ObjectURL');

        } catch (S3Exception $e) {
            $api_error = $e->getMessage();
        }
    }

    public function getImageURL()
    {
        return $this->imageURl;
    }

}