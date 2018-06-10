<?php

/**
 * @param int $id
 * @return mixed|null
 */
function premmerce_get_product_brand($id)
{
    $brands = get_the_terms($id, 'brands');
    $brand = isset($brands[0]) ? $brands[0] : null;

    return $brand;
}
