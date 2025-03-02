<?php 
// Include the AWS SDK autoloader 

use Aws\S3\S3Client; 
 
// Amazon S3 API credentials 
$region = $_ENV['S3_REGION'];
$version = $_ENV['S3_VERSION'];
$access_key_id = $_ENV['S3_ACCESS_KEY'];
$secret_access_key = $_ENV['S3_SECRET_KEY'];
$bucket = $_ENV['S3_BUCKET_NAME'];
 
 
$statusMsg = ''; 
$status = 'danger'; 
 
// If file upload form is submitted 
if(isset($_POST["submit"])){ 
    // Check whether user inputs are empty 
    if(!empty($_FILES["image"]["name"])) { 
        // File info 
        $file_name = basename($_FILES["image"]["name"]); 
        $file_type = pathinfo($file_name, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($file_type, $allowTypes)){ 
            // File temp source 
            $file_temp_src = $_FILES["image"]["tmp_name"]; 
             
            if(is_uploaded_file($file_temp_src)){ 
                // Instantiate an Amazon S3 client 
                $s3 = new S3Client([ 
                    'version' => $version, 
                    'region'  => $region, 
                    'credentials' => [ 
                        'key'    => $access_key_id, 
                        'secret' => $secret_access_key, 
                    ] 
                ]); 
 
                $file_name = str_replace(' ', '_', $file_name); // Replace spaces with underscores
                $file_name = preg_replace('/[^A-Za-z0-9.\_]/', '', $file_name);

                // concat string with product name and time

                
                // Upload file to S3 bucket 
                try { 
                    $result = $s3->putObject([ 
                        'Bucket' => $bucket, 
                        'Key'    => $file_name, 
                        'ACL'    => 'public-read', 
                        'SourceFile' => $file_temp_src,
                        'ContentType' => mime_content_type($file_temp_src)
                    ]); 
                    $result_arr = $result->toArray(); 
                     
                    // if(!empty($result_arr['ObjectURL'])) { 
                    //     $s3_file_link = $result_arr['ObjectURL']; 
                    // } else { 
                    //     $api_error = 'Upload Failed! S3 Object URL not found.'; 
                    // } 
                } catch (Aws\S3\Exception\S3Exception $e) { 
                    $api_error = $e->getMessage(); 
                } 
                 
                if(empty($api_error)){ 
                    $status = 'success'; 
                    $statusMsg = "File was uploaded to the S3 bucket successfully!"; 
                }else{ 
                    $statusMsg = $api_error; 
                } 
            }else{ 
                $statusMsg = "File upload failed!"; 
            } 
        }else{ 
            $statusMsg = 'Sorry, only Image files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select a file to upload.'; 
    } 
} 
?>