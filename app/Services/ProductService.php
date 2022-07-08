<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use App\Interface\ProductServiceInterface;

class ProductService implements ProductServiceInterface
{
    public function __construct(private Model $product)
    {
    }

    public function getAllProducts()
    {
        return $this->product->all();
    }

    public function storeProduct(array $params)
    {
        return $this->product->create([
            'sku' => $params['sku'],
            'name' => $params['name'],
            'price' => $params['price'],
            'attribute' => [
                'key' => $params['productType_key'],
                'value' => implode('x', $params['attributeValue']),
                'unit' => $params['productType_unit']
            ]
        ]);
    }

    public function deleteProducts(array $params)
    {
        return $this->product->whereIn('id', $params['ids'])->delete();
    }
}
