<?php
function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
}
function pk_base_path($path)
{
    return BASE_PATH . $path;
}
function pk_get_class_name($class)
{
    return basename($class);
}
function pk_get_object($class, $attribute)
{
    $className = basename($class);
    if (!isset($attribute[$className])) {
        return null;
    }
    return $attribute[$className];
}
function pk_is_file_existed($fileName)
{
    return file_exists($fileName);
}

function pk_replace_extantion($fileName, $type = '.php')
{
    return str_replace($type, "", $fileName);
}

function pk_replace_back_slash($fileName)
{
    return str_replace('/', "\\", $fileName);
}

function pk_replace_forward_slash($fileName)
{
    return str_replace('\\', "/", $fileName);
}

function pk_convert_path_for_namespace($filePath)
{
    $filePath = pk_replace_extantion($filePath);
    return pk_replace_back_slash($filePath);
}

function pk_request($key)
{
    return $_POST[$key];
}

function pk_isCurrentUrl($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function pk_getCurrentUrl()
{
    return $_SERVER['REQUEST_URI'];
}

function pk_filter_currentUrl()
{
    $name = str_replace(['/'], '-', strtok(pk_getCurrentUrl(), '?'));
    return ltrim($name, '-');
}

function pk_route_path($path, $attribute = '')
{
    echo "<a href='$path' $attribute >";
}

function pk_end_route_path()
{
    echo "</a>";
}