<?php


namespace AnkorFramework\App\Utils\ScanDirectory;


use AnkorFramework\App\Exception\ResponeException;
use AnkorFramework\App\Http\Response;
use Exception;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;

class ScanController implements IScan
{
    private string $dirName = "src/controllers";
    private string $filePath = "AnkorFramework/bootstrap/cache/controller_cache.php";
    private $data = [];

    private function load_file($path)
    {
        return include pk_base_path($path);
    }

    private function search($value = "")
    {
        $results = [];

        $base = pk_base_path($this->dirName);

        try {
            $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($base));
            foreach ($iterator as $file) {
                if ($file->isFile() && strpos($file->getFilename(), $value) !== false) {
                    $results[] = $file->getPathname();
                }
            }
        } catch (Exception $e) {
            ResponeException::show($e->getMessage());
        }

        // split data from 1D to 2D Array
        $this->split($results);
    }

    private function search_and_store()
    {
        $this->search();
        $this->store_cache(pk_base_path($this->filePath), $this->data);
    }

    private function split($value)
    {
        $tmp = [];
        foreach ($value as $item) {
            $cleanedData = preg_replace('#.*?src/#', 'src/', str_replace('\\', '/', $item));
            $tmp[pk_get_class_name(str_replace(".php", "", $item))] = $cleanedData;
        }
        $this->data = $tmp;
    }

    private function store_cache($path, $data)
    {
        $content = "<?php\nreturn " . var_export($data, true) . ";\n";
        file_put_contents($path, $content);
    }

    private function contain($class)
    {
        if (isset($this->data[$class])) {
            return true;
        }
        return false;
    }

    /**
     * handler
     *
     * 1st condition  :
     *      if we can not find the file in the folder so we need to search and create file then store the value in to those file.
     * 2nd condition :
     *      if the file is not existed then we need to search and store the value in to the file.
     */

    public function handler($class)
    {
        if (!pk_is_file_existed(pk_base_path($this->filePath))) {
            $this->search_and_store();
            return;
        } else {
            $this->data = $this->load_file($this->filePath);
            if (!$this->contain($class)) {
                $this->search_and_store();
                return;
            }
        }
        return $this->data;
    }

    public function getData()
    {
        return $this->data;
    }
}
