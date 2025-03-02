<?php
namespace src\controllers\dashboard;

use AnkorFramework\App\Http\BaseController;
use AnkorFramework\App\Http\Response;
use AnkorFramework\App\Validate\ValidationException;
use AnkorFramework\App\Resources\FileUpload\FileUpload;
use src\services\dashboard\DashBoardCategoryService;
use src\services\dashboard\DashBoardProductService;

class DashBoardProductController extends BaseController
{
    private $productService;
    private $categoryService;

    public function __construct(DashBoardProductService $productService, DashBoardCategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $products = $this->productService->getProducts();
        Response::view('dashboard/products/products.view', ['products' => $products]);
    }
    public function edit($id)
    {
        $product = $this->productService->getProductById($id);
        Response::view('dashboard/products/update.view', ['products' => $product]);
    }
    public function create()
    {
        $categories = $this->categoryService->getCategoryCBO();
        Response::view('dashboard/products/create.view', ['categories' => $categories]);
    }

    public function update()
    {
        Response::view('dashboard/products/update.view');
    }
    public function store()
    {
        $uploader = new FileUpload();
        $uploader->uploadFile($_FILES['image'], $this->productService->getLast()['max(id)'] + 1);

        $category = explode("_", pk_request('category'));
        

        $name = pk_request('name');
        $description = pk_request('description');
        $price = (float) pk_request('price');
        $category_id = (int) $category[0];
        $category_name = $category[1];
        $image = $uploader->getImageURL();
        $stock = (int) pk_request('stock');


        try {
            $this->queryResponse($this->productService->createProduct([
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'category_id' => $category_id,
                'category_name' => $category_name,
                'image' => $image,
                'stock' => $stock
            ]));
        } catch (ValidationException $validationException) {
            Response::errors($validationException->getErrors(), 0, true)::previousUrl();
        }
    }

    public function show($id)
    {
        Response::view('user/products/product.view', ['id' => $id]);
    }

    private function queryResponse($condition)
    {
        if (!$condition) {
            Response::previousUrl();
        }
        Response::redirect('/admin/products');
    }
}